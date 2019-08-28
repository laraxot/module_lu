<?php
namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use Laravel\Scout\Searchable;
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Traits\Updater;

class AreaAdminArea extends Pivot{
    use Searchable;
    use Updater;
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_area_admin_areas';
    //protected $primaryKey = 'auth_user_id'; ha 2 keys
    protected $primaryKey = 'id'; //array da errore su hasManyThrough
    protected $fillable=['id','area_id','perm_user_id'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'area_id');
    }

    public function permUser()
    {
        return $this->belongsTo(PermUser::class, 'perm_user_id', 'perm_user_id');
    }

    //------------------------------------
    public static function filter($params)
    {
        $rows = new self();
        \extract($params);
        if (isset($id_user)) {
            $user = User::find($id_user);
            $perm_user_id = $user->perm_user_id();
            $rows = $rows->where('perm_user_id', $perm_user_id);
        }

        return $rows;
    }

    public function getAreaDefineNameAttribute($value)
    {
        /*
        $area = $this->area();
        return $area->first()->area_define_name;
        */
        $area=$this->area;
        if(!is_object($area)) return $value;
        return $area->area_define_name;
       
    }

    public function getUrlAttribute($value)
    {
        $area=$this->area;
        if(!is_object($area)) return $value;
        return $area->url;
       
    }

    public function getIconSrcAttribute($value)
    {
        $area=$this->area;
        if(!is_object($area)) return $value;
        return $area->icon_src;
       
    }

    /**
     * { item_description }.
     */
    //-----------------------------------------------------------------------------------
    public function dashboard_widget()
    {
        $view = \mb_strtolower($this->area_define_name).'::admin.dashboard_widget';
        if (\View::exists($view)) {
            return view($view)->with('row', $this);
        } else {
            return view('lu::admin.dashboard_widget_default')->with('row', $this);
        }
    }

    /**
     * { item_description }.
     */
    public function a_href()
    {
        return url('admin/'.\mb_strtolower($this->area_define_name));
    }

    //-----------------------------------------------------------------------------
    public function icon_src()
    {
        //*
        /*
        $path= \XRA\XRA\Packages::menuxml($this->area_define_name).'/admin/icon.png';


        $path=realpath($path);

        if(file_exists($path)){
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            return $base64;
        }else{
            //echo $path; die();
        }
        */
        $src = \mb_strtolower($this->area_define_name.'::img/icon.png');
        return ThemeService::asset($src);
        //$srcz = ThemeService::viewNamespaceToUrl([$src]);

        //dd($srcz);
        //$src = $srcz[0];

        //$newsrc = ThemeService::getFileUrl($src);

        //return $newsrc;

        // */
    //return asset('icons/'.$this->area_define_name.'/icon.png');
    /*
    if($this->icon_path==null){
        $this->icon_path='/icon/'.$this->area_define_name.'/icon.png';
        $this->save();
    }
    return asset($this->icon_path);
    */
    }


    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(){
        $row=$this;
        $fields=[];
        $fillables=$row->getFillable();
        //$fillables=['auth_user_id','handle','firstname','surname','last_login_at'];
        foreach($fillables as $input_name){
            $input_type=$row->getConnection()->getDoctrineColumn($row->getTable(),$input_name)->getType();//->getName();
            //$input_type='bs'.(string)$input_type;
            //if($input_type=='bsString'){ //devo crearli per ora solo tampone
            //    $input_type='bsText';
            //}
            //echo Form::$input_type($input_name);
            $tmp=new \stdClass();
            $tmp->type=(string)$input_type;
            $tmp->name=$input_name;
            $fields[]=$tmp;

        }
        //dd($res);
        return $fields;
    }

}//---end class
