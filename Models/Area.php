<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Modules\Theme\Services\ThemeService;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * Modules\LU\Models\Area.
 *
 * @property int                                                                                            $id
 * @property int                                                                                            $application_id
 * @property string                                                                                         $area_define_name
 * @property string                                                                                         $db
 * @property string                                                                                         $img
 * @property string                                                                                         $icons
 * @property int                                                                                            $ordine
 * @property string                                                                                         $controller_path
 * @property \Illuminate\Support\Carbon|null                                                                $created_at
 * @property \Illuminate\Support\Carbon|null                                                                $updated_at
 * @property string|null                                                                                    $created_by
 * @property string|null                                                                                    $updated_by
 * @property string                                                                                         $guid
 * @property bool|mixed|string                                                                              $icon_src
 * @property string|string[]                                                                                $title
 * @property \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string $url
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\PermUser[]                         $permUsers
 * @property int|null                                                                                       $perm_users_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\PermUser[]                         $perms
 * @property int|null                                                                                       $perms_count
 * @method static \Modules\LU\Database\Factories\AreaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereAreaDefineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereControllerPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereDb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereIcons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereOrdine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property string|null $icon_path
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $deleted_ip
 * @property string|null $created_ip
 * @property string|null $updated_ip
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCreatedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereDeletedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereGuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereIconPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUpdatedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUrl($value)
 * @mixin IdeHelperArea
 */
class Area extends BaseModel {
    use HasRelationships;
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'area_define_name'];
    /**
     * @var string[]
     */
    protected $appends = ['title', 'url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function perms() {
        $pivot_class = AreaPermUser::class;
        $pivot = app($pivot_class);
        $pivot_table = $pivot->getTable();
        // $foreignPivotKey = 'area_id';
        // $relatedPivotKey = 'perm_user_id';
        // $parentKey = null;
        // $relatedKey = null;
        // $relation = null;

        return $this->belongsToMany(
            PermUser::class
            // , $pivot_table,
            // $foreignPivotKey,
            // $relatedPivotKey,
            // $parentKey,
            // $relatedKey,
            // $relation
        )
            ->using($pivot_class);
    }

    /**
     * @return \Staudenmeir\EloquentHasManyDeep\HasManyDeep
     */
    public function users() {
        $foreignKeys = ['area_id', 'perm_user_id', 'user_id'];
        $localKeys = ['area_id', 'perm_user_id', 'user_id'];

        // return $this->hasManyDeep(User::class, [AreaPermUser::class, PermUser::class], $foreignKeys, $localKeys);

        /*
        Unknown column liveuser_perm_users.area_id
        select count(*) as aggregate from `liveuser_users`
        inner join `liveuser_area_perm_user`
        on `liveuser_area_perm_user`.`user_id` = `liveuser_users`.`id`
        inner join `liveuser_perm_users`
        on `liveuser_perm_users`.`id` = `liveuser_area_perm_user`.`perm_user_id`
        where `liveuser_perm_users`.`area_id` = 7
        */
        // return $this->hasManyDeep(User::class, [PermUser::class, AreaPermUser::class]);

        /*
        Unknown column liveuser_users.perm_user_id
        select count(*) as aggregate from `liveuser_users`
        inner join `liveuser_perm_users`
        on `liveuser_perm_users`.`id` = `liveuser_users`.`perm_user_id`
        inner join `liveuser_area_perm_user`
        on `liveuser_area_perm_user`.`perm_user_id` = `liveuser_perm_users`.`id`
        where `liveuser_area_perm_user`.`area_id` = 7
        */

        $foreignKeys = [null, null, 'id'];
        $localKeys = [null, null, 'user_id'];

        return $this->hasManyDeep(User::class, [AreaPermUser::class, PermUser::class], $foreignKeys, $localKeys);

        // return $this->hasManyDeepFromRelations($this->permUsers(), (new PermUser())->user());

        // */

        // dddx(\Auth::user()->perm->user);
    }

    public function permUsers(): BelongsToMany {
        return $this->belongsToMany(PermUser::class);
    }

    public function imageHtml(array $params = []): string {
        // -- default vars
        $width = 200;
        $height = 200;
        extract($params);

        return '<img src="'.asset($this->icon_src).'" width="'.$width.'" height="'.$height.'" />';
    }

    /**
     * @param mixed $value
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getUrlAttribute($value) {
        return url('admin/'.mb_strtolower($this->area_define_name));
    }

    /**
     * @param mixed $value
     *
     * @return string|string[]
     */
    public function getTitleAttribute($value) {
        $title = $this->area_define_name;
        $title = str_replace('_', ' ', $title);

        return $title;
    }

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function getGuidAttribute($value) {
        return Str::slug($this->area_define_name);
    }

    /**
     * @param mixed $value
     *
     * @return bool|mixed|string
     */
    public function getIconSrcAttribute($value) {
        $src = mb_strtolower($this->area_define_name.'::img/icon.png');
        $src = ThemeService::asset($src);

        return $src;
    }

    // ---------------------------------------------------------------------------
    /*
    public function area() {
        return $this->hasOne(self::class, 'id', 'id');
    }
    */
    // ----
}// ---------end class Areas
