<div class="col-12 col-md-8 col-lg-6 m-auto">
    <div class="card mt-2 mb-2">
        <div class="card-header bg-dark text-center text-white">
            <h3>Editar Paciente</h3>
        </div>
            <div class="card-body">
                <form action = "index.php?controller=Paciente&action=Validacion" method="post">

                <div class="form-row">   
                    <div class="form-group col-12">
                        <label class="font-weight-bold" for="txtNombre">Nombre: </label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="" value="<?php echo $allPacientes->getNombre(); ?>" <?php  $this->readonly(); ?>>
                        <?php if(isset($campos['s1'])){ echo "<div class='invalid-feedback'>"; echo $campos['s1']; echo "</div>";} ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-lg-6">
                        <label class="font-weight-bold" for="txtDocumento" >Documento: </label>
                        <input g type="text" hidden class="form-control" id="txtDocumento" name="txtDocumento" value="<?php echo $allPacientes->getDocumento();?>" placeholder="">
                        <input type="number" minlength="1" maxlength="11" class="form-control" id="txtDocumento2" name="txtDocumento2" value="<?php echo $allPacientes->getDocumento(); ?>" placeholder="" <?php  $this->readonly(); ?>>
                        <?php if(isset($campos['n4'])){ echo "<div class='invalid-feedback'>"; echo $campos['n4']; echo "</div>";} ?>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label class="font-weight-bold" for="txtTelefono">Telefono: </label>
                        <input type="number" minlength="1" maxlength="11"  class="form-control" id="txtTelefono" name="txtTelefono" placeholder="" value="<?php echo $allPacientes->getTelefono(); ?>">
                        <?php if(isset($campos['n3'])){ echo "<div class='invalid-feedback'>"; echo $campos['n3']; echo "</div>";} ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label class="font-weight-bold" for="txtDireccion">Dirección: </label>
                        <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="" value="<?php echo $allPacientes->getDireccion(); ?>">
                        <?php if(isset($campos['d'])){ echo "<div class='invalid-feedback'>"; echo $campos['d']; echo "</div>";} ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-lg-6">
                        <label class="font-weight-bold" for="txtFechaNacimiento">Fecha Nacimiento: </label>
                        <input type="date" class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento" placeholder="" value="<?php echo $allPacientes->getfecha_nacimiento(); ?>" <?php  $this->readonly(); ?>>
                        <?php if(isset($campos['f'])){ echo "<div class='invalid-feedback'>"; echo $campos['f']; echo "</div>";} ?>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label class="font-weight-bold" for="txtEps">EPS: </label>
                        <input type="text" class="form-control" id="txtEps" name="txtEps" placeholder="" value="<?php echo $allPacientes->getEps(); ?>">
                        <?php if(isset($campos['s4'])){ echo "<div class='invalid-feedback'>"; echo $campos['s4']; echo "</div>";} ?>
                    </div>               
                </div>

                <div class="form-row">    
                    <div class="form-group col-12 col-lg-6">
                        <label class="font-weight-bold" for="txtGenero">Genero: </label>
                        <select class="form-control" id="txtGenero" name="txtGenero">
                            <option value="M" <?php if($allPacientes->getGenero() == 'M'){echo "selected";}  ?>>Masculino</option>
                            <option value="F" <?php if($allPacientes->getGenero() == 'F'){echo "selected";} ?> >Femenino</option>
                        </select>
                        <?php if(isset($campos['s3'])){ echo "<div class='invalid-feedback'>"; echo $campos['s3']; echo "</div>";} ?>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label class="font-weight-bold" for="txtEstado">Estado: </label>
                        <select class="form-control" id="txtEstado" name="txtEstado" <?php  $this->readonly(); ?>> 
                            <option value="activo"  <?php if($allPacientes->getEstado() == 'activo'){echo "selected";} ?>>Activo</option>
                            <option value="inactivo" <?php if($allPacientes->getEstado() == 'inactivo'){echo "selected";} ?>>Inactivo</option>
                            <option value="multado" <?php if($allPacientes->getEstado() == 'multado'){echo "selected";} ?> >Con multa</option>
                        </select>
                        <?php if(isset($campos['s2'])){ echo "<div class='invalid-feedback'>"; echo $campos['s2']; echo "</div>";} ?>
                    </div>
                </div>  
                
                <div class="form-row">    
                    <div class="form-group col-12">
                        <label class="font-weight-bold" for="txtEmail">Email: </label>
                        <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="" value="<?php echo $allPacientes->getEmail(); ?>">
                        <?php if(isset($campos['e'])){ echo "<div class='invalid-feedback'>"; echo $campos['e']; echo "</div>";} ?>
                    </div>
                </div>

                <div class="form-row">    
                    <div class="form-group col-12">
                        <label class="font-weight-bold" for="txtPassword">Contraseña: </label>
                        <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="" value="">
                        <?php if(isset($campos['p'])){ echo "<div class='invalid-feedback'>"; echo $campos['p']; echo "</div>";} ?>                           
                    </div>
                </div>   

                    <input type="hidden" name="view" id="view" value="edit">
                    <button  type="submit" class="btn btn-dark form-control">Actualizar</button>
                </form>

        </div>
    
    </div>           
</div>

