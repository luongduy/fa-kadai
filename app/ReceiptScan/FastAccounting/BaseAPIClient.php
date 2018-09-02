<?php

namespace App\ReceiptScan\FastAccounting;

use GuzzleHttp\Client;

class BaseAPIClient
{
    const BASE_URI = 'https://api-sandbox.fastaccounting.jp/v1.3/';

    /**
     * @var GuzzleHttp\Client;
     */
    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => self::BASE_URI
        ]);
    }
}
