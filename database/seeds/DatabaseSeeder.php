<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RolesDataSeeder::class);
        // $this->call(UsersDataSeeder::class);
        $this->call(TasksDataSeeder::class);
        $this->call(ActivityDataSeeder::class);
    }
}
