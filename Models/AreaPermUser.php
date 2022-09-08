<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\View;
use Modules\Theme\Services\ThemeService;

/**
 * Modules\LU\Models\AreaPermUser.
 *
 * @property int                              $id
 * @property int|null                         $area_id
 * @property int|null                         $perm_user_id
 * @property \Illuminate\Support\Carbon|null  $created_at
 * @property \Illuminate\Support\Carbon|null  $updated_at
 * @property string|null                      $created_by
 * @property string|null                      $updated_by
 * @property \Modules\LU\Models\Area|null     $area
 * @property string|null                      $area_define_name
 * @property string|null                      $icon_src
 * @property string|null                      $title
 * @property \Modules\LU\Models\PermUser|null $permUser
 *
 * @method static \Modules\LU\Database\Factories\AreaPermUserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPermUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPermUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPermUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPermUser whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPermUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPermUser whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPermUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPermUser wherePermUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPermUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPermUser whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class AreaPermUser extends BasePivot {
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'area_id', 'perm_user_id'];
    /**
     * @var string[]
     */
    protected $appends = ['title', 'url', 'icon_src'];

    public function area(): BelongsTo {
        return $this->belongsTo(Area::class);
    }

    public function permUser(): BelongsTo {
        return $this->belongsTo(PermUser::class);
    }

    // ------------MUTATORS -------------

    public function getAreaDefineNameAttribute(?string $value): ?string {
        $area = $this->area;
        if (! \is_object($area)) {
            return $value;
        }

        return $area->area_define_name;
    }

    public function getTitleAttribute(?string $value): ?string {
        $area_define_name_scope = '';

        if (! empty($this->area_define_name)) {
            $area_define_name_scope = $this->area_define_name;
        }

        $title = str_replace('_', ' ', $area_define_name_scope);

        return $title;
    }

    /*
    public function getUrlAttribute(?string $value): ?string
    {
        $area = $this->area;
        if (! is_object($area)) {
            return $value;
        }
    // 94     Method Modules\LU\Models\AreaPermUser::getUrlAttribute() should return string|null
    //cbut returns Illuminate\Contracts\Foundation\Application|Illuminate\Contracts\Routing\UrlGenerator|string.


        return $area->url;
    }
    */

    public function getIconSrcAttribute(?string $value): ?string {
        $area = $this->area;
        if (! \is_object($area)) {
            return $value;
        }

        $icon_src = $area->icon_src;
        if (! is_string($icon_src)) {
            return null;
        }

        return $icon_src;
    }

    public function dashboard_widget(): ViewContract {
        $area_define_name_scope = '';

        if (! empty($this->area_define_name)) {
            $area_define_name_scope = $this->area_define_name;
        }

        $view = mb_strtolower($area_define_name_scope).'::admin.dashboard_widget';
        $view_params = ['row' => $this];
        // if (view()->exists($view)) {
        if (View::exists($view)) {
            // return view()->make($view)->with('row', $this);
            // Call to an undefined method Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View::make()
            return View::make($view, $view_params);
        } else {
            // Call to an undefined method Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View::make()
            // return view()->make('lu::admin.dashboard_widget_default', $view_params);
            return View::make('lu::admin.dashboard_widget_default', $view_params);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function a_href() {
        return url('admin/'.mb_strtolower((string) $this->area_define_name));
    }

    // -----------------------------------------------------------------------------

    public function icon_src(): string {
        $src = mb_strtolower($this->area_define_name.'::img/icon.png');

        return ThemeService::asset($src);
    }
}// ---end class
