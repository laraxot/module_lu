<?php
namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Traits\Updater;

class Area extends Model {
    use Searchable;
    use Updater;
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_areas';
    protected $primaryKey = 'area_id';
    protected $fillable = ['area_id', 'area_define_name', 'url'];

    public function areaAdminArea(){
        return $this->hasMany(AreaAdminArea::class, 'area_id', 'area_id');
    }

    public function imageHtml($params = []){
        \extract($params);
        return '<img src="'.asset($this->icon_src).'" width="'.$width.'" height="'.$height.'" />';
    }

    public function getUrlAttribute($value){
        return url('admin/'.\mb_strtolower($this->area_define_name));
    }

    public function getGuidAttribute($value){   
        return str_slug($this->area_define_name);
    }
    

    //---------------------------------------------------------------------------

    
   

    //----

}//---------end class Areas
