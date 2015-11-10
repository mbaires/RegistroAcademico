<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

include('../mysql.php');
}
echo "<html>
<head>
<title>Reporte de Ventas
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
<th colspan=2><font face=tahoma size=4><u>Reporte de Existencias</th>
<tr>
<td><font face=verdana size=2><b>Sistema de Inventario<br>Librer&iacute;a ITCA-FEPADE<br>San Miguel
<td align=right><img src=../images/logoItca.jpg width=150 height=70>

</tr>
</table>


";
?>

<?
include("Rexistencia.inc.php");
include("../mysql.php");

$dataview = new DataView();
$dataview->SetPageSize(20);
$dataview->ShowHeader(true);
$dataview->ShowPageNumber(true);

echo "<center><font face=tahoma size=2>Reporte de Existencia de Productos del dia: $factual Hora: $hora
	<hr color=#BDBDBD>";
$dataview->SetQuery("select * from Inventario");




?>
</fieldset>
</center>


</body>
</html>