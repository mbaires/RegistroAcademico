<?php
session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}elseif($_SESSION["tipo"] != "administrador")
{
	echo "<script>location.replace('../home.php');</script>";
}
else
{
$usuario=session_register("SESSION");
include('../mysql.php');
}
	$resultado="";
	if($_FILES)
	{
		include("./config2.php");
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
			if(document.all.archivo.value == '')
			{
				alert('Seleccione un archivo');
				document.all.archivo.focus();
				return false;
			}
		}

		<fieldset style='borde:1; border-color:black'>
		<legend style='font-family:arial; size:2;'><b>| RESTAURANDO UNA COPIA DE RESPALDO |</b></legend>
		<form method=post enctype=\"multipart/form-data\" onsubmit=\"return validar();\">
        <table border=0 bordercolor='#123456' align=center width='80%'>

		</tr>
		<tr>
		<td rowspan=4><img src=../images/restaurar.png width=80 height=80>
		<td class=text>Seleccione el Archivo:
		<td class=text><input type=file name=archivo class=caja>
		</tr>
		<tr>
		<td colspan=2 align=center>
		<input type=submit value='Restaurar Ahora' class=boton>
		<input type=button value='Cancelar' onclick=\"location.replace('./contentMantto.php')\" class=boton>
		</tr>
		</table>
		</form>
		$resultado
	";
?>