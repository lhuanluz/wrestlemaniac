@component('mail::message')
#Hey {{$name}},
#Greetings from Wrestlemaniac Team

Click the link bellow to change your e-mail to {{$newEmail}}.
@component('mail::button', ['url' => 'http://127.0.0.1:8000/verifyChangeEmail/'.$verifyCode.'/'.$newEmail])
Verify E-Mail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
