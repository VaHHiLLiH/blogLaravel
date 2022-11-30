<?php

namespace App\Http\Services;

use App\Models\User;

class GenerateToken
{
    public static function generateRegistrationToken()
    {
        $token = '';

        while(!GenerateToken::checkUniqRegToken($token) && $token != '') {
            $token = bin2hex(random_bytes(10));
        }

        return $token;
    }

    public static function checkUniqRegToken($token)
    {
        if (!empty(User::where('token_to_registration', $token)->first())) {
            return false;
        } else {
            return $token;
        }
    }

    public static function generateConfirmPassToken()
    {

    }

    public static function checkUniqAuthToken($token)
    {

    }
}
