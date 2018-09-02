<?php

namespace App\ReceiptScan\FastAccounting;

use App\ReceiptScan\Contracts\ImageConverterInterface;

class ImageConverter extends BaseAPIClient implements ImageConverterInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public function pdfToJpeg($fileName)
    {
        $httpReponse = $this->httpClient->request('POST', 'convert_to_jpg', [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($fileName, 'r')
                ]
            ]
        ]);

        $response = json_decode($httpReponse->getBody(), true);

        if (!isset($response['result']) or $response['result'] != 'SUCCESS') {
            return null;
        }

        if (!isset($response['data']['image']) or !is_array($response['data']['image'])) {
            return null;
        }

        return $response['data']['image'];
    }
}
