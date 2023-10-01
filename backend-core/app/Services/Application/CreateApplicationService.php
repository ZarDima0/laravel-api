<?php

namespace App\Services\Application;

use App\Entities\DTO\Application\ApplicationDTO;
use App\Models\Application;

class CreateApplicationService
{
    public function create(ApplicationDTO $applicationDTO): bool
    {
        return (new Application)
            ->setBankId($applicationDTO->getBankId())
            ->setDealer($applicationDTO->getDealer())
            ->setStatus($applicationDTO->getStatus())
            ->setInterestRate($applicationDTO->getInterestRate())
            ->setCreditTerm($applicationDTO->getCreditTerm())
            ->setCreditAmount($applicationDTO->getCreditAmount())
            ->setContact($applicationDTO->getContact())
            ->setCreditReason($applicationDTO->getCreditReason())
            ->save();
    }
}
