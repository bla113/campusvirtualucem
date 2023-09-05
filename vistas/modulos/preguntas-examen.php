<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar preguntas del examen
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar preguntas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPreguntas">
          
          Agregar pregunta

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Pregunta</th>
           <th>Respuesta</th>
           <th>Puntaje</th>
           <th>Opciones</th>
           <th>Dificultad</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
          <tr>
            <td>1</td>
            <td>¿Cómo se llama el Presidente de China?</td>
            <td>Xi Jinping</td>
            <td><button class="btn btn-success btn-xs">5</button></td>
            <td>
                <button class="btn btn-info btn-xs">Carlos Alvarado</button><br>
                <button class="btn btn-info btn-xs">Luis Lopez Obrador</button><br>
                <button class="btn btn-info btn-xs">Jaki Chang You</button><br>
                <button class="btn btn-info btn-xs">Xi Jinping</button>
            </td>
            <td><button class="btn btn-danger btn-xs">Avanzado</button></td>
            
            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>

          

         

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarPreguntas" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar pregunta</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">

                <label for="">Ingrese la Pegunta</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-question"></i></span> 

                <input type="text" class="form-control input-lg" name="preguntaExamen" placeholder="Ingresar Pregunta" required>

              </div>

            </div>

            <!-- ENTRADA PARA RESPUESTA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="respuestaPregunta" placeholder="Ingresar respuesta correcta del examen" required>

              </div>

            </div>

            <!-- ENTRADA PARA LAS OPCIONES -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="number" class="form-control input-lg" name="puntajePregunta" placeholder="Ingresar puntaje de la pregunta" required>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <button class="btn btn-flat btn-primary" type="button"><i class="fa fa-plus"></i> Agregar Opción</button>

              </div>

            </div>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="" placeholder="Ingresar contraseña" required>

              </div>

            </div>

          
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar pregunta</button>

        </div>

      </form>

    </div>

  </div>

</div>


