<?php

use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\Picture;
use App\Models\Task;
class ActivityDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Activity::truncate();
      
        $tasks = Task::all();

        foreach ($tasks as $key => $value) {
        	for ($i = 1; $i <= 3; $i++) {
        		 Activity::create([
	        		'task_id'=> $value->id,
	        		'start_time' => '08:00:00',
	        		'end_time' => '09:00:00',
	        		'pendding' => 'Progressing'
	        	]);
        	} 
        }
    }
}
