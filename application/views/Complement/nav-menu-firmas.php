

<aside id="left-panel">

	<!-- User info -->
	<div class="login-info">
		<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
			
			<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
				

				<span>
					Equipo Informática
				</span>
				
			</a> 
			
		</span>
	</div>
	<!-- end user info -->
	<nav>

		<?php

		if(isset($_SESSION['Tipo'])){


			$Obj=$this->funciones->getModulosuser(1) ;
			foreach ($Obj as $key => $s) {
				?>
		<ul>
			<li>
				<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent"><?=$s->Seccion;?></span></a>
				<ul>
				<?php
					// echo var_dump($s->Modulos) ;
					foreach ($s->Modulos as $key => $m) {
				?>
					<li class="opt-menu">
						<a href="<?=base_url();?>index.php/<?=$m->Url;?>"><?=$m->Modulo;?></a>
					</li>

					<?php	
					}

					?>
				</ul>
			</li>
		</ul>

				<?php
			}
		}
		?>

	</nav>
	<span class="minifyme" data-action="minifyMenu"> 
		<i class="fa fa-arrow-circle-left hit"></i> 
	</span>

</aside>


