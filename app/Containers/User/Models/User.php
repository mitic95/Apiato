<?php

namespace App\Containers\User\Models;

use App\Containers\Authorization\Traits\AuthorizationTrait;
use App\Containers\Vacation\Models\UserVacationBalance;
use App\Containers\Vacation\Models\Vacation;
use App\Ship\Parents\Models\UserModel;

/**
 * Class User.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class User extends UserModel
{

    use AuthorizationTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'device',
        'platform',
        'gender',
        'birth',
        'social_provider',
        'social_token',
        'social_refresh_token',
        'social_expires_in',
        'social_token_secret',
        'social_id',
        'social_avatar',
        'social_avatar_original',
        'social_nickname',
        'confirmed',
        'is_client',
    ];

    protected $casts = [
        'is_client' => 'boolean',
        'confirmed' => 'boolean',
    ];

    /**
     * The dates attributes.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function vacation()
    {
        return $this->hasMany(Vacation::class);
    }

    public function vacationBalance()
    {
        return $this->hasOne(UserVacationBalance::class, 'user_id', 'id');
    }

    /**
     * @param int $vacationDays
     * @return bool
     */
    public function canTakeVacationBasedOnRequestedDays(int $vacationDays): bool
    {
        return $this->vacationBalance->remaining_days - $vacationDays < 0;
    }
}
