<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{

include('../mysql.php');
}
?>
<html>
<head>
<link rel=stylesheet href=estilo.css  type=text/css>

	<title>Reporte de Proveedores</title>
</head>
<body leftmargin=0 topmargin=0 link=white vlink=white alink=white>
<center>
<h3><font face=arial>LIBRERIA ITCA-FEPADE<br>Reporte de Proveedores...</font></h3>
<hr>
<?
include("Rproveedor.inc.php");
include("../mysql.php");

$dataview = new DataView();
$dataview->SetPageSize(20);
$dataview->ShowHeader(true);
$dataview->ShowPageNumber(true);
$dataview->SetQuery("select * from Proveedores");


echo "<a href=\"imprimirHojaProveedor.php\" target='_blank'>| <img src=../images/impresora.jpg width=50 height=50>|";

?>
</center>
<hr>

</body>
</html>