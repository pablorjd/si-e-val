<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <title>TRANSA | Log in</title> -->
        <title>Tecmar | Log in  <?=date('Y')?></title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?=base_url();?>assets/assets-login/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/assets-login/font-awesome/css/font-awesome.min.css">
		    <link rel="stylesheet" href="<?=base_url();?>assets/assets-login/css/form-elements.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/assets-login/css/style.css">
<!--  
        <script src="<?=base_url();?>assets/assets-login/js/jquery.min.js"></script>jquery.min.js -->
        <script src="<?=base_url();?>assets/assets-login/js/jquery-1.11.1.min.js"></script>
        <script src="<?=base_url();?>assets/assets-login/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/assets-login/js/jquery.backstretch.min.js"></script>
        <!--script src="<?=base_url();?>assets-login/js/scripts.js"></script-->
        <script src="<?=base_url();?>assets/js/jquery.Rut.js" type="text/javascript"></script>


        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>assets/css/bootstrap.min.css">
        <!-- Bootstrap -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons >
        <link rel="shortcut icon" href="<?=base_url();?>assets-login/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url();?>assets-login/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url();?>assets-login/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url();?>assets-login/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?=base_url();?>assets-login/ico/apple-touch-icon-57-precomposed.png"-->

    </head>
    <style>

@import url('https://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700');

.login{
   font-family: 'Josefin Sans', sans-serif;
   background: #fbfbfb; 
   padding:40px 0px;
}

label{
    font-weight:400;
    font-size:15px;
}
 
.login-box{
    -webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
    -moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
    box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.24);
    padding:0px;
    background:#003067;
}

.left-box{
	padding:50px;
	color:#FFF;
}

.left-box h1{
	font-weight:600;
    font-family: 'Josefin Sans', sans-serif;
    text-transform:capitalize;
    color:#FFF;
    font-size:32px;
}

.right-box{
	background:#FFF;
	min-height:520px;
}

.right-box h1{
	font-weight:600;
    font-family: 'Josefin Sans', sans-serif;
    color:#444;
    font-size:32px;
    padding:50px;
}
	
.form{
    padding:20px 30px;
}

.form-control{
    box-shadow: none;
    border-radius: 0px;
    border-bottom: 1px solid #2196f3;
    border-top: 1px;
    border-left: none;
    border-right: none;
}

.btn{
    font-weight: 700;
    font-size:15px;
    color:#FFF;
    border-radius: 0;
    background: #78d46e;
    padding:12px 30px;
    float:right;
    margin-top:40px;
    margin-bottom: 100px !important;
}

.btn:hover{
    border:2px solid #78d46e;
    background:#FFF;
}

input[type=text], input[type=password], input[type=email] {
    background-color: transparent;
    border: none;
    border-bottom: 1px solid #d2d2d2;
    border-radius: 0;
    margin-bottom:50px;
    box-shadow: none;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
    box-shadow: none;
    border-bottom: 1px solid #78d46e;
}

.form2 {
    padding:30px 0px;
}

.white-btn{
    background:#FFF;
    color:#78d46e;
}

    </style>

    <body>


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 

<!--
    instagram: www.instagram.com/programmingtutorial
    site: programlamadersleri.net
-->
<div class="top-content">
<div class="login">
   	<div class="container">
	    
		<div class="col-lg-8 col-lg-offset-2 login-box" >
		    
    		<div class="col-lg-6 right-box">
    		<h1>Autentificación al Sistema</h1>
        <p>Ingrese su usuario de Acesso a la RED Interna( Active Directory)</p>
                <div class="form">

                
            
                    <div class="form-group">
            		    <label for="username">Ingrese su RUT </label>
                        
                        <input type="text" 
                               name="form-username"
                               autocomplete="off"
                               onkeypress="enter(event)" 
                               placeholder="Rut..." 
                               class="form-username form-control" id="user">
                        
                    </div>
            
                    <div class="form-group">
            		    <label for="password">Ingrese su Contraseña</label>
                        
                        <input type="password"
                               autocomplete="off"
                               name="form-password" 
                               placeholder="Password..." 
                               class="form-password form-control" 
                               id="pass" 
                               onkeypress="enter(event)">
                    </div>
              
                    <!-- <div class="login-button"> -->
                    <div class="form-group">
                        <button class="btn btn-danger btn-block" onclick="loginAcc()">Ingresar</button>
                        <label for=""><a href="<?=base_url()?>Guia">Guía para el Usuario SIEVAL</a></label>
                    </div>
                    <!-- </div> -->
             
            
                </div>
    
	    	</div>  <!-- right-box -->
	    	
	    	<div class="col-lg-6 left-box">
        		<h1>Sistema Evaluación de Competencias SIEVAL</h1>
        		
        		<br>
            </div>
            
		</div> <!--col-lg-8-->
        
   </div>
