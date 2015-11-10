<?
session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{
$usuario=session_register("SESSION");
include('../mysql.php');
include('../script.php');
}
?>
	<?php
        $nombre=" ";
		$direccion=" ";
		$ncontacto=" ";
		$telefono=" ";
		$cel=" ";
        $email=" ";

	if($_POST)
	{
	include("../mysql.php");
		$codigo=mysql_query("Select * from Proveedores");
		if(@mysql_num_rows($codigo)=="")
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
		$ncontacto="$_POST[ncontacto]";
		$telefono="$_POST[telefono]";
		$cel="$_POST[cel]";
		$email="$_POST[email]";

				$Ndui=mysql_query("Select * from Proveedores where Nombre='$nombre'");
				if(mysql_num_rows($Ndui)==0)
				{
						if(mysql_query("Insert Into Proveedores values('$id','$nombre','$direccion','$ncontacto','$telefono','$cel','$email')"))
						{
                echo "<script>alert('El proveedor ha sido registrado con exito');location.replace('proveedores.php')</script>";
						}

                else
																	{
		echo "<font face=arial size=2 color=red>Error".mysql_error();
																	}
				}
				else
				{
					echo "<script>alert('El proveedor $nombre ya ha sido registrado favor verifique los datos');</script>";
				}
	}
	else
	{
	include("../mysql.php");
		$codigo=mysql_query("Select * from Proveedores");
		if(@mysql_num_rows($codigo)=="")
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

    <script>
        function validar()
        {
          if(document.all.nombre.value== "")
          {
          alert('Ingrese el nombre del proveedor');
          document.all.nombre.focus();
		  return false;

          }
            if(document.all.direccion.value== "")
          {
          alert('Ingrese la direccion del proveedor');
          document.all.direccion.focus();
		  return false;
          }
          if(document.all.ncontacto.value== "")
          {
          alert('Ingrese el nombre del contacto');
          document.all.ncontacto.focus();
		  return false;
          }

        }
		
		
		function validar(obj) {
  num=obj.value.charAt(0);
  if(num!='7' && num!='2') {
    alert('Debe empezar por 2 o 7');
    obj.focus();
  }
}



function valEmail(valor){    // Cortesía de http://www.ejemplode.com
    re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
    if(!re.exec(valor))    {
        return false;
    }else{
        return true;
    }
}


    </script>


		<html>
	<head>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<title>Clientes</title>
	</head>
    <form method=post onsubmit='return validar();'>
	<body id="body1">
	<fieldset style="width:96%; height:300px; border:1; color:black; background-color:white; border-color:black">
	<legend id="legend"><b>Registro de Proveedores</b></legend>
	<center><table width=100% border=0 cellspacing=0 cellpadding=0 bordercolor=black>
	<tr>
	<td><center><table border=0 width=90% cellspacing=0 cellpadding=0>
	<tr>
	<td colspan=2><font face=arial size=2>
	<tr>
	<td><?
		echo "<font face=arial size=2><b>Codigo<br><br>
				<td><input name=codigo type=text size=10  value='$id' readonly>

	<td rowspan=6><img src=../images/030.jpg width=150px height=200px>
	<tr>
	<td ><font face=arial size=2><b>Proveedor:<br><br>
	<td><input name=nombre type=text size=35   value=$nombre>
	<tr>
	<td><font face=arial size=2><b>Direccion:<br><br>
	<td><input name=direccion type=text size=35   value=$direccion>
   	<tr>
	<td><font face=arial size=2><b>Contacto:<br><br>
	<td><input name=ncontacto type=text size=35 value=$ncontacto>
    <tr>
	<td><font face=arial size=2><b>Tel&eacute;fono:<br><br>
	<td><input name=telefono type=text size=10 onkeyup=\"mascara(this,'-',patron2,true)\"  onblur=\"validar(this)\"  maxlength=10 value=$telefono><font face=arial size=2>(0000-0000)
    <tr>
	<td><font face=arial size=2><b>Celular:<br><br>
	<td><input name=cel type=text size=10 onkeyup=\"mascara(this,'-',patron2,true)\"  onblur=\"validar(this)\"     maxlength=10 value=$cel><font face=arial size=2>(0000-0000)
    <tr>
	<td><font face=arial size=2><b>Email:<br><br>
	<td><input name=email type=text size=55 onClick=”if(!valEmail(this)){alert(‘la dirección de correo no es correcta’);}”  maxlength=55 value=$email>
	<tr>

	<td colspan=3><br><center><input name=aceptar type=submit value=\"Guardar Datos\">
	<input name=editar type=button value=Modificar OnClick=\"location.replace('./consulta_proveedores.php')\">
	<input name=cancelar type=button value=Cancelar OnClick=\"location.replace('./proveedores.php')\"></center>
	<br><br>
	</tr>
	</table>
	</tr>
	</table></center>
	</fieldset>
	</form>
			</body>
			</html>
";
?>