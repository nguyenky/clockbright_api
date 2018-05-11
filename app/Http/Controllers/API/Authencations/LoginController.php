<?php

namespace App\Http\Controllers\API\Authencations;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UserRepository;
use App\Models\User;


class LoginController extends AppBaseController
{
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    public function login(Request $request)
    {	

    	$credentials = $request->only(['email', 'password']);

        try{
            if (! $token = auth()->attempt($credentials)) {

                return $this->sendError('Password incorrect.');
            }
        } catch (\Exception $e){
            return $this->sendError('Something error. Please try again!');
        }
        $data = [
            'status' => $token,
            'user' => auth()->user(),
        ];

        return $this->sendResponse($data, 'Users retrieved successfully');
    }
}
