<?php
namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

class Group extends Model
{
    //use Searchable;
    use Updater;

    protected $connection = 'liveuser_general';
    protected $table = 'liveuser_groups';
    protected $primaryKey = 'group_id';

    protected $fillable = ['group_id', 'group_type', 'group_define_name','owner_user_id','owner_group_id','is_active'];

    public function search()
    {
        return $this;
    }

    public function GroupUser()
    {
        return $this->hasMany(GroupUser::class, 'group_id', 'group_id');
    }

    public function label()
    {
        return $this->group_id.'] '.$this->group_define_name;
    }

    public function key()
    {
        return $this->group_id;
    }

    public function keyName()
    {
        return 'group_id';
    }

    /*
    function AreaAdminAreas(){
        return $this->hasMany('AreaAdminAreas','area_id','area_id');
    }
    */
    public static function full()
    {
        $rows = new self();

        return $rows;
    }

    //--------- mutators --------
    public function getOptKeyAttribute($value){
        return $this->group_id;
    }
    public function getOptLabelAttribute($value){
        return $this->group_id.'] '.$this->group_define_name;
    }

    //---------------------------------------------------------------------------
    public static function filter($params)
    {
        $rows = new self();
        \extract($params);
        //echo '<pre>';print_r($params);echo '</pre>'
        if (isset($id_user)) {
            $user = User::find($id_user);
            $rows = $user->groups();
        } else {
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
            $tmp=new \stdClass();
            $tmp->type=(string)$input_type;
            $tmp->name=$input_name;
            $fields[]=$tmp;

        }
        return $fields;
        */
        $fields=[
            0=>(object) [
            "type"=> "Integer",
            "name"=> "group_id",
            ],
            1 =>(object)  [
            "type"=> "Integer",
            "name"=> "group_type",
            ],
            2 =>(object)  [
            "type"=> "String",
            "name"=> "group_define_name",
            ],
            3 =>(object)  [
            "type"=> "Integer",
            "name"=> "owner_user_id",
            ],
            4 =>(object)  [
            "type"=> "Integer",
            "name"=> "owner_group_id",
            ],
            5 =>(object)  [
            "type"=> "String",
            "name"=> "is_active",
            ],
        ];
        return $fields;
    }
}
