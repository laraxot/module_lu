<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends BaseModel {
    protected $fillable = ['id', 'group_type', 'group_define_name', 'owner_user_id', 'owner_group_id', 'is_active'];

    /**
     * Undocumented function.
     */
    public function groupPermUsers(): HasMany {
        return $this->hasMany(GroupPermUser::class);
    }

    // ---------------------------------------------------------------------------
}
