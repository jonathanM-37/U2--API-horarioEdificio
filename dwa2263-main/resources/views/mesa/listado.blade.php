<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
<table border="1">
 <thead>
  <th>Numero de Inventario</th>
  <th>Opciones</th>
 </thead>
 <tbody>
@forelse($mesas as $mesa)
<tr>
 <td>
   <a href="{{route('mesas.show',$mesa->id)}}">{{$mesa->inventario}}</a></td>
 <td><a href="{{route('mesas.edit',$mesa->id)}}">EDITAR</a>  -  
 <form action="{{route('mesas.destroy',$mesa->id)}}" method="post" style="display:inline" >
  @csrf
  @method('delete')  
  <input type="submit" value="BORRAR">
 </form> </td>
</tr> 
@empty
 
@endforelse
 </tbody>
</table>
<a href="{{route('mesas.create')}}">AGREGAR</a>

</body>
</html>