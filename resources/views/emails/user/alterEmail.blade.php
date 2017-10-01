@component('mail::message')
#Hey {{$name}},
#Greetings from Wrestlemaniac Team

Click the link bellow to change your e-mail to {{$newEmail}}.
@component('mail::button', ['url' => config('app.url').'verifyChangeEmail/'.$verifyCode.'/'.$newEmail])
Verify E-Mail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
