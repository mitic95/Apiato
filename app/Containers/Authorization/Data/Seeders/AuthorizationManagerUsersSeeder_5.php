<?php

namespace App\Containers\Authorization\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use Apiato\Core\Traits\CallableTrait;
use App\Containers\Authorization\Tasks\FindRoleTask;
use App\Containers\User\Models\User;
use App\Containers\User\Tasks\CreateUserByCredentialsTask;
use App\Containers\Vacation\Tasks\CreateVacationByCredentialsTask;
use App\Ship\Parents\Seeders\Seeder;

class AuthorizationManagerUsersSeeder_5 extends Seeder
{
    use CallableTrait;

    /**
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run()
    {
        /** @var User $user */
        $user = $this->call(CreateUserByCredentialsTask::class, [
            $isClient = true,
            'final@test.com',
            'final',
            'Final',
        ])->assignRole(Apiato::call(FindRoleTask::class, ['manager']));

        $this->call(CreateVacationByCredentialsTask::class, [
            $user->id,
        ]);
    }
}