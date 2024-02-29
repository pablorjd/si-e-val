		
		<!-- END SHORTCUT AREA -->
		<div id="shortcut">
			<ul>
				<li>
					<a href="javascript:void(0);" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> 
						<span class="iconbox"> <i class="fa fa-user fa-4x"></i> 
							<span>Mis datos </span> 
						</span> 
					</a>
				</li>


				<li>
					<a href="javascript:void(0);" class="jarvismetro-tile big-cubes bg-color-orangeDark"> 
						<span class="iconbox"> <i class="fa fa-key fa-4x"></i> 
							<span style="font-size: 11px;">Cambiar Contraseña</span> 
						</span> 
					</a>
				</li>
			</ul>
		</div>
		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?=base_url();?>assets/js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.min.js"></script><!--jquery.min.js-->
		<script src="<?=base_url();?>assets/js/underscore.min.js"></script>  <!--underscore.min.js-->
		<script src="<?=base_url();?>assets/js/jspdf.min.js"></script>  <!--underscore.min.js-->
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script><!--Chart.min.js cdn-->
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?=base_url();?>assets/js/libs/jquery-2.0.2.min.js"><\/script>');
			}
		</script>

		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?=base_url();?>assets/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?=base_url();?>assets/js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?=base_url();?>assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?=base_url();?>assets/js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?=base_url();?>assets/js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?=base_url();?>assets/js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?=base_url();?>assets/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="<?=base_url();?>assets/js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?=base_url();?>assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?=base_url();?>assets/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="<?=base_url();?>assets/js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?=base_url();?>assets/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?=base_url();?>assets/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?=base_url();?>assets/js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<script src="<?=base_url();?>assets/js/demo.min.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="<?=base_url();?>assets/js/app.min.js"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="<?=base_url();?>assets/js/speech/voicecommand.min.js"></script>
		<!-- <script src="<?=base_url();?>assets/js/dataTables.buttons.min.js"></script> -->

		

		<!-- Mis Librerias -->
		<script src="<?=base_url();?>assets/js/plugin/input-mask/jquery.Rut.js" type="text/javascript"></script>
		<script src="<?=base_url();?>assets/js/funciones.js" type="text/javascript"></script>
		<script src="<?=base_url();?>assets/js/number_format.js" type="text/javascript"></script><!--EN QUE SE OCUPA EN LOS CAMBIO DE FORMATO!!-->
			
      
		      


		<script type="text/javascript">

			$(document).ready(function() {
			 	
				/* DO NOT REMOVE : GLOBAL FUNCTIONS!
				 *
				 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
				 *
				 * // activate tooltips
				 * $("[rel=tooltip]").tooltip();
				 *
				 * // activate popovers
				 * $("[rel=popover]").popover();
				 *
				 * // activate popovers with hover states
				 * $("[rel=popover-hover]").popover({ trigger: "hover" });
				 *
				 * // activate inline charts
				 * runAllCharts();
				 *
				 * // setup widgets
				 * setup_widgets_desktop();
				 *
				 * // run form elements
				 * runAllForms();
				 *
				 ********************************
				 *
				 * pageSetUp() is needed whenever you load a page.
				 * It initializes and checks for all basic elements of the page
				 * and makes rendering easier.
				 *
				 */
				
				 pageSetUp();
				 
				/*
				 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
				 * eg alert("my home function");
				 * 
				 * var pagefunction = function() {
				 *   ...
				 * }
				 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
				 * 
				 * TO LOAD A SCRIPT:
				 * var pagefunction = function (){ 
				 *  loadScript(".../plugin.js", run_after_loaded);	
				 * }
				 * 
				 * OR
				 * 
				 * loadScript(".../plugin.js", run_after_loaded);
				 */
				
			})

			function alerta(titleModal,contenidoModal){
		        $("#myModalLabel").html(titleModal)
		        $("#modal-body").html(contenidoModal)
		        $('#myModal').modal('show')
		      }

		      function alertaReinicio(titleModal,contenidoModal){
		        $("#myModalLabel-reinicio").html(titleModal)
		        $("#modal-body-reinicio").html(contenidoModal)
		        $('#myModal-reinicio').modal('show')
		      }

		      var urlLink='';
		      function alertaLink(titleModal,contenidoModal,LinkUrl){
		        urlLink=LinkUrl;
		        $("#myModalLabe-link").html(titleModal)
		        $("#modal-body-link").html(contenidoModal)
		        $('#myModal-link').modal('show')
		      }

		      function createFrame(UrlFrame,Titulo){
		       
		        $("#myModalLabe-frame").html(Titulo)
		        

		        $("#modal-body-frame").html('<iframe src="'+UrlFrame+'" width="100%" height="480" scrolling="auto" />')
		        $('#myModal-frame').modal('show')  
		      }
		      function createFrameRespuesta(UrlFrame,Titulo){
		       
		        $("#myModalLabe-frame").html(Titulo)
		        

		        $("#modal-body-frame").html('<iframe src="'+UrlFrame+'" width="100%" height="480" scrolling="auto" />')
		        $('#myModal-frame').modal('show')  
		      }
		      function createFrameAlternativa(UrlFrame,Titulo){
		       
		        $("#myModalLabe-frame").html(Titulo)
		        

		        $("#modal-body-frame").html('<iframe src="'+UrlFrame+'" width="100%" height="480" scrolling="auto" />')
		        $('#myModal-frame').modal('show')  
		      }

		     
		      function goLink(url){
		        if(url==''){
		          url=urlLink;
		          
		        }

		         location.href=url; 
		      }
		      
		      function puntos(este){
		        puntitos(este,este.value.charAt(este.value.length-1)) 
		        
		      }

		    function tryNumberFormat(obj){
				var resultado=new NumberFormat(obj).toFormatted();
				return resultado;
			}

			function alertaError(Titulo,Mensaje,color,fa){
				$.smallBox({
					title : Titulo,
					content : Mensaje,
					color : color,
					//timeout: 8000,
					icon : fa
				});
				
			}
		

			var UrlActual=('<?=str_replace('/','',base_url().'index.php/'.$this->uri->segment('1').$this->uri->segment('2'));?>')
				
			function setActive() {
				var Url='';
				$(".opt-menu a").each(function(){
					Url=$(this).attr('href'); 

					if(Url!='#'){
						Url=remplaza_cadena(Url,'/','');
						if(UrlActual==Url){
							$(this).parent().addClass('active')	
						}
						
					}
				})

				/*aObj = document.getElementById('nav').getElementsByTagName('a');
				for(i=0;i<aObj.length;i++) { 
					if(document.location.href.indexOf(aObj[i].href)>=0) {
						aObj[i].className='active';
						alert(var_dump(aObj));
					}
				}*/
			}
			setActive();



			function remplaza_cadena( text, busca, reemplaza ){
			  while (text.toString().indexOf(busca) != -1)
				  text = text.toString().replace(busca,reemplaza);
			  return text;
			}


			/*
			$.SmartMessageBox({
				title : Tit,
				content : TXT,
				buttons : '[No][Si]'
			}, function(ButtonPress, Value) {
				if(ButtonPress =='Si'){
					$.ajax({
				        type: "POST",
				        url: "<?=base_url();?>Admin/deleteUsuario",
				        data: {'IdUser':IdUser,'Opc':Opc},
				        success: function(obj){
				        	getUserEstado(OpcNo)
				        }
				    });  

				}
			});
			*/

		</script>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size:20px;">&times;</span></button>
	            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
	          </div>
	          <div class="modal-body" id="modal-body">
	            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quod est vel laboriosam perferendis amet omnis aut laudantium. Impedit corporis ratione maxime quam. Perferendis est laudantium ipsa, dolorum. Quo, enim!
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
	            <!--button type="button" class="btn btn-primary">Save changes</button-->
	          </div>
	        </div>
	      </div>
	    </div>

	    <div class="modal fade" id="myModal-reinicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-reinicio">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size:20px;">&times;</span></button>
	            <h4 class="modal-title" id="myModalLabe-reiniciol">Modal title</h4>
	          </div>
	          <div class="modal-body" id="modal-body-reinicio">
	            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quod est vel laboriosam perferendis amet omnis aut laudantium. Impedit corporis ratione maxime quam. Perferendis est laudantium ipsa, dolorum. Quo, enim!
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">Aceptar</button>
	            <!--button type="button" class="btn btn-primary">Save changes</button-->
	          </div>
	        </div>
	      </div>
	    </div>


	    <div class="modal fade" id="myModal-link" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-link">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size:20px;">&times;</span></button>
	            <h4 class="modal-title" id="myModalLabe-link">Modal title</h4>
	          </div>
	          <div class="modal-body" id="modal-body-link">
	            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quod est vel laboriosam perferendis amet omnis aut laudantium. Impedit corporis ratione maxime quam. Perferendis est laudantium ipsa, dolorum. Quo, enim!
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="goLink('')">Aceptar</button>
	            <!--button type="button" class="btn btn-primary">Save changes</button-->
	          </div>
	        </div>
	      </div>
	    </div>


		<style type="text/css">
		  .modal-wide .modal-dialog  {
		     
		      width: 99%;
			  height: 100%;
			  padding: 0;
		  }
		 

		</style>

	    <div class="modal fade bs-example-modal-lg modal-wide" id="myModal-frame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-frame">
	      <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size:20px;">&times;</span></button>
	            <h4 class="modal-title" id="myModalLabe-frame">Modal title</h4>
	          </div>
	          <div class="modal-body" id="modal-body-frame">
	          </div>
	          <div class="modal-footer">
	            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button> -->
	            <!--button type="button" class="btn btn-primary">Save changes</button-->
	          </div>
	        </div>
	      </div>
	    </div>
	</body>


	

</html>

<script>
	$(document).ready(()=>{
		$(".select2-hidden-accessible").hide()
	})
</script>

<!-- Script para evitar ataque  -->
<script type="text/javascript">
		if (top.location != location) top.location = self.location;



		if (self == top) {
		document.getElementsByTagName("body")[0].style.display = 'block';
		} else {
		top.location = self.location;
		}


		function AbrirBlank(link){

			window.open(link,'_blank')

		}


</script>

