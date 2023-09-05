<aside class="main-sidebar ">

	<section class="sidebar">

		<ul class="sidebar-menu">
			<?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["perfil"] == "Administrador" ||  $_SESSION["perfil"] == "Estudiante" || $_SESSION["perfil"] == "SOPORTE") { ?>

				<li class="active">

					<a href="inicio">

						<i class="fa fa-home"></i>
						<span>Inicio</span>

					</a>

				</li>
				<!-- Usuarios -->






				<!-- Estudiantes -->
				<li>

					<a href="expediente-estudiante">

						<i class="fa fa-user"></i>
						<span>Mi Expediente</span>

					</a>

				</li>

				<!-- Profesores -->


				<!-- Universidad -->





				<!-- Carreras -->



				<!-- Materias -->



				<!-- Periodos -->





				<!-- Aulas -->





				<!-- Horarios -->





				<!-- Matriculas -->




				<li>

					<a href="matriculas">

						<i class="fa fa-map-signs"></i>
						<span>Matriculas</span>

					</a>

				</li>




				<!-- Oferta Académica -->



				<!-- Reportes -->



				<!-- Campus Vistual -->


				<li class="treeview">

					<a href="">

						<i class="fa fa-book"></i>
						<span>Campus Virtual</span>

					</a>
					<ul class="treeview-menu">
						<li>

							<a href="cursos">

								<i class="fa fa-book"></i>
								<span>Cursos</span>

							</a>

						</li>
						<li>

							<a href="">

								<i class="fa fa-phone"></i>
								<span>Solictudes</span>

							</a>

						</li>

					</ul>

				</li>

				<!-- Facturación -->




			<?php } ?>

		</ul>




	</section>

</aside>