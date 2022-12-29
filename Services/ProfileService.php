<?php

declare(strict_types=1);

namespace Modules\LU\Services;

use Exception;
use ReflectionException;
use Modules\LU\Models\Area;
use Illuminate\Support\Collection;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Auth;
use Modules\Cms\Services\PanelService;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;
use Modules\Cms\Contracts\PanelContract;
use Modules\Xot\Contracts\ModelContract;
use Modules\Xot\Contracts\ModelProfileContract;

/**
 * Class ProfileService.
 */
class ProfileService {
    private UserContract $user;

    private ?ModelProfileContract $profile = null;

    private PanelContract $profile_panel;

    private static ?self $instance = null;

    private array $xot;

    public function __construct() {
        // ---
        $xot = config('xra');
        if (! \is_array($xot)) {
            $xot = [];
        }
        $this->xot = $xot;
        $user=Auth::user();
        if($user==null){
            return ;
        }
        $this->get($user);
        // dddx(Auth::user());
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
     * If the method doesn't exists in this class
     * then the "php magic method" __call will be called
     * see PHP Magic Methods doc: https://www.php.net/manual/en/language.oop5.overloading.php#object.call.
     *
     * In this case the method checks if the called method exists inside the ProfilePanel or ProfileModel
     * and returns if exists
     *
     * The first parameter is the method name, the second is the method arguments
     *
     * @see https://www.php.net/manual/en/language.oop5.overloading.php
     *
     * @param string $name
     * @param array  $arguments
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

        if (null === $profile) {
            return 'profile is null ['.__LINE__.']['.class_basename(__CLASS__).']';
        }
        if (method_exists($profile, $name)) {
            /**
             * @var callable
             */
            $callback = [$profile, $name];

            return \call_user_func_array($callback, $arguments);
        }

        throw new Exception('['.\get_class($profile).'] method: ['.$name.']['.__LINE__.']['.class_basename(__CLASS__).']');
    }

    /**
     * returns this ProfileService instance.
     *
     *
     * @throws ReflectionException
     */
    public function get(UserContract $user): self {
        if (\is_object($user)) {
            $this->user = $user;

            $profile = $user->profile;

            if (null === $profile) {
                $profile = $user->profile()->firstOrCreate();
                $data = ['user_id' => $user->id];
                if (method_exists($profile, 'post')) {
                    $profile->post()->firstOrCreate(['guid' => 'profile-'.$user->id, 'lang' => app()->getLocale()]);
                }
                $profile->save($data);
            }
            $this->profile = $profile;
            $this->profile_panel = PanelService::make()->get($profile);
        }

        return $this;
    }

    // returns User's full name (fist and last name)
    public function fullName(): ?string {
        if (null == $this->user) {
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
    public function handle(): string {
        if (null == $this->user) {
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
    public function name(): string {
        return (string) $this->user->first_name;
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
    public function avatar($size = 100) {
        if (null == $this->user) {
            return null;
        }

        $email = md5(mb_strtolower(trim((string) $this->user->email)));
        $default = urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }

    // returns User email
    public function email(): ?string {
        return $this->user->email;
    }

    // returns the
    public function getPanel(): PanelContract {
        if (null == $this->profile) {
            dddx(['message' => 'to fix', 'user' => $this->user, 'profile' => $this->profile]);
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

        $profile_panel = PanelService::make()->get($this->profile);

        return $profile_panel;
    }

    public function getProfile(): ?ModelProfileContract {
        return $this->profile;
    }

    // returns the Profile panel with its methods
    public function getProfilePanel(): PanelContract {
        if (null === $this->profile) {
            dddx(['message' => 'to fix', 'user' => $this->user, 'profile' => $this->profile]);
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

        $profile_panel = PanelService::make()->get($this->profile);

        return $profile_panel;
    }

    // returns the User panel with its methods
    public function getUserPanel(): PanelContract {
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
    public function getUser(): UserContract {
        return $this->user;
    }

    // get the right STRING name of this profile class (based on XRA main_module)
    public function getProfileClass(): string {
        $main_module = $this->xot['main_module'];
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
        // dddx(['areas' => $areas, 'modules' => $modules]);
        $areas = $areas->filter(
            function ($item) use ($modules) {
                return \in_array($item->area_define_name, array_keys($modules), true);
            }
        );

        return $areas;
    }

    // get all areas of this PROFILE
    public function panelAreas(): Collection {
        return $this->areas()->map(
            function ($area) {
                if (! $area instanceof Model) {
                    throw new Exception('['.__LINE__.']['.__FILE__.']');
                }

                return PanelService::make()->get($area);
            }
        );
    }
}
