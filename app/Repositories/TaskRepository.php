<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\Activity;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TaskRepository
 * @package App\Repositories
 * @version May 15, 2018, 2:16 am UTC
 *
 * @method Task findWithoutFail($id, $columns = ['*'])
 * @method Task find($id, $columns = ['*'])
 * @method Task first($columns = ['*'])
*/
class TaskRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'user_id',
        'duration',
        'start_time',
        'end_time'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Task::class;
    }

    public function showTaskId($id) {
        $list = Task::where('user_id',$id)->orderBy('id','desc')->get();
        return $list;
    }
}
