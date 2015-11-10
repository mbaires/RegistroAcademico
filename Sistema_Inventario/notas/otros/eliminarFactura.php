<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

include('../mysql.php');
}
?>
<?php
include("../mysql.php");
if(isset($_GET["codigo"]) AND isset($_GET["cantidad"]))
{
	if(mysql_query("Delete from temporal where codigo_producto=$_GET[codigo]"))
	{
	mysql_query("Delete from Ventas where codigo_producto=$_GET[codigo] AND N_factura=0");
	$cantidad=mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto=$_GET[codigo]"));
	$Actualizar=$cantidad["Existencias"] + $_GET["cantidad"];
		
		if(mysql_query("Update Inventario set Existencias=$Actualizar where codigo_producto=$_GET[codigo]"))
		{
			echo "<script>alert('El producto ha sido eliminado de la factura');location.replace('./FacturaConsumidor.php');</script>";
		}
	}
}
?>