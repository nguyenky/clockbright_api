<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Activity
 * @package App\Models
 * @version May 15, 2018, 2:26 am UTC
 *
 * @property integer task_id
 * @property string|\Carbon\Carbon start_time
 * @property string|\Carbon\Carbon end_time
 * @property string pendding
 */
class Activity extends Model
{

    public $table = 'activities';


    public $fillable = [
        'task_id',
        'start_time',
        'end_time',
        'pendding'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'task_id' => 'integer',
        'pendding' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'task_id' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'pendding' => 'required'
    ];

    
}
