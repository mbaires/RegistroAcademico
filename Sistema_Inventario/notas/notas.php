<html>
<body>
<head><meta content="text/html; charset=ISO-8859-15" http-equiv="Content-Type">
</head>
<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{

include('../mysql.php');
}

?>
<?

$fecha=Date("d-m-Y");
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
<form name=form1 method=post>
<center>

  <table border=0 width=100%>
  <tr>
  <td ><table width=100% border=0 cellpadding=0 cellspacing=0 bordercolor=#000066>
    <tr>
	<center><table>
      <tr>
        <td><table width=100% border=0 cellpadding=0 cellspacing=2>
          <tr>
		  <td width=98><font face=tahoma size=2>FACTURA N.:</td>
            <td width=92><input name=nfactura maxlength=35 size=10 value=$nfactura></td>
			<tr>
            <td width=92><font face=tahoma size=2>CLENTE:</td>
            <td width=92><input name=nombre maxlength=35 size=55 value='$cliente'></td>
            <td><font face=tahoma size=2>FECHA

            <td><input name=fecha size=10 value=$fecha readonly value=$fecha>&nbsp;<a href='#'><img src=../images/calendario.gif width=30 height=20 onClick=\"popUpCalendar(this, form1.fecha, 'dd-mm-yyyy');\"></a>

          </tr>
          <tr>
            <td><font face=tahoma size=2>DIRECCION:</td>
            <td><input name=direccion maxlength=55 size=55 value='$direccion'></td>
			<tr>

          </tr>
        </table></td>


      </tr>
      <tr>
        <td colspan=2>
          <center>
            <input type=button name=agregar value='Agregar Productos' onClick=location.replace('buscar_productos.php')>
		  <input type=submit name=guardar value='Guardar Factura'>


		 </center></td>
        </tr>

        ";

        $prod = mysql_query("Select * from temporal");

       echo "
        <center><table cellspadding=0 cellspacing=0 border=1 width=100%>
        <tr>
        <td align=center bgcolor=#610B0B><font color=white><font face=verdana size=2>Cantidad</td>
        <td align=center bgcolor=#610B0B><font color=white><font face=verdana size=2>Descripci&oacute;n</td>
        <td align=center bgcolor=#610B0B><font color=white><font face=verdana size=2>P/Unitario</td>
        <td align=center bgcolor=#610B0B><font color=white><font face=verdana size=2>V/Exentas</td>
        <td align=center bgcolor=#610B0B><font color=white><font face=verdana size=2>V/Afectas</td>
        <td align=center bgcolor=#610B0B><font color=white><font face=verdana size=2>Eliminar</td>
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
        $iva = "--";
        $total = $suma + $iva;

		$descripcion=mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto='$data[codigo_producto]'"));
                echo "
			<tr><td style=border-bottom:solid gray 1px;  width=10>$data[Cantidad]
			<td style=border-bottom:solid gray 1px;  width=350><div align=center> $descripcion[Nombre]&nbsp;$descripcion[Marca]&nbsp;$descripcion[Estilo]&nbsp;$descripcion[Color]
			<td style=border-bottom:solid gray 1px;>&nbsp; $data[Precio_venta]
			<td style=border-bottom:solid gray 1px;>&nbsp; 0
			<td style=border-bottom:solid gray 1px;>&nbsp; $sub
			<td style=border-bottom:solid gray 1px;>
			<a href='eliminarFactura.php?codigo=$data[codigo_producto]&&cantidad=$data[Cantidad]'><center><img src=../images/022.png width=20 height=20></a></td>";

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
       </div>";


	    include ("convertir.php");


		echo "
	    <div align=right><table width=249 border=0 cellpadding=0 cellspacing=0>
          <tr>
            <td width=150><div align=right class=text>Suma $:<td class=text > $suma </div></td>

          </tr>
          <tr>
            <td><div align=right class=texto>Ventas Exentas $:<td class=text> </div></td>
            <td><div align=center></div></td>
          </tr>

            <tr>
            <td><div align=right class=texto>IVA $: <td class=text>$iva<td class=text> </div></td>
            <td><div align=center></div></td>
          </tr>


          <tr>
            <td><div align=right  class=text name=ventas_totales><b>Ventas Totales $:</b><td class=text> $total</div></td>

          </tr>
        </table>
		</td>
	  </tr>
	  </table>


	  </center></td>
	  </tr>
    </table>

    </form>
</body>
</html>
        ";


/*---------------------------------------------------------------------------*/
/*/guardando los datos de la factura*/


if(isset($_POST["guardar"]))
{
//validando que los campos no esten vacios
	if($_POST["nfactura"]=="" or $_POST["nombre"] == "" or $_POST["direccion"]=="")
	{
	echo "<script>alert('favor completar los datos del formulario');</script>";
	}
	else
	{
			//Comprobando que la factura no este vacia
			$comprobar=mysql_query("Select * from temporal");
			if(mysql_num_rows($comprobar)==0)
			{
					echo "<script>alert('La factura esta vacia');</script>";
			}
			else
			{
					if(mysql_query("insert into facturas values('$_POST[nfactura]','$_POST[nombre]','$_POST[direccion]','0','$_POST[fecha]','Contado')"))
					{


							if(mysql_query("Update Ventas set N_factura=$_POST[nfactura] where N_factura=0"))
							{

							echo "<script>alert('Ok: La factura ha sido registrada Correctamente');location.replace('./imprimir.php?nfactura=$_POST[nfactura]');</script>";

							}
					}
					else
					{
					echo "<script>alert('error: La Factura ya ha sido emitida');</script>";
					}
			}
	}
}?>

 </body>
</html>


