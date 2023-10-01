<?php

namespace App\Entities\DTO\Application;

class ApplicationDTO
{
    public int $bankId;

    public string $dealer;

    public string $contact;

    public int $creditAmount;

    public int $creditTerm;

    public int $interestRate;

    public string $creditReason;

    public string $status;

    public function getBankId(): int
    {
        return $this->bankId;
    }

    public function setBankId(int $bankId): ApplicationDTO
    {
        $this->bankId = $bankId;

        return $this;
    }

    public function getDealer(): string
    {
        return $this->dealer;
    }

    public function setDealer(string $dealer): ApplicationDTO
    {
        $this->dealer = $dealer;

        return $this;
    }

    public function getContact(): string
    {
        return $this->contact;
    }

    public function setContact(string $contact): ApplicationDTO
    {
        $this->contact = $contact;

        return $this;
    }

    public function getCreditAmount(): int
    {
        return $this->creditAmount;
    }

    public function setCreditAmount(int $creditAmount): ApplicationDTO
    {
        $this->creditAmount = $creditAmount;

        return $this;
    }

    public function getCreditTerm(): int
    {
        return $this->creditTerm;
    }

    public function setCreditTerm(int $creditTerm): ApplicationDTO
    {
        $this->creditTerm = $creditTerm;

        return $this;
    }

    public function getInterestRate(): int
    {
        return $this->interestRate;
    }

    public function setInterestRate(int $interestRate): ApplicationDTO
    {
        $this->interestRate = $interestRate;

        return $this;
    }

    public function getCreditReason(): string
    {
        return $this->creditReason;
    }

    public function setCreditReason(string $creditReason): ApplicationDTO
    {
        $this->creditReason = $creditReason;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): ApplicationDTO
    {
        $this->status = $status;

        return $this;
    }
}
