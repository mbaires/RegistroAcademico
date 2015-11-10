<?
session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}elseif($_SESSION["tipo"] != "administrador")
{
	echo "<script>location.replace('../home.php');</script>";
}
else
{

include('../mysql.php');

}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
var patron = new Array(2,2,4)
var patron2 = new Array(4,4)
var patron3 = new Array(8,1)
var patron4 = new Array(4,6,3,1)
function mascara(d,sep,pat,nums){
if(d.valant != d.value){
	val = d.value
	largo = val.length
	val = val.split(sep)
	val2 = ''
	for(r=0;r<val.length;r++){
		val2 += val[r]
	}
	if(nums){
		for(z=0;z<val2.length;z++){
			if(isNaN(val2.charAt(z))){
				letra = new RegExp(val2.charAt(z),"g")
				val2 = val2.replace(letra,"")
			}
		}
	}
	val = ''
	val3 = new Array()
	for(s=0; s<pat.length; s++){
		val3[s] = val2.substring(0,pat[s])
		val2 = val2.substr(pat[s])
	}
	for(q=0;q<val3.length; q++){
		if(q ==0){
			val = val3[q]
		}
		else{
			if(val3[q] != ""){
				val += sep + val3[q]
				}
		}
	}
	d.value = val
	d.valant = val
	}
}

</script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Nuevo Usuario</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/estilos.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body id="body">
  <div id="logo">

  </div>


	<div id="menu">

	</div>

     <div id="contenido">

	<form method='post'>
	<table align=right width=78% border=0 bordercolor=#CCCCFF cellspacing=0 cellpadding=1>
		<tr>
		<td>
	<fieldset style="position: fixed; width:500px; height:250px; margin-left:0px; margin-top:0px;">
	<legend style="font-family:arial; font-size:14px; color:black; background-color:#ffffff;"><b>Nuevo Usuario</b></legend>
	<table align='left' width=100% border=0 bordercolor=black cellspacing=0 cellpadding=2>
	<tr>
	<td><table border=0 width=100% cellspacing=0 cellpadding=2 align="left">
	<td colspan=2><font face=arial size=2>
	<tr>
	<td class="textform"><font face=arial size=2><b>Nombre Usuario:</font>
	<td align=left><input name=nombre type=text class=caja>
	<td rowspan="5"><img src="../images/provee.jpg">
	<tr>
	<td class="textform"><font face=arial size=2><b>Password:</font>
	<td align=left><input name=password type=password class=caja>
	<tr>
	<td class="textform"><font face=arial size=2><b>Repetir Password:</font>
	<td align=left><input name=npassword type=password class=caja>
	<tr>
	<td class="textform"><font face=arial size=2><b>Nº de DUI:</font>
	<td align=left><input name=dui type=text onKeyUp="mascara(this,'-',patron3,true)" maxlength=10 class=caja><font face=arial size=2>(00000000-0)
	<tr>
	<td class="textform"><font face=arial size=2><b>Tipo de Cuenta:</font>
	<td><Select name=tipo class="caja">
			<option value=usuario>Usuario</option>
			<Option value=Administrador>Administrador</option>
		</select>
	<tr>
	<td colspan=2><br><center><input name=aceptar type=submit value="Guardar Datos">
	<input name=cancelar type=button value=Cancelar OnClick="location.replace('./contenUsuario.php')"></center>
	</tr>
	</table>
	</tr>
	</table></center>
			<?php
		if($_POST)
		{


			$dui="$_POST[dui]";
			$usuario="$_POST[nombre]";
			$pass="$_POST[password]";
			$npass="$_POST[npassword]";
            $contra=("$pass");
			$tipo="$_POST[tipo]";
			include("../mysql.php");
			if($_POST["nombre"]="" OR $_POST["password"]=="" OR $_POST["npassword"]=="" OR $_POST["dui"]=="")
			{
			echo "<center><font face=arial size=2 color=red>Por favor complete los datos del formulario</font>";
			}
			else
			{
				if($pass!= $npass)
				{
					echo "<font face=arial size=2 color=red><center>La contraseña no coincide";
				}
				else
				{
					$consulta=mysql_query("Select * from Usuarios Where Login='$usuario'");
					$consulta1=mysql_query("Select * from Usuarios");
					$id=0;
					while($registro=mysql_fetch_array($consulta1))
					{
						$id=$id + 1;
					}
					$nr = $id + 1;

					if(mysql_num_rows($consulta)==0)
					{
						if(mysql_query("Insert Into Usuarios Values('$nr','$usuario','$contra','$dui','$tipo')"))
						{
							echo "<font face=arial size=2 color=green><center>Usuario registrado con exito.-...</font>";
						}
						else
						{
							echo "<font face=arial size=2 color=red>Error()".mysql_error();
						}
					}
					else
					{
						echo "<font face=arial size=2  color=red><center>El nombre de usuario ya existe favor verificar los datos";
					}
				}
			}
		}
		?>

			</tr>
			</table>
			
	
		</tr>
		</table>
		</center>
		</fieldset>
     
</div>
		
		</form>

<!-- footer ends-->
</body>
</html>


	
	
