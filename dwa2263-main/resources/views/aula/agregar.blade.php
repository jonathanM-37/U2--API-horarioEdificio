<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
FOMULARIO PARA AGREGAR
<form action="/agregar/" method="post"  enctype="">
 <label for='nombre'>nombre</label>
 <input type='text' name='nombre' id='nombre'><br>
<label for='capacidad'>capacidad</label>
<input type='number' name='capacidad' id='capacidad'><br>
<label for='wifi'>wifi</label>
<input type='checkbox' name='wifi' id='wifi'><br>
<input type="submit" value="ENVIAR">
@csrf
</form>
</body>
</html>