</div> 
</div>


        <!-- Top content -->
        
        <!-- <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>División Informática</strong> </h1>
                            <div class="description">
                            	<p>
	                            	Aplicaciones - Tecmar
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Autentificación al sistema</h3>
                            		<p>Ingrese su rut y password para poder acceder</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Rut</label>
			                        	<input type="text" name="form-username" onkeypress="enter(event)" placeholder="Rut..." class="form-username form-control" id="user">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="pass" onkeypress="enter(event)">
			                        </div>
			                        <button type="button" class="btn-form" onclick="loginAcc()">Ingresar</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> -->


        <!-- Javascript -->
        <!-- <script src="<base_url();?>assets/assets-login/js/jquery.min.js"></script>jquery.min.js -->
        <script src="<?=base_url();?>assets/assets-login/js/jquery-1.11.1.min.js"></script>
        <script src="<?=base_url();?>assets/assets-login/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/assets-login/js/jquery.backstretch.min.js"></script>
        <!--script src="<?=base_url();?>assets-login/js/scripts.js"></script-->
        <script src="<?=base_url();?>assets/js/jquery.Rut.js" type="text/javascript"></script>

        

        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size:20px;">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body" id="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="bton-ingresa" id="bton-insert">Aceptar</button>
                <!--button type="button" class="btn btn-primary">Save changes</button-->
              </div>
            </div>
          </div>
        </div>

        


        <script type="text/javascript">
              $(document).ready(function(){

                $('#user').Rut({
                  on_error: function(){ 
                    alerta('Error','Debe ingresar un RUT válido')
                    $("#bton-ingresa").hide()
                  },
                  on_success: function(){ 
                    $("#bton-ingresa").show();
                    
                  },
                  validation: true,
                  format_on: 'keyup'
                }); 


                // $.backstretch([
                //     "<?=base_url();?>assets-login/img/backgrounds/2.jpg"
                  
                // ], {duration: 3000, fade: 750});

                $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
                  $(this).removeClass('input-error');
                });
                
                $('.login-form').on('submit', function(e) {
                  
                  $(this).find('input[type="text"], input[type="password"], textarea').each(function(){
                    if( $(this).val() == "" ) {
                      e.preventDefault();
                      $(this).addClass('input-error');
                    }
                    else {
                      $(this).removeClass('input-error');
                    }
                  });
                  
                });

              })
              

              UrlDireccion='';
              function loginAcc(){
                 

                if($("#user").val()=='' ||  $("#pass").val()==''){
                  alerta('Error','Debe ingresar ambos datos')
                  return 0;
                }else{
                  $("#bton-ingresa").hide();
                  var param={
                    'user':$("#user").val(),
                    'pass':$("#pass").val(),
                     
                  }

                  $.ajax({
                    type: "POST",
                    url: "<?=base_url();?>index.php/Login/LoginAcc",
                    data: param,
                    success: function(obj){

                      console.log(obj)
                      $("#bton-ingresa").show();
                      //return;
                      obj = JSON.parse(obj);
                  

                      if(obj.success==0){ 
                        alerta('Error','No existe registrado un usuario con esa información');
                      }else{
                        UrlDireccion=obj.Url;  
                        //console.log(UrlDireccion,"direccion a al a que debe retornar")
                        location.href=UrlDireccion; 
                      }
                     
                    }
                  });
                }

              }

              

              function enter(e){
                var k=null;
                (e.keyCode) ? k=e.keyCode : k=e.which;
                if(k==13){
                  loginAcc();
                } 
              }

              function alerta(titleModal,contenidoModal){
                $("#myModalLabel").html(titleModal)
                $("#modal-body").html(contenidoModal)
                $('#myModal').modal('show')
              }

              <?php
                if($this->uri->segment("3")=='2'){
                  ?>
                    alerta('Alerta','Session expirada, favor de autentificarse nuevamente.')
                  <?php
                }
              ?>

            </script>

        <!--[if lt IE 10]>
            <script src="<?=base_url();?>assets-login/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>