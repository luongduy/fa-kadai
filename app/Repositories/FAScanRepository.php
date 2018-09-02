<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use App\Models\FAScanLog;

class FAScanLogRepository
{
    /**
     * Get record by id.
     *
     * @param int $id
     * @return FAScanLog
     */
    public function getById($id)
    {
        return FAScanLog::find($id);
    }


    /**
     * Get all records.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return FAScanLog::orderBy('created_at', 'desc')->get();
    }

    /**
     * Store receipt data.
     *
     * @param App\ReceiptScan\Contracts\ReceiptInterface $receipt
     * @param string $imageData Image data
     * @return void
     */
    public function store($receipt, $imageData)
    {
        // Save image to disk
        $imgName = uniqid('img_');
        $imgPath = "public/receipts/{$imgName}.jpg";

        $imageData = str_replace('data:image/jpg;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $data = base64_decode($imageData);

        Storage::disk('local')->put($imgPath, $data);

        // Save receipt to db
        $record = new FAScanLog();

        $record->image_path = Storage::url($imgPath);
        $record->data = $receipt->getRawData();
        $record->created_at = now();

        $record->saveOrFail();
    }
}
