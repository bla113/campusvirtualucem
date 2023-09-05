
<div class="content-wrapper">

<section class="content-header">

  <h1>

    Asiganar Materias al Plan de Carrea

  </h1>

  <ol class="breadcrumb">

    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

    <li class="active">Asignar Materias a Plan de Carrera</li>


  </ol>

</section>

<section class="content">

  <div class="row">

    <!--=====================================
   EL FORMULARIO
   ======================================-->

    <div class="col-lg-5 col-xs-12">

      <div class="box box-success">

        <div class="box-header with-border"></div>


        <div class="box-body">

          <div class="box">


            <!--=====================================
             MOSTRAR CARRERA
             ======================================-->

            <?php
             if (isset($_GET['ruta'])) {

               $item = 'ID_CARRERA';

               $valor = $_GET['idCarrer'];

               $Carreras = ControladorCarrera::ctrMostrarCarrera($item, $valor);

               foreach ($Carreras as  $Carrera) { ?>

                <label> Carrera Seleccionada</label>

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                    <input type="text" class="form-control" name="CarreraSeleccionada" value="<?php echo $Carrera['NOM_CARRERA'] ?>" readonly>

                  </div>

                </div>

            <?php }
             } ?>

            <!--=====================================
             MOSTRAR EL PLAN DE CARRERA
             ======================================-->


            <?php
             if (isset($_GET['ruta'])) {

               $item = 'ID_PLAN_CARRERA';
               $valor = $_GET['idPlanCarrera'];
               $PCarreras = ControladorPlanCarrera::ctrMostrarPlanCarrera($item, $valor);
               foreach ($PCarreras as  $PCarrera) { ?>



                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                    <input type="text" class="form-control" name="PlanCarreraSeleccionada" value="<?php echo $PCarrera['NOM_PLAN'] ?> " readonly>

                  </div>

                </div>


                <div class="col-xs-8 pull-right">

                  <table class="table">

                    <thead>


                    </thead>

                    <tbody>

                      <tr>

                        <td style="width: 20%">

                         <td style="width: 20%">

                           <div class="input-group">


                             <a class="btn btn-success btn-lg pull-right"> Regresar <i class="fa fa-rotate-left"></i></a>

                           </div>


                         </td>

                        <td style="width: 20%">

                         <td style="width: 20%">

                           <div class="input-group">


                             <a class="btn btn-warning btn-lg pull-left" href="index.php?ruta=ver-materias-plan&idPlanCarrera=<?php echo  $_GET['idPlanCarrera']  ?>&idCarrera=<?php echo $_GET['idCarrer']?> ""> Ver Materias <i class="fa fa-eye"></i></a>

                           </div>


                         </td>

                      </tr>

                    </tbody>

                  </table>

                </div>


            <?php }
             } ?>






          </div>

        </div>

        <div class="box-footer">




        </div>



      </div>

    </div>

    <!--=====================================
   LA TABLA DE MATATERIAS
   ======================================-->

    <div class="col-lg-6 hidden-md hidden-sm hidden-xs">

      <div class="box box-warning">

        <div class="box-header with-border"></div>

        <div class="box-body">
          <section class="content-header">

            <h1 class="text text-xl-center">

              Seleccionar Materias

            </h1>

            <hr>


            <table class="table table-bordered table-striped dt-responsive tablas">

              <thead>

                <tr>
                  <th style="width: 10px">Codigo</th>
                  <th>Materia</th>
                  <th>Orden</th>
                  <th>Periodo</th>
                  <th>Acciones</th>
                </tr>

              </thead>

              <tbody>

                <?php
                 $Materias = ControladorMateria::ctrMostrarMateria(null, null);

                 foreach ($Materias as $Materia) {

                   echo '<tr>

                   <form action="" method="post">

                   <td>' . $Materia['COD_MATERIA'] . '</td>

                   <td>' . $Materia['NOM_MATERIA'] . '</td>
                   
                   <td><input class="form-control form-control-sm" type="number" id="Orden" value="1" name="orden" min="0" max="6"></td>

                   <td><input class="form-control form-control-sm" type="number" id="Periodo"  value="1"  name="periodo" min="0" max="8"></td>
                 
                   <td>

                     <div class="btn-group">
                       

                     <button 
                     type="button" 
                     class="btn btn-success btnAsiganarMateria" 

                     idMateria=" ' . $Materia['ID_MATERIA'] . '"

                      IdCarrera=" ' . $Carrera['ID_CARRERA'] . '" 

                       IdPlanCarrera=" ' . $PCarrera['ID_PLAN_CARRERA'] . '"
                       
                       Orden="1"

                       Periodo="1"

                       >

                       <i class="fa fa-check"></i>

                       </button>
         
                 
                     
                     </div>

                   </td>

                   </form>

                 </tr>
               ';
                 }


                 ?>





              </tbody>

            </table>


          </section>






        </div>

      </div>


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

   <form role="form" method="post" >

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

             <input type="hidden" class="form-control input-lg" name="idMateria" id="idMateria" required>
             <input type="hidden" class="form-control input-lg" name="IdCarrera" id="IdCarrera" required>
             <input type="hidden" class="form-control input-lg" name="IdPlanCarrera" id="IdPlanCarrera" required>


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