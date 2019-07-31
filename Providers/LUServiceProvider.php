<?php

namespace Modules\LU\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;

use Illuminate\Database\Eloquent\Relations\Relation; // per dizionario morph 

//---- bases ----
use Modules\Xot\Providers\XotBaseServiceProvider;

class LUServiceProvider extends XotBaseServiceProvider{
    protected $module_dir= __DIR__;
    protected $module_ns=__NAMESPACE__;
    public $module_name='lu';
}