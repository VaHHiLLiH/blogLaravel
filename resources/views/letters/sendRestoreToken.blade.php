@component('mail::message')
# If u don't send this letter then ignore it

Your code, fagot - {{ $token }}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
