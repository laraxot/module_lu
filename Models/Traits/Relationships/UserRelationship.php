<?php

declare(strict_types=1);

namespace Modules\LU\Models\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\LU\Models\Area;
use Modules\LU\Models\AreaPermUser;
use Modules\LU\Models\GroupPermUser;
use Modules\LU\Models\PermUser;
use Modules\LU\Models\PermUserRight;
use Modules\LU\Models\SocialProvider;
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Datas\XotData;
use Nwidart\Modules\Facades\Module;

/*
 * Undocumented trait.
 */
trait UserRelationship
{
    public function socialProviders(): HasMany
    {
        return $this->hasMany(SocialProvider::class);
    }

    public function perm(): HasOne
    {
        return $this->hasOne(PermUser::class);
    }

    public function permUser(): HasOne
    {
        return $this->hasOne(PermUser::class);
    }

    public function perms(): HasMany
    {
        return $this->hasMany(PermUser::class);
    }

    public function permUsers(): HasMany
    {
        return $this->hasMany(PermUser::class);
    }

    /**
     * Undocumented function.
     */
    public function profile(): HasOne
    {
        $xot = XotData::make();
        $profile_class = $xot->getProfileClass();

        return $this->hasOne($profile_class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profileOrCreate()
    {
        $profile = TenantService::model('profile');
        $profile_class = \get_class($profile);

        $res = $this->hasOne($profile_class);

        // select exists(select * from `profiles` where `profiles`.`user_id` = 9941 and `profiles`.`user_id` is not null) as `exists`
        if ($res->exists()) {
            return $res;
        }

        $res = $profile->firstOrCreate(['user_id' => $this->getKey()]);

        /* verificare. va in loop infinito tra guid e title
        if (method_exists($res, 'post')) {
            $res->post()->firstOrCreate(
                [
                    //    'user_id' => $this->user_id,
                    'guid' => $this->guid,
                    'lang' => app()->getLocale(),
                ],
                [
                    'title' => $this->guid,
                ]
            );
        } else {

        dddx([
            'res_class' => get_class($res),
            'profile_class' => $profile_class,
            'res' => $this->hasOne($profile_class, 'user_id', 'user_id')->first(),
            'exists' => $this->hasOne($profile_class, 'user_id', 'user_id')->exists(),
            'auth_is' => $this->user_id,
            'res' => $res,
        ]);

        }*/

        // return $this->profile();
        return $this->hasOne($profile_class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function areaPermUsers()
    {
        $modules = Module::getOrdered();
        $modules = array_keys($modules);

        $rows = $this->hasManyThrough(
            AreaPermUser::class,
            PermUser::class,
        )
        // ->whereHas('area', function ($q) use ($modules): void {
        //    $q->whereIn('area_define_name', $modules);
        // })
        // ->with('area')
        ;

        return $rows;
    }

    /**
     * return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\HasManyThrough.
     */
    public function groupPermUsers(): HasManyThrough
    {
        $modules = Module::getOrdered();
        $modules = array_keys($modules);

        $rows = $this->hasManyThrough(
            GroupPermUser::class,
            PermUser::class,
        )
        // ->whereHas('area', function ($q) use ($modules): void {
        //    $q->whereIn('area_define_name', $modules);
        // })
        // ->with('area')
        ;

        return $rows;
    }

    /**
     * return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\HasManyThrough.
     */
    public function permUserRights(): HasManyThrough
    {
        $modules = Module::getOrdered();
        $modules = array_keys($modules);

        $rows = $this->hasManyThrough(
            PermUserRight::class,
            PermUser::class,
        )
        // ->whereHas('area', function ($q) use ($modules): void {
        //    $q->whereIn('area_define_name', $modules);
        // })
        // ->with('area')
        ;

        return $rows;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function areas()
    {
        // return $this->hasManyDeep(Area::class, [PermUser::class, AreaPermUser::class]);
        // return $this->hasManyDeepFromRelations($this->permUsers(), (new PermUser())->areas());
        // return $this->areaPermUsers();
        $perm = $this->perm;
        if (null === $perm && null !== $this->getKey()) {
            $perm = PermUser::query()->firstOrCreate(['user_id' => $this->getKey()]);
        }

        if (null === $perm /* && ! null !== ($this->getKey()) */) {
            return $this->areaPermUsers();
        }
        /*
        if (null == $this->perm) {
            throw new \Exception('perm is null');
        }
        */

        // ci dovremmo mettere un controllo(?),
        // se sono superAdmin vorrei vedere tutti i moduli (solo attivi?)

        return $perm->areas();

        // dddx($res->toSql());

        // return $res;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function areasUsed()
    {
        // lista moduli utilizzati in questa base
        return $this->areas()->whereIn('area_define_name', Module::getByStatus(1));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function groups()
    {
        // if (null == $this->perm && ! isset($this->user_id)) {
        /*
        return $this->hasManyThrough(
            GroupPermUser::class,
            PermUser::class,
            //'user_id',
            //'perm_user_id',
            //'user_id',
            //'perm_user_id'
        );
        */
        // }
        // if (null == $this->perm) {
        //    throw new \Exception('perm is null');
        // }
        $perm = $this->perm;
        if (null === $perm && null !== $this->getKey()) {
            $perm = PermUser::query()->firstOrCreate(['user_id' => $this->getKey()]);
        }

        if (null === $perm) {
            // Illuminate\Database\Eloquent\Relations\BelongsToMany|Illuminate\Database\Eloquent\Relations\HasManyThrough but returns
            // Illuminate\Database\Eloquent\Builder|Illuminate\Database\Eloquent\Relations\HasManyThrough.
            return $this->groupPermUsers();
        }

        return $perm->groups();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function rights()
    {
        // /if (null == $this->perm && ! isset($this->user_id)) {
        /*
        return $this->hasManyThrough(
                UserRight::class,
                PermUser::class,
                //'user_id',
                //'perm_user_id',
                //'user_id',
                //'perm_user_id'
            );
        */
        // }
        // dddx($this->perm);
        // if (null == $this->perm) {
        //    throw new \Exception('perm is null');
        // }
        $perm = $this->perm;
        if (null === $perm && null !== $this->getKey()) {
            $perm = PermUser::query()->firstOrCreate(['user_id' => $this->getKey()]);
        }

        if (null === $perm) {
            return $this->permUserRights();
        }

        return $perm->rights();
    }
}
