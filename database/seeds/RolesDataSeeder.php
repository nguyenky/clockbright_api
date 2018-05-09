<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Role::truncate();

        $arrRoles = ['Admin','User'];
        foreach ($arrRoles as $key => $value) {
        	Role::create([
        		'name'=>$value,
        	]);
        }
    }
}
