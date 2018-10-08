<?php

namespace App\Containers\Authorization\Data\Seeders;

use Apiato\Core\Traits\CallableTrait;
use App\Containers\Authorization\Tasks\CreateRoleTask;
use App\Ship\Parents\Seeders\Seeder;

/**
 * Class AuthorizationManagerRolesSeeder_4
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class AuthorizationManagerRolesSeeder_4 extends Seeder
{
    use CallableTrait;

    /**
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run()
    {
        $this->call(CreateRoleTask::class, ['manager', 'Manager', 'Manager Role', 1]);
    }
}