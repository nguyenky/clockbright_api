<?php

use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\Picture;
use App\Models\Task;
class TasksDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Task::truncate();
        for ($i = 0; $i <= 5; $i++) {
    		$task =Task::create([
        		'name'=>'Dọn vệ sinh',
        		'address' => '10'.$i.' Hoàng sĩ khải Đà Nẵng',
        		'user_id' => 2,
        		'duration' => 'NULL',
                'start_time' => '08:00:00',
                'end_time' => '09:00:00',
        	]);
		} 
    }
}
