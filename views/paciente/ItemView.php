    <div class="col">
        <div class="row">
            <div class="col-12">
                <div class="card-title text-center  bg-light font-weight-bold">  
                    <h1>Paciente</h1>
                    <h3><?php echo $allPacientes->getNombre(); ?></h3>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12 d-flex justify-content-end p-0">   
                <?php
                    echo <<<val
                    <a href = "index.php?controller=Paciente&action=index"  class="btn btn-dark mr-5"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    val;
                ?>
            </div>
        </div>

         <dl class="row border border-gray">
                <dt class="col-sm-3">Nombre</dt>
                <dd class="col-sm-9"><?php echo $allPacientes->getNombre(); ?></dd>
                <dt class="col-sm-3">Documento</dt>
                <dd class="col-sm-9"><?php echo $allPacientes->getDocumento(); ?></dd>
                <dt class="col-sm-3">Fecha Nacimiento</dt>
                <dd class="col-sm-9"><?php echo $allPacientes->getFecha_nacimiento(); ?></dd>
                <dt class="col-sm-3">Direccion</dt>
                <dd class="col-sm-9"><?php echo $allPacientes->getDireccion(); ?></dd>
                <dt class="col-sm-3">Telefono</dt>
                <dd class="col-sm-9"><?php echo $allPacientes->getTelefono();?></dd>
                <dt class="col-sm-3">Estado</dt>
                <dd class="col-sm-9"><?php echo $allPacientes->getEmail(); ?></dd>
                <dt class="col-sm-3 text-truncate">Genero</dt>
                <dd class="col-sm-9"><?php echo $allPacientes->getGenero(); ?></dd>
                <dt class="col-sm-3">Años Eps</dt>
                <dd class="col-sm-9"><?php echo $allPacientes->getEps(); ?></dd>
                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9"><?php echo $allPacientes->getEmail(); ?></dd>
                <?php
                    if($_SESSION['tipo_usuario'] == "Admin"){
                        echo <<<adm
                        <dt class="col-sm-3">Opciones</dt>
                        adm; 
                    }          
                ?>
                <dd class="col-sm-9">
                        <?php  $row = $allPacientes->getDocumento(); ?>
                        <a href = "<?php echo "index.php?controller=Paciente&action=ViewEdit&id=$row"?>"><i class="fa fa-edit text-primary"></i></a> 
                    <?php
                    if($_SESSION['tipo_usuario'] == "Admin"){
                        echo <<<doc
                        <a onClick="return confirm('Seguro Desea borrar Este Dato?')" href ="index.php?controller=Paciente&action=borrar&id=$row"><i class="fa fa-user-times text-danger"></i></a>                                                                                                     
                        doc;
                    }          
                    ?>
                </dd>
            </dl>             

        </div>
</div>

