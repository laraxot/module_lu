<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

use Illuminate\Database\Eloquent\Model;
// --- Services --
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Modules\Blog\Events\StoreProfileEvent;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\LU\Models\Profile;
use Modules\LU\Models\User;

/**
 * Class ProfilePanel.
 */
class ProfilePanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\Profile';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    protected static string $title = 'title';

    /**
     * The columns that should be searched.
     */
    protected static array $search = [];

    /**
     * The relationships that should be eager loaded on index queries.
     */
    public function with(): array
    {
        return [];
    }

    public function search(): array
    {
        return [];
    }

    /**
     * Undocumented function.
     *
     * @param Profile $row
     */
    public function optionLabel($row): string
    {
        // [2022-08-17 13:06:20] local.ERROR: [162][Profile]
        // Access to an undefined property Illuminate\Database\Eloquent\Model::$user
        // if (null === $this->row->user) {
        //    return '';
        // }
        // return $row->area_define_name;
        return $row->handle();
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
                // 'rules' => 'required',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'user.first_name',
                // 'rules' => 'required',
                'comment' => null,
                'col_size' => 6,
            ],
            (object) [
                'type' => 'String',
                'name' => 'user.last_name',
                // 'rules' => 'required',
                'comment' => null,
                'col_size' => 6,
            ],
            (object) [
                'type' => 'String',
                'name' => 'user.handle',
                // 'rules' => 'required',
                'comment' => null,
                'col_size' => 6,
            ],
            (object) [
                'type' => 'PasswordWithConfirm',
                'name' => 'user.passwd',
                'rules' => 'required|confirmed',
                'comment' => null,
                'col_size' => 12,
            ],
            (object) [
                'type' => 'AddressGoogle',
                'name' => 'indirizzo',
                // 'rules' => 'required',
                'comment' => null,
                'col_size' => 12,
            ],

            (object) [
                'type' => 'PivotFields', // -- da aggiornare
                'name' => 'privacies',
                'col_size' => 12,
                'rules' => 'pivot_rules',
                'except' => ['index'],
            ],
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array
    {
        $tabs_name = [];

        return [];
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
    public function actions(Request $request = null): array
    {
        return [
            // new \Modules\Blog\Models\Panels\Actions\PersonalInfoAction(),
            // new \Modules\Blog\Models\Panels\Actions\UserSecurityAction(),
        ];
    }

    // avatar esiste solo in profile, non esiste l'avatar di un articolo

    /**
     * @param int $size
     */
    public function avatar($size = 100): ?string
    {
        if (null === $this->row) {
            throw new \Exception('row is null');
        }
        if (! property_exists($this->row, 'user')) {
            throw new \Exception('in ['.\get_class($this->row).'] property [user] not exists');
        }
        /** @var \Modules\LU\Models\User */
        $user = $this->row->user;

        if (! \is_object($user)) {
            if (isset($this->row->user_id) && method_exists($this->row, 'user')) {
                $this->row->user()->create();
            }
            // dddx($this->row);
            return null;
        }

        // Access to an undefined property object::$email.
        $email = md5(mb_strtolower(trim((string) $user->email)));
        $default = urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }

    public function storeCallback(array $params): object
    {
        extract($params);
        /*
        * metto apposto il titolo della pagina del profilo
        *
        **/
        if (! isset($row)) {
            dddx(['err' => 'row not defined']);

            return (object) [];
        }
        $user = $row->user;

        $post_data = [
            'title' => $row->user->handle,
            'guid' => Str::slug($row->user->handle),
            'user_id' => $user->user_id,
            'lang' => app()->getLocale(),
        ];

        if (\is_object($row->post) && method_exists($row->post, 'update')) {
            $row->post->update($post_data);
        } else {
            $row->post()->create($post_data);
        }

        // $res = event(new StoreProfileEvent($user));
        // $this->generateUUIDVerificationToken($user);
        Auth::guard()->login($user, true);
        // $this->guard()->login($user); ???
        Session::flash(
            'swal',
            [
                'type' => 'success',
                'title' => trans('food::profile.store_success.title'),
                'text' => trans('food::profile.store_success.text'),
                'footer' => trans('food::profile.store_success.footer'),
            ]
        );
        // dddx($user);dddx($row);
        return $row;
    }

    /*
    public function destroyCallback(){
        $this->row->
    }
    */

    /*
    public function isSuperAdmin(): bool {
        //232 Access to an undefined property Illuminate\Database\Eloquent\Model::$user.
        //$user = $this->row->user;
        $user = $this->row->getRelationValue('user');

        if (is_object($user->perm) && $user->perm->perm_type >= 4) {  //superadmin
            return true;
        }

        return false;
    }
    */

    public function isSuperAdmin(): bool
    {
        // 232 Access to an undefined property Illuminate\Database\Eloquent\Model::$user.
        // $user = $this->row->user;
        // $user = $this->row->getRelationValue('user');
        // 89     Access to an undefined property object::$perm_type
        $user_id = $this->row->getAttributeValue('user_id');
        $user = User::where('id', $user_id)->first();
        if (null === $user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        try {
            if (\is_object($user->perm) && $user->perm->perm_type >= 4) {  // superadmin
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }

        return false;
    }
}
