<?php

declare(strict_types=1);

namespace Modules\LU\Services;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Modules\Cms\Contracts\PanelContract;
<<<<<<< HEAD
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
use Modules\Cms\Services\PanelService;
use Modules\LU\Models\Area;
use Modules\LU\Models\Permission;
use Modules\LU\Models\Role;
use Modules\LU\Models\User;
use Modules\Xot\Contracts\ModelProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Nwidart\Modules\Facades\Module;
<<<<<<< HEAD
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a

/**
 * Class ProfileService.
 */
class ProfileService {
    private ?UserContract $user = null;

    private ?ModelProfileContract $profile = null;

    private PanelContract $profile_panel;

    private static ?self $instance = null;

    private XotData $xot;

    public function __construct() {
        $this->xot = XotData::from(config('xra'));
        $user = Auth::user();

        if (null === $user) {
            return;
        }
        $this->get($user);
    }

    public static function getInstance(): self {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function make(): self {
        return static::getInstance();
    }

    /**
     * Undocumented function.
     *
     * @param string                   $name
     * @param array<int|string, mixed> $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments) {
        $profile_panel = $this->getProfilePanel();

        if (method_exists($profile_panel, $name)) {
            /**
             * @var callable
             */
            $callback = [$profile_panel, $name];

            return \call_user_func_array($callback, $arguments);
        }

        $profile = $this->getProfile();

<<<<<<< HEAD
        if (null === $profile) {
            return 'profile is null ['.__LINE__.']['.class_basename(__CLASS__).']';
        }
=======
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        if (method_exists($profile, $name)) {
            /**
             * @var callable
             */
            $callback = [$profile, $name];

            return \call_user_func_array($callback, $arguments);
            /*
            try {
                return \call_user_func_array($callback, $arguments);
            } catch (\Exception $e) {
                dddx([
                    'callback' => $callback,
                    'arguments' => $arguments,
                    'error' => $e->getMessage(),
                ]);
            }
            */
        }

        throw new \Exception('['.\get_class($profile).'] method: ['.$name.']['.__LINE__.']['.class_basename(__CLASS__).']');
    }

    /**
     * returns this ProfileService instance.
     *
     * @throws \ReflectionException
     */
    public function get(UserContract $user): self {
        $this->user = $user;

        /*
        $profile = $user->profile;

        if (null === $profile) {
            $profile = $user->profile()->firstOrCreate();
            $data = ['user_id' => $user->id];
            if (method_exists($profile, 'post')) {
                $profile->post()->firstOrCreate(['guid' => 'profile-'.$user->id, 'lang' => app()->getLocale()]);
            }
            $profile->save($data);
        }
        //Property Modules\LU\Services\ProfileService::$profile
        //(Modules\Xot\Contracts\ModelProfileContract|null) does not accept
        //Illuminate\Database\Eloquent\Model|Modules\Xot\Contracts\ModelProfileContract.
        if(!$profile instanceof ModelProfileContract){
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        $this->profile = $profile;
        $this->profile_panel = $this->getProfilePanel();
        */
        $this->profile = $user->profile;
        $this->profile_panel = $this->getProfilePanel();

        return $this;
    }

    public function can(string $permission): bool
    {
        return false;
    }

    // returns User's full name (fist and last name)
