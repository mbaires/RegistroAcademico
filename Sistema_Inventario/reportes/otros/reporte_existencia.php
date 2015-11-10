<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

include('../mysql.php');
}
?>
<html>
<head> <meta content="text/html; charset=ISO-8859-15" http-equiv="Content-Type">
<link rel=stylesheet href=estilo.css  type=text/css>

	<title>Reporte de Compras de Productos</title>
</head>
<body leftmargin=0 topmargin=0 vlink=white alink=white link=white>
<center>
<h3><font face=arial>LIBRERIA ITCA-FEPADE<br>Reporte de Existencias de Productos...</font></h3>
<hr>
<?
include("Rexistencia.inc.php");
include("../mysql.php");

$dataview = new DataView();
$dataview->SetPageSize(20);
$dataview->ShowHeader(true);
$dataview->ShowPageNumber(true);
$dataview->SetQuery("select * from Inventario");


echo "<a href=\"imprimirHojaExistencias.php\" target='_blank'>| <img src=../images/impresora.jpg width=50 height=50>|";

?>
</center>
<hr>

</body>
</html>