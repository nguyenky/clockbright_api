<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lcobucci\JWT\Builder;
class TestController extends Controller
{
    public function test(){
    	$token = (new Builder())->setId('4f1g23a12aa', true) // Configures the id (jti claim), replicating as a header item
                        ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
                        ->setNotBefore(time() + 60) // Configures the time that the token can be used (nbf claim)
                        ->setExpiration(time() + 3600) // Configures the expiration time of the token (exp claim)
                        ->set('uid', 1) // Configures a new claim, called "uid"
                        ->getToken(); // Retrieves the generated token
        // dd($token);
        echo $token;
    }
}
