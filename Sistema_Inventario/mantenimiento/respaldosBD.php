<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
Session_start();
if(!isset($_SESSION["password"])){
	echo "<script>alert('Usuario no registrado');
	location.replace('index.php');</script>";
}
else{
//$usuario=session_register("SESSION");
//nclude('mysql.php');
}?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Respaldo</title>
<meta name="keywords" content="free css templates, blog design, 2-column, web design, CSS, HTML" />
<meta name="description" content="Design Blog - free css template, 2-column blog layout" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head>
<body>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">
    
    <div id="templatemo_header">

            
        <div id="site_title">
            <a><font face="">Sistema
							de Registro Academico
							</a>
        </div> <!-- end of site_title -->
        
        <div id="search_box">
            <!aqui va el formulario de busqueda!>
			<img src="../images/logo3.gif" width="150" height="130">
        </div>
    
   
        <div class="cleaner"></div>
        
    </div> <!-- end of header -->
    
    <div id="templatemo_menu">
         <ul>

            <li><a href="../home.php">HOME</a></li>
            <?php
             if($_SESSION["tipo"] == "administrador")
             {
               ?>
               <li><a href="../mantenimiento/usuarios.php" >USUARIOS</a></li>
               <?php
             }
            ?>
			<li><a href="../consultas/Consultas.php" >CONSULTAS</a></li>
			<li><a href="../reportes/reportes.php" >REPORTE</a></li>
            <?php
             if($_SESSION["tipo"] == "administrador")
             {
               ?>
              <li><a href="../mantenimiento/respaldosBD.php" class="current">RESPALDO</a></li>
               <?php
             }
            ?>
<li><a href="../herramientas/herramientas.php" >AYUDA</a></li>
        </ul>
        <div id="register_box">
        	<a href="../cerrar_sesion.php"><span class=""><b><P ALIGN= center >Cerrar Sesion</p></span></a>
        </div>
    </div> <!-- end of templatemo_menu -->
    
    <div id="templatemo_main">
		
		<div class="sidebar_box">
            	<h3>OPCIONES</h3>
                
                <ul class="sidebar_menu">

                    <li><a href="./crear_backup.php" target="contenido">&raquo; <b>CREAR COPIAS DE RESPALDO </a></li>
                    <li><a href="./restaurar_backup.php" target="contenido">&raquo; <b>RESTAURAR COPIAS</a></li>
                    

       		  </ul>
                
          </div>
    	
        <div id="templatemo_content">
        
		<div class="post_box">
            
                <iframe name="contenido" width="745px" height="500px" frameborder="0" src="../contentMantto.php"></iframe>
            </div>			
          
        
        </div>
        
                   
            
          
        
        </div>
    
    	<div class="cleaner"></div>
    </div>
    
</div>
<div class="cleaner"></div>
</div>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
    
    	<div class="footer_box col_w300">
					    
					<center>	Copyright 2015  |\ MCPB /| San Miguel </center>
        </div>
        
        
    	<div class="cleaner"></div>
    </div>
</div>

<div id="templatemo_copyright">

    

</div>

</body>
</html>