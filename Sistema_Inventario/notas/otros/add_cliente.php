<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

include('../mysql.php');
include('../script.php');
}
?>
	<?php
	if($_POST)
	{
	include("../mysql.php");
		$codigo=mysql_query("Select * from Clientes");
		if(mysql_num_rows($codigo)=="")
		{
			$id="1";
		}
		else
		{
			while($reg=mysql_fetch_array($codigo))
			{
			$id=$reg["codigo"];
			}
			$id=$id+1;
		}
		
		$nombre="$_POST[nombre]";
		$direccion="$_POST[direccion]";
		$dui="$_POST[dui]";
		$nit="$_POST[nit]";
		$telefono="$_POST[telefono]";
		
				$Ndui=mysql_query("Select * from Clientes where Dui='$dui'");
				if(mysql_num_rows($Ndui)==0)
				{
						if(mysql_query("Insert Into Clientes values('$id',
																	'$nombre',
																	'$direccion',
																	'$dui',
																	'$nit',
																	'$telefono'
																	)"))
																	{
																	
																		echo "<script>alert('El cliente ha sido registrado con exito');location.replace('./cliente.php')</script>";
																	}
																	else
																	{
																		echo "<font face=arial size=2 color=white>Error".mysql_error();
																	}
				}
				else
				{
					echo "<script>alert('El cliente con Numero $dui ya ha sido existe favor verifique los datos');</script>";
				}
	}
	else
	{
	include("../mysql.php");
		$codigo=mysql_query("Select * from Clientes");
		if(mysql_num_rows($codigo)=="")
		{
			$id="1";
		}
		else
		{
			while($reg=mysql_fetch_array($codigo))
			{
			$id=$reg["codigo"];
			}
			$id=$id+1;
		}
	}
	
	?>
	
		<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">
	<title>Clientes</title>
	</head>
    <form method=post onsubmit='return verificar();'>
	<body>
	<br>
	<br>
	<center><table width=90% border=2 cellspacing=0 cellpadding=0 bordercolor=black>
	<tr>
	<td><center><table border=0 width=90% cellspacing=0 cellpadding=0>
	<tr>
	<th colspan=3 bgcolor=black><font face=arial size=3 color=white><div align=center>Registro de Clientes</th>
	<tr>
	<td colspan=2><font face=arial size=2>
	<tr>
	<td><?
		echo "<font face=arial size=2><b>Codigo
				<td><input name=codigo type=text size=10 value='$id' readonly>
		";
	?>
	<td rowspan=6><img src=../images/030.png>
	<tr>
	<td><font face=arial size=2><b>Nombre:
	<td><input name=nombre type=text size=35>
	<tr>
	<td><font face=arial size=2><b>Direccion:
	<td><input name=direccion type=text size=35>
	<tr>
	<td><font face=arial size=2><b>N. de DUI:
	<td><input name=dui type=text size=10 onkeyup="mascara(this,'-',patron3,true)" maxlength="10"><font face=arial size=2>(03234562-0)
	<tr>
	<td><font face=arial size=2><b>N. de NIT:
	<td><input name=nit type=text size=17 onkeyup="mascara(this,'-',patron4,true)" maxlength="17"><font face=arial size=2>(1111-040588-111-0)
	<tr>
	<td><font face=arial size=2><b>Telefono:
	<td><input name=telefono type=text size=10 onkeyup="mascara(this,'-',patron2,true)" maxlength="12"><font face=arial size=2>(2293-4456)
	<tr>
	
	<td colspan=3><br><center><input name=aceptar type=submit value="Guardar Datos">
	<input name=cancelar type=button value=Cancelar OnClick="location.replace('./cliente.php')"></center>
	<br><br>
	</tr>
	</table>
	</tr>
	</table></center>		</form>	
			</body>
			</html>