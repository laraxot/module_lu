<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire;

use Illuminate\Session\SessionManager;
//use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\LU\Models\User;
use Modules\Xot\Contracts\PanelContract;

/**
 * Class Users.
 */
class Users extends Component {
    use WithPagination;

    public $users;

    public $handle;

    public $first_name;

    public $last_name;

    public $email;

    public ?int $auth_user_id;

    public $user_id;

    public bool $updateMode = false;

    //public $panel;
    //private $panel;

    public $fields;

    /**
     * @param PanelContract|null $_panel
     */
    public function mount(SessionManager $session, $_panel = null) {
        //$this->panel = $panel;
        $this->fields = $_panel->indexFields();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render() {
        $rows = User::query()->paginate(10);

        //$fields = $this->panel->indexFields();
        $view_params = [
            //'panel' => $this->panel,
            'rows' => $rows,
            //'fields' => $this->fields,
        ];

        return view('lu::livewire.datagrid', $view_params);
    }

    private function resetInputFields() {
        $this->handle = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->auth_user_id = null;
    }

    public function store() {
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        User::query()->create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery
    }

    public function edit(int $id) {
        $this->updateMode = true;
        //$user = User::where('auth_user_id', $id)->first();
        $user = User::query()->find($id);
        $this->auth_user_id = $id;
        $this->first_name = $user->first_name;
        $this->email = $user->email;
    }

    public function cancel() {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update() {
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = User::query()->find($this->user_id);
            $user->update([
                'first_name' => $this->first_name,
                'email' => $this->email,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();
        }
    }

    /**
     * @throws \Exception
     */
    public function delete(int $id) {
        if ($id) {
            User::query()->where('auth_user_id', $id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}