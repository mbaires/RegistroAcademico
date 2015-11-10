
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


	if(@$_GET["id"])
	{
	include("../mysql.php");
	$id=$_GET["id"];

	$datos=mysql_fetch_array(mysql_query("Select * from Proveedores where codigo='$_GET[id]'"));

	echo "


	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-15\" />
	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">
	<title>Editando datos de Proveedores</title>
	</head>
    <form method=post onsubmit='return verificar();'>
	<body>
	<br>
	<br>
	<center><table width=80% border=2 bordercolor=#78B1C1 cellspacing=0 cellpadding=0>
	<tr>
	<td><center><table border=0 width=70% cellspacing=0 cellpadding=0>
	<tr bgcolor=#610B0B>
	<th colspan=2><font face=arial size=3 color=white><div align=centert>Modificando Registro de proveedor</th>
	<tr>
	<td colspan=2><font face=arial color=white size=2><center><b>fgdfgdfgdfgdfgdgdfdg</b></td>
	<tr>
	<td>
		<font face=arial size=2><b>Codigo:   <br><br>
				<td><input name=codigo type=text size=10 value='$id' readonly>

	<tr>
	<td><font face=arial size=2><b>Proveedor:<br><br>
	<td><input name=nombre type=text size=35 value='$datos[Nombre]'>
	<tr>
	<td><font face=arial size=2><b>Direcci&oacute;n:<br><br>
	<td><input name=direccion type=text size=35 value='$datos[Direccion]'>
	<tr>
	<td><font face=arial size=2><b>Contacto:  <br><br>
	<td><input name=ncontacto type=text size=35 value='$datos[Ncontacto]'>
	<tr>
	<td><font face=arial size=2><b>Tel&eacute;fono: <br><br>
	<td><input name=telefono type=text size=10 maxlength=10 value=$datos[Telefono] onkeyup=\"mascara(this,'-',patron2,true)\"  onblur=\"validar(this)\"><font face=arial size=2>(0000-0000)
	<tr>
	<td><font face=arial size=2><b>Celular:<br><br>
	<td><input name=cel type=text size=10 maxlength=10 value=$datos[Celular] onkeyup=\"mascara(this,'-',patron2,true)\"  onblur=\"validar(this)\"><font face=arial  size=2 >(0000-0000)
    <tr>
	<td><font face=arial size=2><b>Email:<br>
	<td><input name=email type=text size=55 value=$datos[Email]>
	<tr>
	<td colspan=2><br><center><input name=aceptar type=submit value=\"Guardar Datos\">
	<input name=cancelar type=button value=Cancelar OnClick=\"location.replace('consulta_proveedores.php')\"></center>
	</tr>
	</table>
	</tr>
	</table></center>		</form>
			</body>
			</html>

	";
	}

	if($_POST)
	{
		if(mysql_query("Update Proveedores set  Nombre='$_POST[nombre]',
												Direccion='$_POST[direccion]',
												Ncontacto='$_POST[ncontacto]',
												Telefono='$_POST[telefono]',
												Celular='$_POST[cel]',
                                                Email='$_POST[email]' where codigo=$_POST[codigo]
															"))
															{
																echo "<script>alert('Los datos han sido actualizados');location.replace('consulta_proveedores.php');</script>";
															}
															else
															{
																echo "<font face=arial size=2 color=red>Error".mysql_error();
															}
	}


	// eliminando proveedor

	if(@$_GET["delete"])
	{
	include("../mysql.php");
		if(mysql_query("Delete from Proveedores where codigo='$_GET[delete]'"))
		{
			echo "<script>alert('El proveedor c&oacute;digo $_GET[delete] ha sido eliminado');location.replace('./consulta_proveedores.php');</script>";
		}
		else
		{
			echo "<font face=arial size=2 color=white>Error".mysql_error();
		}
	}
	?>