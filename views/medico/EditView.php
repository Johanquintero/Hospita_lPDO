
<div class="col-12 col-md-10 col-lg-6 m-auto p-0">
    <div class="card">
        <div class="card-header bg-dark text-center text-white p-0">
            <h3>Editar Medico</h3>
        </div>  
        
            <div class="card-body">
                <form action = "index.php?controller=Medico&action=Validacion" method="post">
                    <div class="form-group">
                        <label class="font-weight-bold" for="txtCodMedico" >Codigo Medico: </label>
                        <input type="number" minlength="1" maxlength="5"  hidden class="form-control" id="txtCodMedico" name="txtCodMedico" placeholder="" value="<?php echo $allMedicos->getCod_medico(); ?>">
                        <input type="number" minlength="1" maxlength="5"  class="form-control" id="txtCodMedico2"<?php  $this->readonly(); ?> 
                        name="txtCodMedico2" placeholder="" value="<?php echo $allMedicos->getCod_medico(); ?>">
                    </div>

                    <div class="form-row">
                        <div  class="form-group col-12 col-lg-6" >
                                <label class="font-weight-bold" for="txtNombre">Nombre: </label>
                                <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder=""value="<?php echo $allMedicos->getNombre(); ?>" <?php  $this->readonly(); ?> >
                        </div>
                        <div class="form-group col-12 col-lg-6"  >
                                <label class="font-weight-bold" for="txtApellido">Apellido: </label>
                                <input type="text" class="form-control" id="txtApellido" name="txtApellido" placeholder="" value="<?php echo $allMedicos->getApellido(); ?>" <?php  $this->readonly(); ?> >
                        </div>
                    </div>

                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtDocumento">Documento: </label>
                        <input type="number" minlength="1" maxlength="11"  class="form-control" id="txtDocumento" name="txtDocumento" placeholder="" value="<?php echo $allMedicos->getDocumento(); ?>" <?php  $this->readonly(); ?> >
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-lg-6"  >
                                <label class="font-weight-bold" for="txtFechaNacimiento">Fecha Nacimiento: </label>
                                <input type="date" class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento" placeholder="" value="<?php echo $allMedicos->getFecha_nacimiento(); ?>" <?php  $this->readonly(); ?> >
                        </div>
                        <div class="form-group col-12 col-lg-6"  >
                                <label class="font-weight-bold" for="txtTelefono">Telefono:</label>
                                <input type="number" minlength="1" maxlength="11"  class="form-control" id="txtTelefono" name="txtTelefono" placeholder="" value="<?php echo $allMedicos->getTelefono(); ?>">
                        </div>

                    </div>

                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtMunicipio">Municipio: </label>
                        <input type="text" class="form-control" id="txtMunicipio" name="txtMunicipio" placeholder="" value="<?php echo $allMedicos->getMunicipio(); ?>">
                    </div>

                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtDepartamento">Departamento: </label>
                        <input type="text" class="form-control" id="txtDepartamento" name="txtDepartamento" placeholder="" value="<?php echo $allMedicos->getDepartamento(); ?>">
                    </div>

                    <div class="form-row">
                            <div class="form-group col-12 col-lg-6"  >
                                    <label class="font-weight-bold" for="txtEmail">Email: </label>
                                    <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="" value="<?php echo $allMedicos->getEmail(); ?>">
                            </div>
                            <div class="form-group col-12 col-lg-6"  >
                                    <label class="font-weight-bold" for="txtPassword">Password: </label>
                                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="" value="">

                            </div>
                    </div>
                   
                    
                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtGenero">Genero: </label>
                        <select class="form-control" name="txtGenero" id="txtGenero">
                            <option id="txtGenero" name="txtGenero" value="M" <?php if($allMedicos->getGenero()== "M") echo "selected"?>>Masculino</option>
                            <option id="txtGenero" name="txtGenero" value="F"  <?php if($allMedicos->getGenero()== "F") echo "selected"?> >Femenino</option>
                        </select>
                        
                    </div>
                   
                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtPerfilProfesional">Perfl Profesional: </label><br>
                        <textarea class="m-auto col-12" type="textarea" name="txtPerfilProfesional" id="txtPerfilProfesional" placeholder="" value="<?php echo $allMedicos->getPerfil_profesional(); ?>" ><?php echo $allMedicos->getPerfil_profesional();?></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-lg-6"  >
                                <label class="font-weight-bold" for="txtFechaIngreso">Fecha Ingreso: </label>
                                <input type="date" class="form-control" id="txtFechaIngreso" name="txtFechaIngreso" placeholder="" value="<?php echo $allMedicos->getFecha_ingreso(); ?>" <?php  $this->readonly(); ?> >
                        </div>
                        <div class="form-group col-12 col-lg-6"  >
                                <label class="font-weight-bold" for="txtAniosExperiencia">Años Experiencia: </label>
                                <input type="number" minlength"1" maxlength="2" class="form-control" id="txtAniosExperiencia" name="txtAniosExperiencia" placeholder="1" value="<?php echo $allMedicos->getAnios_experiencia(); ?>">
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group"  >
                        <label class="font-weight-bold" for="txtCodPostal">Codigo Postal: </label>
                        <input type="text" class="form-control " id="txtCodPostal" name="txtCodPostal" placeholder="" value="<?php echo $allMedicos->getCod_postal(); ?>">
                    </div>
                    

                    <div class="card" style="margin:50px 0">
                            <label class="card-header font-weight-bold" for="txtEspecialidad">Seleccione Su(s) Especialidad: </label>
                            <ul class="list-group list-group-flush">
                            <?php
                            
                            if (isset($allEspecialidad)) {  
                                //Array para guardar codigo de especialidades de el medico especifico
                                $especialidadesdoc = array();

                                foreach ($allEspMedic as $col){

                                    if($col->medico == $allMedicos->getCod_medico()){
                                        array_push($especialidadesdoc , $col->especialidad);
                                    }

                                }
                                
                                foreach ($allEspecialidad as $row)                       
                                { ?>

                                    <li class="list-group-item">                        
                                    <?php  echo  $row->nombre ?>
                                        <label class="checkbox">
                                            <input type="checkbox" id="" name="especialidad[]"
                                                                                
                                    <?php 
                                    $count = count($especialidadesdoc); 

                                        for ($i=0; $i < $count ; $i++) { 
                                            if ($especialidadesdoc[$i] == $row->cod_especialidad) {
                                                echo "checked";
                                            }
                                        }                           
                                    ?>  

                                    value="<?php echo $row->cod_especialidad ?>"
                                    placeholder="" >
                                    <span class="default"></span>
                                        </label>
                                    </li>                                                 

                                    <?php
                                }
                            }
                            ?>

                     </div>

                    
                    
                    <input type="hidden" name="view" id="view" value="edit">
                    <button  type="submit" class="btn btn-dark form-control">Actualizar</button>
                </form>


               
                   


        </div>
    
    </div>           
</div>