<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ReceiptScan\Contracts\ImageConverterInterface;
use App\ReceiptScan\Contracts\ReceiptScannerInterface;
use App\ReceiptScan\FastAccounting\ImageConverter;
use App\ReceiptScan\FastAccounting\ReceiptScanner;

class ReceiptScanServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageConverterInterface::class, ImageConverter::class);
        $this->app->bind(ReceiptScannerInterface::class, ReceiptScanner::class);
    }
}
