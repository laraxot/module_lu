<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\ModelHasRole.
 */
class ModelHasRole extends BasePivot {
    protected $fillable=['role_id','model_type','model_id'];

}
