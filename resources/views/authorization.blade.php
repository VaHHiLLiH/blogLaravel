<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Registration</title>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('registration'))
                <h1>Registration</h1>
                <form method="POST" action="{{ route('regUser') }}">
                    @csrf
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text">

                    <label for="password">Password</label>
                    <input id="password" name="password" type="password">

                    <label for="confirm-password">Confirm your password</label>
                    <input id="confirm-password" name="confirm-password" type="password">

                    <button type="submit">Registration</button>
                </form>
            @elseif (Route::has('authorization'))
                <h1>Authorization</h1>
                <form method="POST" action="{{ route('authUser') }}">
                    @csrf
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text">

                    <label for="password">Password</label>
                    <input id="password" name="password" type="text">

                    <button type="submit">Authorization</button>
                </form>
            @endif
        </div>
    </body>
</html>