<?php
namespace Snijder\Bunq\Model;

class Request
{
    /**
     * @var string
     */
    private $amount;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var CounterPart
     */
    private $counterPart;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $attachmentId;

    /**
     * @var string
     */
    private $merchantReference;

    /**
     * @var boolean
     */
    private $allowBunqme;

    /**
     * @var string
     */
    private $redirectUrl;

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = Currency::get($currency);
    }

    /**
     * @return CounterPart
     */
    public function getCounterPart(): CounterPart
    {
        return $this->counterPart;
    }

    /**
     * @param CounterPart $counterPart
     */
    public function setCounterPart(CounterPart $counterPart)
    {
        $this->counterPart = $counterPart;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getAttachmentId(): int
    {
        return $this->attachmentId;
    }

    /**
     * @param int $attachmentId
     */
    public function setAttachmentId(int $attachmentId)
    {
        $this->attachmentId = $attachmentId;
    }

    /**
     * @return string
     */
    public function getMerchantReference(): string
    {
        return $this->merchantReference;
    }

    /**
     * @param string $merchantReference
     */
    public function setMerchantReference(string $merchantReference)
    {
        $this->merchantReference = $merchantReference;
    }

    /**
     * @return bool
     */
    public function isAllowBunqme(): bool
    {
        return $this->allowBunqme;
    }

    /**
     * @param bool $allowBunqme
     */
    public function setAllowBunqme(bool $allowBunqme)
    {
        $this->allowBunqme = $allowBunqme;
    }

    /**
     * @return string
     */
    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    /**
     * @param string $redirectUrl
     */
    public function setRedirectUrl(string $redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
    }
}