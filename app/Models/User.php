<?php

namespace App\Models;

use Eloquent as Model;
use Lcobucci\JWT\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class User
 * @package App\Models
 * @version May 9, 2018, 3:31 am UTC
 *
 * @property string email
 * @property string password
 * @property integer role_id
 * @property string username
 * @property string access_token
 */
class User extends Authenticatable
{

    public $table = 'users';
    
    public $fillable = [
        'email',
        'password',
        'role_id',
        'username',
        'access_token'
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
        'access_token' => 'text'
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

        return $this->hasOne(\App\Models\Profile::class);
        
    }
    
}
