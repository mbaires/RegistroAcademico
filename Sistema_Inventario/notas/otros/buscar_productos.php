<html>
<body>
<head><meta content="text/html; charset=ISO-8859-15" http-equiv="Content-Type">
</head>
<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

include('../mysql.php');
include('../script.php');
}
?>

<html>

    <head>
    <link rel=stylesheet href=estilo.css  type=text/css>
    <title>Buscar productos</title>

       </head>
       <!--*************************************************-->

       <body bgcolor=#FFFFFFFF leftmarging=0 topmarging=0>

       <script language=Javascript>
function validar(form){
	for(i=0; i <form. length; i++){
		if(form.item(i).value == ""){
			self.alert("Debe de rellenar el campo " + form.item(i).name + " para continuar");
			form.item(i).focus();
			return false;
		}
	}
}
</script>


<!--************************************************************-->
<!--Este programa es para Buscar el producto -->
 <form name=reg action=buscar_productos.php method=post onsubmit="javascript:return validar(this);">

	<td class=texto><br><center>Nombre del Producto:<input name=b  class=caja>
	<input type=submit name=buscar value=Buscar class=boton>
	<input type=button value=Cerrar onclick="location.replace('./buscar_productos.php')" class=boton >
	</form>

	<?
	if(isset($_GET["id"]))
		{
		$producto=mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto='$_GET[id]'"));
			echo "
					<form name=form2 method=post onsubmit=\"javascript:return validar(this);\">
					<table>
					<tr>
					<th colspan=2><font face=aria size=2>Especifique la cantidad a descargar</fotn>
					<tr>
					<td colspan=2>$producto[Nombre] &nbsp; $producto[Marca]&nbsp; $producto[Estilo] &nbsp; $producto[Color]
					<tr><input name=idproducto type=hidden value=$_GET[id]>
						<input name=pventa type=hidden value=$_GET[pventa]>
					<td><font face=aria size=2>Cantidad:
					<td><input name=cantidad size=10 onKeyDown=\"return Numeros();\">
					<tr>
					<td colspan=2><center><input name=aceptar type=submit value='Agregar a factura'>
					</tr>
					</table>
					</form>

				";


		}


	if(isset($_POST["buscar"])){
$b = $_POST["b"];


			$consulta = mysql_query("SELECT * from Inventario where Nombre like '%$b%'");
			if(mysql_num_rows($consulta) == 0){
				echo "<center>No se encontro Producto";
			}else{
				echo "<br>
				<font face=arial size=2>*Para agrgar el producto de  clic en el codigo o en el nombre</p>
				<center>
					<center><table border=1 bordercolor=black width=90%>
					<tr bgcolor=#celeste>
						<th><font face=arial size=2>codigo
						<th><font face=arial size=2>Nombre
						<th><font face=arial size=2>Marca
						<th><font face=arial size=2>Estilo
						<th><font face=arial size=2>Color
						<th><font face=arial size=2>Precio de Venta
						<th><font face=arial size=2>Existencias
						<tr>";

			   while($registros=mysql_fetch_array($consulta))
						{

						echo "
							<td><font face=arial size=2 color=red><center><a href='./buscar_productos.php?id=$registros[codigo_producto]&&pventa=$registros[Precio_venta]'>$registros[codigo_producto]</a>
							<td><font face=arial size=2><center>$registros[Nombre]
							<td><font face=arial size=2><center>$registros[Marca]
							<td><font face=arial size=2><center>$registros[Estilo]
							<td><font face=arial size=2><center>$registros[Color]
							<td><font face=arial size=2><center>$registros[Precio_venta]
							<td><font face=arial size=2><center>$registros[Existencias]
							<tr>
							";
						}

					echo "
					</tr>
					</table>
				";
			}
	}
	else
	{
		$consulta=mysql_query("Select * from Inventario");
		if(mysql_num_rows($consulta)==0)
		{
			echo "<font face=arial size=2><center>No se han encontrado registros</font>";
		}
		else
		{
			echo "<br>
				<font face=arial size=2>*Para agrgar el producto de  clic en el codigo o en en el nombre</p>
					<center><table border=1 bordercolor=black width=90%>
					<tr bgcolor=#celeste>
						<th><font face=arial size=2>codigo
						<th><font face=arial size=2>Nombre
						<th><font face=arial size=2>Marca
						<th><font face=arial size=2>Estilo
						<th><font face=arial size=2>Color
						<th><font face=arial size=2>Precio de Venta
						<th><font face=arial size=2>Existencias
						<tr>";
						while($registros=mysql_fetch_array($consulta))
						{

						echo "
							<td><font face=arial size=2 color=red><center><a href='./buscar_productos.php?id=$registros[codigo_producto]&pventa=$registros[Precio_venta]'>$registros[codigo_producto]
							<td><font face=arial size=2><center>$registros[Nombre]
							<td><font face=arial size=2><center>$registros[Marca]
							<td><font face=arial size=2><center>$registros[Estilo]
							<td><font face=arial size=2><center>$registros[Color]
							<td><font face=arial size=2><center>$registros[Precio_venta]
							<td><font face=arial size=2><center>$registros[Existencias]
							<tr>
							";
						}

					echo "
					</tr>
					</table>
				";
		}
	}
