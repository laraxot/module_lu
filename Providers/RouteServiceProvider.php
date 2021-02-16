<<<<<<< HEAD
<?php

namespace Modules\LU\Providers;

// per dizionario morph

//---- Base ---
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Modules\LU\Providers
 */
class RouteServiceProvider extends XotBaseRouteServiceProvider {
    /**
     * @var string
     */
    protected string $moduleNamespace = 'Modules\LU\Http\Controllers';
    /**
     * @var string
     */
    protected string $module_name = 'lu';
    /**
     * @var string
     */
    protected string $module_dir = __DIR__;
    /**
     * @var string
     */
    protected string $module_ns = __NAMESPACE__;
}
=======
<?php

namespace Modules\LU\Providers;

// per dizionario morph

//---- Base ---
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Modules\LU\Providers
 */
class RouteServiceProvider extends XotBaseRouteServiceProvider {
    /**
     * @var string
     */
    protected string $moduleNamespace = 'Modules\LU\Http\Controllers';
    /**
     * @var string
     */
    protected string $module_name = 'lu';
    /**
     * @var string
     */
    protected string $module_dir = __DIR__;
    /**
     * @var string
     */
    protected string $module_ns = __NAMESPACE__;
}
>>>>>>> ae14cf9 (first)
