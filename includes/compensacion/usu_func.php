<?php include("../../plantilla_conexion.php");?>
<?php
//-------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------//
//INGRESO DE DATO
  if (isset($_POST['tipo']) && $_POST['tipo']=='GUARDAR'){
       // INGRESO DE DATOS
        $sql = "	SELECT  FUNC_USU_INGRESO(".$usu_codigo.",'".$_POST['nombre1']."','".$_POST['nombre2']."','".$_POST['apellido1']."','".$_POST['apellido2']."','".$_POST['casada']."','".$_POST['nacimiento']."','".$_POST['cui']."',".$_POST['genero'].",".$_POST['activo'].",'".$usu_host."') CODIGO  from dual";
        $result = odbc_exec($Conexiones , $sql);
      // OBTENIENDO CODIGO DE USUARIO
        $sql = " SELECT 'PROCESADO EXITOSAMENTE' descripcion, usuario extra from usu_dat where id_usu=".odbc_result($result,'CODIGO');
        $result2 = odbc_exec($Conexiones , $sql);
        
        
# contenido del thumbnail
  $tmp_name=$_POST['firma'];
  echo $tmp_name;
  $fp = fopen($tmp_name, "rb");
  $tfoto = fread($fp, filesize($tmp_name));
  $tfoto = addslashes($tfoto);

  // Guardamos todo en la base de datos
  #nombre de la foto
  $sql = "update usu_dat set firma =$tfoto where id_usu=".odbc_result($result,'CODIGO');
  echo $sql;
  $resultf = odbc_exec($Conexiones , $sql);
  echo "Fotos guardadas";



        if (odbc_result($result,'CODIGO')<0){
            // MOSTRANDO ERROR
               $sql = " SELECT ".odbc_result($result,'CODIGO')."-  descripcion,'' extra from log_eve where cod_gen=".odbc_result($result,'CODIGO');
               $result2 = odbc_exec($Conexiones , $sql);
        }
      // DESPLAGANDO DATOS QUE OBTENDRA LA INSTRUCCIÓN AJAX
        echo odbc_result($result,'CODIGO').'|'.odbc_result($result2,'descripcion').'|'.odbc_result($result2,'extra');
  }
//-------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------//
//INGRESO DE LA CONTRASEÑA
  if (isset($_POST['tipo']) && $_POST['tipo']=='CLAVE'){

        if ($_POST['caduca']!=''){
            $caduca="'".$_POST['caduca']."'";
        }else{
            $caduca="NULL"; 
        }
        
          $sql = " SELECT  FUNC_USU_INGRESO_CONT(".$usu_codigo.",".$_POST['usuario'].",'".$_POST['clave']."',".$_POST['cambio'].",".$caduca.",".$_POST['activo'].",'".$usu_host."') CODIGO  from dual";
          $result = odbc_exec($Conexiones , $sql);
            
            if (odbc_result($result,'CODIGO')<0){
            // MOSTRANDO ERROR
               $sql = " SELECT descripcion  from log_eve where cod_gen=".odbc_result($result,'CODIGO');
               $result2 = odbc_exec($Conexiones , $sql);
            }else{
               $sql = " SELECT descripcion from log_eve where id_eve=".odbc_result($result,'CODIGO');
               $result2 = odbc_exec($Conexiones , $sql);
            }

          //Si todo resulta bien
          echo odbc_result($result,'CODIGO').'|'.odbc_result($result2,'descripcion');
  }
//-------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------//
//INGRESO DE LA DIRECCIÓN 
  if (isset($_POST['tipo']) && $_POST['tipo']=='DIRECCION'){

        $sql="insert into usu_dir values(".$_POST['usuario'].",".$_POST['dir_tipo'].",".$_POST['dir_pais'].",".$_POST['dir_dep'].",".$_POST['dir_mun'].",".$_POST['dir_zon'].",'".$_POST['dir_dir']."',0,0)";
        $result2 = odbc_exec($Conexiones , $sql);
        echo 1;
  }
//-------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------//
//INGRESO DEL ROL 
  if (isset($_POST['tipo']) && $_POST['tipo']=='ROL'){

        if ($_POST['seleccion']==1){
            $sql="insert into USU_ROL values(".$_POST['usuario'].",".$_POST['rol'].",1)";
            $result2 = odbc_exec($Conexiones , $sql);
        }else{
            $sql="delete from USU_ROL where id_usu=".$_POST['usuario']." and id_rol=".$_POST['rol'];
            $result2 = odbc_exec($Conexiones , $sql);
        }

        echo 1; 
  }
//-------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------//



 ?>

 <?php odbc_close($Conexiones); ?>
