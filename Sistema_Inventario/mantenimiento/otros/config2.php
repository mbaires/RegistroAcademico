<html>
<body>
<head><meta content="text/html; charset=ISO-8859-15" http-equiv="Content-Type">
</head>
<?php

	$nombre = $_FILES["archivo"]["name"];
	$archivo1 = $_FILES["archivo"]["tmp_name"];


   //extrallendo la extension del archivo
    $inverso = strrev("$nombre");
    $extension = substr("$inverso",0,3);

    //comprobando que el archivo no este vacio


    if($extension=="lqs")
    {
      if(filesize($archivo1) > 5000)
      {
          //verificando la conexión
      	$User = "root";
      	$PassWord = "root";
      	$DataBase = "Inventario";
      	if(mysql_connect("localhost","$User","$PassWord"))
      	{
      		//Eliminando la base de datos
      		if(mysql_query("drop database $DataBase"))
      		{
      			echo "<script>
      			alert('El proceso de restauración del sistema puede que tarde algunos minutos\\nAsi que no realice ningún proceso mientras se restaura el sistema');
      			</script>";
      		}

      		if(mysql_query("create database $DataBase"))
      		{
      			$Sentencia = "mysql.exe --user=$User --password=$PassWord  $DataBase < $archivo1" . chr(32);
      			$Resultado = @exec($Sentencia);
      			echo "<script>alert('Éxito! Se ha restaurado correctamente el sistema');</script>";
      		}
      		else
      		{
      			echo "<script>alert('Error! no se pudo restaurar el sistema');</script>";
      		}

        }

	}
	else
	{
		echo "<script>alert('Error! no se puede continuar con la restauración del sistema, el archivo seleccionado esta vacío');</script>";
	}
    }
    else
    {
        echo "<script>alert('Error Archivo Seleccionado No Compatible, Favor Seleccione una copia con extension .sql');</script>";

    }
?>
</body>
</html>
