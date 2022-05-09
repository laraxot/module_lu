<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire;

use Illuminate\Session\SessionManager;
//use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\LU\Models\User;
use Modules\Xot\Contracts\PanelContract;

/**
 * Class Users.
 */
class Users extends Component
{
    use WithPagination;

    public array $users;

    public string $handle;

    public ?string $first_name;

    public ?string $last_name;

    public ?string $email;

    public ?int $user_id;

    public bool $updateMode = false;

    //public $panel;
    //private $panel;

    public Collection $fields;

    /**
     * @param PanelContract|null $_panel
     */
    public function mount(SessionManager $session, $_panel = null): void
    {
        //$this->panel = $panel;
        if (null == $_panel) {
            throw new \Exception('in $_panel is null');
        }
        if (! method_exists($_panel, 'indexFields')) {
            throw new \Exception('in ['.get_class($_panel).'] method [indexFields] is missing');
        }
        $this->fields = $_panel->getFields(['act' => 'index']);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
        $rows = User::query()->paginate(10);

        //$fields = $this->panel->getFields(['act'=>'index']);
        $view_params = [
            //'panel' => $this->panel,
            'rows' => $rows,
            //'fields' => $this->fields,
        ];

        return view()->make('lu::livewire.datagrid', $view_params);
    }

    private function resetInputFields(): void
    {
        $this->handle = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->user_id = null;
    }

    public function store(): void
    {
        $validatedDate = $this->validate(
            [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            ]
        );

        User::query()->create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery
    }

    public function edit(int $id): void
    {
        $this->updateMode = true;
        //$user = User::where('user_id', $id)->first();
        $user = User::query()->find($id);
        if (null == $user) {
            throw new \Exception('user is null');
        }
        $this->user_id = $id;
        $this->first_name = $user->first_name;
        $this->email = $user->email;
    }

    public function cancel(): void
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update(): void
    {
        $validatedDate = $this->validate(
            [
            'first_name' => 'required',
            'email' => 'required|email',
            ]
        );

        //User::query()->update($validatedDate);

        if ($this->user_id) {
            $user = User::query()->find($this->user_id);
            if (null == $user) {
                throw new \Exception('user is null');
            }
            $user->update(
                [
                'first_name' => $this->first_name,
                'email' => $this->email,
                ]
            );
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();
        }
    }

    /**
     * @throws \Exception
     */
    public function delete(int $id): void
    {
        if ($id) {
            User::query()->where('user_id', $id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}
