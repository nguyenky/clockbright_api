<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Task
 * @package App\Models
 * @version May 15, 2018, 2:16 am UTC
 *
 * @property string name
 * @property string address
 * @property integer user_id
 * @property string duration
 */
class Task extends Model
{
    

    public $table = 'tasks';
    

    


    public $fillable = [
        'name',
        'address',
        'user_id',
        'duration',
        'start_time',
        'end_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'user_id' => 'integer',
        'duration' => 'string',
        'start_time' => 'time',
        'end_time' => 'time'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'address' => 'required',
        'user_id' => 'required',
        'duration' => 'required',
        'start_time' => 'required',
        'end_time' => 'required'
    ];

    public function activities(){
        return $this->hasMany(\App\Models\Activity::class);
    }
    
}
