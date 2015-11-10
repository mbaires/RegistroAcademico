<?php
	$ruta = "$_SERVER[DOCUMENT_ROOT]\Sistema_Inventario\mantenimiento\Backup_files" . "/" . $_GET["file"]; 
	header ("Content-Disposition: attachment; filename=".$_GET["file"]."\n\n"); 
	header ("Content-Type: application/octet-stream");
	header ("Content-Length: ".filesize($ruta));
	readfile($ruta);
	
?>