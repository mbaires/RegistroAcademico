<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

include('../mysql.php');
}
?>
<?
if(isset($_GET["nfactura"]))
{
$factura=mysql_fetch_array(mysql_query("Select * from Facturas where N_factura='$_GET[nfactura]'"));
$cliente=mysql_fetch_array(mysql_query("Select * from Clientes where codigo='$factura[id_cliente]'"));

echo "


<html>
<head>
</head>

</style>

<link rel=stylesheet href=estilo.css  type=text/css>

<body leftmargin=0 topmargin=0>

<form method=post onsubmit=\"javascript:return validar(this);\">
<center><table  width=95% border=1 cellpadding=0 cellspacing=0 bordercolor=#000099>
  <tr><td>
  <table border=0>
  <tr>
  <td ><table width=100% border=0 cellpadding=0 cellspacing=0 bordercolor=#000066>
    <tr>
	<td><br><center><table>
      <tr>
        <td><table width=100% border=0 cellpadding=0 cellspacing=2>
          <tr>
		  <td width=98><font face=arial size=2>FACTURA N.:</td>
            <td width=92><input name=nfactura maxlength=35 size=10 value=$_GET[nfactura]></td>
			<td><font face=arial size=2>Fecha
			
            <td><input name=fecha size=10 value='$factura[Fecha_venta]'>
			
			<tr>
			<input name=codigo value=$cliente[codigo] type=hidden>
			<input name=nfactura value=$_GET[nfactura] type=hidden>
			
            <td width=92><font face=arial size=2>CLENTE:</td>
            <td width=92><input name=nombre maxlength=35 size=55 value='$cliente[Nombre]'></td>
            
          </tr>
          <tr>
            <td><font face=arial size=2>DIRECCION:</td>
            <td><input name=direccion maxlength=55 size=55 value='$cliente[Direccion]'></td>
			<tr>
            <td><font face=arial size=2>DUI:</td>
            <td><input name=dui maxlength=10 size=10 value='$cliente[Dui]'></td>
			<tr>
            <td><font face=arial size=2>NIT:</td>
            <td><input name=nit maxlength=10 size=10 value='$cliente[Nit]'></td>
			<tr>
			
			</tr>
			</table></td>
			
      </tr>
      <tr>
        <td colspan=2><br>          
          <center>
            <input type=submit name=reimprimir value='Reimprimir Factura'>
		  <input type=submit name=anular value='Anular Factura'>		  
		 
			
		 </center></td>
        </tr>
      ";
	  
        $prod = mysql_query("Select * from Ventas where N_factura='$_GET[nfactura]'");
        
       
        echo "<center><body><table cellspadding=0 cellspacing=0 border=1 width=90%>
        <tr>
        <td align=center bgcolor=black><font color=white><font face=verdana size=2>Cantidad</td>
        <td align=center bgcolor=black><font color=white><font face=verdana size=2>Descripción</td>
        <td align=center bgcolor=black><font color=white><font face=verdana size=2>P/Unitario</td>
        <td align=center bgcolor=black><font color=white><font face=verdana size=2>V/Exentas</td>
        <td align=center bgcolor=black><font color=white><font face=verdana size=2>V/Afectas</td>
        
        </td>
        
        ";
       
     
        $sub = 0;
        $iva =0;
        $suma =0;
		$sinIva=0;
        $total = 0;
        
        while($data = mysql_fetch_array($prod))
                
        {
        
        
        $sub = $data['Cantidad'] * $data['Precio_venta'];
        $suma = $suma + $sub;
        $iva = $suma * 0.13;
		$sinIva=$suma - $iva;
        $total = $suma + $iva;
        
		$descripcion=mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto='$data[codigo_producto]'"));
                echo "
        <tr><td style=border-bottom:solid gray 1px;  width=10>$data[Cantidad] 
			<td style=border-bottom:solid gray 1px;  width=350><div align=center> $descripcion[Nombre]&nbsp;$descripcion[Marca]&nbsp;$descripcion[Estilo]&nbsp;$descripcion[Color]
			<td style=border-bottom:solid gray 1px;>&nbsp; $data[Precio_venta]
			<td style=border-bottom:solid gray 1px;>&nbsp; 0
			<td style=border-bottom:solid gray 1px;>&nbsp; $sub
			<td style=border-bottom:solid gray 1px;>
		";
        
        }
       
       
        
        echo "</table></center>";
        
        
      echo "
        
        </tr>
	  
    </tr>
	  </table></center>
	
	  </tr>
	  <tr>
	  <td colspan=2><center><table border=0 width=100% cellpadding=0 cellspacing=0>
	  <tr>
	  <td><br>&nbsp;&nbsp;&nbsp;&nbsp;<td><div align=left class=text><br>Son:
       </div>
	    <div align=right><table width=249 border=0 cellpadding=0 cellspacing=0>
          <tr>
            <td width=150><div align=right class=text>Suma $:<td class=text> $sinIva </div></td>
            
          </tr>
          <tr>
            <td><div align=right class=texto>Iva $:<td class=text>$iva </div></td>
            <td><div align=center></div></td>
          </tr>
          <tr>
            <td><div align=right class=text>Ventas Totales $:<td class=text> $total </div></td>
            
          </tr>
        </table>
        
        
   
           
       </div>
</td>
	  </tr>
	  </table>
	  
	  
	  </center></td>
	  </tr>
    </table>
    
	
  </tr>
  
  </table>
  
  </td></tr></table></td></tr>
    </form>
</div>

	
    
</body>
</html>

";
}

if(isset($_POST["reimprimir"]))
{
	echo "<script>location.replace('./imprimir_facturaCF.php?nfactura=$_POST[nfactura]');</script>";
}
else if(isset($_POST["anular"]))
{
	echo "<script>location.replace('./anular_facturaCF.php?nfactura=$_POST[nfactura]');</script>";
}        
        ?>
