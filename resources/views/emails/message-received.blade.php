<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mensaje recivido</title>
</head>
<body>
	<p>Mensaje recivido de:{{ $msg['name'] }}</p>
	<p>Email: {{ $msg['email'] }}</p>
	<p>Asunto: {{ $msg['subjet'] }}</p>
	<p>Contenido: {{ $msg['content'] }}</p>
</body>
</html>