<?php include("../../plantilla_conexion.php");?>
<?php

$sql = $_POST['query'];
$titulo=$_POST['titulo'];
$busqueda=$_POST['busqueda'];
$result = odbc_exec($Conexiones , $sql);

$columna=0;
$encontrado=0;
$titulos=split("[|]",$titulo);

echo "<table class='table table-striped table-hover'>";

echo "<tr>";
	for ($i=0; $i<count($titulos);$i++){
		echo "<th>".$titulos[$i]."</th>";
	}

echo "</tr>";

while ($line = odbc_fetch_array($result) ){
    $columna=0;
    $encontrado=0;

	
    if ($busqueda!=''){
    	// VERIFICANDO COINCIDENCIAS
		foreach ($line as $col_value) {
	 		if (str_replace(strtoupper ($busqueda),'',strtoupper ($col_value))!= strtoupper ($col_value)){
	 			$encontrado=1;
	 		}
	    }
    }else{
    	$encontrado=1;
    }


	if ($encontrado==1){
	    foreach ($line as $col_value) {
	    	$columna=$columna+1;
	    	if ($columna>1){
	        echo "<td style='text-align: left;'>$col_value</td>";
	    	}else{?>
	    		 <tr onclick="seleccion_busqueda(<?php echo $col_value;?>)" style="cursor:pointer">
	    	<?php }
	    }
	    echo "</tr>";
	}
}
echo "</table>";

?>