<?
	// ESTE ARCHIVO LO USAMOS TANTO PARA EDITAR COMO PARA REGISTRAR NUEVO
	// V 1.0
	ini_set('display_errors', 1);
	session_start();
	include("../../../../incluidos/conexion_inc.php");
	Conectarse();
	
	//$_GET['id'] =LimpiarCampos($_GET['id']);
	$r2 = mysql_query("SELECT * from personal WHERE id ='".$_GET['id']."'");
    $row = mysql_fetch_array($r2);
	
	// ACTIONES PARA TOMAR ....
	if($_GET['accion']){
	$acc	= $_GET['accion'];
	$acc_text = 'Registrar';
	
	}else{
	$acc 	= 'Editar';
	$acc_text 	= 'Editar';
	}
	
	$r2s = mysql_query("SELECT seguro_porc2,id from personal WHERE id ='".$_SESSION['user_id']."'");
    $rows = mysql_fetch_array($r2s); 
	$seguro_porc2  = $rows['seguro_porc2'];
	
 //echo $_POST['seguro_porc2'];
 ?>
 
 
 
   <script src="incluidos/js/AdmitirLetras.js"></script>
 <script src="incluidos/js/SoloNumeros.js"></script>



 <script language="JavaScript" type="text/javascript">
	
	function DivGuiones(key){
	
	v = $('#celular').val();
	if(v.length == '3' && key !='8'){
		$('#celular').val(v+'-');
	}
	
	if(v.length == '7' && key !='8'){
		$('#celular').val(v+'-');
	}
	

}
	
		$('#celular').keyup(function(event){
		key = event.which;
		DivGuiones(key);
	});
	
	
	
	
	
	function email_verificacion_ajax(comprueba_mail,id) {
		var comprueba_mail;
			if (window.XMLHttpRequest) {
			ajax_email=new XMLHttpRequest();
				} else {
			ajax_email=new ActiveXObject("Microsoft.XMLHTTP");
			}
			ajax_email.onreadystatechange=function() {
				if (ajax_email.readyState==4) {
				comprueba_mail2=ajax_email.responseText;
				}
			}
		ajax_email.open("GET","Admin/Sist.Administrador/Promotores/Edit/verifica_email.php?q="+comprueba_mail+"&id="+id, false);
		ajax_email.send();
		return comprueba_mail2;
}


function validarEmail(email) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) )
        return "1";
 } 

	function validar_password() {
		
		var email;
		email = document.getElementById("email").value;
		id = document.getElementById("id").value;
		
		ValidarEmail = validarEmail(email);
			if (ValidarEmail == 1) {
				alert("Error: La dirección de correo " + email + " es incorrecta.");
				var HayError = true;
			} else {
				//alert("Error: La dirección de correo " + email + " es incorrecta.");
			}
		
		
		//alert(id);	
		//document.getElementById("email").style.display = 'none';
			// Si está bien, llamamos a la función AJAX enviándole como argumento el correo
			comprueba_mail2=email_verificacion_ajax(email,id);
				if (comprueba_mail2 == 1) {
					document.getElementById("campo_oculto").style.display = 'block';
					var HayError = true;
				} else {
					document.getElementById("campo_oculto").style.display = 'none';
				}

	
	
		valclave = $('#password').val();
		
		
		
		
		// validar  nombre
		if($('#nombres').val().length < 6){
			$("#nombres").css("border","solid 1px #F00");
			var HayError = true;
		}else { 
			$("#nombres").css("border","solid 1px #ccc"); 
		}
	
	
		// validar celular
		if($('#celular').val().length < 10){
			$("#celular").css("border","solid 1px #F00");
			var HayError = true;
		}else { 
			$("#celular").css("border","solid 1px #ccc"); 
		}
	
	
	
	
		// validar contrasena
		password 	= $('#password').val();
		pass6 		= "123456";
		pass7 		= "1234567";
		pass8 		= "12345678";
		pass9 		= "123456789";
		pass10 		= "1234567890";
		
		
		if($('#password').val().length < 6){
			$("#password").css("border","solid 1px #F00");
			var HayError = true;
		}else {
		
		if(password == pass6){
			$("#password").css("border","solid 1px #F00");
			var HayError = true;
		}else { 
		
		if(password == pass6){  
			$("#password").css("border","solid 1px #F00");
			var HayError = true;
		}else{
		
		if(password == pass7){  
			$("#password").css("border","solid 1px #F00");
			var HayError = true;
		}else{
		
		if(password == pass8){  
			$("#password").css("border","solid 1px #F00");
			var HayError = true;
		}else{
			
		if(password == pass9){  
			$("#password").css("border","solid 1px #F00");
			var HayError = true;
		}else{
		
			$("#password").css("border","solid 1px #ccc");
		
		}}}}}}
		
			
		if (HayError == true){
			//alert('Por Favor! \n Asegurate de Completar todos los campos abligatorios');
		} else {
		
		CargarAjax2_form('Admin/Sist.Distribuidor/Personal/List/listado.php','form_edit_perso','cargaajax');
		
		}
	
}


