    <div class="col">
            <div class="row">
                <div class="col-12">
                    <div class="card-title text-center  bg-light font-weight-bold">  
                        <h1>Especialidad</h1>
                        <h3><?php echo $allEspecialidad->getNombre();?></h3></h3>
                    </div>
                </div>
                
            </div>

            <div class="row mb-5">
                <div class="col-12 d-flex justify-content-end p-0">   
                    <?php
                        echo <<<val
                        <a href="index.php?controller=Especialidad&action=index"  class="btn btn-dark mr-5"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        val;
                    ?>
                </div>
            </div>

            <dl class="row border border-gray">
                <dt class="col-sm-3">Codigo Especialidad</dt>
                <dd class="col-sm-9"><?php echo $allEspecialidad->getCod_especialidad(); ?></dd>
                <dt class="col-sm-3">Nombre</dt>
                <dd class="col-sm-9"><?php echo $allEspecialidad->getNombre(); ?></dd>
                <dt class="col-sm-3">Descrpcion</dt>
                <dd class="col-sm-9"><?php echo $allEspecialidad->getDescripcion(); ?></dd>                
                <?php
                    if($_SESSION['tipo_usuario'] == "Admin"){
                        echo <<<adm
                        <dt class="col-sm-3">Opciones</dt>
                        adm; 
                    }          
                ?>
                <dd class="col-sm-9">
                        <?php  $row =$allEspecialidad->getCod_especialidad(); ?>
                        <a href="<?php echo 'index.php?controller=Especialidad&action=EditView&cod='.$allEspecialidad->getCod_especialidad();?>"><i class="fa fa-edit text-primary ml-2"></i></a> 
                    <?php
                    if($_SESSION['tipo_usuario'] == "Admin"){
                        echo <<<doc
                        <a onClick="return confirm('Seguro Desea borrar Este Dato?')" href="index.php?controller=Especialidad&action=Delete&cod=".$row"><i class="fa fa-user-times text-danger ml-2"></i></a>                                                                                                     
                        doc;
                    }          
                    ?>
                </dd>
            </dl> 
    </div>
</div>

