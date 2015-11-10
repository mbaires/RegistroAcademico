<?
session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{
$usuario=session_register("SESSION");
include('../mysql.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Proveedores</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/estilos.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body id="body">
  <div id="logo">
  <img src="../imagenes/logoItca.jpg" id="img">
  </div>


	<div id="menu">

	</div>

     <div id="contenido">
	<form method=post>

	<table width=100% height=90% align="left" border=0 bordercolor=#CCCCFF cellspacing=0 cellpadding=0>
		<tr>
		<td>
			<table width=100% height=90 border=0 bordercolor=black cellspacing=0 cellpadding=0>
					<tr>
					<td><iframe name=info src="./proveedores.php" align="left" width=98% height=565 frameborder=0></iframe>
			</tr>
			</table>


		</tr>
		</table>

</div>
  	</div>


</div>

		</form>


<!-- footer ends-->
</body>
</html>
