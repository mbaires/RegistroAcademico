<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{

include('../mysql.php');
}
?>
<?
$fecha=Date("d-m-y");
if($_POST)
{
	$nfactura=$_POST["nfactura"];
	$cliente=$_POST["nombre"];
	$direccion=$_POST["direccion"];
	$fecha=$_POST["fecha"];
}
else
{
	$nfactura="";
	$cliente="";
	$direccion="";
	$fecha=$fecha;
}


echo "
<html>
<head>
<script language='javascript' src='./popcalendar.js'></script>
</head>

</style>


<body leftmargin=0 topmargin=0 vlink=white alink=white link=white>

<center>

	<table  width=100% border=1 cellpadding=0 cellspacing=0 bordercolor=#000099>
	<tr>
	<td><iframe frameborder=0 name=listaProductos src=./buscar_productos.php width=100% height=150></iframe>
   <tr>
  <td><iframe frameborder=0 name=factura src=./FacturaConsumidor.php width=100% height=330></iframe>
</center>  
</body>
</html>";
?>
  



