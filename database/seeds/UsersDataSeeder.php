<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
class UsersDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();
        
        Profile::truncate();

        $roles = Role::all();

        foreach ($roles as $key => $value) {
        	$user = User::create([
        		'email' 	=> $value->name.'@gmail.com',
        		'password' 	=> bcrypt('123123'),
        		'role_id' 	=> $value->id,
        		'username' 	=> strtolower($value->name),
        	]);
        	$user->generateAccessToken();
        	$user->save();
        	$user->profile()->create();
        }
    }
}
