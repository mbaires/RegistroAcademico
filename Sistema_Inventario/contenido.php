<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
Session_start();
if(!isset($_SESSION["password"])){
	echo "<script>alert('Usuario no registrado');
	location.replace('index.php');</script>";
}
else{
//$usuario=session_register("SESSION");
include('mysql.php');
}
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Contenido</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

</head>
<body>
<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
		<td><img src="images/fact.jpg" width="70" height="70"><td class=text align="Justify"><font face=arial size=2> 
Registre a todos los alumnos para que pueda llevar un mayor control de los datos <b>REGISTRO DE ALUMNOS</b> 
	
  </table>
    
</fieldset>



<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
	<td><img src="images/calificaciones.png" width="70" height="70"><td class=text align="Justify"><font face=arial size=2>Registre las notas de los alumnos para llevar un mayor control de las calificaciones de los alumnos <b>REGISTRO DE NOTAS</b> 
	
  </table>
</fieldset>


<?php
				   if($_SESSION["tipo"] == "administrador")
             { ?>

<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
	<td><img src="images/registro.jpg" width="70" height="70">
	<td class=text align="Justify"><font face=arial size=2>RESGISTRE DOCENTES PARA LLEVAR CONTROL DE LOS EMPLEADOS DE LA ESCUELA<b>REGISTRAR DOCENTES</b>
		
	
  </table>
</fieldset>
<?php
				            }?>
							
							
							
							
							
							
							
							<?php
				   if($_SESSION["tipo"] == "administrador")
             { ?>

<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
	<td><img src="images/prove.jpg" width="70" height="70">
	<td class=text align="Justify"><font face=arial size=2>RESGISTRE USUARIOS PARA MANEJO DEL SISTEMA <b>REGISTRAR USUARIOS</b>
		
	
  </table>
</fieldset>
<?php
				            }?>








</body>
</html>
