<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>Index</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
								<img src="./images/logo3.gif" width="150" height="130">
							</div>

					</div> <!-- end of header -->

					<div id="templatemo_menu">


						<div id="register_box">
							<span class="tagline"><
						</div>
					</div> <!-- end of templatemo_menu -->

				<div id="templatemo_main">

					<div class="sidebar_box">


							<ul class="sidebar_menu">

								<li><p align = center><IMG SRC="./images/sesion.png" width="128" height="128"> </a></li>
								 <li><p align = center> <b>PARA INICIAR SESION<BR> INGRESE USUARIO Y CONTRASEÑA  <BR> PORFAVOR</b></p></li>

						  </ul>

					 </div> <!-- Fin del sidebar_box-->


        <div id="templatemo_content">

		<div class="post_box">

			   <form method=post>
					<fieldset id="fieldset">
					<legend id="legend"><b>Inicio de Sesión</b></legend>
				  <center><table border=0>
					<tr>
					<td rowspan="4"><img src="./images/candado.png" width="100" height="80">
					<tr>
					<td id="textForm"><b>Usuario:</b>
					<td><input name=usuario type=text class="caja">
					<tr>
					<td id="textForm"><b>Contraseña:</b>
					<td><input name=password type=password class="caja">
					<tr>
					<td colspan=2 height="40"><center><input name=aceptar type=submit value='Iniciar Sesión'></center>
				</table>
				</fieldset>
				</form>

            </div>

			<div class="post_box">

			   <TABLE WIDTH=100% BORDER=0 bordercolor=gray CELLSPACING=1 CELLPADDING=1>
				<TR bgcolor=#244278>
				<TD><center><font face=arial size=2 color=white><b><font size=3 >R</b></font>egistro de Alumnos
				<td><center><font face=arial size=2 color=white><b><font size=3 >R</b></font>egistro de Notas
				<td><center><font face=arial size=2 color=white><b><font size=3 >R</b></font>egistro de Materias
				<td><center><font face=arial size=2 color=white><b><font size=3 >G</b></font>enerar Reportes
				<tr>
				<td><center><img src=./images/registroalumno.png width=100 height=100>
				<td><center><img src=./images/calificaciones.png width=100 height=100>
				<td><center><img src=./images/folder.png width=100 height=100>
				<td><center><img src=./images/reportes1.png width=100 height=100>
				<tr>
				<td><center><font face=arial size=2 color=black>Registre a los alumnos para tener un mayor control...
				<td><center><font face=arial size=2 color=black>Registre las notas de los alumnos para que sea mas facil consultarlas....
				<td><center><font face=arial size=2 color=black>Registre las materias a asignar a cada estudiantes....
				<td><center><font face=arial size=2 color=black>Obtenga los reportes de los alumnos y las notas por periodo


				</TABLE>
				</tr>
				</table>
				</CENTER>

            </div>


        </div>




        </div>


    </div>

</div>
<div class="cleaner"></div>
</div>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">

    	<div class="footer_box col_w300">

					<center>	<b>Copyright 2015 | MCPB| 	 San Miguel </b> </center>
        </div>


    	<div class="cleaner"></div>
    </div>
</div>

<div id="templatemo_copyright">

<?php
session_start();
//codigo para validar el usuario
if(@$_POST)
{
	  
//	session_start("user");
	$usuario=$_POST["usuario"];
	$password=$_POST["password"];

		include("./mysql.php");
        
		$contra= $password; //md5("$password");
		$query=mysql_query("SELECT * FROM usuario WHERE Login='$usuario' AND Password='$contra'");
        $array=mysql_fetch_array($query);
		//print_r($array);
		
		
		if(mysql_num_rows($query)== 0){
						
		echo "<script>alert('Usuario o Constraseña no válido');</script>";
		
		} else {
		
		$_SESSION["user"] = $array["Login"];
		$_SESSION["password"] = $array["Password"];
        $_SESSION["tipo"] = $array["Nivel"];
		
		header("location: home.php");

		}
	}
?>

</div>

</body>
</html>

