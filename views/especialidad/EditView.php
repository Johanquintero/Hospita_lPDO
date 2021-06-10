<div class="col-12 col-md-8 col-lg-6 m-auto">
    <div class="card mt-2 mb-2">
        <div class="card-header bg-dark text-center text-white">
            <h3>Editar Especialidad</h3>
        </div>  
            <div class="card-body">
                <form action="index.php?controller=Especialidad&action=Validacion" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold" for="txtCodEspeciaidad" >Codigo Especialidad: </label>
                        <input hidden type="number" minlength="1" maxlength="5"  class="form-control" id="txtCodEspecialidad" name="txtCodEspecialidad" placeholder="" value="<?php echo $allEspecialidad->getCod_especialidad(); ?>">
                        <input type="number" minlength="1" maxlength="5"  class="form-control" id="txtCodEspecialidad2" name="txtCodEspecialidad2" placeholder="" value="<?php echo $allEspecialidad->getCod_especialidad(); ?>">
                        <?php if(isset($campos['n3'])){ echo "<div class='invalid-feedback'>"; echo $campos['n3']; echo "</div>";} ?>
                    </div> 
                    <div class="form-group">
                        <label class="font-weight-bold" for="txtNombre">Nombre: </label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="" value="<?php echo $allEspecialidad->getNombre(); ?>">
                        <?php if(isset($campos['s1'])){ echo "<div class='invalid-feedback'>"; echo $campos['s1']; echo "</div>";} ?>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="txtDescripcion">Descripcion: </label>
                        <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="" value="<?php echo $allEspecialidad->getDescripcion(); ?>">
                        <?php if(isset($campos['s2'])){ echo "<div class='invalid-feedback'>"; echo $campos['s2']; echo "</div>";} ?>
                    </div>
                    
                    <input type="hidden" name="view" id="view" value="edit">
                    <button  type="submit" class="btn btn-dark form-control">Actualizar</button>
                </form>


        </div>
    
    </div>           
</div>
