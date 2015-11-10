<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

include('../mysql.php');
}
?>
<html>
<head>
<link rel=stylesheet href=estilo.css  type=text/css>

	<title>Reporte de Clientes</title>
</head>
<body leftmargin=0 topmargin=0>
<center>
<h3><font face=arial>LIBRERIA GENESIS<br>Reporte de Clientes...</font></h3>
<hr>
<?
include("Rproveedor.inc.php");
include("../mysql.php");

$dataview = new DataView();
$dataview->SetPageSize(20);
$dataview->ShowHeader(true);
$dataview->ShowPageNumber(true);
$dataview->SetQuery("select * from Clientes");


echo "<br><bR><input type=button value='Imprimir Reporte' onclick=\"this.style.visibility='hidden';print();this.style.visibility='visible';\" class=botn>";

?>
</center>
<hr>

</body>
</html>