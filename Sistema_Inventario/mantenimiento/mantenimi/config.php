<?php

	$usuario = "root"; 		
	$password = "root";	
	$DataBase = "Inventario";

	$FileName = $strArchivo;
	$Sentencia = "mysqldump.exe --user=$usuario --password=$password" . chr(32);
	$Sentencia .= "-e -K -f -n -q --add-locks" . chr(32);
	$Sentencia .= "--databases $DataBase > $FileName" . chr(32);
	
	$Resultados= @exec($Sentencia);
	$ruta = "./Backup_files/$FileName";
	
	
	$id_file = fopen($FileName,"r");
	$tamanio = filesize($FileName);
	
	if($tamanio=="0")
	{
		$error=true;
	}
	else
	{
		$error=false;
	}
	fclose($id_file);
	
	
	if($error==true)
	{
		if(unlink("$FileName"))
		{
			echo "<script>alert('Error! no se pudo crear la copia de respaldo');</script>";
		}
	}
	
	if($error!=true)
	{
		if (copy($FileName, $ruta)) 
		{	
			if(unlink($FileName))
			{
			  
			  echo "
			  <script>alert('Se ha creado la copia de respaldo con el nombre de $FileName');</script>
			  ";
			  $resultado ="
			  <table width='50%' align=center>
			  <tr>
			  <td colspan=2><p class=titulo align=center>Detalles de la Copia de Respaldo</p>
			  </tr>
			  <tr>
			  <td class=td><p class=texto>Nombre del archivo:
			  <td class=td><p class=texto> $FileName
			  </tr>
			  <tr>
			  <td class=td><p class=texto>Descargar:
			  <td class=td><p class=texto><a href='./Backup_files/descargar.php?file=$FileName' target=_blank>[Descargar]</a>
			  </tr>
			  </table>
			  ";
			}  
		}
	}	
?>