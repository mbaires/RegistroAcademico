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
echo "
<html>
<head><title>compra de prodcutos</title></head>
<body leftmargin=0>
";
if(isset($_GET["id"]))
{
$idCompra=$_GET["id"];
$compra=mysql_fetch_array(mysql_query("Select * from Compras where id_compra=$idCompra"));
$datos=mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto=$compra[codigo_producto]"));
echo "
<form name=for1 method=post>
	<center><table border=1 bordercolor=black cellspacing=0 cellpadding=0 width=95%>
	<tr>
	<td>
			<center><table border=0 cellspacing=0 cellpadding=0 width=98%>
			<tr>
			<th colspan=4><font face=arial size=3>Modificar Datos de la compra</th>
			<tr>
			<td><font face=arial size=2>Codigo:
			<td><input name=codigo size=5 value=$idCompra readonly>
			
			<tr>
			
			
			<td><font face=arial size=2>Proveedor:
			";
			
			$registros=mysql_query("Select * from Proveedores");
			$proveedor= "<select name=proveedor>";
			
			while($cantreg=mysql_fetch_array($registros))
			{
				$proveedor .= "<option value='$cantreg[codigo]'>$cantreg[Nombre]</option>";
			}
			$proveedor .= "</select>";
			echo "
			<td>$proveedor
			
			<tr>
			<td><font face=arial size=2>Nombre:
			<td colspan=4><input name=nombre size=38 value=$datos[Nombre] readonly>
			<tr>
			<td><font face=arial size=2>Marca:
			<td><input name=marca value=$datos[Marca] readonly>
			<td><font face=arial size=2>Estilo:
			<td><input name=estilo size=13 value=$datos[Estilo] readonly>
			<td><font face=arial size=2>Color:
			<td><input name=color size=10 value=$datos[Color] readonly>
			<tr>
			<td><font face=arial size=2>Fecha de compra:
			<td><input name=fcompra value=$compra[Fecha_compra]>
			<td><font face=arial size=2>Cantidad:
			<td><input name=cantidad size=13 value=$compra[Cantidad]>
			<tr>
			<td><font face=arial size=2>Precio de Compra Unitario $:
			<td><input name=pcompra size=8 value=$compra[Precio_compra]>
			
			<td><font face=arial size=2>% de ganancia:
			<td><input name=porcentaje size=8 maxlenght=6>
			
			
			<td><font face=arial size=2>Descripci&oacute;n:
			<td colspan=3><textarea name=descripcion>$compra[Descripcion]</textarea>
			<tr>
			<td colspan=7><center><input name=guardar type=submit value=Guardar><input name=cancelar type=button value='Cancelar' Onclick=\"location.replace('consulta_compra.php')\">
				
			</tr>
			</table>
	</tr>
	<tr>
	<td>
	
	</table>
	</center>
	</form>
	
</body>
</html>
";
}

if(isset($_POST["guardar"]))
{

		if(mysql_query("Update compras set Cantidad='$_POST[cantidad]',Precio_compra='$_POST[pcompra]',Fecha_compra='$_POST[fcompra]',Id_proveedor='$_POST[proveedor]',Descripcion='$_POST[descripcion]' where id_compra='$_GET[id]'"))
		{
		
		$valor=$_POST["porcentaje"];
$valor1= $valor  / 100;

					$pventa1=$_POST["pcompra"] * $valor1;
					$pventa= $pventa1 + $_POST["pcompra"];

			
			if(mysql_query("Update Inventario set Precio_venta=$pventa where codigo_producto='$_POST[codigo]'"))
			{
			echo "<script>alert('Los datos han sido actualizados');location.replace('consulta_compra.php');</script>";
			}
		}
		else
		{
			echo "<font face=arial size=2 color=red>Error".mysql_error();
		}
		
}


if(isset($_GET["delete"]))
{
	$cantidad=mysql_fetch_array(mysql_query("Select Cantidad from compras where id_compra='$_GET[delete]'"));
	$canActual=@mysql_fetch_array(mysql_query("Select Existencias from Inventario where codigo_producto=$cantidad[codigo_producto]"));
	$actualizar=$canActual["Existencias"] - $cantidad["Cantidad"];
	if(mysql_query("Update Inventario set Existencias=$actualizar where codigo_producto='$cantidad[codigo_producto]'"))
	{
		if(mysql_query("Delete from compras where id_compra='$_GET[delete]'"))
		{
			echo "<script>alert('La compra ha sido eliminada');location.replace('consulta_compra.php');</script>";
		}
	}
	else
	{
		echo "<font face=arial seze=2 color=red>Error:".mysql_error();
	}
}

?>

