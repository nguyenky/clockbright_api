<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Picture
 * @package App\Models
 * @version May 15, 2018, 2:31 am UTC
 *
 * @property integer activity_id
 * @property string name
 * @property string url
 */
class Picture extends Model
{

    public $table = 'pictures';
    

    public $fillable = [
        'activity_id',
        'name',
        'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'activity_id' => 'integer',
        'name' => 'string',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'activity_id' => 'required',
        'name' => 'required'
    ];

    
}
