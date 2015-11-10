<?php
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{

include('../mysql.php');
}
?>
<?php
if(isset($_GET["nfactura"]))
{
	$ventas=mysql_query("Select * from Ventas where N_factura='$_GET[nfactura]'");
	while($nventa=mysql_fetch_array($ventas))
	{
		$existente=mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto='$nventa[codigo_producto]'"));
		$actualizar=$existente["Existencias"] + $nventa["Cantidad"];
		
		mysql_query("Update Inventario set Existencias=$actualizar where codigo_producto=$nventa[codigo_producto]");
			
	
	}
	
	
		if(mysql_query("Update facturas set tipo_factura='anulado'  where N_factura='$_GET[nfactura]'"))
		{
			echo "<script>alert('La Factura $_GET[nfactura] ha sido anulada');location.replace('./consulta_venta.php');</script>";
		}
	
	else
	{
		echo "Error".mysql_error();
	}
	
}
?>