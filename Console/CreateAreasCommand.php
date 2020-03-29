<?php

namespace Modules\LU\Console;

use Illuminate\Console\Command;
use Modules\LU\Models\Area;
use Modules\LU\Models\PermUser;
//----------------------------------------------------

//---- MODELS ----
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/*
-- CSV --
https://scotch.io/bar-talk/automate-tasks-by-creating-custom-artisan-command-in-laravel

-- nice example --
https://mattstauffer.com/blog/advanced-input-output-with-artisan-commands-tables-and-progress-bars-in-laravel-5.1/

https://themsaid.com/building-testing-interactive-console-20160409/
https://www.cloudways.com/blog/custom-artisan-commands-laravel/


//-- da leggere
https://medium.com/@tomgrohl/using-php-traits-for-laravel-eloquent-relationships-7357901a01a4
https://medium.com/@josepostiga/how-i-managed-to-control-chaos-with-laravel-d47b9444a451

*/

class CreateAreasCommand extends Command {
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'lu:create-areas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create areas from module ';

    /**
     * Create a new command instance.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $modules = \Module::all();
        $superUsers = PermUser::where('perm_type', 5)->get();
        foreach ($modules as $k => $v) {
            $area = Area::firstOrCreate(['area_define_name' => $v->getName()]);
            foreach ($superUsers as $u) {
                $u->areas()->syncWithoutDetaching($area->area_id);
            }
            //echo $v->name;
        }
        $this->info('Success ! Areas Created !');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments() {
        return [
            //  ['name', InputArgument::REQUIRED, 'nickname of user'],
            //  ['level', InputArgument::REQUIRED, 'level of user'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions() {
        return [
            ['list', null, InputOption::VALUE_OPTIONAL, 'list all users.', null],
        ];
    }
}