</script>

<form action="" method="post" enctype="multipart/form-data" id="form_edit_perso">

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel"><?=$acc_text?>
    <span class="page-header">Representante</span></h4>
</div>

<div class="modal-body">



	<div class="panel-body">
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Información personal
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#info" data-toggle="tab">Info Personal</a>
                                </li>
                                <li><a href="#ajuste" data-toggle="tab">Ajuste</a>
                                </li>
                                <li><a href="#seguridad" data-toggle="tab">Seguridad</a>
                                </li>
                                <li><a href="#beneficios" data-toggle="tab">Beneficios</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="info">
                                <p>
                                    <div class="row">
          <div class="col-lg-6">
         <label class="strong">Nombre<span class="label label-important" id="Nombres" style="display:none">*</span></label> 
             <div class="form-group ">
                                           
                                            <input type="text" class="form-control" placeholder="nombre" id="nombres" name="nombres" value="<? echo $row['nombres']; ?>">
                                        </div>
          </div>
          <div class="col-lg-6">
          <label class="strong">Cédula <span class="label label-important" id="Nombres" style="display:none">*</span></label>
            <div class="form-group ">
                                            
                                            <input type="text" class="form-control" placeholder="Cedula" id="cedula" name="cedula"  value="<? echo $row['cedula']; ?>" maxlength="13" onKeyPress="return soloNumeros(event)">
                                        </div>
          </div>
          <div class="col-lg-6">
          <label class="strong">Teléfono <span class="label label-important" id="Nombres" style="display:none">*</span></label>
            <div class="form-group ">
                                            
                                            <input name="celular" type="text" class="form-control" id="celular" placeholder="Telefono" onKeyPress="return soloNumeros(event)" value="<? echo $row['celular']; ?>" maxlength="12">
                                        </div>
          </div>
         <div class="col-lg-6">
          <label class="strong">Agencia</label>
            <div class="form-group ">
               <select name="id_agencia" id="id_agencia" style="display:compact" class="form-control">
                        <? ///  SELECCION DEL TIPO .....................................
