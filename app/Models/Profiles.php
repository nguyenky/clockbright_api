<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Profiles
 * @package App\Models
 * @version May 8, 2018, 7:14 am UTC
 *
 * @property string phone_number
 * @property string avatar
 * @property string fullname
 * @property string address
 */
class Profiles extends Model
{

    public $table = 'profiles';
    



    public $fillable = [
        'phone_number',
        'user_id',
        'avatar',
        'fullname',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone_number' => 'string',
        'user_id'=> 'integer',
        'avatar' => 'string',
        'fullname' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fullname' => 'required',
        'user_id' => 'required',
    ];

    
}
