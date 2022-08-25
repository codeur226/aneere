<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Bonjour Monsieur {{$user['name']}}</h2>
<br/>
Votre Mail {{$user['email']}}
<br/>
Votre mot de passe {{$user['password']}}

</body>

</html>
