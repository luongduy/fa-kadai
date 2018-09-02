<?php

namespace App\ReceiptScan\FastAccounting;

use App\ReceiptScan\Contracts\ReceiptInterface;

class Receipt implements ReceiptInterface
{
    /**
     * @var string Raw data
     */
    private $rawData;

    /**
     * @var array Raw data
     */
    private $data;

    public function __construct($rawData)
    {
        $this->rawData = $rawData;
        $this->data =  json_decode($rawData, true);
    }

    /**
     * {@inheritdoc}
     */
    public function getRawData()
    {
        return $this->rawData;
    }

    /**
     * {@inheritdoc}
     */
    public function getAmount()
    {
        return $this->data['amount'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getDate()
    {
        return $this->data['date'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTel()
    {
        return $this->data['tel'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getNote()
    {
        return $this->data['note'] ?? null;
    }

    // ***************************************************************

    /**
     * {@inheritdoc}
     */
    public function getAmountConfidence()
    {
        return $this->data['options']['confidences']['amount'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getDateConfidence()
    {
        return $this->data['options']['confidences']['date'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTelConfidence()
    {
        return $this->data['options']['confidences']['tel'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getNoteConfidence()
    {
        return $this->data['options']['confidences']['note'] ?? null;
    }

    // ***************************************************************

    /**
     * {@inheritdoc}
     */
    public function getAmountPosition()
    {
        return $this->data['options']['positions']['amount'] ?? [];
    }

    /**
     * {@inheritdoc}
     */
    public function getDatePosition()
    {
        return $this->data['options']['positions']['date'] ?? [];
    }

    /**
     * {@inheritdoc}
     */
    public function getTelPosition()
    {
        return $this->data['options']['positions']['tel'] ?? [];
    }

    /**
     * {@inheritdoc}
     */
    public function getNotePosition()
    {
        return $this->data['options']['positions']['note'] ?? [];
    }
}
