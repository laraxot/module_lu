<?php
namespace Modules\LU\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\Relation; // per dizionario morph 
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

//---- Base ---
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider{
	protected $moduleNamespace = 'Modules\LU\Http\Controllers';
    protected $module_name='lu';
    protected $module_dir= __DIR__;
    protected $module_ns=__NAMESPACE__;
}