<?php

namespace Modules\LU\Models\Panels\Actions;

//-------- models -----------
//use Modules\Progressioni\Models\Schede;
//use Modules\Progressioni\Models\Coeff;
use Modules\LU\Models\Area;
use Modules\LU\Models\PermUser;
//-------- services --------
//-------- bases -----------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

class SyncAreas extends XotBasePanelAction {
    public $name = 'rate'; //name for calling Action
    public $rows;

    /**
     * Indicates if this action is only available on the resource index view.
     *
     * @var bool
     */
    //public $onlyOnIndex = true; //onlyContainer
    public $onContainer = true; //onlyContainer
    /**
     * Indicates if this action is only available on the resource detail view.
     *
     * @var bool
     */
    //public $onlyOnDetail = true; //onlyItem

    /*
    public function __construct($data){
        $this->data=$data;
    }
    */
    public function setRows($rows) {
        $this->rows = $rows;
    }

    public function btn() {
        //*
        $request = \Request::capture();
        $url = $request->fullUrlWithQuery(['_act' => $this->name]);

        return '<a href="'.$url.'" class="btn btn-warning">
			<i class="fas fa-sync"></i>&nbsp;
			</a>';
        //*/
            /*
        $parz=[];
    $parz['container0']=$row->post_type;
    $parz['item0']=$row->guid;
    $parz['container1']='rating';
    $rating_url=route('container0.container1.index_edit',$parz);
        */
        /*
        return '<button type="button" class="btn btn-red btn-danger" data-toggle="modal" data-target="#myModalAjax" data-title="rate it" data-href="{{ $rating_url }}">
            <span class="font-white"><i class="fa fa-star"></i> Vota !</span>
        </button>';
        */
    }

    //-- Perform the action on the given models.
    public function handle() {
        //to do
        $modules = \Module::all();
        foreach ($modules as $mod) {
            //echo '<br/>'.$mod->name;
            $area = Area::firstOrCreate(['area_define_name' => $mod->name]);
            $supers = PermUser::where('perm_type', '>=', 5)->get();
            foreach ($supers as $super) {
                $super->areas()->syncWithoutDetaching($area->area_id);
            }
        }
        //ddd($modules);
    }

    //end handle
}
