<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{

include('../mysql.php');
}
?>
<?php
include("../mysql.php");
include("./consultacompra.inc.php");
$dataview = new DataView();
$dataview->SetPageSize(20);
$dataview->ShowHeader(true);
$dataview->ShowPageNumber(true);
echo "
<html>
	<head>
		<title>consulta de compras</title>
		<body link=white vlink=white alink=white>
		<form method=\"post\">
				<h2 align=center><font face=arial size=3>Consulta de Compras</h2>
				<center><table border=1 bordercolor=black cellspacing=0 cellpadding=0>
				<tr>
				<td>
				<table border=0 align=center bordercolor=black>
				<td rowspan=2><img src=\"../images/026.png\" width=100	height=100></img></td>
				<td><font face=arial size=2><b>C&oacute;digo del Producto &oacute; detalle</b></font>
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

if(@$_POST)
	{
		$b="$_POST[Criterio]";

		$dataview->SetQuery("Select * from Compras where codigo_producto LIKE '%$b%' or Descripcion like '%$b%'");
	}
	else
	{
		$dataview->SetQuery("Select * from Compras");
	}



 ?>