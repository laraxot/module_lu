<?php

declare(strict_types=1);

namespace Modules\LU\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
//use Laravel\Scout\Searchable;
use Modules\Theme\Services\ThemeService;
//use Modules\Xot\Traits\Updater;

use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * Modules\LU\Models\Area.
 *
 * @property int                                                                         $area_id
 * @property int                                                                         $application_id
 * @property string                                                                      $area_define_name
 * @property string                                                                      $db
 * @property string                                                                      $img
 * @property string                                                                      $icons
 * @property int                                                                         $ordine
 * @property string                                                                      $controller_path
 * @property \Illuminate\Support\Carbon|null                                             $created_at
 * @property \Illuminate\Support\Carbon|null                                             $updated_at
 * @property string|null                                                                 $created_by
 * @property string|null                                                                 $updated_by
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\AreaAdminArea[] $areaAdminArea
 * @property int|null                                                                    $area_admin_area_count
 * @property mixed                                                                       $guid
 * @property mixed                                                                       $icon_src
 * @property mixed                                                                       $title
 * @property mixed                                                                       $url
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\PermUser[]      $perms
 * @property int|null                                                                    $perms_count
 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereAreaDefineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereControllerPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereDb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereIcons($value)
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
 */
class Area extends BaseModel {
    use HasRelationships;
    //use Searchable;
    //use Updater;
    //protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var string
     */
    protected $table = 'liveuser_areas';
    /**
     * @var string
     */
    protected $primaryKey = 'area_id';
    /**
     * @var string[]
     */
    protected $fillable = ['area_id', 'area_define_name'];
    /**
     * @var string[]
     */
    protected $appends = ['title', 'url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areaAdminArea() {
        return $this->hasMany(AreaAdminArea::class, 'area_id', 'area_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function perms() {
        $pivot = app(AreaAdminArea::class);
        $pivot_table = $pivot->getTable();
        $foreignPivotKey = 'area_id';
        $relatedPivotKey = 'perm_user_id';
        $parentKey = null;
        $relatedKey = null;
        $relation = null;

        return $this->belongsToMany(PermUser::class, $pivot_table,
            $foreignPivotKey,
            $relatedPivotKey,
            $parentKey,
            $relatedKey,
            $relation
        )
            ->using($pivot);
    }

    /**
     * @return \Staudenmeir\EloquentHasManyDeep\HasManyDeep
     */
    public function users() {
        $foreignKeys = ['area_id', 'perm_user_id', 'auth_user_id'];
        $localKeys = ['area_id', 'perm_user_id', 'auth_user_id'];

        return $this->hasManyDeep(User::class, [AreaAdminArea::class, PermUser::class], $foreignKeys, $localKeys);
    }

    /**
     * @return string
     */
    public function imageHtml(array $params = []) {
        //-- default vars
        $width = 200;
        $height = 200;
        \extract($params);

        return '<img src="'.asset($this->icon_src).'" width="'.$width.'" height="'.$height.'" />';
    }

    /**
     * @param mixed $value
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getUrlAttribute($value) {
        return url('admin/'.\mb_strtolower($this->area_define_name));
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
        $src = \mb_strtolower($this->area_define_name.'::img/icon.png');
        $src = ThemeService::asset($src);

        return $src;
    }

    //---------------------------------------------------------------------------

    //----
}//---------end class Areas