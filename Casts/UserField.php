<?php

declare(strict_types=1);

namespace Modules\LU\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class UserField implements CastsAttributes {
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param mixed                               $value
     * @param array                               $attributes
     *
     * @return mixed
     */
    public function get($model, $key, $value, $attributes) {
        // dddx(['model' => $model, 'key' => $key, 'value' => $value, 'attributes' => $attributes, 'data' => request()->all()]);
        //Access to an undefined property Illuminate\Database\Eloquent\Model::$user.
        return $model->user->{$key};
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param mixed                 $value
     * @param array                               $attributes
     */
    public function set($model, $key, $value, $attributes) {
        //Access to an undefined property Illuminate\Database\Eloquent\Model::$user. 
        $user = $model->user;
        $user->{$key} = $value;
        //Call to an undefined method Illuminate\Support\HigherOrderTapProxy<mixed>::save().  
        $res = tap($user)->save();
        // parent::__construct([]);
        // return [$key => encrypt($value)];
        // return ['created_by' => 'xot'];
        return []; // tolgo l'aggiornamento di questo campo
    }
}