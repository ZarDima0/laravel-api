<?php

namespace App\Http\Resources\Application;

use App\Models\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            "id" => $this->resource->getId(),
            "bank" => $this->resource->bank->getName(),
            "dealer" => $this->resource->getDealer(),
            "contact" => $this->resource->getContact(),
            "credit_amount" => $this->resource->getCreditAmount(),
            "credit_term" => $this->resource->getCreditTerm(),
            "interest_rate" => $this->resource->getInterestRate(),
            "credit_reason" => $this->resource->getCreditReason(),
            "status" => Application::getStatusName($this->resource->getStatus()),
            "created_at" => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
