<?php

namespace App\Console\Commands;

use App\Repositories\Repository;
use Illuminate\Console\Command;

class UserRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:add {user_id} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assigning a specific role to a user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $roleName = $this->argument('role');
        $userID = $this->argument('user_id');

        if ($roleName && $roleName != 'user'){
            if (!Repository::getInstance()->role->findByName($roleName)){
                $this->error("Role '{$roleName}' not exists");

                return false;
            }

            if (Repository::getInstance()->userRole->findByNameAndUserId($roleName, $userID)){
                $this->error("Role '{$roleName}' set for the current user");

                return false;
            }

            $userRole = Repository::getInstance()->userRole->startConditions();

            $userRole->user_id = $userID;
            $userRole->name = $roleName;

            $userRole->save();

            $this->info('Role added successfully');

            return true;
        }

        $this->info('This user already has the specified role');

        return true;
    }
}
