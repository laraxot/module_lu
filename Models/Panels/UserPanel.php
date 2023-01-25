<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

use Exception;
// --- Services --
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\LU\Models\Area;
use Modules\LU\Models\Group;
use Modules\LU\Models\PermUser;
use Modules\LU\Models\Right;
use Modules\LU\Models\User;
use Nwidart\Modules\Facades\Module;

/**
 * Class UserPanel.
 */
class UserPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = User::class;
    public User $row;

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    protected static string $title = 'title';

    /**
     * The columns that should be searched.
     */
    protected static array $search = [];

    /**
     * Get the fields displayed by the resource.
     */
    public function fullnameFields(): array
    {
        return [
            (object) [
                'type' => 'String',
                'name' => 'last_name',
                'col_size' => 6,
            ],
            (object) [
                'type' => 'String',
                'name' => 'first_name',
                'col_size' => 6,
            ],
            (object) [
                'type' => 'String',
                'name' => 'email',
                'col_size' => 12,
            ],
        ];
    }

    /**
     * @return object[]
     */
    public function lastLoginFields(): array
    {
        return [
            (object) [
                'type' => 'DateDateTime',
                'name' => 'last_login_at',
                'col_size' => 6,
                'except' => ['edit', 'create'],
            ],
            (object) [
                'type' => 'String',
                'name' => 'last_login_ip',
                'col_size' => 6,
                'except' => ['edit', 'create'],
            ],
        ];
    }

    /**
     * @return object[]
     */
    public function fields(): array
    {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
                'col_size' => 2,
            ],
            (object) [
                'type' => 'String',
                'name' => 'handle',
                'col_size' => 5,
            ],
            /*--- dentro fullnameFields
            (object) [
                'type' => 'String',
                'name' => 'email',
                'col_size' => 5,
            ],
            */
            // *
            (object) [
                'type' => 'Password',
                'name' => 'passwd',
                'col_size' => 5,
                'except' => ['index'],
            ],
            (object) [
                'type' => 'Cell',
                'name' => 'full_name',
                'fields' => $this->fullnameFields(),
            ],
            /*
            (object) [
                'type' => 'String',
                'name' => 'last_name',
                'col_size' => 6,
            ],
            (object) [
                'type' => 'String',
                'name' => 'first_name',
                'col_size' => 6,
            ],
            (object) [
                'type' => 'String',
                'name' => 'email',
                'col_size' => 12,
            ],
            */
            (object) [
                'type' => 'Cell',
                'name' => 'last_login',
                'fields' => $this->lastLoginFields(),
            ],
            /*
            (object) [
                'type' => 'DateDateTime',
                'name' => 'last_login_at',
                'col_size' => 6,
                'except' => ['edit', 'create'],
            ],
            (object) [
                'type' => 'String',
                'name' => 'last_login_ip',
                'col_size' => 6,
                'except' => ['edit', 'create'],
            ],
            */
            (object) [
                'type' => 'Select2Sides',
                'name' => 'areas',
                'col_size' => 6,
                'options' => $this->optionsModelClass(Area::class),
            ],
            /*(object) [
                'type' => 'MultiCheckbox',
                'name' => 'groups',
                'col_size' => 6,
            ],*/
            /*(object) [
                'type' => 'MultiCheckbox',
                'name' => 'rights',
                'col_size' => 6,
            ],*/
            (object) [
                'type' => 'Select2Sides',
                'name' => 'groups',
                'col_size' => 6,
                'options' => $this->optionsModelClass(Group::class),
            ],
            (object) [
                'type' => 'Select2Sides',
                'name' => 'rights',
                'col_size' => 6,
                'options' => $this->optionsModelClass(Right::class),
            ],

            // */
        ];
    }

    public function with(): array
    {
        return [];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array
    {
        /* aggiunto profile come tab in edit. penso possa servire sempre a tutti
        a prescindere dal modulo in cui può essere profile */
        $tabs_name = ['areas', 'groups', 'perms', 'rights', 'profile'];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(Request $request = null): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array
    {
        return [
            // new Actions\TestUsersWithLivewireAction(),
            new Actions\TestAction(),
        ];
    }

    public function areas(): Collection
    {
        $row = $this->row;
        /**
         * @var Collection<Area>
         */
        $areas = $row->getRelationValue('areas');
        // dddx($areas);

        $modules = Module::getByStatus(1);
        // dddx(['areas' => $areas, 'modules' => $modules]);
        $areas = $areas->filter(
            function ($item) use ($modules) {
                // Cannot access property $area_define_name on mixed
                if (! $item instanceof Area) {
                    throw new Exception('['.__LINE__.']['.__FILE__.']');
                }

                return in_array($item->area_define_name, array_keys($modules), true);
            }
        );

        return $areas;
    }

    public function isSuperAdmin(): bool
    {
        $user = $this->row;

        if (! method_exists($user, 'perm')) {
            throw new \Exception('in ['.\get_class($user).'] method [perm] not exists');
        }

        // $perm = $user->perm;
        $perm = PermUser::where('user_id', $user->getKey())->first();

        // 260    Access to an undefined property object::$perm_type

        if (\is_object($perm) && $perm->perm_type >= 4) {  // superadmin
            return true;
        }

        return false;
    }

    public function name(): string
    {
        $attr = $this->row->getAttributes();

        if (! \in_array('handle', array_keys($attr), true)) {
            throw new \Exception('property handle not exists');
        }

        return $attr['handle'];
    }

    public function avatar(int $size = 100): ?string
    {
        if (! isset($this->row->email)) {
            return '';
        }
        $email = md5(mb_strtolower(trim($this->row->email)));
        $default = urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }
}
