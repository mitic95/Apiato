<?php

namespace App\Containers\Vacation\Models;

use App\Containers\Authorization\Traits\AuthorizationTrait;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class UserVacationBalance extends Model
{

    use AuthorizationTrait;

    const REMAINING_DAYS = 20;

    protected $fillable = [
        'remaining_days'
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
    protected $resourceKey = 'user_vacation_balances';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
