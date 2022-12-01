<?php

namespace App\Http\Controllers;

use App\Jobs\SendLetter;
use App\Mail\SendToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Services\GenerateToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserPanel extends Controller
{
    public function test()
    {

    }

    public function confirmUser(string $token, Request $request)
    {
        //dd($token);

        $user = User::where('token_to_registration', $token)->first();

        if (!empty($user)) {
            $user->update(['email_verified_at ' => Carbon::now()->subHours(-3)->toDateTimeString(), 'token_to_registration' => null]);

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->route('homePage');
        }
    }

    public function regUser(Request $request)
    {
        $token = GenerateToken::generateRegistrationToken();

        $user = User::create([
            'name'                  => empty($request->get('name')) ? '' : $request->get('name'),
            'email'                 => $request->get('email'),
            'password'              => Hash::make($request->get('password')),
            'token_to_registration' => $token,

        ]);

        SendLetter::dispatch($user, $token);
    }

    public function authUser(Request $request)
    {
        if (Auth::attempt([
            'email'     => $request->get('email'),
            'password'  => $request->get('password'),
        ])) {
            $request->session()->regenerate();

            return redirect()->route('homePage');
        } else {
            return back()->withErrors([
                'email' => 'Введенные вами данные не корректны',
            ]);
        }
    }

    public function showUserPage()
    {
        $user = Auth::user();

        return view('personalPage.cabinet', ['user' => $user]);
    }
}
