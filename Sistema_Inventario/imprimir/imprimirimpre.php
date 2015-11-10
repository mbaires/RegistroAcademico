<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{

}
echo "<html>
<head>
<title>Reporte de Impresiones
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
<th colspan=2><font face=tahoma size=4><u>Reporte de Impresiones</th>
<tr>
<td><font face=verdana size=2><b>Sistema de Inventario<br>Librer&iacute;a ITCA-FEPADE<br>San Miguel
<td align=right><img src=../logoItca.jpg width=150 height=70>

</tr>
</table>


";
echo "<center><font face=tahoma size=2>Reporte de Impresiones: $factual Hora: $hora";

?>
<html>
<head>
	<title>Reporte de Impresiones</title>
</head>
<body leftmargin=0 topmargin=0 vlink=white alink=white link=white>

<?


if(isset($_GET["val1"]) OR ($_GET["val2"]))
{
$valor = $_GET["val1"];
$valor0 = $_GET["val2"];
$valor1 = $_GET["val3"];
$valor2 = $_GET["val4"];
$valor3 = $_GET["val5"];

echo "


<table bordercolor=black border=1 width=100% height=60% aling=center>
  <tr bgcolor='#610B0B' >
    <td width=30%><center><b><font face=arial size=2  color=white>IMPRESIONES</b></center></td>
    <td width=14%><center><b><font face=arial size=2  color=white>C-I</b></center></td>
    <td width=15%><center><b><font face=arial size=2  color=white>C-F</b></center></td>
    <td width=24%><center><b><font face=arial size=2  color=white>CANTIDAD</b></center></td>
    <td width=17%><center><b><font face=arial size=2  color=white>TOTAL</b></center></td>
  </tr>
  <tr>
    <td><b><font color=#000000 size=+1 face=Arial, Helvetica, sans-serif>LD 035C/Printer</font></b></td>
	
    <td><center>$valor</center></td>
    <td><center>$valor0</center></td>
	";
	$diferencia=$valor0 - $valor;
	$Total1=$diferencia*0.11;
	echo "
	
    <td><center>$diferencia</center> 
	

    </td>

    <td><center>$Total1</center></td>
  </tr>
  <tr>
    <td><b><font color=#000000 size=+1 face=Arial, Helvetica, sans-serif>LD 060 C/Printer</font></b></td>
    
    <td><center>$valor1</center></td>
    <td><center>$valor2</center></td>
	";
	$diferencia1=$valor2 - $valor1;
	$Total2=$diferencia1*0.11;
	echo "
    <td><center> $diferencia1</center> 
	
    <td><center>$Total2<center></td>
  </tr>
  <tr>
     <td><b><font color=#000000 size=+1 face=Arial, Helvetica, sans-serif>Impresi&oacute;n a color</font></b></td>
    
    <td><center></center></td>
    <td><center></center></td>
	";
	
	echo "
    <td><center> </center>
	
    <td><center> $valor3 </center></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td  bgcolor=#610B0B><font color=#FFFFFF face=Arial size=+1>Totales:</font></td>
    <td></td>
    <td></td>
	";
	$suma=$diferencia+$diferencia1;
	$sumadinero = $Total1+$Total2+$valor3;
	
	echo "
    <td><center> $suma</center></td>
    <td><center>$ $sumadinero</center></td>
  </tr>
</table>
";
}
?>
</center>
<hr>

</body>
</html>