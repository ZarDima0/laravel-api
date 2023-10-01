<?php
namespace App\Services\Application;

use App\Entities\DTO\Application\ApplicationDTO;
use App\Models\Application;
use Exception;

class UpdateApplicationService
{
    /**
     * @param ApplicationDTO $applicationDTO
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function update(ApplicationDTO $applicationDTO, int $id): bool
    {
        $application = Application::query()->whereId($id)->first();
        if (is_null($application)) {
            throw new Exception('Application null');
        }
        return $application
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
