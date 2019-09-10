<?php

namespace Modules\LU\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\InputArgument;
//----------------------------------------------------
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

class CreateProfileCommand extends Command {
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'lu:create-profile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user profile with level ';

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
        /*
          $headers = ['Name', 'Email'];

    $users = App\User::all(['name', 'email'])->toArray();

    $this->table($headers, $users);
        */
        /*
            $source = $this->choice(
            'Which source would you like to use?',
            [1=>'master', 2=>'develop']
            );

            dd($source);
            */
        //$list=$this->option('list');
        //dd($list);

        $guard = config('auth.defaults.guard');
        //$this->info($guard);//web
        $provider = config("auth.guards.{$guard}.provider");
        //$this->info($provider);//users
        $model = config("auth.providers.{$provider}.model");
        //$this->info($model);//Modules/LU/Models/User
        //return 1;
        $data=[];
        /*
        $data['language'] = $this->choice('Which language do you program in?', [
            'PHP',
            'Ruby',
            'Python',
        ]);
        */
        $data['handle'] = $this->ask('What is your nickname [without space and special characters]?');
        $data['first_name'] = $this->ask('What is your first name ?');
        $data['last_name'] = $this->ask('What is your last name ?');
        $data['email'] = $this->ask('Email Address');
        $data['password'] = $this->secret('What is the password?');
        $data['perm_type'] = $this->ask('User\'s level [1=>registered,2=>Editor,3=Moderator,4=Admin,5=SuperAdmin]');
        //$name = $this->argument('name');
        /*
        $command->ask('Name'),
        $command->ask('Email Address'),
        $command->secret('Password'),
        */

        $data['title']=$data['handle'].' profile ';
        $data['lang']=\App::getLocale();

        $validator = Validator::make($data, [
            'handle' => ['required'],
            'email' => ['required', 'email'/*, 'unique:staff,email'*/],
            'password' => ['required', 'min:6'],
        ]);
        if ($validator->fails()) {
            $this->info('Staff User not created. See error messages below:');
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        $user = with(new $model())->create($data);
        $perm = $user->perm()->create($data);
        $profile=$user->profile()->create($data);
        $post=$profile->post()->create($data);

        $this->info('Success ! User Profile Created !');
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
