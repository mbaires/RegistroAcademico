<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
Session_start();
if(!isset($_SESSION["password"])){
	echo "<script>alert('Usuario no registrado');
	location.replace('index.php');</script>";
}
else{
//$usuario=session_register("SESSION");
//include('mysql.php');
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>REPORTES</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

</head>
<body>

<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
	<td><img src="./images/reportes.jpg" width="70" height="70"><td class=text align="Justify"><font face=arial size=2>Realice reportes de los alumnos que tiene en su seccion <b>REPORTE DE ALUMNOS</b> 
	
  </table>
</fieldset>


<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
		<td><img src="./images/reporcom.jpg" width="70" height="70"><td class=text align="Justify"><font face=arial size=2> 
Realice todas reportes de Notas por cada alumno <b>REPORTE DE NOTAS</b> 
	
  </table>
</fieldset>

	<?php
             if($_SESSION["tipo"] == "administrador")
             {
               ?>

<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
	<td><img src="./images/reporvent.jpg" width="70" height="70">
	<td class=text align="Justify"><font face=arial size=2>Haga todas las consultas de cada una de las ventas realizadas en el d&Iacute;a, mes o año.<b>CONSULTE TODAS SUS VENTAS</b>
		
	
  </table>
</fieldset>



<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
	<td><img src="./images/conexis.jpg" width="70" height="70"><td class=text align="Justify"><font face=arial size=2>Realice reportes de las materias vogentes del curso <b>REPORTE DE MATERIAS</b> 
	
  </table>
</fieldset>



<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
	<td><img src="./images/032.PNG" width="70" height="70"><td class=text align="Justify"><font face=arial size=2>Realice reporte de todos los docentes habilitados en la institucion <b>REPORTE DE DOCENTES</b> 
	
  </table>
</fieldset>
<?php
             }
            ?>
</body>
</html>
