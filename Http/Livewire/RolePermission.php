<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;
// use Illuminate\Support\Carbon;
use Modules\LU\Models\Permission;
use Modules\LU\Models\Role;

/**
 * Class RolePermission.
 */
class RolePermission extends Component {
    /**
     * Listener di eventi di Livewire.
     *
     * @var array
     */
    protected $listeners = [
        'updateDataFromModal' => 'updateDataFromModal',
    ];

    public function render(): Renderable {
        $view = 'lu::livewire.role-permission';
        $view_params = [
            'view' => $view,
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ];

        return view()->make($view, $view_params);
    }

    public function addRole(): void {
        $data = [];
        $this->emit('showModal', 'addRole', $data);
    }

    public function deleteRole(int $role_id): void {
        $role = Role::find($role_id);
        if (null !== $role) {
            $role->delete();
        }
        session()->flash('message', 'delete role ['.$role_id.']');
    }

    public function addPermission(): void {
        $data = [];
        $this->emit('showModal', 'addPermission', $data);
    }

    public function deletePermission(int $permission_id): void {
        $perm = Permission::find($permission_id);
        if (null !== $perm) {
            $perm->delete();
        }
        session()->flash('message', 'delete permission ['.$permission_id.']');
    }

    public function updateDataFromModal(string $modal_id, array $data): void {
        if ('addRole' === $modal_id) {
            $role = Role::create([
                'name' => $data['role_name'],
            ]);
            session()->flash('message', 'ok');
        }
        if ('addPermission' === $modal_id) {
            $permission = Permission::create([
                'name' => $data['permission_name'],
            ]);
            session()->flash('message', 'ok');
        }

        // $this->emit('closeModal','addRole');
    }

    public function togglePerm(int $role_id, int $permission_id): void {
        $role = Role::find($role_id);
        if (null == $role) {
            return;
        }
        $permission = Permission::find($permission_id);
        if (null == $permission) {
            return;
        }
        if ($role->hasPermissionTo($permission->name)) {
            $role->revokePermissionTo($permission);
        } else {
            $role->givePermissionTo($permission);
        }
        session()->flash('message', 'ok');
    }
}
