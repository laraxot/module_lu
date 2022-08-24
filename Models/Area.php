<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Modules\Theme\Services\ThemeService;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * Modules\LU\Models\Area
 *
 * @property int $id
 * @property int $application_id
 * @property string $area_define_name
 * @property string $db
 * @property string $img
 * @property string $icons
 * @property int $ordine
 * @property string $controller_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $order_column
 * @property-read string $guid
 * @property-read bool|mixed|string $icon_src
 * @property-read string|null $title
 * @property-read \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string $url
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\PermUser[] $permUsers
 * @property-read int|null $perm_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\PermUser[] $perms
 * @property-read int|null $perms_count
 * @method static \Modules\LU\Database\Factories\AreaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area ordered(string $direction = 'asc')
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
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereOrdine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Area extends BaseModel implements Sortable {
    use SortableTrait;
    use HasRelationships;
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'area_define_name', 'order_column'];
    /**
     * @var string[]
     */
    protected $appends = ['title', 'url'];

    /**
     * Undocumented variable.
     *
     * @var array<string, string>
     */
    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

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

        if (! is_string($this->icon_src)) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        return '<img src="'.asset($this->icon_src).'" width="'.$width.'" height="'.$height.'" />';
    }

    /**
     * @param mixed $value
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getUrlAttribute($value) {
        if (! is_string($this->area_define_name)) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        return url('admin/'.mb_strtolower($this->area_define_name));
    }

    public function getTitleAttribute(?string $value): ?string {
        $title = $this->area_define_name;
        // if (is_null($title)) {
        //    throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        // }
        $title = str_replace('_', ' ', $title);

        return $title;
    }

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function getGuidAttribute($value) {
        if (null == ($this->area_define_name)) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

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
