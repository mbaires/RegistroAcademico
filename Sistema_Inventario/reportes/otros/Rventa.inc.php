<?
@session_start();
if(!session_is_registered("SESSION")){
echo "<script>alert('Usuario no registrado');location.replace('../index.php');</script>";
}else{

include('../mysql.php');
}
?>
<?

/*
	Paginado de páginas
*/

class DataView{
	var $PageSize;
	var $Headers;
	var $PageNumber;
	var $suma;
	function SetPageSize($size){
		$this->PageSize = $size;
	}
	function ShowHeader($val){
		$this->Headers = $val;
	}
	function ShowPageNumber($val){
		$this->PageNumber = $val;
	}
	function SetButtonsNumber($val){
		$this->ButtonsNumber = $val;
	}
	function SetQuery($query){
		$result = mysql_query($query);
		$numrows = mysql_num_rows($result);
		$fields = $this->GetHeaders($result);
		if(isset($_GET["offset"])){
			if(is_numeric($_GET["offset"])){
				$offset = $_GET["offset"];
			}else{
				$offset = 0;
			}
		}else{
			$offset = 0;
		}
		$limit = $this->PageSize;
		$result = mysql_query($query . " LIMIT $offset,$limit");
		echo "<table border=1 bordercolor=#84ADEE cellspacing=0 cellpadding=0  width=100% ><tr bgcolor=#610B0B>";
		
		
			echo "

                  	<th><font face=verdana size=2 color=white>Fecha de Venta</th>
					<th><font face=verdana size=2 color=white>N&uacute;mero de Factura</th>
                    <th><font face=verdana size=2 color=white>Nombre del Cliente</th>
   					<th><font face=verdana size=2 color=white>Cantidad</th>
					<th><font face=verdana size=2 color=white>Descripción</th>
                    <th><font face=verdana size=2 color=white>Precio Uni.</th>
					<th><font face=verdana size=2 color=white>Venta por $</th>
					";
		
		echo "</tr>";
		$nr = mysql_num_fields($result);
		if(mysql_num_rows($result) > 0){
		
			$i=0;
			$suma=0;
			while($data = mysql_fetch_row($result)){

			$i=$i+1;

                $consulta_detalle=mysql_query("Select * from Ventas where N_factura=$data[0]");


                while($filas = mysql_fetch_array($consulta_detalle) )
                {

                    $datosProducto = mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto=$filas[2]"));


                        $venta=$filas[3] * $filas[4];


    	        echo "<td><center><font face=verdana size=2>{$data[4]}</a></td>";
				echo "<td><center><font face=verdana size=2>{$data[0]}</a></td>";
				echo "<td><center><font face=verdana size=2>{$data[1]}</a></td>";
   				echo "<td><center><font face=verdana size=2>{$filas[3]}</a></td>";
            	echo "<td><center><font face=verdana size=2>{$datosProducto[1]}" ."&nbsp;" . "{$datosProducto[2]}" ."&nbsp;" . "{$datosProducto[3]}" ."&nbsp;" . "{$datosProducto[4]}</a></td>";
                echo "<td><center><font face=verdana size=2>{$filas[4]}</a></td>";
				echo "<td colspan=2 align=right><font face=verdana size=2>$venta</a></td>";
				echo "</tr>";
				$suma=$suma + $venta;



                }


			}

		echo "
		<tr><td colspan=6 align=right><font face=tahoma size=2><b>Monto Total Venta $:
		<td bgcolor=#610B0B><font color=white  face=tahoma size=2><b><center>$suma
		</table><br>";
	}	
		$this->NavBar($numrows,$offset,$limit);
	}
	function GetHeaders($result){
		$fields = array();
		for($i = 0; $i < mysql_num_fields($result);$i++) array_push($fields,strtoupper(mysql_field_name($result,$i)));
		return $fields;
	}
	function NavBar($numrows,$newoffset,$limit){
		$nps = ceil($numrows / $limit);
		$offsets = array();
		$pages = array();
		for($i = 0; $i <= $numrows; $i += $limit){
			array_push($offsets,$i);
		}
		$pageSearch = 0;
		foreach($offsets as $offset){
			$pageSearch++;
			array_push($pages,$pageSearch);
		}		
		$page = $pages[array_search($newoffset,$offsets)];
		if($page > 1){
			echo"<center>";$offset = $offsets[$page - 2];
			echo "<a href='$_SERVER[PHP_SELF]?offset=0'><img src=../images/first.on.gif border=0></a>&nbsp;";
			echo "<a href='$_SERVER[PHP_SELF]?offset=$offset'><img src=../images/prev.on.gif border=0></a>&nbsp;";
		}else{
			echo "<a><img src=../images/first.off.gif border=0></a>&nbsp;";
			echo "<a><img src=../images/prev.off.gif border=0></a>&nbsp;";
		}
		echo "<select onchange=\"window.open('$_SERVER[PHP_SELF]?offset=' + this.value,'_self');\">";
		for($i = 0; $i < count($pages);$i++){
			if($page == $pages[$i])
				echo "<option value=$offsets[$i] selected>Pagina $pages[$i]</option>";
			else
				echo "<option value=$offsets[$i]>Pagina $pages[$i]</option>";
		}
		echo "</select>&nbsp;";
		if($page < $nps){
			$offset = $offsets[$page];
			$lo = $offsets[count($offsets)-1];
			echo "<a href='$_SERVER[PHP_SELF]?offset=$offset'><img src=../images/next.on.gif border=0></a>&nbsp;";
			echo "<a href='$_SERVER[PHP_SELF]?offset=$lo'><img src=../images/last.on.gif border=0></a>&nbsp;";
		}else{
			echo "<a><img src=../images/next.off.gif border=0></a>&nbsp;";
			echo "<a><img src=../images/last.off.gif border=0></a>&nbsp;";
		}
	}
}
?>