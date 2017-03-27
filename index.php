<?php include("plantilla_conexion.php");?>
<script src="dist/js/jquery-1.11.3.min.js"></script>
  <script src="dist/js/bootstrap.min.js"></script>
  <script src="dist/js/ripples.min.js"></script>
  <script src="dist/js/material.min.js"></script>
  <script src="dist/js/snackbar.min.js"></script>
  <script src="dist/js/jquery.nouislider.min.js"></script>
  <script src="dist/js/modal.js"></script>
  <script src="dist/js/tooltip.js"></script>

<link rel="stylesheet" href="estilos/estilo_principal.css">
<link href="estilos/bootstrap.min.css" rel="stylesheet">
<link href="estilos/dist/roboto.min.css" rel="stylesheet">
<link href="estilos/dist/material-fullpalette.min.css" rel="stylesheet">
<link href="estilos/dist/ripples.min.css" rel="stylesheet">
<link href="estilos/snackbar.min.css" rel="stylesheet">
<?php
if (!isset($_SESSION)) {
  session_start();
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
	$_SESSION['MM_nombre'] =NULL;
	$_SESSION['MM_Id'] = NULL;
	$_SESSION['MM_Imagen'] = NULL;
	$_SESSION['MM_Agencia'] = NULL;
	$_SESSION['MM_Caja'] = NULL;




  unset($_SESSION['MM_nombre']);
  unset($_SESSION['MM_Id']);
  unset($_SESSION['MM_Imagen']);
  unset($_SESSION['MM_Agencia']);
  unset($_SESSION['MM_Caja']);

  $logoutGoTo = "Index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>


<?php
// *** Validate request to login to this site.


if (isset($_SESSION['MM_Id'])){
	$MM_redirectLoginSuccess = "Index_principal.php";
	header("Location: " . $MM_redirectLoginSuccess );
} else{
	  //to fully log out a visitor we need to clear the session varialbles
	  $_SESSION['MM_Nombre'] = NULL;
	  $_SESSION['MM_Id']=NULL;
	  $_SESSION['MM_Imagen']=NULL;
	  $_SESSION['MM_Agencia'] = NULL;
	  $_SESSION['MM_Caja'] = NULL;

	  unset($_SESSION['MM_Nombre']);
	  unset($_SESSION['MM_Id']);
	  unset($_SESSION['MM_Imagen']);
	  unset($_SESSION['MM_Agencia']);
	  unset($_SESSION['MM_Caja']);

	  $loginFormAction = $_SERVER['PHP_SELF'];
		$MM_redirectLoginSuccess = "Index_principal.php";
		$MM_redirectLoginFailed = "Index.php";

	if (isset($_GET['redir'])) {

			$tags = array_keys($_GET);// obtiene los nombres de las varibles
			$valores = array_values($_GET);// obtiene los valores de las varibles
			$redireccion="";
			// crea las variables y les asigna el valor
			for($i=1;$i<count($_GET);$i++){
				$$tags[$i]=$valores[$i];
				$redireccion.= ($i==0)?$tags[$i]."=".$$tags[$i] : "&".$tags[$i]."=".$$tags[$i];
			}

		  $loginFormAction = $loginFormAction."?redir=".$_GET['redir']."&".$redireccion;
		  $MM_redirectLoginSuccess=$_GET['redir']."?".$redireccion;
	}

	if (isset($_POST['Usuario'])||isset($_GET['Usuario'])) {
		if ((isset($_POST['Usuario']) && $_POST['Usuario']!='')||isset($_GET['Usuario'])) {

			if (isset($_GET['Usuario'])){
				$recuperacion=explode("|", $_GET['Usuario']);
				$loginUsername=$recuperacion[0];
			  $password=$recuperacion[1];
			}else{
				$loginUsername=$_POST['Usuario'];
			  $password=$_POST['Clave'];
			}

      $loginUsername=strtoupper ($loginUsername);

		  //Busca si existe el codigo en los registros
		 	$sql =  "SELECT  FUNC_USU_VALIDAR('".$loginUsername."','".$password."','".$_SERVER['REMOTE_ADDR']."') CODIGO FROM DUAL";
		  	$rs = odbc_exec ( $Conexiones , $sql );

		 		//Buscando unicamente codigo de usuario
			  	$rs = odbc_exec ( $Conexiones , $sql );			  	    
			  	    if(odbc_result ( $rs , "Codigo" ) >0){
					    if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
      				  	$_SESSION['MM_Id']=odbc_result ( $rs , "Codigo" );
                        $sql ="	SELECT  (APELLIDO1 ||' '|| APELLIDO2 || ' '	||  DECODE(CASADA ,NULL,'',CASADA) ||', '|| NOMBRE1 ||' '|| NOMBRE2)NOMBRE from usu_dat where id_usu=".odbc_result ( $rs , "Codigo" );
                        $rs = odbc_exec ( $Conexiones , $sql );
                   		$_SESSION['MM_Nombre'] = odbc_result ( $rs , "NOMBRE" );
      					$_SESSION['MM_Imagen']=odbc_result ( $rs , "Codigo" ).".jpg";
      					$MM_redirectLoginSuccess = "Index_principal.php";
      				    header("Location: " . $MM_redirectLoginSuccess );
        			}else {
        			       header("Location: ". $MM_redirectLoginFailed );
        			}
	  }
}}
?>



<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<title>Plataforma</title>
<link href="css/Estilo.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body style="background-color:#fff">



<div class="container" style=" width:100%">



  <div class="content" style=" width:100%;background-color:transparent; border:0px; background-image:none;padding:10px">


    <div class="Sesion_Iniciar" style=" padding-bottom:6px; max-width:400px;  border-radius:8px;
    margin:auto; text-align:center; color:#FFF; background-color:#FFF; padding: 25px; padding-top:0px ">


    <div class="alert " style="padding:5px;color:#ccc; margin-bottom:30px"></div>

    	<div style=" margin:auto; margin-bottom:50px ">
    		<span class="mdi-action-account-circle" style="font-size:120px;line-height:90px;  color:#B6B6B6"></span>

    	</div>



        <form name="form1" action="<?php echo $loginFormAction; ?>" method="POST" style="padding:0px; font-size:16px; color:#666">

        <div class="form-group">
                <input class="form-control floating-label" id="focusedInput" name="Usuario" placeholder="Usuario" type="text">
        </div>
        <div class="form-group">
                <input class="form-control floating-label" id="focusedInput" name="Clave" placeholder="Contraseña" type="password">
        </div>
        	        <p style="margin-bottom:20px;"></p>





	        <input type="submit" class="btn btn-success" name="Ingresar" id="Ingresar" value="Entrar" style="margin-bottom:10px">

	       	<p style="font-size:14px">
	        	<a href="index_ayuda.php?seg=0010#"style="float:left"><b style=" color:#0065C3"> ¿Necesita ayuda?</b></a>
	        </p>
	    </form>

		    <?php
				echo "<br><span style='float:right;font-size:12px;color:#000'>".$_SERVER['REMOTE_ADDR']."</span>";
			?>
    </div>





  </div>



  <!-- end .container --></div>
</body>
<script>
function info_usuario(){
	$('.info_usuario').slideDown(300);
setTimeout ("info_ocultar()",8000);
}

function info_ocultar(){
	$('.info_usuario').slideUp(300);

}

function Sesion_Registrar(){
agregar();
	$('.Sesion_Iniciar').slideUp(500);
	$('.Sesion_Registrar').slideDown(500);

}
function Regresar(){
	$('.Sesion_Iniciar').slideDown(500);
	$('.Sesion_Registrar').slideUp(500);

}

function Sesion_Entrar(){
	$('.Sesion_Iniciar').slideDown(500);
	$('.Sesion_Registrar').slideUp(500);
	$('.Usuario_Registro_Exito').slideDown(500);

}

function limpiar(){
$("#mensaje1").hide("alow");
$("#mensaje2").hide("alow");
$("#mensaje3").hide("alow");
$("#mensaje4").hide("alow");
$("#mensajeclave").hide("alow");
$("#mensajecorreo").hide("alow");
document.Registro.Usuario.style.border='1px solid  #999999';
document.Registro.Nombre.style.border='1px solid #999999';
document.Registro.Apellido_Usuario.style.border='1px solid #999999';
document.Registro.Correo.style.border='1px solid #999999';
document.Registro.Clave.style.border='1px solid #999999';
}

function validarEmail(email) {
		expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if ( !expr.test(email) ){
		$("#mensajecorreo").show("alow");document.Formulario.Codigo.style.border='1px solid red';valid=false;
		return false;
		}else{
			document.Registro.Correo.style.border='1px solid #999999';
			$("#mensajecorreo").hide("alow");
			return true;
		}


}

function verificar() {
	$("#mensajeexis").hide("alow");
validar=true;
	var TextoUsuario=document.Registro.Usuario.value;

		$.ajax({
			type:"POST",
			url: "includes/Funciones.php",
			data: "Tipo=5&Usuario="+TextoUsuario,
			success: function(resp){
				if (resp==1){
					validar=false;
					$("#mensajeexis").show("alow");
				}},
				async: false, // La petición es síncrona
				cache: false // No queremos usar la caché del navegador
			});
	return validar;
}

function validarformalta() {
	valid=true;


	//Colores
	if (document.Registro.Usuario.value==""){$("#mensaje1").show("alow");document.Registro.Usuario.style.border='1px solid red';valid=false;}
	if (document.Registro.Nombre.value==""){$("#mensaje2").show("alow");document.Registro.Nombre.style.border='1px solid red';valid=false;}
	if (document.Registro.Apellido_Usuario.value==""){	$("#mensaje3").show("alow");document.Registro.Apellido_Usuario.style.border='1px solid red';valid=false;}
	if (document.Registro.Correo.value==""){$("#mensajecorreo").show("alow");document.Registro.Correo.style.border='1px solid red';valid=false;}
	if (document.Registro.Clave.value==""){	$("#mensaje4").show("alow");document.Registro.Clave.style.border='1px solid red';valid=false;}
	if (document.Registro.Clave.value.length<5){$("#mensajeclave").show("alow");document.Registro.Clave.style.border='1px solid red';valid=false;}


	if (document.Registro.Correo.value!=""){
		if (validarEmail(document.Registro.Correo.value)==false){
			valid=false
		}

	}

	if (verificar()==false){
		valid=false;
	}

return valid;
}

function Guardar(){
	if (validarformalta()==true){

	var fecha = new Date();
	var TextoUsuario=document.Registro.Usuario.value;
	var TextoCodigo=0;
	var TextoNombre=document.Registro.Nombre.value;
	var TextoApellido=document.Registro.Apellido_Usuario.value;
	var TextoClave=document.Registro.Clave.value;
	var TextoActivo=0;
	var TextoCorrreo=document.Registro.Correo.value;
	var TextoFecha=fecha.getFullYear()+"-"+(fecha.getMonth()+1)+"-"+fecha.getDate()+" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();


		$.ajax({
			type:"POST",
			url: "includes/Funciones.php",
			data: "Tipo=6.1&Id="+document.getElementById('Id_Registro').value+"&Codigo="+TextoCodigo+"&Usuario="+TextoUsuario+"&Nombre="+TextoNombre+"&Apellido="+TextoApellido+"&Clave="+TextoClave+"&Correo="+TextoCorrreo+"&Activo="+TextoActivo+"&Modificado="+TextoFecha,

			success: function(resp){
				if (resp==1){
				document.Registro.Usuario.value="";
				document.Registro.Nombre.value="";
				document.Registro.Apellido_Usuario.value="";
				document.Registro.Clave.value="";
				document.Registro.Correo.value="";
				Sesion_Entrar()
				}
			}
		});
	}
}

function agregar(){
	var TextoUsuario="Temporal";
	var TextoCodigo=0;var TextoNombre=" ";var TextoApellido=" ";var TextoClave=" ";
	var TextoActivo=0;var TextoCat=0;var fecha = new Date();
	var TextoFecha=fecha.getFullYear()+"-"+(fecha.getMonth()+1)+"-"+fecha.getDate()+" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();

		$.ajax({
			type:"POST",
			url: "includes/Funciones.php",
			data: "Tipo=4&Usuario="+TextoUsuario+"&Codigo="+TextoCodigo+"&Nombre="+TextoNombre+"&Apellido="+TextoApellido+"&Clave="+TextoClave+"&Activo="+TextoActivo+"&Modificado="+TextoFecha,
				async: false, // La petición es síncrona
				cache: false, // No queremos usar la caché del navegador
			success: function(resp){
				document.getElementById('Id_Registro').value=resp;
				}
		});
};

</script>
