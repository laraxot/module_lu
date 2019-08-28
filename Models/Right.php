<?php



namespace Modules\LU\Models;

use Modules\Xot\Models\XotBaseModel;

/*
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;
*/
class Right extends XotBaseModel
{
    //use Searchable;
    //use Updater;
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_rights';
    protected $primaryKey = 'right_id';

    protected $fillable = ['right_id', 'area_id', 'right_define_name','has_implied','has_level'];

    /*
    public static function filter($params){
        $rows=new self;
        extract($params);
        return $rows;
    }
    */
    //---- per il multiselect ---
    public function label()
    {
        return $this->right_id.'] '.$this->right_define_name;
    }

    public function key()
    {
        return $this->right_id;
    }

    public function keyName()
    {
        return 'right_id';
    }

    //--------- mutators --------
    public function getOptKeyAttribute($value){
        return $this->right_id;
    }
    public function getOptLabelAttribute($value){
        return $this->right_id.'] '.$this->right_define_name;
    }

    public function setRightsAttribute($value){
        ddd('aaa');
    }

}
