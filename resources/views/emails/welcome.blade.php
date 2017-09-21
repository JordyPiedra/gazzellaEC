@component('mail::message')
# Hola {{$user->nombre1}},

Gracias por crear una cuenta, por favor verifícala usando el siguiente enlace:

@component('mail::button', ['url' => route('verify',$user->verificacion_token)])
Confirmar
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent




