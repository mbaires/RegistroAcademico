<?php

	$nombre = $_FILES["archivo"]["name"];
	$archivo1 = $_FILES["archivo"]["tmp_name"];
		
	//verificando la conexi�n
	$User = "root";
	$PassWord = "root";
	$DataBase = "Inventario";
	if(mysql_connect("localhost","$User","$PassWord"))
	{
		//Eliminando la base de datos
		if(mysql_query("drop database $DataBase"))
		{
			echo "<script>
			alert('El proceso de restauraci�n del sistema puede que tarde algunos minutos\\nAsi que no realice ning�n proceso mientras se restaura el sistema');
			</script>";
		}
		
		if(mysql_query("create database $DataBase"))
		{	
			$Sentencia = "mysql.exe --user=$User --password=$PassWord  $DataBase < $archivo1" . chr(32);
			$Resultado = @exec($Sentencia);
			echo "<script>alert('�xito! Se ha restaurado correctamente el sistema');</script>";
		}
		else
		{
			echo "<script>alert('Error! no se pudo restaurar el sistema');</script>";
		}
	}
	else
	{
		echo "<script>alert('Error! no se puede continuar con la restauraci�n del sistema');</script>";
	}
?>