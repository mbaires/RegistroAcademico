<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{

include('../mysql.php');
}
echo "<html>
<head>
<title>Reporte de Compras
</title>
</head>
<body onLoad='window.print();'>
";


$factual = Date("d"."-"."m"."-"."Y");
$hora = Date("H:i:s");

echo "<center>
<fieldset style='width:70%'>
<table width=100% border=0>
<tr>
<th colspan=2><font face=tahoma size=4><u>Reporte de Compras</th>
<tr>
<td><font face=verdana size=2><b>Sistema de Inventario<br>Librer&iacute;a ITCA-FEPADE<br>San Miguel
<td align=right><img src=../images/logoItca.jpg width=150 height=70>

</tr>
</table>


";
?>
<html>
<head>
	<title>Reporte de Compras de Productos</title>
</head>
<body leftmargin=0 topmargin=0 vlink=white alink=white link=white>

<?
include("RCompra.inc.php");
include("../mysql.php");

$dataview = new DataView();
$dataview->SetPageSize(30);
$dataview->ShowHeader(true);
$dataview->ShowPageNumber(true);
if(isset($_GET['desde']) and ($_GET['hasta']))
{
$finicial=$_GET["desde"];
$ffinal=$_GET["hasta"];
	echo "<center><font face=tahoma size=2>Reporte de Compras desde: $finicial hasta: $ffinal <br>Hora: $hora
<hr color=#BDBDBD>";
	$dataview->SetQuery("SELECT * from Compras WHERE Fecha_compra BETWEEN '$finicial' AND '$ffinal'");
}
else
{
	echo "<center><font face=tahoma size=2>Reporte de Compras del dia: $factual Hora: $hora
	<hr color=#BDBDBD>";

	$dataview->SetQuery("select * from Compras");
}

?>
</center>
<hr>

</body>
</html>