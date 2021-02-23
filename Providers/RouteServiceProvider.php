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

declare(strict_types=1);

namespace Modules\LU\Providers;

// per dizionario morph

//---- Base ---
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

/**
 * Class RouteServiceProvider.
 */
class RouteServiceProvider extends XotBaseRouteServiceProvider {
    protected string $moduleNamespace = 'Modules\LU\Http\Controllers';

    protected string $module_name = 'lu';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
