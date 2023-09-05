<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    Calificaciones del Curso: 
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Mis Calificaciones</li>
  
  </ol>

</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

      

    </div>

    <div class="box-body">
      
     <table class="table table-bordered table-striped dt-responsive tablas">
       
      <thead>
       
       <tr>
         
         <th style="width:10px">#</th>
         <th>Evaluación</th>
         <th>Fecha de Aplicación</th>
         <th>Valor de la Prueba</th>
         <th>Puntaje Obtenido</th>
         <th>Estado</th>

       </tr> 

      </thead>

      <tbody>
      <tr>
          <td>1</td>
          <td>Asistencia &nbsp;  &#160; <button class="btn btn-primary btn-xs" ><i class="fa fa-eye"></i></button></td>
          <td>2017-12-11 12:05:32</td>
          <td><button class="btn btn-info btn-xs">10%</button></td>
          <td><button class="btn btn-primary btn-xs">10%</button></td>
          <td><button class="btn btn-success btn-xs">Finalizado</button></td>

       
        </tr>
        <tr>
          <td>1</td>
          <td>Tareas &nbsp;  &#160; <button class="btn btn-primary btn-xs" ><i class="fa fa-eye"></i></button></td>
          <td>2017-12-11 12:05:32</td>
          <td><button class="btn btn-info btn-xs">10%</button></td>
          <td><button class="btn btn-primary btn-xs">9%</button></td>
          <td><button class="btn btn-success btn-xs">Finalizado</button></td>

       
        </tr>
        <tr>
          <td>1</td>
          <td>I Examen Parcial &nbsp;  &#160; <button class="btn btn-primary btn-xs" ><i class="fa fa-eye"></i></button></td>
          <td>2017-12-11 12:05:32</td>
          <td><button class="btn btn-info btn-xs">20%</button></td>
          <td><button class="btn btn-primary btn-xs">19%</button></td>
          <td><button class="btn btn-success btn-xs">Finalizado</button></td>
    
        </tr>
        <tr>
          <td>1</td>
          <td>II Examen Parcial &nbsp;  &#160; <button class="btn btn-primary btn-xs" ><i class="fa fa-eye"></i></button></td>
          <td>2017-12-11 12:05:32</td>
          <td><button class="btn btn-info btn-xs">20%</button></td>
          <td><button class="btn btn-primary btn-xs">20%</button></td>
          <td><button class="btn btn-success btn-xs">Finalizado</button></td>
    
        </tr>
        <tr>
          <td>1</td>
          <td>III Examen Parcial &nbsp;  &#160; <button class="btn btn-primary btn-xs" ><i class="fa fa-eye"></i></button></td>
          <td>2017-12-11 12:05:32</td>
          <td><button class="btn btn-info btn-xs">20%</button></td>
          <td><button class="btn btn-primary btn-xs">10%</button></td>
          <td><button class="btn btn-success btn-xs">Finalizado</button></td>
    
        </tr>
        <tr>
          <td>1</td>
          <td>Proyecto Final</td>
          <td>2017-12-11 12:05:32</td>
          <td><button class="btn btn-info btn-xs">30%</button></td>
          <td><button class="btn btn-primary btn-xs">40%</button></td>
          <td><button class="btn btn-info btn-xs">En proceso</button></td>
    
        </tr>
      </tbody>
      <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>Nota Final:</td>
          <td><span class="badge bg-green-active"><h4>98%</h4></span></td>
          
          
    
        </tr>
     </table>

    </div>

  </div>

</section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar usuario</h4>

      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA PARA EL NOMBRE -->
          
          <div class="form-group">
            
            <div class="input-group">
            
              <span class="input-group-addon"><i class="fa fa-user"></i></span> 

              <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL USUARIO -->

           <div class="form-group">
            
            <div class="input-group">
            
              <span class="input-group-addon"><i class="fa fa-key"></i></span> 

              <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>

            </div>

          </div>

          <!-- ENTRADA PARA LA CONTRASEÑA -->

           <div class="form-group">
            
            <div class="input-group">
            
              <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

              <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

            </div>

          </div>

          <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

          <div class="form-group">
            
            <div class="input-group">
            
              <span class="input-group-addon"><i class="fa fa-users"></i></span> 

              <select class="form-control input-lg" name="nuevoPerfil">
                
                <option value="">Selecionar perfil</option>

                <option value="Administrador">Administrador</option>

                <option value="Especial">Especial</option>

                <option value="Vendedor">Vendedor</option>

              </select>

            </div>

          </div>

          <!-- ENTRADA PARA SUBIR FOTO -->

           <div class="form-group">
            
            <div class="panel">SUBIR FOTO</div>

            <input type="file" id="nuevaFoto" name="nuevaFoto">

            <p class="help-block">Peso máximo de la foto 200 MB</p>

            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">

          </div>

        </div>

      </div>

      <!--=====================================
      PIE DEL MODAL
      ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar usuario</button>

      </div>

    </form>

  </div>

</div>

</div>


