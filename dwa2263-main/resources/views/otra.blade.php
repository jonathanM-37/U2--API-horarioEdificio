<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
<p> Proyecto de agenda:</p>
<P>aqui se podra ver que aulas estan disponibles, asi como poder apartar cuando se use...</P>
<p>
<ul>
<li><a href="preagregar">CREATE</a></li>
<li><a href="listar/">READ - TODOS</a></li>
<li><a href="unoporuno/5">READ - UNO</a></li>
<li><a href="/seleccionar/">UPDATE</a></li>
<li><a href="">



<form action="borrar/4" method="post">
@csrf
@method('delete')
<input type="submit" value="DELETE">
</form>







</a></li>
</ul></p>
</body>
</html>