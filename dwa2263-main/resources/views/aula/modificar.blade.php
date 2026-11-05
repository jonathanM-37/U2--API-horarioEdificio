<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
FOMULARIO PARA modificar
<form action="/actualiza/{{$aula->id}}" method="post"  enctype="">
 <label for='nombre'>nombre</label>
 <input type='text' name='nombre' id='nombre' value="{{$aula->nombre}}"><br>
<label for='capacidad'>capacidad</label>
<input type='number' name='capacidad' id='capacidad' value="{{$aula->capacidad}}"><br>
<label for='wifi'>wifi</label>
@if($aula->wifi)
<input type='checkbox' name='wifi' id='wifi' checked ><br> 
@else
 <input type='checkbox' name='wifi' id='wifi' ><br>
@endif
<input type="submit" value="ENVIAR">
@csrf
@method('put')
</form>
</body>
</html>