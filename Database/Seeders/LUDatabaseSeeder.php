<<<<<<< HEAD
<?php

namespace Modules\LU\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class LUDatabaseSeeder
 * @package Modules\LU\Database\Seeders
 */
class LUDatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run() {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\LU\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class LUDatabaseSeeder.
 */
class LUDatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run() {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
