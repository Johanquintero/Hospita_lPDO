<div class="col-12 col-md-8 col-lg-6 m-auto">
    <div class="card mt-2">
        <div class="card-header bg-dark text-center text-white">
            <h3>Añadir Especialidad</h3>
        </div>
        
            <div class="card-body">
            <!-- action = "<?php echo "index.php?controller=Especialidad&action=Validacion"; ?>" -->
                <form action="index.php?controller=Especialidad&action=Validacion"  method="post">
                    <div class="form-group">
                        <label class="font-weight-bold" for="txtCodEspecialidad">Codigo Especialidad: </label>
                        <input type="number" min="1" max=51"  class="form-control" id="txtCodEspecialidad" name="txtCodEspecialidad" placeholder="" value="<?php if(isset($cod_especialidad))echo $cod_especialidad; ?>">
                        <?php if(isset($campos['n4'])){ echo "<div class='invalid-feedback'>"; echo $campos['n4']; echo "</div>";} ?>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="txtNombre">Nombre: </label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="" value="<?php if(isset($nombre))echo $nombre; ?>">
                        <?php if(isset($campos['s1'])){ echo "<div class='invalid-feedback'>"; echo $campos['s1']; echo "</div>";} ?>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="txtDescripcion">Descripcion: </label>
                        <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="" value="<?php if(isset($descripcion))echo $descripcion; ?>">
                        <?php if(isset($campos['s2'])){ echo "<div class='invalid-feedback'>"; echo $campos['s2']; echo "</div>";} ?>
                    </div>
                    <input type="hidden" name="view" id="view" value="create">
                    <button type="submit"  id="btn_especialidad" class="btn btn-dark form-control">Guardar</button>
                </form>

        </div>
    
    </div>           
</div>

<!-- <script src="js/especialidad/main.js"></script> -->
