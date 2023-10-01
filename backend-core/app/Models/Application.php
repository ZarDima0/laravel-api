<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Application
 *
 * @property int $id
 * @property int $bank_id
 * @property string $dealer
 * @property string $contact
 * @property int $credit_amount
 * @property int $credit_term
 * @property int $interest_rate
 * @property string $credit_reason
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Bank $bank
 *
 * @method static Builder|Application newModelQuery()
 * @method static Builder|Application newQuery()
 * @method static Builder|Application query()
 * @method static Builder|Application whereBankId($value)
 * @method static Builder|Application whereContact($value)
 * @method static Builder|Application whereCreatedAt($value)
 * @method static Builder|Application whereCreditAmount($value)
 * @method static Builder|Application whereCreditReason($value)
 * @method static Builder|Application whereCreditTerm($value)
 * @method static Builder|Application whereDealer($value)
 * @method static Builder|Application whereId($value)
 * @method static Builder|Application whereInterestRate($value)
 * @method static Builder|Application whereStatus($value)
 * @method static Builder|Application whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class Application extends Model
{
    use HasFactory;

    const STATUS_NEW_NAME = 'новая';
    const STATUS_IN_PROCESS_NAME = 'в процессе';
    const STATUS_APPROVED_NAME = 'одобрена';
    const STATUS_REJECTED_NAME = 'отклонена';

    const STATUS_NEW = 'new';
    const STATUS_IN_PROCESS = 'processed';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Application
    {
        $this->id = $id;

        return $this;
    }

    public function getBankId(): int
    {
        return $this->bank_id;
    }

    public function setBankId(int $bank_id): Application
    {
        $this->bank_id = $bank_id;

        return $this;
    }

    public function getDealer(): string
    {
        return $this->dealer;
    }

    public function setDealer(string $dealer): Application
    {
        $this->dealer = $dealer;

        return $this;
    }

    public function getContact(): string
    {
        return $this->contact;
    }

    public function setContact(string $contact): Application
    {
        $this->contact = $contact;

        return $this;
    }

    public function getCreditAmount(): int
    {
        return $this->credit_amount;
    }

    public function setCreditAmount(int $credit_amount): Application
    {
        $this->credit_amount = $credit_amount;

        return $this;
    }

    public function getCreditTerm(): int
    {
        return $this->credit_term;
    }

    public function setCreditTerm(int $credit_term): Application
    {
        $this->credit_term = $credit_term;

        return $this;
    }

    public function getInterestRate(): int
    {
        return $this->interest_rate;
    }

    public function setInterestRate(int $interest_rate): Application
    {
        $this->interest_rate = $interest_rate;

        return $this;
    }

    public function getCreditReason(): string
    {
        return $this->credit_reason;
    }

    public function setCreditReason(string $credit_reason): Application
    {
        $this->credit_reason = $credit_reason;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): Application
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param string $status
     * @return string
     */
    public static function getStatusName(string $status): string
    {
        return match ($status) {
            self::STATUS_APPROVED => self::STATUS_APPROVED_NAME,
            self::STATUS_NEW => self::STATUS_NEW_NAME,
            self::STATUS_IN_PROCESS => self::STATUS_IN_PROCESS_NAME,
            self::STATUS_REJECTED => self::STATUS_REJECTED_NAME,
            default => 'error'
        };
    }
}
