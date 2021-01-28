<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mensaje recibido</title>
</head>
<body>
	Email Recibido
{{-- 	{{ var_dump($msg)}} --}}
<p>Recibiste un msj de : {{ $msg['name']}}-{{$msg['email']}}</p>
<p><strong>Asunto:</strong> {{ $msg['subject'] }}</p>
<p><strong>Contenido:</strong> {{ $msg['content'] }}</p>

</body>
</html>