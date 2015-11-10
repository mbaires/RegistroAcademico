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
<script language='javascript' src='./popcalendar.js'></script>
	<title>Reporte de Compras de Productos</title>
</head>
<body leftmargin=0 topmargin=0 vlink=white alink=white link=white>
<form name="form1" method=post>
	<center><table border=1 cellspacing=0 cellpadding=0>
	<tr>
	<td>
		<table>
		<tr bgcolor=#celeste>
		<th colspan=4><font face=arial size=2>Generar reporte de Compras por fechas
		<tr>
		<td><font face=arial size=2>Desde<input name=finicial id="finicial" size=20  readonly>&nbsp;<a href='#'><img src="../images/calendario.gif"  width=30 height=25  onClick="popUpCalendar(this, form1.finicial, 'dd-mm-yyyy');"></a>
		<td><td><font face=arial size=2 >Hasta<input name=ffinal id="ffinal" size=20  readonly>&nbsp;<a href='#'><img src="../images/calendario.gif"  width=30 height=25  onClick="popUpCalendar(this, form1.ffinal, 'dd-mm-yyyy');"></a>
		<tr>
		<td colspan=4><center><input name=generar type=submit value=Generar></center>
		</tr>
		</table>
	</tr>
	</table>
	</center>
</form>
<center>
<hr>
<?
include("RCompra.inc.php");
include("../mysql.php");

$dataview = new DataView();
$dataview->SetPageSize(20);
$dataview->ShowHeader(true);
$dataview->ShowPageNumber(true);
if(isset($_POST["generar"]))
{
$finicial=$_POST["finicial"];
$ffinal=$_POST["ffinal"];

	$dataview->SetQuery("SELECT * from Compras WHERE Fecha_compra BETWEEN '$finicial' AND '$ffinal'");
}
else
{
$dataview->SetQuery("select * from Compras");
}
if(isset($_POST["generar"]))
{
	echo "<a href=\"imprimirHojaCompra.php?desde=$finicial&hasta=$ffinal\" target='_blank'>| <img src=../images/impresora.jpg width=50 height=50>|</a>";
}else{
	echo "<a href=\"imprimirHojaCompra.php\" target='_blank'>| <img src=../images/impresora.jpg width=50 height=50>|";
}

?>
</center>
<hr>

</body>
</html>