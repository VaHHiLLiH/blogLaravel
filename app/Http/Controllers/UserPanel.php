<?php

namespace App\Http\Controllers;

use App\Jobs\SendLetter;
use App\Mail\SendToken;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\GenerateToken;
use Illuminate\Support\Facades\Mail;

class UserPanel extends Controller
{
    public function test()
    {
        $user = User::first();
        SendLetter::dispatch($user, 'Let\'s selebrate and suck some dick');
    }

    public function regUser(Request $request)
    {
        $token = GenerateToken::generateRegistrationToken();

        $user = User::create([
            'name'                  => empty($request->get('name')) ? '' : $request->get('name'),
            'email'                 => $request->get('email'),
            'password'              => $request->get('password'),
            'token_to_registration' => $token,

        ]);

        dd($user);
    }

    public function authUser(Request $request)
    {
        dd($request->exists('_token'));
    }
}
