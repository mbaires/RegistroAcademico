<?
session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

include('../mysql.php');
}
?>
<html>
<body link=white vlink=white alink=white leftmargin=0 topmargin=1 background="./IMG/001.png">
<center>
<table width=100% border=0>
		<tr>
		<td><table border=0 width=80%><tr><td><div align=right>
		<td width=60><center><img src=../IMG/018.png><br><a href=ayuda.php target=blank><font face=verdana size=1 color=blue>Ayuda</a>
		<td width=60><center><img src=../IMG/salir.jpg width=40 height=40><br><a href=../contenido.php onclick=\"location.replace('../contenido.php')\"><font color=blue><font face=verdana size=1>Salir</a>
		</tr>
		</table>
		<br>
</center>
<center>
<table width=75% height=100% cellspacing=0 cellpadding=0 border=0 bordercolor=gray bgcolor=white>
<tr>
<td>
	<center><table width=75% height=50% cellspacing=0 cellpadding=0 border=0>
	<tr>
	<td><center><a href="./nuevo_usuario.php"><img src="../IMG/007.png" width=100 height=100><td><a href="./nuevo_usuario.php"><font face=arial size=2 color=blue>Agregar Usuarios</a>
	<td><center><a href="./edit_usuario.php"><img src="../IMG/008.png" width=100 height=100></center><td><a href="./edit_usuario.php"><font face=arial size=2 color=blue>Modificar Cuentas de Usuario</a>
	<tr>
	<td><a href="./crear_backup.php"><img src="../IMG/009.png" width=100 height=100><td><a href="./crear_backup.php"><font face=arial size=2 color=blue>Crear Copia de respaldo</a>
	<td><a href="./restaurar_backup.php"><img src="../IMG/010.png" width=100 height=100><td><a href="./restaurar_backup.php"><font face=arial size=2 color=blue>Restaurar Copia de respaldo</a>
	</tr>
</table></center>
</tr>
</table>
</body>
</html>