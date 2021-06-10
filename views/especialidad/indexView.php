    <div class="col">
        <div class="row">
            <div class="col-12">
                <div class="card-title text-center  bg-light font-weight-bold">  
                                <h1>Especialidades</h1>
                </div>
            </div>                       
        </div>

        <div class="row mb-5">
            <div class="col-12 d-flex justify-content-end p-0">
                <a href="<?php echo 'index.php?controller=Especialidad&action=CreateView'?>" class="btn btn-dark mr-5"><i class="fa fa-user-plus"></i></a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <th class="d-none d-md-table-cell" scope="col">Codigo Especialidad</th>
                        <th scope="col">Nombre</th>
                        <th class="d-none d-md-table-cell" scope="col">Descrpcion</th>
                        <th scope="col">Opciones</th>
                       
                        </thead>
                        
                        <?php
                        if (isset($allEspecialidad)) {
                            foreach ($allEspecialidad as $row) { //recorremos el array de objetos y obtenemos el valor de las propiedades
                                ?>
                                    <tbody>
                                        <tr>
                                            <td class="h6 d-none d-md-table-cell"><?php echo $row->cod_especialidad ?></td>
                                            <td><?php echo $row->nombre; ?></td>
                                            <td class="h6 d-none d-md-table-cell"><?php echo $row->descripcion; ?></td>
                                            
                                            <td class="text-center">
                                                <a onClick="return confirm('Seguro Desea borrar Este Dato?')" href = "<?php echo "index.php?controller=Especialidad&action=Delete&cod=" . $row->cod_especialidad; ?>"><i class="fa fa-user-times text-danger"></i></a>
                                                <a href = "<?php echo "index.php?controller=Especialidad&action=EditView&cod=". $row->cod_especialidad; ?>"><i class="fa fa-edit text-primary ml-2"></i></a>
                                                <a href = "<?php echo "index.php?controller=Especialidad&action=ItemView&cod=". $row->cod_especialidad; ?>"><i class="fa fa-id-card-o text-success ml-2"></i></a>
                                            </td>
                                        </tr>
                                            
                                        

                                    </tbody>
                                <?php
                            }
                        }
                        ?>
                    </table>
            </div>
        </div>

    </div>
</div>



