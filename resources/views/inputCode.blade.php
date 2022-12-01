<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registration</title>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <h1>Enter Code</h1>
    <form method="POST" action="{{ route('checkCode') }}">
        @csrf
        <label for="code">Code</label>
        <input id="code" name="code" type="text">

        <label for="password">Password</label>
        <input id="password" name="password" type="text">

        <button type="submit">Confirm code</button>
    </form>
</div>
</body>
</html>
