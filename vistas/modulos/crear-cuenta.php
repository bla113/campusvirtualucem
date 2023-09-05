<body class="hold-transition login-page">

  <div class="login-box">

    <div class="login-logo">

      <a href="inicio"><i class="fa fa-graduation-cap"></i><b>UCEM</b>2023</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

      <h3 class="login-box-msg ">Ingreso al Sistema de la Universidad</h3>

      <form action="" method="post">

        <div class="form-group has-feedback">

          <label for="">Ingresar Usuario</label>

          <input type="text" class="form-control" placeholder="Usuario" name="nuevoUsuario" autofocus required>

          <span class="glyphicon glyphicon-user form-control-feedback"></span>

        </div>

        <div class="form-group has-feedback">

          <label for="">Ingresar Correo Electrónico</label>

          <input type="email" class="form-control" placeholder="correo@empresa.com" name="nuevoNombre" required>

          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        </div>

        <div class="form-group">

          <label for="">Selecionar perfil</label>


          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-users"></i></span>

            <select class="form-control" name="nuevoPerfil">

              <option value="">Selecionar perfil</option>

              <option value="Profesor">Profesor</option>

              <option value="Estudiante">Estudiante</option>


            </select>

          </div>

        </div>



        <div class="form-group has-feedback">

          <label for="">Ingresar Contraseña</label>


          <input type="password" class="form-control " placeholder="Contraseña" id="nuevoPassword" name="nuevoPassword" required>

          <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        </div>

        <div class="form-group has-feedback">

          <label for="">Repetir Contraseña</label>


          <input type="password" class="form-control" placeholder="Repetir Contraseña" id="repetirPassword" name="repetirPassword" required>

          <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        </div>



        <div class="row">


          <div class="col-xs-12">

            <button type="submit" class="btn btn-block btn-lg btn-success btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i>Crear Cuenta</button>

          </div>

        </div>

        <?php

        $login = new ControladorUsuarios();
        $login->ctrCrearUsuario();

        ?>
      </form>

      <div class="social-auth-links text-center">
        <hr>
        <a href="login" class="btn btn-block btn-facebook btn-flat"><i class="fa fa-user-circle-o"></i>Ya tengo Cuenta</a>


      </div>
      <!-- /.social-auth-links -->

      <a href="#">Tiket Soporte</a><br>

      <a href="http://ucemcampus.ucem.ac.cr/index.php" target="_blank" class="text-center">Ir Campus</a>

    </div>
    <!-- /.login-box-body -->
  </div>

</body>