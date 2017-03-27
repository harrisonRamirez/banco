<?php include("../../plantilla_conexion.php");?>
<?php

  if (isset($_POST['tipo']) && $_POST['tipo']==2 ){
    $sql = "SELECT  *  from var_dtp";
    $result = odbc_exec($Conexiones , $sql);
    echo '<option value=""></option>';
        do{
          echo '<option value="'.odbc_result($result,'ID_TIP_DIR').'">'.odbc_result($result,'nombre').'</option>';
        }while(odbc_fetch_row($result));
  }

  if (isset($_POST['tipo']) && $_POST['tipo']==3 ){
    $sql = "SELECT  *  from var_dpd";
    $result = odbc_exec($Conexiones , $sql);
    echo '<option value=""></option>';
        do{
          echo '<option value="'.odbc_result($result,'id_pai').'">'.odbc_result($result,'nombre').'</option>';
        }while(odbc_fetch_row($result));
  }

  
  if (isset($_POST['tipo']) && $_POST['tipo']==4 ){
    $sql = "SELECT  *  from var_ddd where id_pai=".$_POST['codigo'] ;
    $result = odbc_exec($Conexiones , $sql);
    echo '<option value=""></option>';
        do{
          echo '<option value="'.odbc_result($result,'id_dep').'">'.odbc_result($result,'nombre').'</option>';
        }while(odbc_fetch_row($result));
  }

  
  if (isset($_POST['tipo']) && $_POST['tipo']==5 ){
    $sql = "SELECT  *  from var_dmd where id_dep=".$_POST['codigo'];
    $result = odbc_exec($Conexiones , $sql);
    echo '<option value=""></option>';
        do{
          echo '<option value="'.odbc_result($result,'id_mun').'">'.odbc_result($result,'nombre').'</option>';
        }while(odbc_fetch_row($result));
  }

  
  if (isset($_POST['tipo']) && $_POST['tipo']==6 ){
    $sql = "SELECT  *  from var_dzd where id_mun=".$_POST['codigo'];
    $result = odbc_exec($Conexiones , $sql);
    echo '<option value=""></option>';
        do{
          echo '<option value="'.odbc_result($result,'id_zon').'">'.odbc_result($result,'nombre').'</option>';
        }while(odbc_fetch_row($result));
  } 
/********ingreso de datos********/  
  if ($_POST['tipo']==6){
    $sql = "SELECT FUNC_AGE_INGRESO("
				.$usu_codigo.","
				.$_POST['idtipdir'].","
				.$_POST['IdPai'].","
				.$_POST['id_dep'].","
				.$_POST['id_mun'].","
				.$_POST['id_zon'].",'"
				.$_POST['nombre']."','"
				.$_POST['direccion']
				."') mensaje from dual";
      
	  
	  echo $sql;
    $result = odbc_exec($Conexiones , $sql);

  }
/*  
		"&id_tip_dir="+IdTipDir+
		"&id_pai="+IdPai+
	 	"&id_dep="+id_dep+
		"&id_mun="+id_mun+
		"&id_zon="+id_zon+
		"&nombre="+nombre+
		"&direccion="+direccion,
  */
  
  
  
  
  
  
  
?>
