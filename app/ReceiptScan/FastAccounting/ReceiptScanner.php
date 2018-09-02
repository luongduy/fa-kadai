<?php

namespace App\ReceiptScan\FastAccounting;

use App\ReceiptScan\Contracts\ReceiptScannerInterface;

class ReceiptScanner extends BaseAPIClient implements ReceiptScannerInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function scan($image)
    {
        try {
            $httpReponse = $this->httpClient->request('POST', 'receipt', [
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => fopen($image, 'r')
                    ],
                    [
                        'name'     => 'options',
                        'contents' => 'positions,confidences'
                    ]
                ]
            ]);
        } catch (Exception $e) {
            return null;
        }

        $statusCode = $httpReponse->getStatusCode();
        $responseBody = $httpReponse->getBody();

        if ($statusCode == 200) {
            return new Receipt($responseBody);
        }

        return null;
    }
}
