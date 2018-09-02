<?php

namespace App\Http\Controllers;

use App\ReceiptScan\Contracts\ImageConverterInterface;
use App\ReceiptScan\Contracts\ReceiptScannerInterface;
use App\Repositories\FAScanLogRepository;

class ReceiptController extends Controller
{
    /**
     * The ImageConverterInterface implementation.
     */
    protected $imageConverter;

    /**
     * The ReceiptScannerInterface implementation.
     */
    protected $receiptScanner;

    /**
     * @var FAScanLogRepository
     */
    protected $scanLogRepo;

    /**
     * Create a new instance.
     *
     * @param ImageConverterInterface $converter
     * @return void
     */
    public function __construct(
        ImageConverterInterface $converter,
        ReceiptScannerInterface $scanner,
        FAScanLogRepository $scanLogRepo
    ) {
        $this->imageConverter = $converter;
        $this->receiptScanner = $scanner;
        $this->scanLogRepo = $scanLogRepo;
    }

    /**
     * Show scan form.
     *
     * @return void
     */
    public function showScanForm()
    {
        return view('index');
    }

    /**
     * Scan the uploaded receipt.
     *
     * @return void
     */
    public function scan()
    {
        // Input validation
        $this->validate(request(), [
            'file' => 'required|max:5000|mimes:pdf'
        ]);
        
        $fileName = request('file');

        // Scan jpeg to get receipt info
        $images = $this->imageConverter->pdfToJpeg($fileName);

        if (!$images) {
            \Session::flash('error', __('Failed to convert to jpg.'));

            return redirect()->route('receipt.scan-get');
        }
        
        $receipts = [];

        foreach ($images as $image) {
            // Scan jpg image to get receipt info
            $receipt = $this->receiptScanner->scan($image);

            if ($receipt) {
                // Log to db
                try {
                    $this->scanLogRepo->store($receipt, $image);
                } catch (Exception $e) {
                    \Session::flash('error', __('Failed to save data to db.'));

                    return redirect()->route('receipt.scan-get');
                }

                $receipts[] = $receipt;
            }
        }

        $count = count($receipts);
        \Session::flash('success', __("Got {$count} receipts"));

        // Return response
        return view('index', [
            'images' => $images,
            'receipts' => $receipts
        ]);
    }

    /**
     * Show scanning history.
     *
     * @return void
     */
    public function history()
    {
        $records = $this->scanLogRepo->getAll();

        $images = [];
        $receipts = [];

        foreach ($records as $record) {
            $images[] = $record->image_path;
            $receipts[] = new \App\ReceiptScan\FastAccounting\Receipt($record->data);
        }

        return view('scanning_history', [
            'images' => $images,
            'receipts' => $receipts,
            'records' => $records
        ]);
    }
}
