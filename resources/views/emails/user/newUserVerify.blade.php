@component('mail::message')
#Hey {{$name}},
#Greetings from Wrestlemaniac Team

Click the link bellow to verify your e-mail.
@component('mail::button', ['url' => 'wrestlemaniac.net/emailConfirm/'.$verifyCode])
Verify E-Mail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
