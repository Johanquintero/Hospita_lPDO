    <div class="col">
            <div class="row">
                <div class="col-12">
                    <div class="card-title text-center  bg-light font-weight-bold">  
                        <h1>Medico</h1>
                        <h3><?php echo $allMedicos->getNombre(); ?></h3>
                    </div>
                </div>                   
            </div>
                
            <!-- <?php

            if($_SESSION['tipo_usuario'] == "Admin"){
                echo <<<agg
                    <a href = "index.php?controller=Medico&action=CreateView"  class="btn btn-dark ml-auto"><i class="fa fa-user-plus"></i></a>
            agg;
            }
            ?> -->

            <dl class="row border border-gray">
                <dt class="col-sm-3">Codigo medico</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getCod_medico(); ?></dd>
                <dt class="col-sm-3">Nombre</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getNombre(); ?></dd>
                <dt class="col-sm-3">Apellido</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getApellido(); ?></dd>
                <dt class="col-sm-3">Documento</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getDocumento(); ?></dd>
                <dt class="col-sm-3">Perfil Profesional</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getPerfil_profesional(); ?></dd>
                <dt class="col-sm-3">Fecha Nacimiento</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getFecha_nacimiento(); ?></dd>
                <dt class="col-sm-3">Genero</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getGenero(); ?></dd>
                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getEmail();?></dd>
                <dt class="col-sm-3">Telefono</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getTelefono(); ?></dd>
                <dt class="col-sm-3 text-truncate">Fecha Ingreso</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getFecha_ingreso(); ?></dd>
                <dt class="col-sm-3">Años Experiencia</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getAnios_experiencia(); ?></dd>
                <dt class="col-sm-3">Municipio</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getMunicipio(); ?></dd>
                <dt class="col-sm-3">Departamento</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getDepartamento(); ?></dd>
                <dt class="col-sm-3">Codigo postal</dt>
                <dd class="col-sm-9"><?php echo $allMedicos->getCod_postal(); ?></dd>
                <?php
                    if($_SESSION['tipo_usuario'] == "Admin"){
                        echo <<<adm
                        <dt class="col-sm-3">Opciones</dt>
                        adm; 
                    }          
                ?>
                <dd class="col-sm-9">
                    <?php  $row = $allMedicos->getCod_medico();  ?>
                        <a href ="<?php echo "index.php?controller=Medico&action=EditView&cod=$row" ?>"><i class="fa fa-edit text-primary"></i></a>
                    <?php
                    if($_SESSION['tipo_usuario'] == "Admin"){
                        echo <<<agg
                        <a onClick="return confirm('Seguro Desea borrar Este Dato?')" href = "index.php?controller=Medico&action=delete&cod=$row"><i class="fa fa-user-times text-danger"></i></a>                  
                    agg;
                    }          
                    ?>
                </dd>
            </dl>
    </div>
</div>