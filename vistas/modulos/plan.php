<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar planes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar planes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalPlanUsuario">
          
          Agregar plan

        </button>
 

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Codigo Plan</th>
           <th>Nombre del Plan</th>
           <th>Fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php 
        
        $planes=ControladorPlan::ctrMostrarPlan(null,null);
    foreach ($planes as $plan ) { ?>
          
          <tr>
            <td><?php echo $plan['ID_PLAN'] ?></td>
            <td><?php echo $plan['COD_PLAN'] ?></td>
            <td><?php echo $plan['NOM_PLAN'] ?></td>
            <td><?php echo $plan['FECHA_PLAN'] ?></td>
            
            <td>

              <div class="btn-group">
                  
              <button class="btn btn-warning btnEditarPlan" idPlan="<?php echo $plan['ID_PLAN'] ?>" data-toggle="modal" data-target="#modalEditarPlanUsuario"><i class="fa fa-pencil"></i></button>

              <button class="btn btn-danger btnEliminarPlan" idPlan="<?php echo $plan['ID_PLAN'] ?>"><i class="fa fa-times"></i></button>
              
            </div>  

            </td>

          </tr>

       <?php  } ?>

          

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PLAN
======================================-->

<div id="modalPlanUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Plan</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL COD_PLAN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-square"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar Código" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-square"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombrePlan" placeholder="Ingresar Nombre del Plan" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="datetime-local" class="form-control input-lg" name="fechaPlan"  required>

              </div>

            </div>

            
           

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" name="btnGuardarPlan" class="btn btn-primary">Guardar plan</button>

        </div>

        <?php 
        $CrearPlan= new ControladorPlan();
        $CrearPlan->ctrCrearPlan();
        
        
        ?>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR PLAN
======================================-->

<div id="modalEditarPlanUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Plan</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL COD_PLAN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-square"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" placeholder="Ingresar Código" required>
                <input type="hidden" id="IdPlan" name="IdPlan">
              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-square"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombrePlan" name="editarNombrePlan" placeholder="Ingresar Nombre del Plan" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="datetime-local" class="form-control input-lg" id="editarfechaPlan" name="editarfechaPlan"  required>

              </div>

            </div>

            
           

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" name="btnEditarPlan" class="btn btn-primary">Guardar plan</button>

        </div>

        <?php 
        $EditarPlan= new ControladorPlan();
        $EditarPlan->ctrEditarPlan();
        
        
        ?>

      </form>

    </div>

  </div>

</div>

<?php
$EliminarPlan= new ControladorPlan();
$EliminarPlan->ctrBorrarPlan();


?>