<?php

declare(strict_types=1);

namespace Modules\LU\Services;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Modules\Cms\Contracts\PanelContract;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Cms\Datas\LinkData;
=======
=======
use Modules\Cms\Datas\LinkData;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Cms\Datas\LinkData;
=======
>>>>>>> 62cce4ba (rebase)
>>>>>>> 37eab95 (up)
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> 98558fe (up)
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> db76e2e (up)
=======
>>>>>>> 37eab953 (up)
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> db76e2ef (up)
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> 37eab953 (up)
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> 98558fe0 (up)
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> db76e2ef (up)
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> 7aa5e9e8 (.)
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
use Modules\Cms\Datas\LinkData;
>>>>>>> c71eea96 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Spatie\LaravelData\DataCollection;
=======
=======
use Spatie\LaravelData\DataCollection;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Spatie\LaravelData\DataCollection;
=======
>>>>>>> 62cce4ba (rebase)
>>>>>>> 37eab95 (up)
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> 98558fe (up)
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> db76e2e (up)
=======
>>>>>>> 37eab953 (up)
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> db76e2ef (up)
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> 37eab953 (up)
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> 98558fe0 (up)
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> db76e2ef (up)
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> 7aa5e9e8 (.)
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> c71eea96 (.)

/**
 * Class ProfileService.
 */
class ProfileService {
    private ?UserContract $user = null;

    private ?ModelProfileContract $profile = null;

    private PanelContract $profile_panel;

    private static ?self $instance = null;

