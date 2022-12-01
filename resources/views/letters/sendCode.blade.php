@component('mail::message')
# Hello {{ $user->name }}!
If u wanna registration for blogLaravel.org then go to this link
@component('mail::button', ['url' => route('confirmUser', $token)])
Sing in
@endcomponent

Thanks,<br>
Your Billy <3
@endcomponent
