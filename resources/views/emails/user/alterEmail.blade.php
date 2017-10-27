@component('mail::message')
#Hey {{$name}},
#Greetings from Wrestlemaniac Team

Here is your code for changing your e-mail:

{{$verifyCode}}

If you didn't requested this e-mail just ignore it.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
