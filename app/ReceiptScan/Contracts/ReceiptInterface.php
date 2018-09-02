<?php
namespace App\ReceiptScan\Contracts;

interface ReceiptInterface
{
    /**
     * Get raw data of the receipt.
     *
     * @return string
     */
    public function getRawData();

    /**
     * Get amount info of the receipt.
     *
     * @return string|null
     */
    public function getAmount();

    /**
     * Get date info of the receipt.
     *
     * @return string|null
     */
    public function getDate();

    /**
     * Get tel info of the receipt.
     *
     * @return string|null
     */
    public function getTel();

    /**
     * Get note info of the receipt (company name).
     *
     * @return string|null
     */
    public function getNote();

    // ***************************************************************

    /**
     * Get confidence level of amount info.
     *
     * @return float|null
     */
    public function getAmountConfidence();

    /**
     * Get confidence level of date info.
     *
     * @return float|null
     */
    public function getDateConfidence();

    /**
     * Get confidence level of tel info.
     *
     * @return float|null
     */
    public function getTelConfidence();

    /**
     * Get confidence level of note info.
     *
     * @return float|null
     */
    public function getNoteConfidence();

    // ***************************************************************

    /**
     * Get Position of amount info on the image.
     *
     * @return array
     */
    public function getAmountPosition();

    /**
     * Get Position of date info on the image.
     *
     * @return array
     */
    public function getDatePosition();

    /**
     * Get Position of tel info on the image.
     *
     * @return array
     */
    public function getTelPosition();

    /**
     * Get Position of note info on the image.
     *
     * @return array
     */
    public function getNotePosition();
}
