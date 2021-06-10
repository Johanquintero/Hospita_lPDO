<div class="col-12 col-md-8 col-lg-6 m-auto">
    <div class="card mt-2 mb-2">
        <div class="card-header bg-dark text-center text-white">
            <h3>Añadir Paciente</h3>
        </div>

        <div class="card-body">
                <form action="index.php?controller=Paciente&action=Validacion" method="POST">

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="font-weight-bold" for="txtNombre">Nombre: </label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="" value="<?php if(isset($nombre)) echo $nombre ?>">
                            <?php if(isset($campos['s1'])){ echo "<div class='invalid-feedback'>"; echo $campos['s1']; echo "</div>";} ?>
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="txtDocumento">Documento: </label>
                            <input type="number" minlength="1" maxlength="13"  class="form-control" id="txtDocumento" name="txtDocumento" placeholder="" value="<?php if(isset($documento)) echo $documento ?>">
                            <?php if(isset($campos['n1'])){ echo "<div class='invalid-feedback'>"; echo $campos['n1']; echo "</div>";} ?>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="txtTelefono">Telefono: </label>
                            <input type="number" minlength="1" maxlength="11"  class="form-control" id="txtTelefono" name="txtTelefono" placeholder="" value="<?php if(isset($telefono)) echo $telefono; ?>">
                            <?php if(isset($campos['n3'])){ echo "<div class='invalid-feedback'>"; echo $campos['n3']; echo "</div>";} ?>
                        </div>             
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="font-weight-bold" for="txtDireccion">Dirección: </label>
                            <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="" value="<?php if(isset($direccion)) echo $direccion; ?>">
                            <?php if(isset($campos['d'])){ echo "<div class='invalid-feedback'>"; echo $campos['d']; echo "</div>";} ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="txtFechaNacimiento">Fecha Nacimiento: </label>
                            <input type="date" class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento" placeholder=""value="<?php if(isset($fecha_nac)) echo $fecha_nac; ?>">
                            <?php if(isset($campos['f'])){ echo "<div class='invalid-feedback'>"; echo $campos['f']; echo "</div>";} ?>
                        </div>  
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="txtEps">EPS: </label>
                            <input type="text" class="form-control" id="txtEps" name="txtEps" placeholder="" value="<?php if(isset($eps))echo $eps; ?>">
                            <?php if(isset($campos['s4'])){ echo "<div class='invalid-feedback'>"; echo $campos['s4']; echo "</div>";} ?>
                        </div>                                          
                    </div>                             

                    <div class="form-row">
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="txtGenero">Genero: </label>
                            <select class="form-control" id="txtGenero" name="txtGenero">
                                <option value="">Seleccione genero</option>
                                <option value="M" <?php if(isset($genero)&&$genero == "M")echo "selected"; ?> >Masculino</option>
                                <option value="F" <?php if(isset($genero)&&$genero == "F")echo "selected";?> >Femenino</option>
                                <option value="N" <?php if(isset($genero)&&$genero == "Indef")echo "selected";?> >No definido</option>
                            </select>
                            <?php if(isset($campos['s3'])){ echo "<div class='invalid-feedback'>"; echo $campos['s3']; echo "</div>";} ?>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label class="font-weight-bold" for="txtEstado">Estado: </label>
                            <select class="form-control" id="txtEstado" name="txtEstado">
                                <option value="activo" <?php if(isset($estado) && $estado == "activo")echo "selected";?> >Activo</option>
                                <option value="inactivo" <?php if(isset($estado)&& $estado == "inactivo")echo "selected";?> >Inactivo</option>
                                <option value="multado" <?php if(isset($estado)&&$estado == "multado")echo "selected";?> >Con multa</option>
                            </select>
                            <?php if(isset($campos['s2'])){ echo "<div class='invalid-feedback'>"; echo $campos['s2']; echo "</div>";} ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="font-weight-bold" for="txtEmail">Email: </label>
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="" value="<?php if(isset($email)) echo $email; ?>">
                            <?php if(isset($campos['e'])){ echo "<div class='invalid-feedback'>"; echo $campos['e']; echo "</div>";} ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="font-weight-bold" for="txtPassword">Contraseña: </label>
                            <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="" value="<?php if(isset($password)) echo $password; ?>">
                            <?php if(isset($campos['p'])){ echo "<div class='invalid-feedback'>"; echo $campos['p']; echo "</div>";} ?>
                        </div>
                    </div>

                    <input type="hidden" name="view" id="view" value="create">
                    <button  type="submit" class="btn btn-dark form-control">Guardar</button>
                </form>
        </div>
    
    </div>           
</div>

<!-- <script src="js/paciente/main.js"></script> -->