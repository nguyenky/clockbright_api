<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Role
 * @package App\Models
 * @version May 8, 2018, 8:02 am UTC
 *
 * @property string name
 */
class Role extends Model
{


    public $table = 'roles';
    



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
