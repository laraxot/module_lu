<?php

declare(strict_types=1);

namespace Modules\LU\Casts;

use Exception;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Modules\Xot\Contracts\ModelWithUserContract;

class UserField implements CastsAttributes {
    /**
     * Cast the given value.
     *
     * param \Illuminate\Database\Eloquent\Model $model
     *
     * @param ModelWithUserContract $model
     * @param string                $key
     * @param mixed                 $value
     * @param array                 $attributes
     *
     * @return mixed
     */
    public function get($model, $key, $value, $attributes) {
        // dddx(['model' => $model, 'key' => $key, 'value' => $value, 'attributes' => $attributes, 'data' => request()->all()]);
        // Access to an undefined property Illuminate\Database\Eloquent\Model::$user.
        if (null === $model->user) {
            return null;
        }

        return $model->user->{$key};
    }

    /**
     * Prepare the given value for storage.
     *
     * param \Illuminate\Database\Eloquent\Model $model
     *
     * @param ModelWithUserContract $model
     * @param string                $key
     * @param mixed                 $value
     * @param array                 $attributes
     */
    public function set($model, $key, $value, $attributes) {
        // Access to an undefined property Illuminate\Database\Eloquent\Model::$user.
        $user = $model->user;
        if (null === $user) {
            return [];
            /*
            dddx([
                'model'=>$model,
                'key'=>$key,
                'value'=>$value,
                'attributes'=>$attributes,
            ]);
            throw new Exception('['.__LINE__.']['.__FILE__.']');
            */
        }
        $up = [
            $key => $value,
        ];
        $user->update($up);
        // $user->{$key} = $value;
        // Call to an undefined method Illuminate\Support\HigherOrderTapProxy<mixed>::save().
        // $res = tap($user)->save();
        // parent::__construct([]);
        // return [$key => encrypt($value)];
        // return ['created_by' => 'xot'];
        return []; // tolgo l'aggiornamento di questo campo
    }
}
