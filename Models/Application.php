<?php



namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Extend\Traits\Updater;

class Application extends Model
{
    use Updater;
    use Searchable;

    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_applications';
    protected $primaryKey = 'application_id';
}
