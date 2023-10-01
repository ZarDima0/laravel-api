<?php

namespace App\Http\Requests\Application;

use App\Entities\DTO\Application\ApplicationDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class UpdateApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bankId' => 'required|integer|exists:banks,id',
            'dealer' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'creditAmount' => 'required|integer',
            'creditTerm' => 'required|integer',
            'interestRate' => 'required|integer',
            'creditReason' => 'required|string',
            'status' => 'required|string|max:255',
        ];
    }

    public function getBankId(): int
    {
        return $this->input('bankId');
    }

    public function getDealer(): string
    {
        return $this->input('dealer');
    }

    public function getContact(): string
    {
        return $this->input('contact');
    }

    public function getCreditAmount(): int
    {
        return $this->input('creditAmount');
    }

    public function getCreditTerm(): int
    {
        return $this->input('creditTerm');
    }

    public function getInterestRate(): int
    {
        return $this->input('interestRate');
    }

    public function getCreditReason(): string
    {
        return $this->input('creditReason');
    }

    public function getStatus(): string
    {
        return $this->input('status');
    }

    public function getApplicationId()
    {
        return $this->route('id');
    }
    public function getApplication(): ApplicationDTO
    {
        return (new ApplicationDTO())
            ->setBankId($this->getBankId())
            ->setStatus($this->getStatus())
            ->setContact($this->getContact())
            ->setCreditAmount($this->getCreditAmount())
            ->setCreditTerm($this->getCreditTerm())
            ->setCreditReason($this->getCreditReason())
            ->setDealer($this->getDealer())
            ->setInterestRate($this->getInterestRate());
    }
}
