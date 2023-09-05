
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

                  $IdCarrera=$_GET['idCarrera'];
                  $IdPlanCarrera= $_GET['idPlanCarrera'];

                  $item = 'ID_CARRERA';

                  $valor = $_GET['idCarrera'];

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


                                <a class="btn btn-warning btn-lg pull-left" href="index.php?ruta=ver-materias-plan&idPlanCarrera=<?php echo  $IdPlanCarrera  ?>&idCarrera=<?php echo$IdCarrera ?> ""> Ver Materias <i class="fa fa-eye"></i></a>

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
                     <th>Asignar</th>
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
                    
                      <td>

                        <div class="btn-group">
                        

                        <button type="button" class="btn btn-success btnElegirMateria"  idMateria=" ' . $Materia['ID_MATERIA'] . '" data-toggle="modal" data-target="#modalElegirMateria"> Asignar</button>
            
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

<div id="modalElegirMateria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" id="formularioAsiganarMateria" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h3 class="modal-title">Materia Selecconada</h3>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
              

                <input type="hidden" value="<?php $Materia['ID_MATERIA']?>" name="idMateriaSleccionada" id="idMateria" >
                <input type="hidden" value="<?php echo $Carrera['ID_CARRERA'] ?>"   name="IdCarrera" id="IdCarrera" >
                <input type="hidden" value="<?php echo $PCarrera['ID_PLAN_CARRERA'] ?>"  name="IdPlanCarrera" id="IdPlanCarrera" >


              </div>

            </div>

            <!-- ENTRADA PARA CODIGO MATERIA -->

             <div class="form-group">

             <label for="">Código de la Materia</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="codMateria" id="codMateria"  disabled>

              </div>

            </div>

            <!-- ENTRADA PARA LA NOMBRE MATERIA  -->

            <div class="form-group">

            <label for="">Materia</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="nomMateria" id="nomMateria" disabled>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR PERIODO -->

            <div class="form-group">

            <label for="">Seleccione Priodo</label>
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="periodoMateria" id="periodoMateria" required>
                  
                  <option value="">Selecionar Periodo</option>

                  <option value="1">Periodo 1</option>

                  <option value="2">Periodo 2</option>

                  <option value="3">Periodo 3</option>

                  <option value="4">Periodo 4</option>

                  <option value="5">Periodo 5</option>
                  
                  <option value="6">Periodo 6</option>

                  <option value="7">Periodo 7</option>

                  <option value="8">Periodo 8</option>

                  <option value="9">Periodo9</option>
d

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <label for="">Seleccione el Orden</label>

              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="number" class="form-control input-lg" name="ordenMateria" value="1" id="nomMateria" min="1" max="6" required >

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Asiganar Materia al Plan</button>

        </div>

      </form>

    </div>

  </div>

</div>