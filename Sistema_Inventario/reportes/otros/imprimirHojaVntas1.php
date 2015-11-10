<?php
session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

echo  "SESSION";
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
<th colspan=2><font face=tahoma size=4><u>Reporte de Ventas</th>
<tr>
<td><font face=verdana size=2><b>Sistema de Inventario<br>Librer&iacute;a ITCA-FEPADE<br>San Miguel
<td align=right><img src=../images/logoItca.jpg width=150 height=70>

</tr>
</table>



";

if(isset($_GET['desde']) and ($_GET['hasta']))
{
$finicial=$_GET["desde"];
$ffinal=$_GET["hasta"];

echo "<center><font face=tahoma size=2>Reporte de Ventas desde: $finicial hasta: $ffinal <br>Hora: $hora";
		echo "
		<hr color=#BDBDBD>
		<table bordercolor=black border=1 cellspacing=0 cellpadding=0 width=100%>
		<tr bgcolor=#5882FA>
		<th><font face=tahoma size=2 color=#3B0B0B>N.
		<th><font face=tahoma size=2 color=#3B0B0B>Numero Factura
		<th><font face=tahoma size=2 color=#3B0B0B>Cliente
		<th><font face=tahoma size=2 color=#3B0B0B>Fecha/Venta
		<th><font face=tahoma size=2 color=#3B0B0B>Monto/Venta
		<tr>
		";
	
	$consulta=mysql_query("SELECT * from Facturas WHERE Fecha_venta BETWEEN '$finicial' AND '$ffinal'");
	if(mysql_num_rows($consulta)==0)
	{
		echo "<font face=tahoma size=2 color=red>No se encontraron registros</font>";
	}
	else
	{
		$i=0;
		$suma=0;
		while($facturas=mysql_fetch_array($consulta))
		{
		$i = $i+1;
		
		//consultando a la tabla ventas
		$consulta1=mysql_fetch_array(mysql_query("Select * from ventas where N_factura='$facturas[N_factura]'"));
		
		$monto=$consulta1["Cantidad"] * $consulta1["Precio_venta"];
		$suma=$suma + $monto;
			echo "<td><font face=tahoma size=2 color=black><center>$i
				  <td><font face=tahoma size=2 color=black><center>$facturas[N_factura]
				  <td><font face=tahoma size=2 color=black>$facturas[Nombre_cliente]
				  <td><font face=tahoma size=2 color=black><center>$facturas[Fecha_venta]
				  <td><font face=tahoma size=2 color=black><center>$monto
				  <tr>
			";
		}
		
		echo"<td colspan=4 align=right><b><font face=tahoma size=2 color=black>Total Venta:<td align=center bgcolor=#588FFF><font face=tahoma size=2 color=black><b>$suma";
	}
	echo "</tr></table>
	<hr color=#BDBDBD>
	";
}
else
{
echo "<center><font face=tahoma size=2>Reporte de Ventas del dia: $factual Hora: $hora";
echo "
<hr color=#BDBDBD>
<table bordercolor=black border=1 cellspacing=0 cellpadding=0 width=100%>
<tr bgcolor=#5882FA>
<th><font face=tahoma size=2 color=#3B0B0B>N.
<th><font face=tahoma size=2 color=#3B0B0B>Numero Factura
<th><font face=tahoma size=2 color=#3B0B0B>Cliente
<th><font face=tahoma size=2 color=#3B0B0B>Fecha/Venta
<th><font face=tahoma size=2 color=#3B0B0B>Monto/Venta
<tr>
";
$consulta=mysql_query("SELECT * from Facturas");
	if(mysql_num_rows($consulta)==0)
	{
		echo "<td><font face=arial size=2>No hay ventas realizadas</td>";
	}
	else
	{
	
	
		$i=0;
		$suma=0;
		while($facturas=mysql_fetch_array($consulta))
		{
		$i = $i+1;
		
		//consultando a la tabla ventas
		$consulta1=mysql_fetch_array(mysql_query("Select * from ventas where N_factura='$facturas[N_factura]'"));
		
		$monto=$consulta1["Cantidad"] * $consulta1["Precio_venta"];
		$suma=$suma + $monto;
			echo "<td><font face=tahoma size=2 color=black><center>$i
				  <td><font face=tahoma size=2 color=black><center>$facturas[N_factura]
				  <td><font face=tahoma size=2 color=black>$facturas[Nombre_cliente]
				  <td><font face=tahoma size=2 color=black><center>$facturas[Fecha_venta]
				  <td><font face=tahoma size=2 color=black><center>$monto
				  <tr>
			";
		}
		
		echo"<td colspan=4 align=right><b><font face=tahoma size=2 color=black>Total Venta:<td align=center bgcolor=#588FFF><font face=tahoma size=2 color=black><b>$suma";
	}
}
echo "
</tr>
</table>
<hr color=#BDBDBD>
</fieldset>";
?>