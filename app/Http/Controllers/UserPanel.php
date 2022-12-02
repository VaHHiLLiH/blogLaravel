<?php

namespace App\Http\Controllers;

use App\Jobs\RestorePassword;
use App\Jobs\SendLetter;
use App\Mail\SendToken;
use App\Models\Comment;
use App\Models\Record;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Services\GenerateToken;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserPanel extends Controller
{
    public function test()
    {

        $record = Record::create([
            'name'                  => 'nazVANI e',
            'description'           => '',
            'image'                 => '',
            'author_id'             => 1
        ]);
        dd($record);
        /*$user = User::find(5);

        dd($user->record, $user->comment);*/

        /*$record = Record::find(6);

        dd($record->user, $record->comment);*/

        /*$comment = Comment::first();

        dd($comment->user, $comment->record);*/
    }

    public function confirmUser(string $token, Request $request)
    {
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

    public function forgotPass(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();

        if(empty($user)) {
            return back()->withErrors([
                'email' => 'Введенные вами данные не корректны',
            ]);
        }
        $token = GenerateToken::generateConfirmPassToken();

        $user->update(['token_to_restore_pass'  => $token]);

        RestorePassword::dispatch($user, $token);

        return view('inputCode');
    }

    public function setPass(Request $request)
    {
        $user = User::where('token_to_restore_pass', $request->get('code'))->first();

        if(empty($user)) {
            return back()->withErrors([
                'code' => 'Хуйня твой код, сыночек',
            ]);
        }

        $user->update(['password' => $request->get('password'), 'token_to_restore_pass' => null]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('homePage');
    }
}
