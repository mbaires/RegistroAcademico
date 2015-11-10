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
					echo "<center><table width=100% border=1 bordercolor=black cellspacing=0 cellpadding=0>
			<tr bgcolor=#610B0B>
			<th><font face=arial size=2  color=white>N
			<th><font face=arial size=2  color=white>Detalle
			<th><font face=arial size=2  color=white>Marca
			<th><font face=arial size=2  color=white>Estilo
			<th><font face=arial size=2  color=white>Color
			<th><font face=arial size=2  color=white>Cantidad
			<th><font face=arial size=2  color=white>Precio/compra
			<th><font face=arial size=2  color=white>Fecha/Compra
			<th><font face=arial size=2  color=white>Proveedor
			<th><font face=arial size=2  color=white>Modificar
			<th><font face=arial size=2  color=white>Eliminar
			<tr>
			";
		
		echo "</tr>";
		$nr = mysql_num_fields($result);
		if(mysql_num_rows($result) > 0){
		$i=0;
			while($data = mysql_fetch_row($result)){
			$i++;
				$proveedor=mysql_fetch_array(mysql_query("Select * from Proveedores where codigo={$data[5]}"));
				$datos_producto=mysql_fetch_array(mysql_query("Select * from Inventario where codigo_producto='{$data[1]}'"));
				echo "<td><center><font face=verdana size=2>{$i}</a></td>";
				echo "<td><center><font face=verdana size=2>{$datos_producto[1]}</a></td>";
				echo "<td><center><font face=verdana size=2>{$datos_producto[2]}</a></td>";
				echo "<td><center><font face=verdana size=2>{$datos_producto[3]}</a></td>";
				echo "<td><center><font face=verdana size=2>{$datos_producto[4]}</a></td>";
				echo "<td><center><font face=verdana size=2>{$data[2]}</a></td>";
				echo "<td><center><font face=verdana size=2>{$data[3]}</a></td>";
				echo "<td><center><font face=verdana size=2>{$data[4]}</a></td>";
				echo "<td><center><font face=verdana size=2>{$proveedor[1]}</a></td>";
				echo "<td><font face=arial size=2><center><a href='edit_compra.php?id=$data[0]'><img src=../images/031.png width=30 height=30></a>";
				echo "<td><font face=arial size=2><center>
						
													<script>
													function js_Eliminar(id_cl) 
														{
														if (window.confirm(\"¿Está seguro que desea eliminar el registro seleccionado?\")) {
															   location.href = \"./edit_compra.php?delete=\" + id_cl;
														}
													}
													</script>
					
													<a href=\"javascript:js_Eliminar($data[0])\"><img src=../images/022.png width=20 height=20></a>
						</tr>
					";
					
				echo "<tr>";	
				echo "</tr>";
			}
		}
		echo "</table><br>";
		
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