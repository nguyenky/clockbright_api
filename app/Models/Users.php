<?php

namespace App\Models;

use Eloquent as Model;
use Lcobucci\JWT\Builder;
use App\Models\Profiles;
/**
 * Class Users
 * @package App\Models
 * @version May 8, 2018, 3:49 am UTC
 *
 * @property string email
 * @property string password
 * @property integer role_id
 * @property string username
 */
class Users extends Model
{

    public $table = 'users';
    



    public $fillable = [
        'email',
        'password',
        'role_id',
        'username',
        'access_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'password' => 'string',
        'role_id' => 'integer',
        'username' => 'string',
        'access_token' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required',
        'password' => 'required',
        'role_id' => 'required',
        'username' => 'required',
        'access_token'=>'required',
    ];

    public function generateAccessToken(){
        $this->access_token =(string)(new Builder())->setId('4f1g23a12aa', true) 
                        ->setIssuedAt(time()) 
                        ->setNotBefore(time() + 60) 
                        ->setExpiration(time() + 3600) 
                        ->set('username',$this->username) 
                        ->set('email',$this->email) 
                        ->getToken(); 
    }

    public function profile(){
        return $this->hasOne(\App\Models\Profiles::class);
    }
}
