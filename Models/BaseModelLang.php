<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// //use Laravel\Scout\Searchable;
// ---------- traits
//
use Illuminate\Database\Eloquent\Model;
use Modules\Lang\Models\Traits\LinkedTrait;
use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModelLang.
 */
abstract class BaseModelLang extends Model {
    use HasFactory;
    // use Searchable;
    use LinkedTrait;
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
     * @var string[]
     */
    protected $fillable = ['id'];

    /**
     * @var array
     */
    protected $casts = [
        // 'published_at' => 'datetime:Y-m-d', // da verificare
    ];

    /**
     * @var string[]
     */
    protected $dates = ['published_at', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var array
     */
    protected $hidden = [
        // 'password'
    ];

    /**
     * @var bool
     */
    public $timestamps = true;

    // -----------
    /*
    protected $id;
    protected $post;
    protected $lang;
    */

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory() {
        return FactoryService::newFactory(static::class);
    }
}