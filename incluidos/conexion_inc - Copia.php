<?php
	//session_start();
	ini_set("display_errors",1);
	//echo $_SERVER['PHP_SELF'];
	/*if((!$_SESSION['user_id']) && ($_GET['op'] !=='login/Login') ){
	
	echo " 
	<script>
	location.href='/Seg/';
	</script>";
	
	exit("..");   
	}*/

	date_default_timezone_set('America/Santo_Domingo');
	
function Conectarse(){
	 
	$db_host="localhost"; // Host al que conectar, habitualmente es el ‘localhost’
	$db_nombre="seguros1_maindb"; // Nombre de la Base de Datos que se desea utilizar
	$db_user="seguros1_01"; // Nombre del usuario con permisos para acceder
	$db_pass="seguros1_01"; // Contraseña de dicho usu
	// Ahora estamos realizando una conexión y la llamamos ‘$link’
	$link=mysql_connect($db_host, $db_user, $db_pass);
	// Seleccionamos la base de datos que nos interesa
	mysql_select_db($db_nombre ,$link);
	echo mysql_error();
}
	
	// CONFIGURACION GENERAL
	$sistema['format_hora']		= 12; // FORMATO 12 o 24
	$sistema['logo1']			= 'logo/logo1_small.png';
	$sistema['empresa_nombre']	= 'Seguros-Online';
	$sistema['firma'] 			='Equipo Seguros Online <br>Santo Domingo, Rep. Dom.';

	function FormatDinero($precio){
		if(!$precio)
			$precio =0; 
		return number_format($precio, 2, '.', ',');
	}
	
include("Func/Cliente.php");
include("Func/Vehiculo.php");
include("Func/Vigencia.php");
include("Func/Fecha.php");
include("Func/Nivel.php");
include("Func/DivTel.php");


//BALANCE ACTUAL DEL CLIENTE
function BalanceCuenta($id_pers){
  $q 	= mysql_query("SELECT balance FROM personal WHERE id='$id_pers'");
  $bl = mysql_fetch_array($q);
  return $bl['balance'];
}

//BALANCE ACTUAL DEL CLIENTE
function InfoDistribuidor2($id_pers){
  $q 	= mysql_query("SELECT balance FROM personal WHERE id='$id_pers'");
  $bl = mysql_fetch_array($q);
  return $bl['balance'];
}


// FUNCIONES ANTI-INYECCION SQL
	// -------------------------------------------
	function LimpiarParametrosGETPOST(){
		array_walk($_POST, 'limpiarCadena');
		array_walk($_GET, 'limpiarCadena');
	}
	
	function limpiarCadena($valor)
	{
		$valor = str_ireplace("SELECT","",$valor);
		$valor = str_ireplace("COPY","",$valor);
		$valor = str_ireplace("DELETE","",$valor);
		$valor = str_ireplace("DROP","",$valor);
		$valor = str_ireplace("DUMP","",$valor);
		$valor = str_ireplace(" AND ","",$valor);
		$valor = str_ireplace(" OR ","",$valor);
		$valor = str_ireplace("%","",$valor);
		$valor = str_ireplace("LIKE","",$valor);
		$valor = str_ireplace("RLIKE","",$valor);
		$valor = str_ireplace("--","",$valor);
		$valor = str_ireplace("^","",$valor);
		$valor = str_ireplace("[","",$valor);
		$valor = str_ireplace("]","",$valor);
		$valor = str_ireplace("\\","",$valor);
		$valor = str_ireplace("!","",$valor);
		$valor = str_ireplace("¡","",$valor);
		$valor = str_ireplace("?","",$valor);
		$valor = str_ireplace("=","",$valor);
		$valor = str_ireplace("&","",$valor);
		$valor = str_ireplace("'","",$valor);
		$valor = str_ireplace("#","",$valor);
		
		
		return $valor;
	}
	
	//------------------------------
	// FUNCION ANTI-INYECCION
	
	if($_GET or $_POST){
		$input_arr = array();   
		foreach ($_POST as $key => $input_arr) 
		{ 
			$_POST[$key] = addslashes(limpiarCadena($input_arr)); 
		}
		 
		$input_arr = array(); 
		foreach ($_GET as $key => $input_arr) 
		{ 
			$_GET[$key] = addslashes(limpiarCadena($input_arr)); 
		}
	}
	


?>
<script type="text/javascript" src="incluidos/Func/js/AdmitirLetras.js"></script>
<script type="text/javascript" src="incluidos/Func/js/AdmitirNumeros.js"></script>