    private XotData $xot;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct()
    {
<<<<<<< HEAD
        $this->xot = XotData::make();
=======
=======
=======
>>>>>>> 62cce4ba (rebase)
    public function __construct() {
<<<<<<< HEAD
>>>>>>> 7aa5e9e8 (.)
        $this->xot = XotData::from(config('xra'));
>>>>>>> 98558fe0 (up)
=======
        $this->xot = XotData::make();
        /** @var \Modules\Xot\Contracts\UserContract|null */
<<<<<<< HEAD
>>>>>>> 5b24bc03 (.)
=======
=======
    public function __construct()
    {
        $this->xot = XotData::from(config('xra'));
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
    public function __construct() {
        $this->xot = XotData::from(config('xra'));
>>>>>>> c71eea96 (.)
        $user = Auth::user();

        if (null === $user) {
            return;
        }
        if (! $user instanceof UserContract) {
            throw new \Exception('add on class ['.get_class($user).'] implements Modules\Xot\Contracts\UserContract');
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

    public function can(string $permission): bool {
        return false;
    }

    // returns User's full name (fist and last name)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function fullName(): ?string
    {
=======
    public function fullName(): ?string {
=======
    public function fullName(): ?string {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function fullName(): ?string
    {
=======
    public function fullName(): ?string {
>>>>>>> 62cce4ba (rebase)
>>>>>>> 37eab95 (up)
=======
    public function fullName(): ?string
    {
>>>>>>> 98558fe (up)
=======
    public function fullName(): ?string {
>>>>>>> db76e2e (up)
=======
    public function fullName(): ?string {
>>>>>>> 37eab953 (up)
=======
    public function fullName(): ?string
    {
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
    public function fullName(): ?string {
>>>>>>> db76e2ef (up)
=======
    public function fullName(): ?string {
>>>>>>> 7aa5e9e8 (.)
=======
    public function fullName(): ?string {
>>>>>>> 37eab953 (up)
=======
    public function fullName(): ?string
    {
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
    public function fullName(): ?string
    {
>>>>>>> 98558fe0 (up)
=======
    public function fullName(): ?string {
>>>>>>> db76e2ef (up)
=======
    public function fullName(): ?string {
>>>>>>> 7aa5e9e8 (.)
=======
    public function fullName(): ?string {
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
    public function fullName(): ?string {
>>>>>>> c71eea96 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function handle(): string
    {
=======
    public function handle(): string {
=======
    public function handle(): string {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function handle(): string
    {
=======
    public function handle(): string {
>>>>>>> 62cce4ba (rebase)
>>>>>>> 37eab95 (up)
=======
    public function handle(): string
    {
>>>>>>> 98558fe (up)
=======
    public function handle(): string {
>>>>>>> db76e2e (up)
=======
    public function handle(): string {
>>>>>>> 37eab953 (up)
=======
    public function handle(): string
    {
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
    public function handle(): string {
>>>>>>> db76e2ef (up)
=======
    public function handle(): string {
>>>>>>> 7aa5e9e8 (.)
=======
    public function handle(): string {
>>>>>>> 37eab953 (up)
=======
    public function handle(): string
    {
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
    public function handle(): string
    {
>>>>>>> 98558fe0 (up)
=======
    public function handle(): string {
>>>>>>> db76e2ef (up)
=======
    public function handle(): string {
>>>>>>> 7aa5e9e8 (.)
=======
    public function handle(): string {
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
    public function handle(): string {
>>>>>>> c71eea96 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 62cce4ba (rebase)
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
=======
>>>>>>> 62cce4ba (rebase)
>>>>>>> 37eab95 (up)
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> 98558fe (up)
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> db76e2e (up)
=======
>>>>>>> 37eab953 (up)
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> db76e2ef (up)
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> 37eab953 (up)
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> 98558fe0 (up)
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> db76e2ef (up)
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> 7aa5e9e8 (.)
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> c71eea96 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function name(): string
    {
        return (string) $this->user?->first_name;
=======
=======
>>>>>>> 37eab953 (up)
=======
>>>>>>> 37eab953 (up)
    public function name(): string {
        return (string) $this->user->first_name;
>>>>>>> 37eab95 (up)
=======
    public function name(): string
    {
        return (string) $this->user?->first_name;
>>>>>>> 98558fe (up)
=======
    public function name(): string {
        return (string) $this->user?->first_name;
=======
    public function name(): string {
        return (string) $this->user?->first_name;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function name(): string
    {
        return (string) $this->user?->first_name;
=======
=======
>>>>>>> 37eab953 (up)
    public function name(): string {
        return (string) $this->user->first_name;
>>>>>>> 37eab95 (up)
=======
    public function name(): string
    {
        return (string) $this->user?->first_name;
>>>>>>> 98558fe (up)
=======
    public function name(): string {
        return (string) $this->user?->first_name;
>>>>>>> 62cce4ba (rebase)
>>>>>>> db76e2e (up)
=======
    public function name(): string
    {
        return (string) $this->user?->first_name;
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
    public function name(): string {
        return (string) $this->user?->first_name;
>>>>>>> db76e2ef (up)
=======
    public function name(): string {
        return (string) $this->user?->first_name;
>>>>>>> 7aa5e9e8 (.)
=======
    public function name(): string
    {
        return (string) $this->user?->first_name;
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
    public function name(): string
    {
        return (string) $this->user?->first_name;
>>>>>>> 98558fe0 (up)
=======
    public function name(): string {
        return (string) $this->user?->first_name;
>>>>>>> db76e2ef (up)
=======
    public function name(): string {
        return (string) $this->user?->first_name;
>>>>>>> 7aa5e9e8 (.)
=======
    public function name(): string {
        return (string) $this->user?->first_name;
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
    public function name(): string {
        return (string) $this->user?->first_name;
>>>>>>> c71eea96 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function avatar($size = 100)
    {
=======
    public function avatar($size = 100) {
=======
    public function avatar($size = 100) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function avatar($size = 100)
    {
=======
    public function avatar($size = 100) {
>>>>>>> 62cce4ba (rebase)
>>>>>>> 37eab95 (up)
=======
    public function avatar($size = 100)
    {
>>>>>>> 98558fe (up)
=======
    public function avatar($size = 100) {
>>>>>>> db76e2e (up)
=======
    public function avatar($size = 100) {
>>>>>>> 37eab953 (up)
=======
    public function avatar($size = 100)
    {
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
    public function avatar($size = 100) {
>>>>>>> db76e2ef (up)
=======
    public function avatar($size = 100) {
>>>>>>> 7aa5e9e8 (.)
=======
    public function avatar($size = 100) {
>>>>>>> 37eab953 (up)
=======
    public function avatar($size = 100)
    {
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
    public function avatar($size = 100)
    {
>>>>>>> 98558fe0 (up)
=======
    public function avatar($size = 100) {
>>>>>>> db76e2ef (up)
=======
    public function avatar($size = 100) {
>>>>>>> 7aa5e9e8 (.)
=======
    public function avatar($size = 100) {
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
    public function avatar($size = 100) {
>>>>>>> c71eea96 (.)
        if (null === $this->user) {
            return null;
        }

        $email = md5(mb_strtolower(trim((string) $this->user->email)));
        $default = urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }

    // returns User email
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function email(): ?string
    {
        return $this->user?->email;
=======
=======
>>>>>>> 37eab953 (up)
=======
>>>>>>> 37eab953 (up)
    public function email(): ?string {
        return $this->user->email;
>>>>>>> 37eab95 (up)
=======
    public function email(): ?string
    {
        return $this->user?->email;
>>>>>>> 98558fe (up)
=======
    public function email(): ?string {
        return $this->user?->email;
=======
    public function email(): ?string {
        return $this->user?->email;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function email(): ?string
    {
        return $this->user?->email;
=======
=======
>>>>>>> 37eab953 (up)
    public function email(): ?string {
        return $this->user->email;
>>>>>>> 37eab95 (up)
=======
    public function email(): ?string
    {
        return $this->user?->email;
>>>>>>> 98558fe (up)
=======
    public function email(): ?string {
        return $this->user?->email;
>>>>>>> 62cce4ba (rebase)
>>>>>>> db76e2e (up)
=======
    public function email(): ?string
    {
        return $this->user?->email;
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
    public function email(): ?string {
        return $this->user?->email;
>>>>>>> db76e2ef (up)
=======
    public function email(): ?string {
        return $this->user?->email;
>>>>>>> 7aa5e9e8 (.)
=======
    public function email(): ?string
    {
        return $this->user?->email;
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
    public function email(): ?string
    {
        return $this->user?->email;
>>>>>>> 98558fe0 (up)
=======
    public function email(): ?string {
        return $this->user?->email;
>>>>>>> db76e2ef (up)
=======
    public function email(): ?string {
        return $this->user?->email;
>>>>>>> 7aa5e9e8 (.)
=======
    public function email(): ?string {
        return $this->user?->email;
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
    public function email(): ?string {
        return $this->user?->email;
>>>>>>> c71eea96 (.)
    }

    // returns the
    public function getPanel(): PanelContract {
        $profile_panel = $this->getProfilePanel();

        return $profile_panel;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getProfile(): ModelProfileContract
    {
=======
    public function getProfile(): ?ModelProfileContract {
>>>>>>> 37eab95 (up)
=======
    public function getProfile(): ModelProfileContract
    {
>>>>>>> 98558fe (up)
=======
    public function getProfile(): ModelProfileContract {
=======
    public function getProfile(): ModelProfileContract {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getProfile(): ModelProfileContract
    {
=======
    public function getProfile(): ?ModelProfileContract {
>>>>>>> 37eab95 (up)
=======
    public function getProfile(): ModelProfileContract
    {
>>>>>>> 98558fe (up)
=======
    public function getProfile(): ModelProfileContract {
>>>>>>> 62cce4ba (rebase)
>>>>>>> db76e2e (up)
=======
    public function getProfile(): ?ModelProfileContract {
>>>>>>> 37eab953 (up)
=======
    public function getProfile(): ModelProfileContract
    {
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
    public function getProfile(): ModelProfileContract {
>>>>>>> db76e2ef (up)
=======
    public function getProfile(): ModelProfileContract {
>>>>>>> 7aa5e9e8 (.)
=======
    public function getProfile(): ?ModelProfileContract {
>>>>>>> 37eab953 (up)
=======
    public function getProfile(): ModelProfileContract
    {
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
    public function getProfile(): ModelProfileContract
    {
>>>>>>> 98558fe0 (up)
=======
    public function getProfile(): ModelProfileContract {
>>>>>>> db76e2ef (up)
=======
    public function getProfile(): ModelProfileContract {
>>>>>>> 7aa5e9e8 (.)
=======
    public function getProfile(): ModelProfileContract {
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
    public function getProfile(): ModelProfileContract {
>>>>>>> c71eea96 (.)
        if (null !== $this->profile) {
            return $this->profile;
        }
        if (null !== $this->user) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 62cce4ba (rebase)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 98558fe (up)
=======
>>>>>>> db76e2e (up)
=======
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
>>>>>>> 98558fe0 (up)
=======
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
>>>>>>> c71eea96 (.)
            $profile = $this->user->profile()->firstOrCreate();
            if (! $profile instanceof ModelProfileContract) {
                throw new \Exception('['.__LINE__.']['.__FILE__.']');
            }
            $this->profile = $profile;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 62cce4ba (rebase)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 37eab953 (up)
<<<<<<< HEAD
=======
>>>>>>> 37eab953 (up)
=======
>>>>>>> 62cce4ba (rebase)
            $this->profile = $this->user->profile()->firstOrCreate();
>>>>>>> 37eab95 (up)
=======
>>>>>>> 98558fe (up)
=======
>>>>>>> db76e2e (up)
=======
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
>>>>>>> 98558fe0 (up)
=======
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
>>>>>>> c71eea96 (.)

            return $this->profile;
        }

        throw new \Exception('['.__LINE__.']['.__FILE__.']');
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function setUserId(string $user_id): self
    {
=======
    public function setUserId(string $user_id) {
>>>>>>> 37eab95 (up)
=======
    public function setUserId(string $user_id): self
    {
>>>>>>> 98558fe (up)
=======
    public function setUserId(string $user_id): self {
=======
    public function setUserId(string $user_id): self {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function setUserId(string $user_id): self
    {
=======
    public function setUserId(string $user_id) {
>>>>>>> 37eab95 (up)
=======
    public function setUserId(string $user_id): self
    {
>>>>>>> 98558fe (up)
=======
    public function setUserId(string $user_id): self {
>>>>>>> 62cce4ba (rebase)
>>>>>>> db76e2e (up)
=======
    public function setUserId(string $user_id) {
>>>>>>> 37eab953 (up)
=======
    public function setUserId(string $user_id): self
    {
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
    public function setUserId(string $user_id): self {
>>>>>>> db76e2ef (up)
=======
    public function setUserId(string $user_id): self {
>>>>>>> 7aa5e9e8 (.)
=======
    public function setUserId(string $user_id) {
>>>>>>> 37eab953 (up)
=======
    public function setUserId(string $user_id): self
    {
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
    public function setUserId(string $user_id): self
    {
>>>>>>> 98558fe0 (up)
=======
    public function setUserId(string $user_id): self {
>>>>>>> db76e2ef (up)
=======
    public function setUserId(string $user_id): self {
>>>>>>> 7aa5e9e8 (.)
=======
    public function setUserId(string $user_id): self {
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
    public function setUserId(string $user_id): self {
>>>>>>> c71eea96 (.)
        $this->user = User::find($user_id);

        return $this;
    }

    // returns the Profile panel with its methods
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 62cce4ba (rebase)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 98558fe (up)
<<<<<<< HEAD
=======
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
    public function getProfilePanel(): PanelContract
    {
=======
    public function getProfilePanel(): PanelContract {
>>>>>>> c6ccfdbd (.)
=======
    public function getProfilePanel(): PanelContract
    {
>>>>>>> 62cce4ba (rebase)
=======
    public function getProfilePanel(): PanelContract {
>>>>>>> c71eea96 (.)
        $profile = $this->getProfile();
        // if (null === $profile) {
        //    throw new \Exception('['.__LINE__.']['.__FILE__.']');
        // }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 37eab953 (up)
=======
>>>>>>> 37eab953 (up)
=======
=======
=======
>>>>>>> 37eab953 (up)
>>>>>>> 62cce4ba (rebase)
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
>>>>>>> 37eab95 (up)
=======
>>>>>>> 98558fe (up)
=======
<<<<<<< HEAD
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> 7aa5e9e8 (.)
    public function getProfilePanel(): PanelContract {
=======
=======
>>>>>>> 98558fe0 (up)
    public function getProfilePanel(): PanelContract
    {
>>>>>>> 98558fe0 (up)
=======
    public function getProfilePanel(): PanelContract {
>>>>>>> db76e2ef (up)
=======
    public function getProfilePanel(): PanelContract {
>>>>>>> db76e2ef (up)
=======
>>>>>>> e546c0e (rebase)
    public function getProfilePanel(): PanelContract {
=======
    public function getProfilePanel(): PanelContract
    {
>>>>>>> 98558fe0 (up)
>>>>>>> 62cce4ba (rebase)
        $profile = $this->getProfile();
        // if (null === $profile) {
        //    throw new \Exception('['.__LINE__.']['.__FILE__.']');
        // }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 62cce4ba (rebase)
<<<<<<< HEAD
>>>>>>> db76e2e (up)
=======
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
>>>>>>> 98558fe0 (up)
=======
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
>>>>>>> c71eea96 (.)
        $this->profile_panel = PanelService::make()->get($profile);

        return $this->profile_panel;
    }

    // returns the User panel with its methods
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 62cce4ba (rebase)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 98558fe (up)
=======
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
>>>>>>> 98558fe0 (up)
=======
>>>>>>> 62cce4ba (rebase)
    public function getUserPanel(): PanelContract
    {
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 62cce4ba (rebase)
=======
    public function getUserPanel(): PanelContract {
>>>>>>> 37eab95 (up)
=======
>>>>>>> 98558fe (up)
=======
<<<<<<< HEAD
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
>>>>>>> c71eea96 (.)
    public function getUserPanel(): PanelContract {
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 62cce4ba (rebase)
>>>>>>> db76e2e (up)
=======
    public function getUserPanel(): PanelContract {
>>>>>>> 37eab953 (up)
=======
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
    public function getUserPanel(): PanelContract {
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
    public function getUserPanel(): PanelContract {
>>>>>>> 37eab953 (up)
=======
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
>>>>>>> 98558fe0 (up)
=======
    public function getUserPanel(): PanelContract {
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
>>>>>>> c71eea96 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 62cce4ba (rebase)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 98558fe (up)
=======
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
>>>>>>> 98558fe0 (up)
    public function getUser(): UserContract
    {
=======
=======
    public function getUser(): UserContract
    {
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
>>>>>>> c71eea96 (.)
    public function getUser(): UserContract {
>>>>>>> db76e2ef (up)
=======
    public function getUser(): UserContract {
>>>>>>> 7aa5e9e8 (.)
=======
    public function getUser(): UserContract {
>>>>>>> c6ccfdbd (.)
        if (null == $this->user) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 62cce4ba (rebase)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    public function getUser(): UserContract {
>>>>>>> 37eab95 (up)
=======
>>>>>>> 98558fe (up)
=======
>>>>>>> db76e2e (up)
=======
    public function getUser(): UserContract {
>>>>>>> 37eab953 (up)
=======
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
    public function getUser(): UserContract {
>>>>>>> 37eab953 (up)
=======
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
>>>>>>> 98558fe0 (up)
=======
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
>>>>>>> c71eea96 (.)
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
   public function getAreasLinkDataColl(): DataCollection {
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function givePermissionTo(string $name): self
    {
        $this->getProfile()->givePermissionTo($name);
=======
=======
>>>>>>> 37eab953 (up)
=======
>>>>>>> 37eab953 (up)
    public function givePermissionTo(string $name): self {
        $this->getProfile()?->givePermissionTo($name);
>>>>>>> 37eab95 (up)
=======
    public function givePermissionTo(string $name): self
    {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> 98558fe (up)
=======
    public function givePermissionTo(string $name): self {
        $this->getProfile()->givePermissionTo($name);
=======
    public function givePermissionTo(string $name): self {
        $this->getProfile()->givePermissionTo($name);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function givePermissionTo(string $name): self
    {
        $this->getProfile()->givePermissionTo($name);
=======
=======
>>>>>>> 37eab953 (up)
    public function givePermissionTo(string $name): self {
        $this->getProfile()?->givePermissionTo($name);
>>>>>>> 37eab95 (up)
=======
    public function givePermissionTo(string $name): self
    {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> 98558fe (up)
=======
    public function givePermissionTo(string $name): self {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> 62cce4ba (rebase)
>>>>>>> db76e2e (up)
=======
    public function givePermissionTo(string $name): self
    {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
    public function givePermissionTo(string $name): self {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> db76e2ef (up)
=======
    public function givePermissionTo(string $name): self {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> 7aa5e9e8 (.)
=======
    public function givePermissionTo(string $name): self
    {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
    public function givePermissionTo(string $name): self
    {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> 98558fe0 (up)
=======
    public function givePermissionTo(string $name): self {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> db76e2ef (up)
=======
    public function givePermissionTo(string $name): self {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> 7aa5e9e8 (.)
=======
    public function givePermissionTo(string $name): self {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
    public function givePermissionTo(string $name): self {
        $this->getProfile()->givePermissionTo($name);
>>>>>>> c71eea96 (.)

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
>>>>>>> 37eab953 (up)
=======

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 62cce4ba (rebase)
=======
>>>>>>> 37eab953 (up)
        if (null === $profile) {
            return false;
        }
>>>>>>> 37eab95 (up)
=======
>>>>>>> 98558fe (up)
=======

>>>>>>> db76e2e (up)
=======
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======

>>>>>>> db76e2ef (up)
=======

>>>>>>> 7aa5e9e8 (.)
=======

>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
>>>>>>> 98558fe0 (up)
=======

>>>>>>> db76e2ef (up)
=======

>>>>>>> 7aa5e9e8 (.)
=======

>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======

>>>>>>> c71eea96 (.)
        // try {
        return $profile->hasRole($name);
        // } catch (\Spatie\Permission\Exceptions\RoleDoesNotExist) {
        //    Role::create(['name' => $name]);
        // }
    }

    public function hasAnyRole(array $roles): bool {
        $profile = $this->getProfile();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 62cce4ba (rebase)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 37eab953 (up)
<<<<<<< HEAD
=======
>>>>>>> 37eab953 (up)
=======
>>>>>>> 62cce4ba (rebase)
        if (null === $profile) {
            return false;
        }
>>>>>>> 37eab95 (up)
=======
>>>>>>> 98558fe (up)
=======
>>>>>>> db76e2e (up)
=======
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
>>>>>>> 98558fe0 (up)
=======
>>>>>>> db76e2ef (up)
=======
>>>>>>> 7aa5e9e8 (.)
=======
>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======
>>>>>>> c71eea96 (.)

        return $profile->hasAnyRole($roles);
    }

    public function hasPermissionTo(string $name): bool {
        $profile = $this->getProfile();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
>>>>>>> 37eab953 (up)
=======

=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 62cce4ba (rebase)
=======
>>>>>>> 37eab953 (up)
        if (null === $profile) {
            return false;
        }
>>>>>>> 37eab95 (up)
=======
>>>>>>> 98558fe (up)
=======

>>>>>>> db76e2e (up)
=======
>>>>>>> 98558fe0 (up)
<<<<<<< HEAD
=======

>>>>>>> db76e2ef (up)
=======

>>>>>>> 7aa5e9e8 (.)
=======

>>>>>>> 7e26934efd5d52824b3befd7ba9fe189bc7183ac
=======
>>>>>>> 98558fe0 (up)
=======

>>>>>>> db76e2ef (up)
=======

>>>>>>> 7aa5e9e8 (.)
=======

>>>>>>> c6ccfdbd (.)
=======
>>>>>>> e546c0e (rebase)
>>>>>>> 62cce4ba (rebase)
=======

>>>>>>> c71eea96 (.)
        try {
            return $profile->hasPermissionTo($name);
        } catch (\Spatie\Permission\Exceptions\PermissionDoesNotExist $th) {
            Permission::create(['name' => $name]);
        }

        return false;
    }
}
