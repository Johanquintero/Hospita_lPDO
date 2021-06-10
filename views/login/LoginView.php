<div class="card col-10 col-md-5 col-lg-4 m-auto bg-dark text-white">                        
        <div class="card-body">
                <h4 class="card-title text-center align-self-center">Inicio de sesión</h4>

                <form method="post" action="index.php?controller=Login&action=initLogin" >                 
                        <div class="form-row">
                                <div class="form-group col-12">
                                        <label for="txtEmail">Correo Electronico </label>
                                        <input class="form-control bg-dark text-white  <?php  if(isset($errors)&& $errors=="email"){echo "is-invalid";} ?> " required type="text" name="txtEmail" id="txtEmail" placeholder="example@.com">
                                        <div class="invalid-feedback">
                                                <?php  if(isset($errors)&& $errors=="email"){echo "El Correo Electronico es incorrecto";} ?>
                                        </div>
                                </div>
                        </div>
                        
                        <div class="form-row">
                                <div class="form-group col-12">
                                        <label for="txtPassword">Contraseña</label>
                                        <input class="form-control  bg-dark text-white  <?php  if(isset($errors)&& $errors=="pass"){echo "is-invalid";} ?>" required type="password" name="txtPassword" id="txtPassword" placeholder="Contraseña">
                                        <div class="invalid-feedback">
                                                <?php  if(isset($errors)&& $errors=="pass"){echo "La Contraseña es incorrecta";} ?>
                                        </div>
                                </div>
                        </div>
                                                                                                
                        <div class="row justify-content-center p-4">
                                <input type="submit" class="btn btn-primary btn-block " value="Iniciar Sesión">
                        </div>

                        <div class="row justify-content-center">
                                <a href="#" id="btnRegister" data-toggle="modal" data-target="#registerModal">Regístrate afiliado.</a>
                        </div>

                        <div class="row justify-content-center">
                                <a href="#" >Olvide mi contraseña.</a>
                        </div>
                </form>          
        </div>                  
</div> 
<!-- alert validacion usuario creado  -->
<div class="row mb-5">
        <div class="col-12 d-flex justify-content-center p-0">
        <?php if(isset($validateRegister)){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $message["CreateUser"]; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                </div>                      
        <?php } ?>
        </div>
</div>     

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="registerModalLabel">Formulario de registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form action="index.php?controller=Paciente&action=Validacion" method="POST">

                        <div class="form-row">
                        <div class="form-group col-12">
                                <label class="font-weight-bold" for="txtNombre">Nombre: </label>
                                <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="" value="<?php if(isset($nombre) && !isset($validateRegister)) echo $nombre ?>">
                                <div class='invalid-feedback' id="nombreError"><?php if(isset($campos['s1'])){ echo $campos['s1']; } ?></div>
                        </div> 
                        </div>

                        <div class="form-row">
                        <div class="form-group col-12 col-lg-6">
                                <label class="font-weight-bold" for="txtDocumento">Documento: </label>
                                <input type="number" minlength="1" maxlength="13"  class="form-control" id="txtDocumento" name="txtDocumento" placeholder="" value="<?php if(isset($documento)&& !isset($validateRegister)) echo $documento ?>">
                                <div class='invalid-feedback' id="documentoError"><?php if(isset($campos['n1'])){ echo $campos['n1'];} ?></div>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                                <label class="font-weight-bold" for="txtTelefono">Telefono: </label>
                                <input type="number" minlength="1" maxlength="11"  class="form-control" id="txtTelefono" name="txtTelefono" placeholder="" value="<?php if(isset($telefono)&& !isset($validateRegister)) echo $telefono; ?>">
                                <div class='invalid-feedback' id="telefonoError"><?php if(isset($campos['n3'])){ echo $campos['n3'];} ?></div>
                        </div>             
                        </div>

                        <div class="form-row">
                        <div class="form-group col-12">
                                <label class="font-weight-bold" for="txtDireccion">Dirección: </label>
                                <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="" value="<?php if(isset($direccion)&& !isset($validateRegister)) echo $direccion; ?>">
                                <?php if(isset($campos['d'])){ echo "<div class='invalid-feedback'>"; echo $campos['d']; echo "</div>";} ?>
                        </div>
                        </div>

                        <div class="form-row">
                        <div class="form-group col-12 col-lg-6">
                                <label class="font-weight-bold" for="txtFechaNacimiento">Fecha Nacimiento: </label>
                                <input type="date" class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento" placeholder=""value="<?php if(isset($fecha_nac)&& !isset($validateRegister)) echo $fecha_nac; ?>">
                                <div class='invalid-feedback' id="fechaError"><?php if(isset($campos['f'])){ echo $campos['f'];} ?></div>
                        </div>  
                        <div class="form-group col-12 col-lg-6">
                                <label class="font-weight-bold" for="txtEps">EPS: </label>
                                <input type="text" class="form-control" id="txtEps" name="txtEps" placeholder="" value="<?php if(isset($eps)&& !isset($validateRegister))echo $eps; ?>">
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
                                <input type="email" class="form-control" id="txtEmailRegister" name="txtEmail" placeholder="" value="<?php if(isset($email) && !isset($validateRegister)) echo $email; ?>">
                                <?php if(isset($campos['e'])){ echo "<div class='invalid-feedback'>"; echo $campos['e']; echo "</div>";} ?>
                        </div>
                        </div>

                        <div class="form-row">
                        <div class="form-group col-12">
                                <label class="font-weight-bold" for="txtPassword">Contraseña: </label>
                                <input type="password" class="form-control" id="txtPasswordRegister" name="txtPassword" placeholder="" value="<?php if(isset($password)&& !isset($validateRegister)) echo $password; ?>">
                                <?php if(isset($campos['p'])){ echo "<div class='invalid-feedback'>"; echo $campos['p']; echo "</div>";} ?>
                        </div>
                        </div>

                        <input type="hidden" name="view" id="view" value="create">
                        <!-- <button  type="submit" class="btn btn-dark form-control">Guardar</button> -->
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                </form>
      </div>
      
    </div>
  </div>
</div>

<script>
        $count = 0;

        setInterval(function(){ 
                registerValidate();    
        }, 1000);

        function registerValidate(){
                $register = "<?php echo isset($register) ? $register :''?>";
                if($register && $count == 0 ){
                        document.getElementById("btnRegister").click();
                        $count = $count+1;                
                }
                
        }

</script>