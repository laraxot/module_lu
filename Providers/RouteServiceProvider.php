<?php

namespace Modules\LU\Providers;

// per dizionario morph

//---- Base ---
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider {
    protected $moduleNamespace = 'Modules\LU\Http\Controllers';
    protected $module_name = 'lu';
    protected $module_dir = __DIR__;
    protected $module_ns = __NAMESPACE__;
}
