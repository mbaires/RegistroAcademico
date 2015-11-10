<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../indexx.php');</script>";
}else{

include('../mysql.php');
}
?>
  <?
  
 if(@isset($_GET["nfactura"]))
 {
 
        include("../mysql.php");
        $consulta = mysql_fetch_array(mysql_query("select * from Facturas where N_factura = '$_GET[nfactura]' "));
		$cliente=mysql_fetch_array(mysql_query("Select * from Clientes where codigo=$consulta[id_cliente]"));
               
        echo "
        <html>
        <head>
        
        <title>Imprimiendo</title>
        </head>
		<meta http-equiv='refresh' content='1; URL=./consulta_venta.php'>
        <body onload='window.print()';>
        <table border=0>
        <tr>
        <td> <div id=\"Layer1\" style=\"position:absolute; width:100%; z-index:1; left:560px; top:60px;\">
				<table>
				<tr>
					
					<td><font color=red face=verdana size=2>$consulta[Fecha_venta]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</tr>
			</table></did></tr>
			</table>";
	
		
		echo "<table border=0>
        <tr>
        <td> <div id=\"Layer1\" style=\"position:absolute; width:100%; z-index:1; left:70px; top:77px;\">
		<table width=600 border=0>
		<tr>
		<td><font color=blue face=verdana size=2>$cliente[Nombre]
		<tr>
		<td><br><font color=red face=verdana size=2>$cliente[Direccion]
		<tr>
		<td><br><font color=red face=verdana size=2>$cliente[Dui]
		<tr>
		<td><br><font color=red face=verdana size=2>$cliente[Nit]
		</tr>
		</table></tr>
		</table>";
		
		
        $prod = mysql_query("Select * from Ventas where N_factura='$_GET[nfactura]'");
        
        echo "
        <body leftmargin=0 topmargin=0>
        <center>
       <div id=\"Layer1\" style=\"position:absolute; width:100%; height:550px; z-index:1; left: 0px; top:150px;\">
       <table border=0 width=100%  height=42% cellspadding=0 cellspacing=0>
        <tr>
        <td>       
         <div id=\"Layer1\" style=\"position:absolute; width:100%; height:550px; z-index:1; left: 0px; top:25px;\">
         <table cellspadding=0 cellspacing=0 border=0 bordercolor=red width=100% leftmargin=0 topmargin=0>
        
        <tr>
       
			
        
        ";
        
               
        
        $sub = 0;
        $iva =0;
        $suma =0;
        $total = 0;
        $exentas=0;
        
               
        while($data = mysql_fetch_array($prod))
        {
        
        $sub = $data['Cantidad'] * $data['Precio_venta'];
        $suma = $suma + $sub;
        $iva = $suma * 0.13;
        $total = $suma + $iva;
        
        
        $descripcion=mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto=$data[codigo_producto]"));
		
        
        echo "
			
        
        <tr>
			<td   width=45><font color=black face=verdana size=2>$data[Cantidad] 
			<td  width=350><font color=black face=verdana size=2> $descripcion[Nombre]&nbsp;$descripcion[Marca]&nbsp;$descripcion[Estilo]&nbsp;$descripcion[Color] 
			<td  width=80><center><font color=red face=verdana size=2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data[Precio_venta]
			<td width=80><center><font color=red face=verdana size=2>&nbsp;&nbsp;&nbsp;&nbsp; 0
			<td  width=100><center><font color=black face=verdana size=2>&nbsp;&nbsp;&nbsp;&nbsp; $sub
			
			";
        
        }
       }
        
    
        echo "</table></center>
        
       
        </tr>
        </table>
           <tr>
           </tr>
        </table>
	
	
	  </tr>
	  <tr>
	  <td colspan=2><center><table width=98% cellpadding=0 cellspacing=0 border=0>
	  <tr>
	  <td><div align=left><font color=red>
       </div>
	    <div align=right><table width=150 border=0 cellpadding=0 cellspacing=0>
          <tr>
            <td><div align=right><font color=red face=verdana size=2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$: $suma </div></td>
            
          </tr>
          <tr>
            <td><br></div></td>
            
          </tr>
          <tr>
            <td><div align=right><font color=red face=verdana size=2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$: $suma </div></td>
            ";
			
	include ("convertir.php");
			 echo "
          </tr>
        </table>
    
        </body>
        ";
      				
        
        ?>
	




 