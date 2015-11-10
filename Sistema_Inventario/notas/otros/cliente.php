<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

include('../mysql.php');
}
?>
<html>
	<head><title>Clientes</title></head>
	<body>
	<form method=post>
			<table width=100% border=1>
			<tr>
			<td><center>
					<table>
					<tr>
					<th colspan=2><font face=arial size=2>Ingrese el Nombre o el Codigo del Cliente:
					<tr>
					<td><font face=arial size=2>Codigo o Nombre:
					<td><input name=b>
					<tr>
					<td colspan=2><center><input name=buscar type=submit value=Buscar><input name=cancelar type=button value=Cancelar OnClick="location.replace('./FacturaCredito.php')">
					<a href='./add_cliente.php'>Registrar</a>
					</table>
				</center>
				
				<?php
				include("../mysql.php");
				if($_POST)
				{
					$b=$_POST["b"];
					if(isset($_POST["buscar"]))
					{
						$consulta=mysql_query("Select * from Clientes where Nombre like '%$b%'");
					}
				}
				else
				{
				$consulta=mysql_query("Select * from Clientes");
				
				}
				echo "				
				<center><table border=1 width=95%>
				<tr>
				<th><font face=arial size=2>Codigo
				<th><font face=arial size=2>Nombre
				<th><font face=arial size=2>Direccion
				<th><font face=arial size=2>DUI
				<th><font face=arial size=2>NIT
				<th><font face=arial size=2>Telefono
				<th><font face=arial size=2>Agregar
				<tr>
				";
				if(mysql_num_rows($consulta)==0)	
				{
				echo "
					<center><font face=arial size=2>No se encontro ningun registro...</font></center>
					";
				}
				else
				{
					while($datos=mysql_fetch_array($consulta))
					{
					echo "
							<td><font face=arial size=2>$datos[codigo]
							<td><font face=arial size=2>$datos[Nombre]
							<td><font face=arial size=2>$datos[Direccion]
							<td><font face=arial size=2>$datos[Dui]
							<td><font face=arial size=2>$datos[Nit]
							<td><font face=arial size=2>$datos[Telefono]
							<td><center><a href='./FacturaCredito.php?id=$datos[codigo]'><img src=../images/icon1.gif></a></center>
							
						";
					}
				}
					
				
				echo"
				</tr>
				</table></center>
				";
				?>
			</table>
	</body>
</html>