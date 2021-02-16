<<<<<<< HEAD
<?php

namespace Modules\LU\Models\Panels\Actions;

//-------- services --------
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

//-------- bases -----------

/**
 * Class TestUsersWithLivewireAction
 * @package Modules\LU\Models\Panels\Actions
 */
class TestUsersWithLivewireAction extends XotBasePanelAction {
    /**
     * @var bool
     */
    public bool $onContainer = true;
    /**
     * @var bool
     */
    public bool $onItem = false;
    //public string $icon = '<i class="fa fa-edit"></i>';

    //-- Perform the action on the given models.
    /**
     * @return mixed
     */
    public function handle() {
        //dddx([request()['panel'], request()->input('panel')]);
        ///$view = 'lu::users.'.$this->getName();

        //return $view;
        return $this->panel->view();

        //return ThemeService::view($view)
        //    ->with('row', $this->row);
        //ddd($this->row);
    }

    public function postHandle() {
        dddx('postHandle');
        //dddx(get_defined_vars());
        /*
        $up = $this->updateRow();
        $this->setRow($up->row);

        return $this->handle();
        */
    }
}
=======
<?php

namespace Modules\LU\Models\Panels\Actions;

//-------- services --------
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

//-------- bases -----------

/**
 * Class TestUsersWithLivewireAction
 * @package Modules\LU\Models\Panels\Actions
 */
class TestUsersWithLivewireAction extends XotBasePanelAction {
    /**
     * @var bool
     */
    public bool $onContainer = true;
    /**
     * @var bool
     */
    public bool $onItem = false;
    //public string $icon = '<i class="fa fa-edit"></i>';

    //-- Perform the action on the given models.
    /**
     * @return mixed
     */
    public function handle() {
        //dddx([request()['panel'], request()->input('panel')]);
        ///$view = 'lu::users.'.$this->getName();

        //return $view;
        return $this->panel->view();

        //return ThemeService::view($view)
        //    ->with('row', $this->row);
        //ddd($this->row);
    }

    public function postHandle() {
        dddx('postHandle');
        //dddx(get_defined_vars());
        /*
        $up = $this->updateRow();
        $this->setRow($up->row);

        return $this->handle();
        */
    }
}
>>>>>>> ae14cf9 (first)
