<?php

namespace App\Containers\Vacation\Models;

use App\Containers\Authorization\Traits\AuthorizationTrait;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Vacation extends Model
{
    use AuthorizationTrait;

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    const ALL_STATUSES = [
        self::STATUS_PENDING,
        self::STATUS_APPROVED,
        self::STATUS_REJECTED,
    ];


    protected $fillable = [
        'id',
        'user_id',
        'vacation_days',
        'status'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'vacations';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param string $status
     * @return bool
     */
    public static function isStatusValid(string $status): bool
    {
        $isValid = false;

        if (in_array($status, self::ALL_STATUSES)) {
            $isValid = true;
        }

        return $isValid;
    }

    public function isApproved(): bool
    {
        return $this->status === self::STATUS_APPROVED;
    }
}
