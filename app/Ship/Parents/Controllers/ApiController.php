<?php

namespace App\Ship\Parents\Controllers;

use Apiato\Core\Abstracts\Controllers\ApiController as AbstractApiController;
use App\Containers\User\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class ApiController.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
abstract class ApiController extends AbstractApiController
{
    /**
     * @return User
     */
    public function getAuthUser(): User
    {
        return Auth::user();
    }
}
