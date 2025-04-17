<?php

declare(strict_types=1);

namespace Modules\LU\Providers;

// per dizionario morph

// ---- Base ---
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

/**
 * Class RouteServiceProvider.
 */
class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    protected string $moduleNamespace = 'Modules\LU\Http\Controllers';

    protected string $module_name = 'lu';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
