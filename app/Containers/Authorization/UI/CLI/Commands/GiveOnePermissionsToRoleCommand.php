<?php

namespace App\Containers\Authorization\UI\CLI\Commands;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Authorization\Exceptions\PermissionNotFoundException;
use App\Containers\Authorization\Exceptions\RoleNotFoundException;
use App\Containers\Authorization\Models\Permission;
use App\Containers\Authorization\Models\Role;
use App\Containers\Authorization\Tasks\FindPermissionTask;
use App\Containers\Authorization\Tasks\FindRoleTask;
use App\Ship\Parents\Commands\ConsoleCommand;

/**
 * Class GiveOnePermissionsToRoleCommand
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class GiveOnePermissionsToRoleCommand extends ConsoleCommand
{

    protected $signature = 'apiato:permissions:Role {role} {permission}';

    protected $description = 'Give one system Permissions to a specific Role.';

    /**
     * @void
     */
    public function handle()
    {
        $roleName = $this->argument('role');

        $permName = $this->argument('permission');

        /** @var Permission $permission */
        $permission = Apiato::call(FindPermissionTask::class, [$permName]);

        /** @var Role $role */
        $role = Apiato::call(FindRoleTask::class, [$roleName]);

        if (!$role) {
            throw new RoleNotFoundException("Role $roleName is not found!");
        }

        if (!$permission) {
            throw new PermissionNotFoundException("Permission $permName is not found!");
        }

        $role->givePermissionTo($permission->name);

        // pluck('name')

        $this->info('Gave the Role (' . $roleName . ') the following Permissions: ' . $permission->name);
    }
}
