<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseMorphPivot.
 */
abstract class BaseMorphPivot extends MorphPivot {
    use HasFactory;
    use Updater;
    /*
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool

     public static $snakeAttributes = true;
    */

    /**
     * Undocumented variable.
     *
     * @var int
     */
    protected $perPage = 30;

    /**
     * @var string
     */
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton

    /**
     * @var array
     */
    protected $appends = [];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var bool
     */
    public $timestamps = true;

    // protected $attributes = ['related_type' => 'cuisine_cat'];

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        // 'published_at',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'post_id', 'post_type',
        'related_type',
        'user_id',
        'note',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory() {
        return FactoryService::newFactory(static::class);
    }
}