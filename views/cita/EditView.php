<div class="col-12 col-md-8 col-lg-6 m-auto">
    <div class="card mt-2">
        <div class="card-header bg-dark text-center text-white">
            <h3>Editar Cita</h3>
        </div> 

            <div class="card-body">
                <form action ="index.php?controller=Citas&action=update" method="POST">
                <div class="form-row">
                            <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="medico_cod">Medico: </label> 
                                <select required  class="form-control" id="medico_cod" name="medico_cod">
                                    <option value="">Seleccione el medico</option>
                                    <?php
                                    if (isset($allMedicos)) {
                                        foreach ($allMedicos as $row) 
                                        { ?>

                                        <option <?php if($allCita->getMedico_cod() == $row->cod_medico) echo"Selected"; ?> value="<?php echo$row->cod_medico;?>" ><?php  echo$row->nombre; ?></option>


                                            <?php
                                        }
                                    }
                                        ?>
                                </select>
                             </div>
                        
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="paciente_documento">Paciente </label>                       
                                <select required  class="form-control" id="paciente_documento" name="paciente_documento">
                                    <option value="">Seleccione el paciente</option>
                                    <?php
                                    if (isset($allPacientes)) {

                                        foreach ($allPacientes as $row){ ?>    

                                        <option <?php if($allCita->getPaciente_documento() == $row->documento) echo"Selected"; ?> value="<?php echo$row->documento;?>" ><?php  echo $row->nombre; ?></option>
                                        
                                        <?php
                                        }
                                    }                                     
                                    ?>
                                </select>
                             </div>

                        </div>

                    <div class="form-row">
                      
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="sede">Sede: </label>
                            <input required type="text" class="form-control" id="sede" name="sede" value="<?php echo $allCita->getSede(); ?>">
                        </div>
                    
                
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="consultorio">Consultorio: </label>
                            <input required type="number" class="form-control" id="consultorio" name="consultorio" value="<?php echo $allCita->getConsultorio(); ?>">
                        </div>
                    
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="fecha_cita">Fecha cita: </label>
                            <input required type="date" class="form-control" id="fecha_cita" name="fecha_cita" value="<?php echo $allCita->getFecha_cita(); ?>">
                        </div>                  

                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="hora_cita">Hora: </label>
                            <input required type="time" class="form-control" id="hora_cita" name="hora_cita" value="<?php echo $allCita->getHora_cita(); ?>">
                        </div>                      
                    </div>

                    <input type="hidden" name="view" id="view" value="edit">
                    <input type="hidden" name="fecha_registro" id="fecha_registro" value="<?php echo $allCita->getFecha_registro(); ?>">
                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'] ?>">
                    <button  type="submit" class="btn btn-dark form-control">Actualizar</button>
                </form>

        </div>
    
    </div>           
</div>
