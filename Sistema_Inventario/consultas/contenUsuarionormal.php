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
<title>Modificar Datos de Usuario</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

</head>
<body>
<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
		<td><img src="../images/concom.jpg" width="70" height="70"><td class=text align="Justify"><font face=arial size=2> 
Realice todas sus consultas de compras en la base de datos y conosca sus entradas de materiales <b>REALICE SUS CONSULTAS DE COMPRAS</b> 
	
  </table>
</fieldset>



<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
	<td><img src="../images/conve.jpg" width="70" height="70">
	<td class=text align="Justify"><font face=arial size=2>Haga todas las consultas de cada una de las ventas realizadas en el dia, mes o año.<b>CONSULTE TODAS SUS VENTAS</b>
		
	
  </table>
</fieldset>



<fieldset style="width:80%; border-color:gray;">
<legend>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</legend>
  <table width="100%">
	<tr>
	<td><img src="../images/comex.jpg" width="70" height="70"><td class=text align="Justify"><font face=arial size=2>Consulte las existencia de productos para que conosca el estado de estos mismos para ver la necesidad de comprar o no nuevos productos. <b>CONSULTAR EXISTENCIA</b> 
	
  </table>
</fieldset>





</body>
</html>