<<<<<<< HEAD
    public function fullName(): ?string {
=======
    public function fullName(): ?string
    {
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        if (null === $this->user) {
            return null;
        }
        $user = $this->user;
        if (! property_exists($user, 'first_name')) {
            throw new \Exception('property first_name in $user not exist');
        }
        if (! property_exists($user, 'last_name')) {
            throw new \Exception('property last_name in $user not exist');
        }

        return $user->first_name.' '.$user->last_name;
    }

    // returns username
<<<<<<< HEAD
    public function handle(): string {
=======
    public function handle(): string
    {
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        if (null === $this->user) {
            return 'unknown';
        }

        return $this->user->handle;
    }

    public function permType(): int {
        // 89     Access to an undefined property Illuminate\Database\Eloquent\Model::$perm.
        // perchè lo prende come property quando è una relazione?
        // se metto property_exists non visualizzo il sito

        // dddx($this->user->perm->perm_type);
        // if (! method_exists($this->user, 'perm')) {
        //    throw new \Exception('method perm in $this->user not exist');
        // }
        /* perm è una relazione
        if (! property_exists($this->user, 'perm')) {
            throw new \Exception('property perm in $this->user not exist');
        }
        */
<<<<<<< HEAD
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        if (! method_exists($this->user, 'perm')) {
            throw new \Exception('method perm in $this->user not exist');
        }

        // return (int) optional($this->user->perm)->perm_type;
        if (null === $this->user->perm) {
            return -1;
        }

        return (int) $this->user->perm->perm_type;
    }

    // returns User's fist name
<<<<<<< HEAD
    public function name(): string {
        return (string) $this->user->first_name;
=======
    public function name(): string
    {
        return (string) $this->user?->first_name;
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
    }

    // returns the Profile's action url (example: http://domain.xx/admin/it/lu/profiles/1/?_act=show)
    public function url(string $act = 'show'): string {
        return $this->profile_panel->url($act);
    }

    /**
     * returns the User's avatar.
     *
     * @param int $size
     *
     * @return string|null
     */
<<<<<<< HEAD
    public function avatar($size = 100) {
=======
    public function avatar($size = 100)
    {
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        if (null === $this->user) {
            return null;
        }

        $email = md5(mb_strtolower(trim((string) $this->user->email)));
        $default = urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }

    // returns User email
<<<<<<< HEAD
    public function email(): ?string {
        return $this->user->email;
=======
    public function email(): ?string
    {
        return $this->user?->email;
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
    }

    // returns the
    public function getPanel(): PanelContract {
        $profile_panel = $this->getProfilePanel();

        return $profile_panel;
    }

<<<<<<< HEAD
    public function getProfile(): ?ModelProfileContract {
=======
    public function getProfile(): ModelProfileContract
    {
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        if (null !== $this->profile) {
            return $this->profile;
        }
        if (null !== $this->user) {
<<<<<<< HEAD
            $this->profile = $this->user->profile()->firstOrCreate();
=======
            $profile = $this->user->profile()->firstOrCreate();
            if (! $profile instanceof ModelProfileContract) {
                throw new \Exception('['.__LINE__.']['.__FILE__.']');
            }
            $this->profile = $profile;
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a

            return $this->profile;
        }

        throw new \Exception('['.__LINE__.']['.__FILE__.']');
    }

<<<<<<< HEAD
    public function setUserId(string $user_id) {
=======
    public function setUserId(string $user_id): self
    {
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        $this->user = User::find($user_id);

        return $this;
    }

    // returns the Profile panel with its methods
<<<<<<< HEAD
    public function getProfilePanel(): PanelContract {
        /*
        if (null == $this->profile && null != $this->user) {
            if (null == $this->user->profile) {
                $this->profile = $this->user->profile()->firstOrCreate();
            // throw new \Exception('['.$this->getProfileClass().']['.__LINE__.']['.__FILE__.']');
            } else {
                $user = $this->user;

                $main_module = config('xra.main_module');
                if ('' === $main_module) {
                    throw new \Exception('set [xra.main_module]');
                }
                $profile_class = 'Modules\\'.$main_module.'\Models\Profile';

                $this->profile = $profile_class::firstWhere('user_id', $user->id);
            }
            // Property Modules\LU\Services\ProfileService::$profile (Modules\Xot\Contracts\ModelProfileContract|null) does not accept Illuminate\Database\Eloquent\Model.

            // $this->profile = $this->user->profile;
        }
        */
        $profile = $this->getProfile();
        if (null === $profile) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
=======
    public function getProfilePanel(): PanelContract
    {
        $profile = $this->getProfile();
        // if (null === $profile) {
        //    throw new \Exception('['.__LINE__.']['.__FILE__.']');
        // }
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        $this->profile_panel = PanelService::make()->get($profile);

        return $this->profile_panel;
    }

    // returns the User panel with its methods
<<<<<<< HEAD
    public function getUserPanel(): PanelContract {
=======
    public function getUserPanel(): PanelContract
    {
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        $user_panel = PanelService::make()->getByUser($this->user);

        return $user_panel;
    }

    // checks if this profile belongs to a SuperAdmin (level 1)
    public function isSuperAdmin(array $params = []): bool {
        $panel = $this->getPanel();
        // dddx($panel);//Modules\Food\Models\Panels\ProfilePanel
        if (! method_exists($panel, 'isSuperAdmin')) {
            throw new \Exception('method isSuperAdmin in ['.\get_class($panel).'] not exist');
        }

        return $panel->isSuperAdmin($params);
    }

    // get the User that belongs to this profile
<<<<<<< HEAD
    public function getUser(): UserContract {
=======
    public function getUser(): UserContract
    {
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }

>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        return $this->user;
    }

    // get the right STRING name of this profile class (based on XRA main_module)
    public function getProfileClass(): string {
        $main_module = $this->xot->main_module;
        $class = 'Modules\\'.$main_module.'\Models\Profile';

        return $class;
    }

    // check if this profile has that area (true or false)
    public function hasArea(string $name): bool {
        $area = $this->areas()->firstWhere('area_define_name', $name);

        return \is_object($area);
    }

    /**
     * Undocumented function.
     *
     * @return Collection<Area>
     */
    public function areas(): Collection {
        $areas = $this->getUser()->areas
            ->sortBy('order_column');

        $modules = Module::getByStatus(1);
        $areas = $areas->filter(
            function ($item) use ($modules) {
                return \in_array($item->area_define_name, array_keys($modules), true);
            }
        );

        return $areas;
    }

   /**
    * @return DataCollection<LinkData>
    */
   public function getAreasLinkDataColl(): DataCollection
   {
       $areas = $this->areas();
       $menu = $areas->map(
           function ($item) {
               if (! $item instanceof \Modules\LU\Models\Area) {
                   throw new \Exception('['.__LINE__.']['.__FILE__.']');
               }

               return [
                   'title' => $item->area_define_name,
                   'url' => $item->url,
                   'active' => false,
               ];
           });
       // $menu = []; // se non è superadmin dovrebbe essere vuoto
       // if (! $profile->isSuperAdmin()) {
       //     $menu = [];
       // }

       return LinkData::collection($menu->all());
   }

    // get all areas of this PROFILE
    public function panelAreas(): Collection {
        return $this->areas()->map(
            function ($area) {
                if (! $area instanceof Model) {
                    throw new \Exception('['.__LINE__.']['.__FILE__.']');
                }

                return PanelService::make()->get($area);
            }
        );
    }

    // -------------- SPATIE PERMISSION -------------------------
<<<<<<< HEAD
    public function givePermissionTo(string $name): self {
        $this->getProfile()?->givePermissionTo($name);
=======
    public function givePermissionTo(string $name): self
    {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a

        return $this;
    }

    public function assignRole(string $name): self {
        try {
            $this->getProfile()->assignRole($name);
        } catch (\Spatie\Permission\Exceptions\RoleDoesNotExist) {
            Role::create(['name' => $name]);
        }

        return $this;
    }

    public function hasRole(string $name): bool {
        $profile = $this->getProfile();
<<<<<<< HEAD
        if (null === $profile) {
            return false;
        }
=======

>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        // try {
        return $profile->hasRole($name);
        // } catch (\Spatie\Permission\Exceptions\RoleDoesNotExist) {
        //    Role::create(['name' => $name]);
        // }
    }

    public function hasAnyRole(array $roles): bool {
        $profile = $this->getProfile();
<<<<<<< HEAD
        if (null === $profile) {
            return false;
        }
=======
>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a

        return $profile->hasAnyRole($roles);
    }

    public function hasPermissionTo(string $name): bool {
        $profile = $this->getProfile();
<<<<<<< HEAD
        if (null === $profile) {
            return false;
        }
=======

>>>>>>> 33473522217c9f90c4ee9d2b9a944d43ddc7ab6a
        try {
            return $profile->hasPermissionTo($name);
        } catch (\Spatie\Permission\Exceptions\PermissionDoesNotExist $th) {
            Permission::create(['name' => $name]);
        }

        return false;
    }
}
