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
			<th><font face=arial size=2  color=white>N&uacute;mero de Factura
			<th><font face=arial size=2  color=white>Cliente
			<th><font face=arial size=2  color=white>Fecha de Venta
			<th><font face=arial size=2  color=white>Tipo de Factura
			<th><font face=arial size=2  color=white>Venta Total
			<th><font face=arial size=2  color=white>Visualizar Factura
			<tr>
			";
		
		echo "</tr>";
		$nr = mysql_num_fields($result);
		if(mysql_num_rows($result) > 0){
		
			while($data = mysql_fetch_row($result)){
				$cliente=mysql_fetch_array(mysql_query("Select * from Facturas where N_factura=$data[0]"));
				$vtotal=mysql_query("Select * from ventas where N_factura=$data[0]");
				$suma=0;
				while($nr=mysql_fetch_array($vtotal))
				{
					$vta=$nr["Cantidad"] * $nr["Precio_venta"];
					$suma=$suma + $vta;
				}
				
				echo "<tr>
					<td><font face=arial size=2><center>$data[0]
					";
					if($data[5]=="Contado")
					{
					echo "
						<td><font face=arial size=2><center>$data[1]
						";
					}
					else
					{
					echo "
						<td><font face=arial size=2><center>$cliente[1]
						";
					}
					
					echo "<td><font face=arial size=2><center>$data[4]
						<td><font face=arial size=2><center>$data[5]
						<td><font face=arial size=2><center><font face=arial size=2>$suma
						";
						if($data[5]=="Contado")
					{
					echo "
						
						<td><center><a href='ver_factura.php?nfactura=$data[0]'><font face=arial size=2 color=blue>Ver
						
						";
					}
					else
					{
					echo "
							
							<td><center><a href='ver_facturaNula.php?nfactura=$data[0]'><font face=arial size=2 color=blue>Ver
							
						";
					}
					
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