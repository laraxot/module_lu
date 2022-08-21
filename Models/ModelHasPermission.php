<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\ModelHasPermission.
 */
class ModelHasPermission extends BasePivot {
    protected $fillable=['permission_id','model_type','model_id'];

}
