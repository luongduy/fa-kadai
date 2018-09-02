<?php

namespace App\ReceiptScan\Contracts;

interface ImageConverterInterface
{
    /**
     * Convert from pdf to jpeg images
     *
     * @return array|null Array of images or null if failed
     */
    public function pdfToJpeg($fileContent);
}
