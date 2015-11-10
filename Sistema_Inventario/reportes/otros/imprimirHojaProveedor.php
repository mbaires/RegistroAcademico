<?php
session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{

include('../mysql.php');
}
echo "<html>
<head>
<title>Reporte de Proveedores
</title>
</head>
<body onLoad='window.print();'>
";


$factual = Date("d"."-"."m"."-"."Y");
$hora = Date("H:i:s");

echo "<center>
<fieldset style='width:70%'>
<table width=100% border=0>
<tr>
<th colspan=2><font face=tahoma size=4><u>Reporte de Proveedores</th>
<tr>
<td><font face=verdana size=2><b>Sistema de Inventario<br>Librer&iacute;a ITCA-FEPADE<br>San Miguel
<td align=right><img src=../images/logoItca.jpg width=150 height=70>

</tr>
</table>



";


echo "<center><font face=tahoma size=2>Reporte de Proveedores Registrados: $factual Hora: $hora";
echo "
<hr color=#BDBDBD>
<table bordercolor=black border=1 cellspacing=0 cellpadding=0 width=100%>
<tr bgcolor=610B0B>
<th><font face=tahoma  color=white size=2>Codigo.
<th><font face=tahoma color=white size=2 >Nombre
<th><font face=tahoma color=white size=2 >Direcci&oacute;n
<th><font face=tahoma color=white size=2 >Tel&eacute;fono
<th><font face=tahoma color=white size=2 >Celular
<tr>
";
$consulta=mysql_query("SELECT * from Proveedores");
	if(mysql_num_rows($consulta)==0)
	{
		echo "<td><font face=arial size=2>No hay Proveedores Registrados</td>";
	}
	else
	{
	
	
		while($prov=mysql_fetch_array($consulta))
		{
			echo "<td><font face=tahoma size=2 color=black><center>$prov[codigo]
				  <td><font face=tahoma size=2 color=black><center>$prov[Nombre]
				  <td><font face=tahoma size=2 color=black>$prov[Direccion]
				  <td><font face=tahoma size=2 color=black><center>$prov[Telefono]
				  <td><font face=tahoma size=2 color=black><center>$prov[Celular]
				  <tr>
			";
		}
		
		
	}
echo "
</tr>
</table>
<hr color=#BDBDBD>
</fieldset>";
?>