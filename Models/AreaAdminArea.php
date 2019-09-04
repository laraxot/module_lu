<?php

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Laravel\Scout\Searchable;
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Traits\Updater;

class AreaAdminArea extends Pivot {
    use Searchable;
    use Updater;
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_area_admin_areas';
    protected $primaryKey = 'id'; //array da errore su hasManyThrough
    protected $fillable = ['id', 'area_id', 'perm_user_id'];

    public function area() {
        return $this->belongsTo(Area::class, 'area_id', 'area_id');
    }

    public function permUser() {
        return $this->belongsTo(PermUser::class, 'perm_user_id', 'perm_user_id');
    }

    //------------MUTATORS -------------

    public function getAreaDefineNameAttribute($value) {
        $area = $this->area;
        if (! is_object($area)) {
            return $value;
        }

        return $area->area_define_name;
    }

    public function getUrlAttribute($value) {
        $area = $this->area;
        if (! is_object($area)) {
            return $value;
        }

        return $area->url;
    }

    public function getIconSrcAttribute($value) {
        $area = $this->area;
        if (! is_object($area)) {
            return $value;
        }

        return $area->icon_src;
    }

    /**
     * da spostare in panel ?
     *
     **/
    //-----------------------------------------------------------------------------------
    public function dashboard_widget() {
        $view = \mb_strtolower($this->area_define_name).'::admin.dashboard_widget';
        if (\View::exists($view)) {
            return view($view)->with('row', $this);
        } else {
            return view('lu::admin.dashboard_widget_default')->with('row', $this);
        }
    }

    public function a_href() {
        return url('admin/'.\mb_strtolower($this->area_define_name));
    }

    //-----------------------------------------------------------------------------
    public function icon_src() {
        $src = \mb_strtolower($this->area_define_name.'::img/icon.png');

        return ThemeService::asset($src);
    }
}//---end class
