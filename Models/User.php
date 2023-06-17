<?php

/**
 * @see http://laraveldaily.com/save-users-last-login-time-ip-address/
 */

declare(strict_types=1);

namespace Modules\LU\Models;

// use Illuminate\Contracts\Auth\UserProvider as UserContract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
// use Spatie\Tags\HasTags;  // Spatie Tags;
use Modules\LU\Database\Factories\UserFactory;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Traits\Updater;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class User extends Authenticatable implements UserContract {
    use HasApiTokens;
    use HasFactory;
    use HasRelationships;
    // use HasTags;
    use Notifiable;
    use Traits\Extras\UserExtra; // spatie tags
    use Traits\Mutators\UserMutator;
    use Traits\Relationships\UserRelationship;
    use Updater;
    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    protected $perPage = 30;

    /**
     * @var string
     */
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton

    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'ente', 'matr',
        'handle', 'passwd', 'email',
        'last_name', 'first_name',
        'last_login_at', 'last_login_ip',
        // 'api_token', //using passport
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var string[]
     */
    protected $dates = ['last_login_at', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @var array<string, string>
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    public $timestamps = true;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory() {
        return UserFactory::new();
    }

    // /*
    // public function __construct() {
        // $this->table = DB::connection($this->connection)->getDatabaseName().'.'.$this->getTable();
        // DB::connection($this->connection)->setTablePrefix('aa');
    // }
    // */

    // public function getTable() {
        // dddx([DB::connection($this->connection)->getDatabaseName(), parent::getTable()]);
        // We ask the database name on the connection and prepare that for the table name with a . in between.
        // Unknown database 'liveuser_liveuser_geek_lu'
        // return DB::connection($this->connection)->getDatabaseName().'.'.parent::getTable();
    // }

    public function getApiTokenAttribute(?string $value): string {
        if (null !== $value) {
            return $value;
        }
        $value = hash('sha256', Str::random(60));
        $this->api_token = $value;
        $this->save();

        return $value;
    }
}
