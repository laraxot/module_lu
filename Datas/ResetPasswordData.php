<?php

declare(strict_types=1);

namespace Modules\LU\Datas;

use Spatie\LaravelData\Data;

class ResetPasswordData extends Data {
    public function __construct(
        public string $line1,
        public string $action,
        public string $line2,
    ) {
    }
}
