<div class="col-12 col-md-8 col-lg-6 m-auto">
    <div class="card mt-2">
        <div class="card-header bg-dark text-center text-white">
            <h3>Añadir Cita</h3>
        </div>

            <?php

                // if (isset($_SESSION['envio_post'])){
                //     print_r($_SESSION['envio_post']);
                // }

            ?>
        
            <div class="card-body">
            <!-- action = "<?php echo "index.php?controller=Citas&action=Validacion"; ?>" -->
                <form id="myForm">
                    <div class="form-row">
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="paciente_documento">Paciente: </label>
                                <select required  class="form-control" id="paciente_documento" name="paciente_documento" >
                                    <option value="">Seleccione el paciente</option>
                                    <?php
                                    if (isset($allPacientes)) {
                                        foreach ($allPacientes as $row) 
                                        { ?>

                                    

                                        <option value="<?php echo$row->documento;?>" ><?php  echo $row->nombre; ?></option>


                                            <?php
                                        }
                                    }                                     
                                        ?>
                                </select>
                            </div>
                    
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="medico_cod">Medico: </label>                       
                                <select required  class="form-control" id="medico_cod" name="medico_cod" >
                                    <option value="">Seleccione el medico</option>
                                    <?php
                                    if (isset($allMedicos)) {
                                        foreach ($allMedicos as $row) 
                                        { ?>

                                        <option value="<?php echo$row->cod_medico;?>" ><?php  echo$row->nombre; ?></option>


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
                            <input required type="text" class="form-control" id="sede" name="sede">
                        </div>
                                       
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="consultorio">Consultorio: </label>
                            <input required type="number" class="form-control" id="consultorio" name="consultorio">
                        </div>                   
                    </div>

                    <div class="form-row">                       
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="fecha_cita">Fecha cita: </label>
                            <input required type="date" class="form-control" id="fecha_cita" name="fecha_cita" >
                        </div>
                            
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="hora_cita">Hora: </label>
                            <input required type="time" class="form-control" id="hora_cita" name="hora_cita">
                        </div>                       
                    </div>
                   
                    <button type="submit" class="btn btn-dark form-control">Guardar</button>
                </form>



        </div>
    
    </div>           
</div>

<script src="js/cita/main.js"></script>
