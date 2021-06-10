<div class="col-12 col-md-8 col-lg-6 m-auto">
    <div class="card mt-2 mb-2">
        <div class="card-header bg-dark text-center text-white">
            <h3>Añadir Medico</h3>
        </div>
            
            <div class="card-body">
                <form action="index.php?controller=Medico&action=Validacion" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold" for="txtCodMedico">Codigo Medico: </label>
                        <input type="number" minlength="1" maxlength="5" class="form-control" id="txtCodMedico" name="txtCodMedico" value="<?php if(isset($cod_medico)) echo $cod_medico ?>">
                        <?php if(isset($campos['n'])){ echo "<div class='invalid-feedback'>"; echo $campos['n']; echo "</div>";} ?>
                    </div>
                    <div class="form-row">
                        <div  class="form-group col-12 col-lg-6" >
                                <label class="font-weight-bold" for="txtNombre">Nombre: </label>
                                <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?php if(isset($nombre)) echo $nombre ?>">
                                <?php if(isset($campos['s1'])){ echo "<div class='invalid-feedback'>"; echo $campos['s1']; echo "</div>";} ?>               
                            </div>
                        <div class="form-group col-12 col-lg-6"  >
                                <label class="font-weight-bold" for="txtApellido">Apellido: </label>
                                <input type="text" class="form-control" id="txtApellido" name="txtApellido" value="<?php if(isset($apellido)) echo $apellido ?>">
                                <?php if(isset($campos['s5'])){ echo "<div class='invalid-feedback'>"; echo $campos['s5']; echo "</div>";} ?>                       
                        </div>
                    </div>

                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtDocumento">Documento: </label>
                        <input type="number" minlength="1" maxlength="11" class="form-control" id="txtDocumento" name="txtDocumento" value="<?php if(isset($documento)) echo $documento ?>">
                        <?php if(isset($campos['n1'])){ echo "<div class='invalid-feedback'>"; echo $campos['n1']; echo "</div>";} ?>                                        
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-lg-6"  >
                                <label class="font-weight-bold" for="txtFechaNacimiento">Fecha Nacimiento: </label>
                                <input type="date" class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento" placeholder="Date" value="<?php if(isset($fecha_nacimiento)) echo $fecha_nacimiento ?>">
                                <?php if(isset($campos['f'])){ echo "<div class='invalid-feedback'>"; echo $campos['f']; echo "</div>";} ?>                      
                            </div>
                        <div class="form-group col-12 col-lg-6"  >
                            <label class="font-weight-bold" for="txtTelefono">Telefono:</label>
                            <input type="number" minlength="1" maxlength="11"  class="form-control" id="txtTelefono" name="txtTelefono" value="<?php if(isset($telefono)) echo $telefono ?>">
                            <?php if(isset($campos['n3'])){ echo "<div class='invalid-feedback'>"; echo $campos['n3']; echo "</div>";} ?>                     
                        </div>

                    </div>

                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtMunicipio">Municipio: </label>
                        <input type="text" class="form-control" id="txtMunicipio" name="txtMunicipio" value="<?php if(isset($municipio)) echo $municipio ?>">
                        <?php if(isset($campos['s4'])){ echo "<div class='invalid-feedback'>"; echo $campos['s4']; echo "</div>";} ?>
                  
                    </div>

                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtDepartamento">Departamento: </label>
                        <input type="text" class="form-control" id="txtDepartamento" name="txtDepartamento" value="<?php if(isset($departamento)) echo $departamento ?>">
                        <?php if(isset($campos['s6'])){ echo "<div class='invalid-feedback'>"; echo $campos['s6']; echo "</div>";} ?>                  
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-lg-6"  >
                            <label class="font-weight-bold" for="txtEmail">Email: </label>
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="example@hhhh.com" value="<?php if(isset($email)) echo $email ?>">
                            <?php if(isset($campos['e'])){ echo "<div class='invalid-feedback'>"; echo $campos['e']; echo "</div>";} ?>                       
                        </div>
                        <div class="form-group col-12 col-lg-6"  >
                            <label class="font-weight-bold" for="txtPassword">Password: </label>
                            <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="******">
                            <?php if(isset($campos['p'])){ echo "<div class='invalid-feedback'>"; echo $campos['p']; echo "</div>";} ?>                      
                        </div>
                    </div>
                   
                    
                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtGenero">Genero: </label>
                        <select class="form-control" name="txtGenero" id="txtGenero">
                            <option value="">Seleccione genero</option>
                            <option <?php if(isset($genero) && $genero == "M") echo "Selected" ?> value="M">Masculino</option>
                            <option <?php if(isset($genero) && $genero == "F") echo "Selected" ?> value="F">Femenino</option>
                        </select>
                        <?php if(isset($campos['s3'])){ echo "<div class='invalid-feedback'>"; echo $campos['s3']; echo "</div>";} ?>                      
                    </div>
                   
                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtPerfilProfesional">Perfl Profesional: </label><br>
                        <textarea class="m-auto col-12"  name="txtPerfilProfesional" id="txtPerfilProfesional"><?php if(isset($perfil_profesional)) echo $perfil_profesional ?></textarea>
                        <?php if(isset($campos['s'])){ echo "<div class='invalid-feedback'>"; echo $campos['s']; echo "</div>";} ?>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-lg-6"  >
                                <label class="font-weight-bold" for="txtFechaIngreso">Fecha Ingreso: </label>
                                <input type="date" class="form-control" id="txtFechaIngreso" name="txtFechaIngreso" value="<?php if(isset($fecha_ingreso)) echo $fecha_ingreso ?>">
                                <?php if(isset($campos['f1'])){ echo "<div class='invalid-feedback'>"; echo $campos['f1']; echo "</div>";} ?>                       
                        </div>
                        
                        <div class="form-group col-12 col-lg-6"  >
                                <label class="font-weight-bold" for="txtAniosExperiencia">Años Experiencia: </label>
                                <input type="number" minlength="1" maxlength="2"  class="form-control" id="txtAniosExperiencia" name="txtAniosExperiencia" value="<?php if(isset($anios_experiencia)) echo $anios_experiencia ?>">
                                <?php if(isset($campos['n2'])){ echo "<div class='invalid-feedback'>"; echo $campos['n2']; echo "</div>";} ?>                     
                        </div>
                       
                    </div>
                    
                    
                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtCodPostal">Codigo Postal: </label>
                        <input type="text" class="form-control " id="txtCodPostal" name="txtCodPostal" value="<?php if(isset($cod_postal)) echo $cod_postal ?>">
                        <?php if(isset($campos['n5'])){ echo "<div class='invalid-feedback'>"; echo $campos['n5']; echo "</div>";} ?>                  
                    </div>

                    <!-- En esta parte  se recorren las especialidades -->
                    <div class="card" style="margin:50px 0">
                            <label class="card-header font-weight-bold" for="txtEspecialidad">Seleccione Su(s) Especialidad:</label>
                            <ul class="list-group list-group-flush">

                            <?php                           
                                if (isset($allEspecialidad)) {

                                    //valdiamos que exista una especialdiad ya selecionada en caso de error//
                                    if(isset($especialidadOld) && $especialidadOld > 0){                                    
                                        $old_especialidades= array();
                                        foreach ($especialidadOld as $key => $value) {
                                            array_push($old_especialidades , $value);        
                                        }
                                    }                                   
                
                                      foreach ($allEspecialidad as $row)                       
                                    { ?>

                                        <li class="list-group-item">                        
                                            <?php  echo  $row->nombre ?>
                                            <label class="checkbox" for="especialidad.<?php echo $row->cod_especialidad ?>">
                                                <input  type="checkbox"
                                                        name="especialidad[]"
                                                        id="especialidad.<?php echo $row->cod_especialidad ?>"
                                                        value="<?php echo $row->cod_especialidad ?>"
                                                        <?php if(isset($especialidadOld) && $especialidadOld >0) if(in_array($row->cod_especialidad,$old_especialidades)) echo "checked"; ?>
                                                        placeholder="Search">
                                                        <span class="default"></span>
                                            </label>
                                        </li>                                                 

                                        <?php
                                    }
                                }
                            ?>
                     </div>

                    
                    <input type="hidden" name="view" id="view" value="create">
                    <button  type="submit" class="btn btn-dark form-control">Guardar</button>
                </form>



        </div>
    
    </div>           
</div>
