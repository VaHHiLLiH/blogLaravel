<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>Registration</title>
</head>
<body class="antialiased">
<div class="wapka">
    шапка-хуяпка
</div>
<div id="app">
    <!--<test></test>-->
    @auth
    <cabinet :user="{{ json_encode($user) }}"></cabinet>
    @endauth
</div>
<!--<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @auth
        <p>{{ $user->email }}</p>
        <p>{{ $user->password }}</p>
    @endauth
</div>

<div class="record-from">
    <form method="POST" action="{{ route('createRecord') }}">
        @csrf
        <label for="name">Record title</label>
        <input id="name" name="name" type="text">


        <label for="description">Description</label>
        <input id="description" name="description" type="text">

        <button type="submit">Post your record</button>
    </form>
</div>-->
</body>
</html>
