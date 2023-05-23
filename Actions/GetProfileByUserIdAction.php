<?php
/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */
declare(strict_types=1);

namespace Modules\LU\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\GetModelClassByModelTypeAction;
use Spatie\QueueableAction\QueueableAction;

class GetProfileByUserIdAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(?string $user_id): Model
    {
        $model_class = app(GetModelClassByModelTypeAction::class)->execute('profile');

        $model = app($model_class);

        if (null != $user_id) {
            $model = $model->firstWhere('user_id', $user_id);
        }

        if (null == $model) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }

        return $model;
    }
}
