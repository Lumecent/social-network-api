<?php

namespace App\Console\Commands;

use App\Repositories\Repository;
use Illuminate\Console\Command;

class Role extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create base role';

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
     */
    public function handle()
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'moderator'],
            ['name' => 'user']
        ];

        $hasRoles = Repository::getInstance()->role->findByNameWhereIn($roles);

        if (count($hasRoles)){
            $this->error('One or more roles exist in the system');

            return false;
        }

        foreach ($roles as $role){
            $newRole = Repository::getInstance()->role->startConditions();

            $newRole->name = $role['name'];
            $newRole->save();
        }

        $this->info('Roles created');

        return true;
    }
}
