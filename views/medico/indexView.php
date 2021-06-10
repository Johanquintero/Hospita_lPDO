    <div class="col-12">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="card-title text-center  bg-light font-weight-bold p-0">  
                                    <h1>Medicos</h1>
                            </div>

                        </div>
                        
                    </div>

                    <div class="row mb-5">
                        <div class="col-12 d-flex justify-content-end p-0">
                           
                            <?php
                                if($_SESSION['tipo_usuario'] == "Admin"){
                                    echo <<<agg
                                        <a href = "index.php?controller=Medico&action=CreateView"  class="btn btn-dark mr-5"><i class="fa fa-user-plus"></i></a>
                                agg;
                                }
                            ?>
                                                                         
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-12">

                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th class="d-none d-md-table-cell" scope="col">Documento</th>
                                    <th class="d-none d-lg-table-cell" scope="col">Fecha Nacimiento</th>
                                    <th class="d-none d-lg-table-cell" scope="col">Genero</th>
                                    <th class="d-none d-lg-table-cell" scope="col">Email</th>
                                    <th class="d-none d-xl-table-cell" scope="col">Telefono</th>
                                    <th class="d-none d-xl-table-cell" scope="col">Fecha Ingreso</th>
                                    <th class="d-none d-xl-table-cell" scope="col">Municipio</th>
                                    <th scope="col mx-0">Opciones</th>
                                
                                    </thead>
                                
                            <?php
                            if (isset($allMedicos)) {
                                foreach ($allMedicos as $row) { //recorremos el array de objetos y obtenemos el valor de las propiedades
                                    
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td class="h6"><?php echo $row->nombre; ?></td>
                                                <td><?php echo $row->apellido; ?></td>
                                                <td class="d-none d-md-table-cell" ><?php echo $row->documento; ?></td>
                                                <td class="d-none d-lg-table-cell" ><?php echo $row->fecha_nacimiento; ?></td>
                                                <td class="d-none d-lg-table-cell" ><?php echo $row->genero; ?></td>
                                                <td class="d-none d-lg-table-cell" ><?php echo $row->email; ?></td>
                                                <td class="d-none d-xl-table-cell" ><?php echo $row->telefono; ?></td>
                                                <td class="d-none d-xl-table-cell h6" ><?php echo $row->fecha_ingreso; ?></td>
                                                <td class="d-none d-xl-table-cell" ><?php echo $row->municipio; ?></td>
                                                <td class="text-center">
                                                   
                                                    <?php
                                                        if($_SESSION['tipo_usuario'] == "Admin"){
                                                            echo <<<agg
                                                            <a onClick="return confirm('Seguro Desea borrar Este Dato?')" href = "index.php?controller=Medico&action=delete&cod=$row->cod_medico"><i class="fa fa-user-times text-danger"></i></a>
                                                            <a href ="index.php?controller=Medico&action=EditView&cod=$row->cod_medico"><i class="fa fa-edit text-primary"></i></a>  
                                                        agg;
                                                    }          
                                                    ?>                                             
                                                
                                                    <a href = "<?php echo "index.php?controller=Medico&action=ItemView&cod=".$row->cod_medico ; ?>"><i class="fa fa-id-card-o text-success"></i></a>                                                      
                                                                
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
