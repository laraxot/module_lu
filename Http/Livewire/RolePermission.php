<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire;

use Livewire\Component;
use Modules\LU\Models\Role;
// use Illuminate\Support\Carbon;
use Modules\LU\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Modules\Xot\Contracts\PanelContract;
use Illuminate\Contracts\Support\Renderable;
use Modules\LU\Models\Permission;

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

    public function render():Renderable {
        $view='lu::livewire.role-permission';
        $view_params=[
            'view'=>$view,
            'roles'=>Role::get(),
            'permissions'=>Permission::get(),
        ];
        return view()->make($view,$view_params);
    }

    public function addRole():void{
        $data=[];
        $this->emit('showModal','addRole',$data);
    }

    public function deleteRole(int $role_id):void {
        $role=Role::find($role_id);
        if($role!=null){
            $role->delete();
        }
        session()->flash('message', 'delete role ['.$role_id.']');

    }

    public function addPermission():void{
        $data=[];
        $this->emit('showModal','addPermission',$data);
    }

    public function deletePermission(int $permission_id):void {
        $perm=Permission::find($permission_id);
        if($perm!=null){
            $perm->delete();
        }
        session()->flash('message', 'delete permission ['.$permission_id.']');
    }

    public function updateDataFromModal(string $modal_id,array $data):void{
        

        if($modal_id=='addRole'){
            $role = Role::create([
                'name' => $data['role_name'],
            ]);
            session()->flash('message', 'ok');
        }
<<<<<<< HEAD
        if($modal_id=='addPermission'){
            //dddx([$modal_id, $data]);
=======
        if($modal_id='addPermission'){
            dddx([$modal_id,$data]);
>>>>>>> 0f6eb77 (up)
            $permission =  Permission::create([
                'name' => $data['permission_name'],
            ]);
            session()->flash('message', 'ok');
        }

        //$this->emit('closeModal','addRole');
    }

    public function togglePerm(int $role_id,int $permission_id){
        $role=Role::find($role_id);
        $permission=Permission::find($permission_id);
        if($role->hasPermissionTo($permission->name)){
            $role->revokePermissionTo($permission);
        }else{
            $role->givePermissionTo($permission);
        }
        session()->flash('message', 'ok');

    }
}