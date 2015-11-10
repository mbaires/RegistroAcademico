<?
session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{
$usuario=session_register("SESSION");
include('../mysql.php');
}
?>

<script language=Javascript>
function validar(form){
	for(i=0; i <form. length; i++){
		if(form.item(i).value == ""){
			self.alert("Debe de rellenar el campo " + form.item(i).name + " para continuar");
			form.item(i).focus();
			return false;
		}
	}
}
</script>

<?php
include("../mysql.php");




echo "
<html>
	<head>
		<title>consulta de proveedores</title>
		<body link=white vlink=white alink=white>
		<table width=100% border=0>
		<tr>
			<td><form method=\"post\" onsubmit=\"javascript:return validar(this);\">
				<h2 align=center><font face=arial size=3>Consulta de Proveedores</h2>
				<center><table border=1 bordercolor=black cellspacing=0 cellpadding=0>
				<tr>
				<td>
				<table border=0 align=center bordercolor=black>
				<td rowspan=2><img src=\"../images/026.png\" width=100	height=100></img></td>
				<td><font face=arial size=2><b>Ingrese el c&oacute;digo o el nombre del Proveedor</b></font>
				<tr>
				<td align=center><br>
				<input type=\"text\"  name=\"Criterio\" size=\"40\" />
				<input type=\"submit\" class=\"boton\" id=\"idAceptar\" value=\"Buscar\" />
				</td>
				</tr>
				</table>
				</tr>
				</table>
			</td>
		</tr>
		</table>

			<br/>

		</form>
	</body>
	";

	if($_POST)
	{
		$b="$_POST[Criterio]";
		$consulta=mysql_query("Select * from Proveedores where Nombre LIKE '%$b%' OR Codigo Like '%$b%'");
		if(mysql_num_rows($consulta)==0)
		{
			echo "<font face=arial size=2><center>No se encontraron registros";
		}
		else
		{
			echo "<center><table width=100% border=1 bordercolor=black cellspacing=0 cellpadding=0>
			<tr bgcolor=#610B0B>
			<th><font face=arial  color=white size=2  color=2>C&oacute;digo
			<th><font face=arial color=white size=2  color=2>Proveedor
			<th><font face=arial color=white size=2  color=2>Direcci&oacute;n
			<th><font face=arial color=white size=2  color=2>Contacto
			<th><font face=arial color=white size=2  color=2>Tel&eacute;fono
			<th><font face=arial color=white size=2  color=2>Celular
            <th><font face=arial color=white size=2  color=2>Email
			<th><font face=arial color=white size=2  color=2>Modificar
			<th><font face=arial color=white size=2  color=2>Eliminar


			";
			while($datos=mysql_fetch_array($consulta))
			{
				echo "<tr>
						<td><font face=arial size=2><center>$datos[codigo]
						<td><font face=arial size=2><center>$datos[Nombre]
						<td><font face=arial size=2><center>$datos[Direccion]
						<td><font face=arial size=2><center>$datos[Ncontacto]
						<td><font face=arial size=2><center>$datos[Telefono]
						<td><font face=arial size=2><center>$datos[Celular]
   						<td><font face=arial size=2><center>$datos[Email]
						<td><font face=arial size=2><center><a href='edit_proveedor.php?id=$datos[codigo]'><img src=../images/031.png width=50 hheight=50></a>
						<td><font face=arial size=2><center>

													<script>
													function js_Eliminar(id_cl)
														{
														if (window.confirm(\"¿Está seguro que desea eliminar el registro seleccionado?\")) {
															   location.href = \"edit_proveedor.php?delete=\" + id_cl;
														}
													}
													</script>

													<a href=\"javascript:js_Eliminar($datos[codigo])\"><img src=../images/022.png width=30 height=30></a>
						</tr>
					";
			}
			echo "</tr></table>";
		}

	}

 ?>