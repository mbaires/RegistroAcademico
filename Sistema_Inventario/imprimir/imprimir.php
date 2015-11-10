
	<?php
	
	
        
	if(isset($_POST["Enviar"]))
	{

    $valor = $_POST ['inicio'];
    $valor0 = $_POST ['final'];
    $diferencia = $valor0 - $valor;
    $Total1= $diferencia * 0.11;
	
	
	$valor1 = $_POST ['inicio1'];
    $valor2 = $_POST ['final1'];
    $diferencia1 = $valor2 - $valor1;
    $Total2= $diferencia1 * 0.11;
	
	$valor3 = $_POST ['inicio2'];
	$Total3= $valor3;

	$suma = $diferencia + $diferencia1;
	$sumadinero= $Total1 + $Total2 + $Total3;
    }
	else
	{
		$valor="";
		$valor0="";
        $valor1="";
		$valor2="";
        $valor3="";
		$diferencia="";
        	$diferencia1="";

                $Total1="";
                $Total2="";
                $Total3="";
				$suma="";
				$sumadinero="";

	}

    ?>

<html>

<body>
<head><center><font face="Arial" size="+2" ><b>IMPRESIONES</b></font></center></head><BR>
<form name="copias" method="post" >
<table border=1 bordercolor=black  width=100% height=40% aling=center cellpadding=0 cellspacing=0  >
  <tr bgcolor="#610B0B" >
    <td width="30%"  height="30"><center><b><font face=arial size=2  color=white>IMPRESIONES</b></center></td>
    <td width="14%"  height="30"><center><b><font face=arial size=2  color=white>C-I</b></center></td>
    <td width="15%"  height="30"><center><b><font face=arial size=2  color=white>C-F</b></center></td>
    <td width="24%"  height="30"><center><b><font face=arial size=2  color=white>CANTIDAD</b></center></td>
    <td width="17%"  height="30"><center><b><font face=arial size=2  color=white>TOTAL</b></center></td>
  </tr>
  <tr>
    <td><font color="#000000" size="+1" face="Arial, Helvetica, sans-serif">LD 035C/Printer</font></td>
	<?
	echo
		"
    <td bgcolor=><input name='inicio' value='$valor'/></td>
    <td bgcolor=> <input name='final' value='$valor0'/></td>
    <td><center> $diferencia </center>
	";
	?>

    </td>

    <td><center><? echo "$Total1";?></center></td>
  </tr>
  <tr>
    <td><font color="#000000" size="+1" face="Arial">LD 060 C/Printer</font></td>
    <?
	echo
		"
    <td bgcolor=><input name='inicio1' value='$valor1'/></td>
    <td bgcolor=> <input name='final1' value='$valor2'/></td>
    <td><center> $diferencia1 </center>
	";
	?>

    <td><center><? echo "$Total2";?></center></td>
  </tr>
  <tr>
     <td><font color="#000000"  size="+1" face="Arial">Impresi&oacute;n a color</font></td>
     <?
	echo
		"
    <td bgcolor= ></td>
    <td bgcolor=></td>
    <td><center>  </center>

    <td><center><input name='inicio2' value='$valor3'></center> </td>
  </tr>
  <tr>
  ";
   ?>
  </tr>
  <tr>
    <td height="20" bgcolor="#610B0B"><font color="#FFFFFF" face="Arial" size="+1">Totales:</font></td>
    <td></td>
    <td></td>
    <td><center><? echo "$suma";?></center></td>
    <td><center>$ <? echo "$sumadinero";?></center></td>
  </tr>
</table><tr>
    <td>
          <p><center> <input type="submit" name="Enviar" value="Calcular" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <?echo "<a href='imprimirimpre.php?val1=$valor&val2=$valor0&val3=$valor1&val4=$valor2&val5=$valor3' 
			   target='_blank'> <img src=../impresora.jpg width=50 height=50>
			";
		?>
          </center></p>
	        </td>
		</tr>
        <td align="right">
		
			<input type="reset" name="Limpiar" value="Limpiar" align="left"/>
        </td>
</form>
</body>
</html>

