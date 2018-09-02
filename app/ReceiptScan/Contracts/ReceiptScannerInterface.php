<?php

namespace App\ReceiptScan\Contracts;

interface ReceiptScannerInterface
{
    /**
     * Scan a receipt image.
     *
     * @param string $image base64 encoded image data
     * @return ResponseInterface|null
     */
    public function scan($image);
}
