<?php
namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Traits\Updater;

class Area extends Model
{
    use Searchable;
    use Updater;
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_areas';
    protected $primaryKey = 'area_id';

    protected $fillable = ['area_id', 'area_define_name', 'url'];

    /*
    function PermUser(){
      return $this->hasOne(PermUser::class,'perm_user_id', 'perm_user_id');
    }
    */
    /*
    public function getTestAttribute($value){
        return 'test';
    }

    public function getRouteKeyName()
    {
        //return \inAdmin() ? 'post_id' : 'guid';
        return 'guid';
    }
    */
    public function areaAdminArea()
    {
        return $this->hasMany(AreaAdminArea::class, 'area_id', 'area_id');
    }

    public function label()
    {
        return $this->area_id.'] '.$this->area_define_name;
    }

    public function key()
    {
        return $this->area_id;
    }

    public function keyName()
    {
        return 'area_id';
    }

    public function imageHtml($params = [])
    {
        \extract($params);

        return '<img src="'.asset($this->icon_src).'" width="'.$width.'" height="'.$height.'" />';
    }

    public function getUrlAttribute($value)
    {
        return url('admin/'.\mb_strtolower($this->area_define_name));
    }

    public function getGuidAttribute($value)
    {   
        //return 'aa';
        return str_slug($this->area_define_name);
    }
    public function getOptKeyAttribute($value){
        return $this->area_id;
    }
    public function getOptLabelAttribute($value){
        return $this->area_define_name;
    }
    public function getIconSrcAttribute($value)
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

    public static function full()
    {
        $rows = new self();

        return $rows;
    }

    //---------------------------------------------------------------------------
    public static function filter($params)
    {
        $rows = new self();
        \extract($params);
        //echo '<pre>';print_r($params);echo '</pre>';
        if (isset($id_user)) {
            $user = User::find($id_user);
            $rows = $user->areas();
        }
        if (isset($ente)) {
            $rows = $rows->where('ente', '=', $ente);
            //echo '<pre>';print_r($params);echo '</pre>';
        }
        if (isset($matr)) {
            $rows = $rows->where('matr', '=', $matr);
        }
        $datefield = 'data_start';
        if (isset($tipo)) {
            switch ($tipo) {
            case 1: $datefield = 'data_start'; break;
            case 2: $datefield = 'datemod'; break;
        }
        }

        if (isset($mese)) {
            $rows = $rows->whereMonth($datefield, $mese);
        }
        if (isset($anno)) {
            //$rows=$rows->whereYear($datefield,$anno);
            $rows = $rows->where('anno', $anno);
        }
        if (isset($stabi)) {
            $rows = $rows->where('stabi', $stabi);
        }
        if (isset($repar)) {
            $rows = $rows->where('repar', $repar);
        }

        if (isset($stati)) {
            $rows = $rows->whereRaw('find_in_set(last_stato,"'.$stati.'")');
        }
        //$rows=$rows->orderBy('data_start', 'desc');
        return $rows;
    }

    //end search
    //-----------------------------------------------------------------------------------
    public function dashboard_widget()
    {
        $view = \mb_strtolower($this->area_define_name).'::admin.dashboard_widget';
        $view_default = 'adm_theme::layouts.widgets.dashboard';
        $view_lu = 'lu::admin.dashboard_widget_default';
        
        //ddd($this->area_define_name);//Backend
        $model='\Modules\\'.$this->area_define_name.'\\Models\\'.$this->area_define_name;
        $module_names=array_keys(\Module::all());
        if(in_array($this->area_define_name,$module_names)){
            $model='\Modules\\'.$this->area_define_name.'\\Models\\'.$this->area_define_name;
        }else{
            //$model = '---';
            return ;
        }
        /*
        $namespace = config('xra.namespaces');
        if (isset($namespace[$this->area_define_name])) {
            $model = $namespace[$this->area_define_name].'\Models\\'.$this->area_define_name;
        } else {
            $model = '---';
        }
        */
        if (\class_exists($model)) {
            $model_obj = new $model();
        } else {
            $model_obj = new \stdClass();
        }
        $data = ['area' => $this, 'row' => $model_obj];

        return view()->first([$view, $view_default,$view_lu], $data);
        /*
        //if (\View::exists($view)) {
        if (view()->exists($view)) {
            $namespace=config('xra.namespaces');
            $model=$namespace[$this->area_define_name].'\Models\\'.$this->area_define_name;
            $model_obj=new $model;
            return view($view)->with('area', $this)->with('row',$model_obj);
        } else {
            return view('lu::admin.dashboard_widget_default')->with('row', $this);
        }
        */
    }

    //------------------------------------------------------------------------------------
    public static function syncPacks()
    {
        $vendors = \XRA\XRA\Packages::allVendors();
        $packs = [];
        foreach ($vendors as $vendor) {
            $tmp = \XRA\XRA\Packages::all($vendor);
            $packs = \array_merge($packs, $tmp);
        }
        $packs = collect(\array_combine($packs, $packs));
        $areas = self::all()->pluck('area_define_name', 'area_define_name');
        $adds = $packs->diff($areas)->all();
        $subs = $areas->diff($packs)->all();
        foreach ($adds as $add) {
            $row = new self();
            $row->area_define_name = $add;
            $row->save();
        }
        foreach ($subs as $sub) {
            self::where('area_define_name', $sub)->delete();
        }
    }

    //----
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(){
        /*
        $row=$this;
        $fields=[];
        foreach($row->getFillable() as $input_name){
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
        */
        $fields=[
            0 => (object) [
                "type" => "Integer",
                "name" => "area_id",
            ],

            1 => (object) [
                "type" => "String",
                "name" => "area_define_name",
            ],

            2 => (object) [
                    "type" => "String",
                    "name" => "url",
            ],

        ];

        return $fields;
    }
}//---------end class Areas
