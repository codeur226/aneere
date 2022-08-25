@component('mail::message')
Bonjour
 <strong>{{$user['name']}}</strong><br>

 Votre mail est :  <strong>{{$user['email']}}</strong><br>
 Votre mot de passe pour se connecter est : <strong> {{$user['password']}}</strong><br>
 Un fois vous connectez veuillez changer votre mot de passe

@component('mail::button', ['url' => $url])
Cliquez ici !
@endcomponent

Merci pour votre compréhension !!!<br>
{{ config('app.name') }}
@endcomponent