?>


					</table>
			</form>

       </body>
       </html>


<?php

if(isset($_POST["aceptar"]))
{
	$nr=mysql_query("Select * from temporal");
	if(mysql_num_rows($nr)==0)
	{
		$codigo=1;
	}
	else
	{
		$codigo=0;
		while($r=mysql_fetch_array($nr))
		{
			$codigo=$codigo + 1;
		}
		$codigo=$codigo + 1;
		}
   if($codigo > 10)
   {
     echo "<script>alert('El limite de productos que se pueden agregar a la factura ha excedido');location.replace('facturaConsumidor.php');</script>";
   }
   else
   {
		$cantidadExistente=mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto='$_POST[idproducto]'"));
		if($cantidadExistente["Existencias"] >= $_POST["cantidad"])
		{
		$siNoexiste=mysql_query("Select * from temporal where codigo_producto='$_POST[idproducto]'");
			if(mysql_num_rows($siNoexiste)==0)
			{
				if(mysql_query("insert into temporal values('$codigo','$_POST[idproducto]','$_POST[cantidad]','$_POST[pventa]')"))
				{
					$tabla_ventas=mysql_query("Select * from Ventas");
						if(mysql_num_rows($tabla_ventas)==0)
						{
							$id_venta=1;
						}
						else
						{
							$id_venta=0;
							while($nr=mysql_fetch_array($tabla_ventas))
							{
								$id_venta=$id_venta+1;
							}
							$id_venta=$id_venta + 1;
						}
							if(mysql_query("Insert Into Ventas values('$id_venta','0','$_POST[idproducto]','$_POST[cantidad]','$_POST[pventa]')"))
							{
										$canActual=mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto=$_POST[idproducto]"));
										$descarga=$canActual["Existencias"] - $_POST["cantidad"];
										if(mysql_query("Update Inventario set Existencias=$descarga where codigo_producto='$_POST[idproducto]'"))
										{
										echo "<script>location.replace('FacturaConsumidor.php');</script>";
										}
										else
										{
											echo "error:".mysql_error();
										}
							}
				}
				else
				{
				echo "Error".mysql_error();
				}
			}
			else
			{
				$canTemp=mysql_fetch_array($siNoexiste);
				$actual=$canTemp["Cantidad"]+$_POST["cantidad"];
				if(mysql_query("Update temporal set Cantidad=$actual where codigo_producto='$_POST[idproducto]'"))
				{
					if(mysql_query("Update Ventas set Cantidad=$actual where codigo_producto='$_POST[idproducto]'"))
					{
					$cantInventario=mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto=$canTemp[codigo_producto]"));
					$resta=$cantInventario["Existencias"] - $_POST["cantidad"];
					if(mysql_query("Update Inventario set Existencias=$resta where codigo_producto=$canTemp[codigo_producto]"))
					{
						echo "<script>alert('se ha agregado mas del mismo producto');location.replace('FacturaConsumidor.php');</script>";
					}
					}
				}

			}
		}
		else
		{
			echo "<script>alert('La cantidad especificada excede a la cantidad existente.. favor verificar');</script>";
		}
    }
}
?>
 </body>
</html>