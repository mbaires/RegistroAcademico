<html>
<body>
<head><meta content="text/html; charset=ISO-8859-15" http-equiv="Content-Type">
</head>
<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

include('../mysql.php');
}
?>
<?php
if($_GET["nfactura"])
{
$fecha=Date("d-m-y");
$factura=mysql_fetch_array(mysql_query("Select * from Facturas where N_factura='$_GET[nfactura]'"));
echo "
<html>
<head>
</head>

</style>

<body leftmargin=0 topmargin=0>

<form method=post onsubmit=\"javascript:return validar(this);\">
<input name=nfactura value=$_GET[nfactura] type=hidden>
<center><table  width=95% border=1 cellpadding=0 cellspacing=0 bordercolor=#000099>
  <tr><td>
  <table border=0 width=100%>
  <tr>
  <td><table width=100% border=1 cellpadding=0 cellspacing=0 bordercolor=#000066>
    <tr>
	<td><br><center><table>
      <tr>
        <td><table width=100% border=0 cellpadding=0 cellspacing=2>
          <tr>
		  <td width=98><span class=text>FACTURA N.:</td>
            <td width=92><input name=nfactura maxlength=35 value=$factura[N_factura]></td>
			<tr>
            <td width=92><span class=text>CLIENTE:</td>
            <td width=92><input name=nombre maxlength=35  size=55  value='$factura[Nombre_cliente]'></td>
            <td class=text>Fecha
			
            <td><input name=fecha size=10 value=$factura[Fecha_venta]>
			
          </tr>
          <tr>
            <td><span class=text>DIRECCION:</td>
            <td><input name=direccion maxlength=55 value='$factura[Direccion]' size=55></td>
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
        
        $prod = mysql_query("Select * from ventas where N_factura='$factura[N_factura]'");
        
       
        echo "<center><table cellspadding=0 cellspacing=0 border=1 width=100%>
        <tr>
        <td align=center bgcolor=#610B0B><font color=white><font face=verdana size=2>Cantidad</td>
        <td align=center bgcolor=#610B0B><font color=white><font face=verdana size=2>Descripción</td>
        <td align=center bgcolor=#610B0B><font color=white><font face=verdana size=2>P/Unitario</td>
        <td align=center bgcolor=#610B0B><font color=white><font face=verdana size=2>V/Exentas</td>
        <td align=center bgcolor=#610B0B><font color=white><font face=verdana size=2>V/Afectas</td>
        
        </td>
        
        ";
       
     
        $sub = 0;
        $iva =0;
        $suma =0;
        $total = 0;
        
        while($data = mysql_fetch_array($prod))
                
        {
        
        
        $sub = $data['Cantidad'] * $data['Precio_venta'];
        $suma = $suma + $sub;
        $iva = $suma * 0.13;
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
	  <td><br>&nbsp;&nbsp;&nbsp;&nbsp;<td><div align=left class=text><br><b>Son:</b>
       </div>";
	   
	   include ("convertir.php");
	   
	   
	   echo "
	    <div align=right><table width=249 border=0 cellpadding=0 cellspacing=0>
          <tr>
            <td width=150><div align=right class=text>Suma $:<td class=text> $suma </div></td>
            
          </tr>
          <tr>
            <td><div align=right class=texto>Ventas Exentas $:<td class=text> </div></td>
            <td><div align=center></div></td>
          </tr>
         <tr>
            <td><div align=right class=texto>IVA $: <td class=text>--<td class=text> </div></td>
            <td><div align=center></div></td>
          </tr>
          <tr>
            <td><div align=right class=text><b>Ventas Totales $:</b><td class=text> $suma </div></td>
            
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
	echo "<script>location.replace('./imprimir_factura.php?nfactura=$_POST[nfactura]');</script>";
}
else if(isset($_POST["anular"]))
{
	echo "<script>location.replace('./anular_factura.php?nfactura=$_POST[nfactura]');</script>";
}
 ?>
</body>
</html>