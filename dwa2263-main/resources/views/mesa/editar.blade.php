<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
 <form action="{{route('mesas.update',$mesa->id)}}" method="post">
 @method('put')
  <label for='inventario'>Numero de inventario:</label>
  <input type='text' name='inventario' id='inventario' value="{{$mesa->inventario}}"><br>
  @csrf
  <input type="submit" value="ENVIAR">

 </form>
</body>
</html>