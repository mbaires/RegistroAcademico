<html>
<body>
<head><meta content="text/html; charset=ISO-8859-15" http-equiv="Content-Type">
</head>
<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{

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
include('../script.php');
include("./consultaexistencias.inc.php");
$dataview = new DataView();
$dataview->SetPageSize(20);
$dataview->ShowHeader(true);
$dataview->ShowPageNumber(true);
echo "
<html>
	<head>
		<title>consulta de Existencia</title>
		<body link=white vlink=white alink=white>
		<form method=\"post\">
				<h2 align=center><font face=arial size=3>Consulta de Existencias de Productos</h2>
				<center><table border=1 bordercolor=black cellspacing=0 cellpadding=0>
				<tr>
				<td>
				<table border=0 align=center bordercolor=black>
				<td rowspan=2><img src=\"../images/026.png\" width=100	height=100></img></td>
				<td><font face=arial size=2><b>Ingrese el C&oacute;digo &oacute; el nombre del Producto</b></font>
				<tr>
				<td align=center><br>
				<input type=text name=Criterio size=40 />
				<input name=Buscar type=submit class=boton value=\"Buscar\" />
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


	if(isset($_GET["id"]))
	{
		echo "

        <form method=post onsubmit=\"javascript:return validar(this);\">
			<table border=1 cellspacing=0 cellpaddin=0>
			<tr>
			<th colspan=2><center><font face=arial size=2>Cambio de precio del Producto</th>
			<tr><input name=codigo value=$_GET[id] type=hidden>
			<td><font face=arial size=2>Nombre del Producto:
			<td>$_GET[nombre] $_GET[marca] $_GET[estilo] $_GET[color]
			<tr>
			<td><font face=arial size=2>INGRESE EL NUEVO PRECIO:
			<td><input name=precio onKeyDown=\"return Numeros();\" maxlenght=6>
			<tr>
			<td colspan=2><center><input name=cambiar type=submit value=Guardar>
			</tr>
			</table></form>
			";
	}
	if(isset($_POST["cambiar"]))
	{

		if(mysql_query("Update Inventario Set Precio_venta=$_POST[precio] where codigo_producto=$_POST[codigo]"))
		{
			echo "<script>alert('El precio de venta del producto ha sido modificado..');location.replace('./consulta_existencias.php');</script>";
		}
		else
		{
			echo "Error".mysql_error();
		}

	}

	if(isset($_POST["Criterio"]))
	{
		$b="$_POST[Criterio]";

		$dataview->SetQuery("Select * from Inventario where codigo_producto LIKE '%$b%' or Nombre  like '%$b%'");
	}
	else
	{
		$dataview->SetQuery("Select * from Inventario");
	}


 ?>
 </body>
</html>