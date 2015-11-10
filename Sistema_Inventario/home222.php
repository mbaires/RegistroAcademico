<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?
session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('./index.php');</script>";
}else{
$usuario=session_register("SESSION");
include('./mysql.php');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Principal</title>
<meta name="keywords" content="free css templates, blog design, 2-column, web design, CSS, HTML" />
<meta name="description" content="Design Blog - free css template, 2-column blog layout" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
		<a>
            	<span> <font style="font-style:italic" >Sistema de Inventario y Facturaci&oacute;n</font></span>
                
            </a>
        </div> <!-- end of site_title -->
        
        <div id="search_box">

			<img src="./images/LogoItca.jpg" width="200" height="80">
        </div>
    
   
        <div class="cleaner"></div>
        
    </div> <!-- end of header -->
    
    <div id="templatemo_menu">
        <ul>

            <li><a href="./home.php" class="current"><span></span><b>SISTEMA</a></li>
			<li><a href="./consultas/Consultas.php" ><span></span><b>CONSULTAS</a></li>
			<li><a href="./reportes/reportes.php" ><span></span><b>REPORTES</a></li>


        </ul>    	
        
        <div id="register_box">
        	<a href="./cerrar_sesion.php"><span class="tagline">Cerrar Sesi&oacute;n</span></a>
        </div>
    </div> <!-- end of templatemo_menu -->
    
    <div id="templatemo_main">
		
		<div class="sidebar_box">
            	<h3><b>OPCIONES</b></h3>
                
                <ul class="sidebar_menu">

                    <li><a href="./compras/productos.php" target="contenido">&raquo; REGISTRO DE COMPRAS </a></li>
                    <li><a href="./proveedor/proveedor.php" target="contenido">&raquo; REGISTRO DE PROVEEDORES</a></li>
					<li><a href="./factura/FacturaConsumidor.php" target="contenido">&raquo; FACTURACI&Oacute;N </a></li>
                    

       		  </ul>
                
          </div>
    	
        <div id="templatemo_content">
        
		<div class="post_box">
            
			<iframe name="contenido" width="745px" height="500px" frameborder="0" src="contenido.php"></iframe>
              
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
					    
					<center>	Copyright 2011  | ITCA-FEPADE | San Miguel </center>
        </div>
        
        
    	<div class="cleaner"></div>
    </div>
</div>

<div id="templatemo_copyright">

    

</div>

</body>
</html>