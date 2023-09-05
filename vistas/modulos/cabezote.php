<header class="main-header">

<!--=====================================
LOGOTIPO
======================================-->
<a href="inicio" class="logo">

	<!-- logo mini -->
	<span class="logo-mini">


		<i class="fa fa-university"></i>

	</span>

	<!-- logo normal -->

	<span class="logo-lg">

		<img src="vistas/img/plantilla/ucem_logo.png" alt="" width="100px" height="30px">
	</span>

</a>

<!--=====================================
BARRA DE NAVEGACIÓN
======================================-->
<nav class="navbar navbar-static-top" role="navigation">


	<div class="navbar-custom-menu">
		<!-- Botón de navegación -->


		<ul class="nav navbar-nav">
			<!-- Messages: style can be found in dropdown.less-->
			<li class="dropdown messages-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-envelope-o"></i>
					<span class="label label-success" id="cantidadCorreos"></span>
				</a>
				<ul class="dropdown-menu">
					<li class="header">Notificaciones</li>
					<li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu">
							<li><!-- start message -->
								<a href="correos">
									<div class="pull-left">
										<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">
									</div>
									<h4>
										Revisa constantemente tus notificaciones...
										
									</h4>
									<p>Notificaciones pendientes</p>
								</a>
							</li>
							
							
							
							
						</ul>
					</li>
					<li class="footer"><a href="correos">Ver todas las Notificaciones</a></li>
				</ul>
			</li>
			<!-- Notifications: style can be found in dropdown.less -->
			<li class="dropdown notifications-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-bell-o"></i>
					<span class="label label-warning">10</span>
				</a>
				<ul class="dropdown-menu">
					<li class="header">You have 10 notifications</li>
					<li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu">
							<li>
								<a href="#">
									<i class="fa fa-users text-aqua"></i> 5 new members joined today
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
									page and may cause design problems
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-users text-red"></i> 5 new members joined
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-shopping-cart text-green"></i> 25 sales made
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-user text-red"></i> You changed your username
								</a>
							</li>
						</ul>
					</li>
					<li class="footer"><a href="#">View all</a></li>
				</ul>
			</li>
			<!-- Tasks: style can be found in dropdown.less -->
			<li class="dropdown tasks-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-flag-o"></i>
					<span class="label label-danger">9</span>
				</a>
				<ul class="dropdown-menu">
					<li class="header">Tienses 9 Tareas</li>
					<li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu">
							<li><!-- Task item -->
								<a href="#">
									<h3>
										Design some buttons
										<small class="pull-right">20%</small>
									</h3>
									<div class="progress xs">
										<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">20% Complete</span>
										</div>
									</div>
								</a>
							</li>
							<!-- end task item -->
							<li><!-- Task item -->
								<a href="#">
									<h3>
										Create a nice theme
										<small class="pull-right">40%</small>
									</h3>
									<div class="progress xs">
										<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">40% Complete</span>
										</div>
									</div>
								</a>
							</li>
							<!-- end task item -->
							<li><!-- Task item -->
								<a href="#">
									<h3>
										Some task I need to do
										<small class="pull-right">60%</small>
									</h3>
									<div class="progress xs">
										<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">60% Complete</span>
										</div>
									</div>
								</a>
							</li>
							<!-- end task item -->
							<li><!-- Task item -->
								<a href="#">
									<h3>
										Make beautiful transitions
										<small class="pull-right">80%</small>
									</h3>
									<div class="progress xs">
										<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
								</a>
							</li>
							<!-- end task item -->
						</ul>
					</li>
					<li class="footer">
						<a href="#">View all tasks</a>
					</li>
				</ul>
			</li>
			<!-- User Account: style can be found in dropdown.less -->
			<li class="dropdown user user-menu">

				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php

							   if ($_SESSION["foto"] != "") {

								   echo $_SESSION["foto"];
							   } else {


								   echo 'vistas/img/usuarios/default/anonymous.png';
							   }


							   ?>" class="user-image" alt="User Image">
					<span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
				</a>
				<ul class="dropdown-menu">
					<!-- User image -->
					<li class="user-header">
						<img src="<?php

								   if ($_SESSION["foto"] != "") {

									   echo $_SESSION["foto"];
								   } else {


									   echo 'vistas/img/usuarios/default/anonymous.png';
								   }


								   ?>" class="img-circle" alt="User Image">

						<p>
							<?php echo $_SESSION["nombre"]; ?>
							<small><?php echo $_SESSION["perfil"]; ?></small>
						</p>
					</li>
				
					<li class="user-footer">
						<div class="pull-left">
							<a href="#" class="btn btn-default btn-flat">Perfil</a>
						</div>
						<div class="pull-right">
							<a href="salir" class="btn btn-default btn-flat">Cerrar Sesión</a>
						</div>
					</li>
				</ul>
			</li>

		</ul>
	</div>


	<!-- Botón de navegación -->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

		<span class="sr-only">Toggle navigation</span>

	</a>


	<!-- perfil de usuario -->

</nav>

</header>