<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Profile
 * @package App\Models
 * @version May 9, 2018, 3:33 am UTC
 *
 * @property integer user_id
 * @property string phone_number
 * @property string avatar
 * @property string fullname
 * @property string address
 */
class Profile extends Model
{

    public $table = 'profiles';
    


    public $fillable = [
        'user_id',
        'phone_number',
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
        'user_id' => 'integer',
        'phone_number' => 'string',
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
        'user_id' => 'required'
    ];

    
}
