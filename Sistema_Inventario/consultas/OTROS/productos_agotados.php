<?php
session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{
$usuario=session_register("SESSION");
include('../mysql.php');
include('../script.php');
}
?>

	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
	<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">
	<title>Editando datos de Proveedores</title>
	</head>
    <form method=post onsubmit='return verificar();'>
	<body>
    <h2><font face=arial><center>LIIBRERIA ITCA FEPADE</h2>
	<h3><font face=arial><center>Reporte de Productos de existencias Agotada</center></h3>
	<br>
	<center><table width=100% border=2 bordercolor=#78B1C1 cellspacing=0 cellpadding=0>
	<tr>
	<td><center><table border=0 width=70% cellspacing=0 cellpadding=0></table>
    <tr>
    <table border=1 bordercolor=black cellpacing=0 cellpadding=0 width=100%>
        <tr bgcolor=red>
        <th><font face=arial size=2>Codigo
        <th><font face=arial size=2>Nombre
        <th><font face=arial size=2>Marca
        <th><font face=arial size=2>Estilo
        <th><font face=arial size=2>Color
        <th><font face=arial size=2>Existencias
        <tr>
    <?php

    $consultar=mysql_query("Select * from Inventario where Existencias < 5");
    while($productos=mysql_fetch_array($consultar))
    {
      echo "
        <td><font face=arial size=2><center>$productos[codigo_producto]
        <td><font face=arial size=2>$productos[Nombre]
        <td><font face=arial size=2>$productos[Marca]
        <td><font face=arial size=2>$productos[Estilo]
        <td><font face=arial size=2>$productos[Color]
        <td><font face=arial size=2><center>$productos[Existencias]
        <tr>
        ";
    }
     echo "</tr></table>";
     ?>

    </tr>
    <tr>
    <td>
    <center><input type=button value='Imprimir Reporte' onClick="this.style.visibility='hidden';print();this.style.visibility='visible';" class=botn>
    </tr>
	</tr>
	</table>
	</tr>
	</table></center>		</form>
			</body>
			</html>




