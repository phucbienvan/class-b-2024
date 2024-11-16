<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthService
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($params)
    { 
        try{
            return $this->user->create($params);
        }catch(\Exception $exception){
            Log::error($exception);

            return false;
        }
    }

    public function login($params)
    { 
        try{
            $user = $this->user->where('email', $params['email'])->first();

            $checkPassword = Hash::check($params['password'], $user->password);

            if(!$checkPassword)
            {
                return [
                    'code' => 401,
                    'message' => 'Password or email is incorrect',
                ];
            }

            return [
                'code' => 200,
                'message' => 'Login success',
                'access_token' => $user->access_token,
            ];
        }catch(\Exception $exception){
            Log::error($exception);

            return false;
        }
    }
}