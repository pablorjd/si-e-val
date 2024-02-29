<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <title>TRANSA | Log in</title> -->
        <title>Tecmar | Log in</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?=base_url();?>assets-login/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url();?>assets-login/font-awesome/css/font-awesome.min.css">
		    <link rel="stylesheet" href="<?=base_url();?>assets-login/css/form-elements.css">
        <link rel="stylesheet" href="<?=base_url();?>assets-login/css/style.css">


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

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
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
                    <!-- <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>...or login with:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div> -->
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="<?=base_url();?>assets/assets/js/jquery.min.js"></script><!--jquery.min.js-->
        <script src="<?=base_url();?>assets/assets-login/js/jquery-1.11.1.min.js"></script>
        <script src="<?=base_url();?>assets/assets-login/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/assets-login/js/jquery.backstretch.min.js"></script>
        <!--script src="<?=base_url();?>assets-login/js/scripts.js"></script-->
        <script src="<?=base_url();?>js/jquery.Rut.js" type="text/javascript"></script>

        

        
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


                $.backstretch([
                    "<?=base_url();?>assets-login/img/backgrounds/2.jpg"
                    ,"<?=base_url();?>assets-login/img/backgrounds/3.jpg"
                    ,"<?=base_url();?>assets-login/img/backgrounds/1.jpg"
                ], {duration: 3000, fade: 750});

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

                      //console.log(obj,"repuesta del controlador")
                      $("#bton-ingresa").show();

                      if(obj.success==false){ 
                        alerta('Error','No existe registrado un usuario con esa información');
                      }else{
                        UrlDireccion=obj.url;  
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