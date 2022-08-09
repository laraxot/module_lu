<?php

declare(strict_types=1);

namespace Modules\LU\Models;

class Application extends BaseModel {
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'application_define_name'];
}
