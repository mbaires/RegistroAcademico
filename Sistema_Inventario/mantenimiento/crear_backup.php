<?php

session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{
$usuario=session_register("SESSION");
include("../mysql.php");
}
	
	
	$resultado = "";
	$nombre = "";
	$chkFecha = "";
	$chkDescarga = "";
	if($_POST)
	{
		$nombre = $_POST["nombre"];
		$strArchivo = $nombre;
		if(isset($_POST["chkFecha"]))
		{
			$chkFecha = " checked ";
			$dia = date("d");
			$mes = date("m");
			$anio = date("Y");
			
			$strArchivo .= "_$dia-$mes-$anio";
		}
		$strArchivo.= ".sql";
		include("./config.php");
		
		if(isset($_POST["chkDescarga"]))
		{
			$chkDescarga = " checked ";
			echo "<script>window.open('./Backup_files/descargar.php?file=$strArchivo');</script>";
		}
	}
	
	echo "
		<body>
			<head>
			<style>
				.text
				{
					font-family:arial;
					color:black;
					font-size:12px;
				}
				
			</style>
		</head>
		<script>
		function validar()
		{
			if(document.all.nombre.value == '')
			{
				alert('Introduzca el nombre del archivo');
				document.all.nombre.focus();
				return false;												
			}
		}
		</script>
		<fildset style='border=1; border-color:brown;'>
		<legend style='font-family:arial; size=2;'>| CREAR COPIAS DE RESPALDO |</legend>
		<form method=post onsubmit=\"return validar()\">
		<table cellpadding=3 cellspacing=3 border=0 align=center>
		<tr>
		<td rowspan=5><img src=../images/032.png>
		<td class=text>Introduzca el nombre de la copia
		<td class=text><input type=text name=nombre class=caja value='$nombre'> <input type=submit value='Crear Backup' class=boton> <input type=button value='Cancelar' onclick=\"location.replace('./contentMantto.php')\" class=boton>
		</tr>
		<tr>
		<td colspan=2 class=text>Opciones del backup:
		</tr>
		<tr>
		<td class=text>Agregar Fecha al nombre <input type=checkbox name=chkFecha $chkFecha>
		<td class=text>Forzar Descarga <input type=checkbox name=chkDescarga $chkDescarga>
		</tr>
		</table>
		</form>
		
		$resultado
		</fieldset>
	";
?>