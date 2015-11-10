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
<title>Consultas</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

</head>
<body>




<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
		<td><img src="./images/concom.jpg" width="70" height="70"><td class=text align="Justify"><font face=arial size=2> 
Realice todas sus consultas de cada alumno para llevar un mayor control de los mismos<b> REALICE CONSULTAS SOBRE ALUMNOS </b> 
	
  </table>
</fieldset>







<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
	<td><img src="./images/026.png" width="70" height="70">
	<td class=text align="Justify"><font face=arial size=2>Realice todas las consultas de notas de cada alumno para informarse acerca de resultados<b>REALICE CONSULTAS SOBRE NOTAS</b> 
		
	
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
	<td><img src="./images/comex.jpg" width="70" height="70"><td class=text align="Justify"><font face=arial size=2>Consulte informacion de cada docente registrado  <b>CONSULTAR DOCENTES</b> 
	
  </table>
</fieldset>
		  
			   
			   
			   
			   
			   
			   
			   
			   
			
<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
	<td><img src="./images/bus.jpg" width="70" height="70"><td class=text align="Justify"><font face=arial size=2>Consulte informacion de cada usuario registrado en el sistema <b>CONSULTAR USUARIOS</b> 
	
  </table>
</fieldset>

	<?php
             }
            ?>	
</body>
</html>