$rescat2 = mysql_query("SELECT id, razon_social from agencia_via WHERE user_id='".$_SESSION['user_id']."' order by razon_social ASC");
    while ($cat2 = mysql_fetch_array($rescat2)) {
			$c2 = $cat2['razon_social'];
			$c_id = $cat2['id'];
            
			if($row['id_agencia'] == $c_id){
			echo "<option value=\"$c_id\"  selected>$c2</option>";
			}else{
			echo "<option value=\"$c_id\" >$c2</option>"; }
			 
        } ?> 
                        </select>
                                        </div>
          </div> 
          
        </div>
                                </div>
                                <div class="tab-pane fade" id="ajuste">
                                     <p>
                                    <div class="row">
          <div class="col-lg-6">
         <label class="strong">Alerta de balance<span class="label label-important" id="Nombres" style="display:none">*</span></label>
             <div class="form-group ">
                                           
                                            <input type="text" class="form-control" placeholder="monto" id="alert_sms" name="alert_sms" value="<? echo $row['alert_sms']; ?>" onKeyPress="return soloNumeros(event)">
                                        </div>
          </div>
          
          <div class="col-lg-6">
         <label class="strong">Tipo de conexion<span class="label label-important" id="Nombres" style="display:none">*</span></label>
             <div class="form-group">
                                                
                                                <select  class="form-control" id="tipo_conex" name="tipo_conex">
                                                     <option value="WEB" <? if($row['tipo_conex'] =='WEB'){?> selected="selected"<? }?>>Web</option>
                           <option value="socket" <? if($row['tipo_conex'] =='socket'){?> selected="selected"<? }?>>Socket</option>
                          
                                                </select>
                                            </div>
          </div>
          </div>
                                </div>
                                <div class="tab-pane fade" id="seguridad">
                                    <p>
                                    
                                    
                                    <div class="row">
                  <div class="col-lg-6">
                 <label class="strong">Usuario<span class="label label-important" id="Nombres" style="display:none">*</span></label>
                     <div class="form-group ">
                                                   
                                                     <input type="text" class="form-control" placeholder="Email" id="email" value="<?=$row['email']?>" name="email">
                                                    <div id="campo_oculto" style="display:none;">El correo ya está en uso</div> 
                                                </div>
                  </div>
                  <div class="col-lg-6">
                 <label class="strong">Contraseña<span class="label label-important" id="Nombres" style="display:none">*</span></label>
                     <div class="form-group ">
                                                   
                                                    <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password" value="<? echo $row['password']; ?>">
                                                </div>
                  </div>
                  <!--<div class="col-lg-6">
                 <label class="strong">Confirmar Contraseña<span class="label label-important" id="Nombres" style="display:none">*</span></label>
                     <div class="form-group ">
                                                   
                                                    <input type="text" class="form-control" placeholder="Contraseña" id="password2" name="password2" value="<? echo $row['password2']; ?>">
                                                </div>
                  </div>-->
          </div>
                                    
                                    
                                </div>
                                <div class="tab-pane fade" id="beneficios">
                                     <p>
                                    
                                    
                                    <div class="row">
                  <div class="col-lg-6">
                 <label class="strong">% de seguro<span class="label label-important" id="Nombres" style="display:none">*</span></label>
                     <div class="form-group ">
                                                   
                                                    <input type="text" class="form-control" id="seguro_porc2" name="seguro_porc2" value="<? echo $row['seguro_porc2']; ?>" onKeyPress="return soloNumeros(event)" >
                                                    
                                                </div>
                                               
                  </div> 
                   <div class="row">
                   <div class="col-lg-12">
                    <div id="errorseguro_porc2" style="font-size:13px; color:#F00; display:none; padding-left:20px;">El % que quiere asignar es mayor al que usted posee</div>
                   </div>
                   </div>
                  
                </div>
                                </div>
                               
                            </div>
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                   <div id="erroruser" style="font-size:12px; color:#F00; display:none;">-Error: este usuario ya existe en nuestra base de datos.</div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
              
                <!-- /.col-lg-6 -->
            </div>
        
    </div>

                                        
                <input name="accion" type="hidden" id="accion" value="<?=$acc;?>">
                <input name="id" type="hidden" id="id" value="<?=$row['id']; ?>" />
                <input name="id_dist" type="hidden" id="id_dist" value="<?=$_SESSION['user_id']; ?>" /> 
             <? if(!$_GET['id']){?>   
                <input name="fecha" type="hidden" id="fecha" value="<?=date('Y-m-d G:i:s');?>" /> 
              <? } ?>  
                 <input name="usar_bl_princ" type="hidden" id="usar_bl_princ" value="no" />
                <input name="show_bl_princ" type="hidden" id="show_bl_princ" value="no" />
               <input name="activo" type="hidden" id="activo" value="si" />
                <input name="funcion_id" type="hidden" id="funcion_id" value="3" />
                
       </div>     
            <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                            <button name="acep" type="button" id="acep" class="btn btn-success" onClick="validar_password();"><?=$acc_text?></button>
                                            
           <!--CargarAjax2_form('Admin/Sist.Administrador/Personal/List/listado.php','form_edit_perso','cargaajax');-->                             </div>
	</form>
    