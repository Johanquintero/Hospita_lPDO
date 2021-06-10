        <div class="col">
                    <div class="row">
                        <div class="col-12  p-0">
                            <div class="card-title text-center  bg-light font-weight-bold">  
                                            <h1>Pacientes</h1>
                            </div>
                        </div>
                        
                    </div>

                    <?php

                    $valor = isset($_GET["error"]) ? $_GET["error"] : "";

                    if ($valor == "1") {  ?>
                        

                        
                       <script>
                        swal({
                            title: "Esta no es una Accion valida!",
                            text: "Estos derechos son de el administrador!",
                            icon: "error",
                            });
                       </script>
                    
                    
                   <?php } ?>

                    <div class="row mb-5">
                        <div class="col-12 d-flex justify-content-end p-0">
                            <?php
                            if($_SESSION['tipo_usuario'] == "Admin"){
                                echo <<<val
                                <a href = "index.php?controller=Paciente&action=ViewCreate"  class="btn btn-dark mr-5"><i class="fa fa-user-plus"></i></a>
                            val;
                            }
                            ?>

                        </div> 
                    </div>
                    
                <div class="row">
                    <div class="col-12">

                            <table class="table table-bordered" id="tbl">
                                        <thead class="thead-dark">
                                        <th class="d-none d-sm-table-cell" scope="col">Documento</th>
                                        <th  scope="col">Nombre</th>
                                        <th class="d-none d-md-table-cell" scope="col">Fecha nacimiento</th>
                                        <th class="d-none d-lg-table-cell" scope="col">Direccion</th>
                                        <th class="d-none d-lg-table-cell" scope="col">Telefono</th>
                                        <th class="d-none d-xl-table-cell" scope="col">Estado</th>
                                        <th class="d-none d-xl-table-cell" scope="col">Genero</th>
                                        <th class="d-none d-xl-table-cell" scope="col">Eps</th>
                                        <th class="d-none d-xl-table-cell" scope="col">Email</th>
                                        <th scope="col">Opciones</th>
                                        </thead>
                                        
                                    <?php
                                    if (isset($allPacientes)) {
                                        foreach ($allPacientes as $row) { //recorremos el array de objetos y obtenemos el valor de las propiedades
                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <td class="d-none d-sm-table-cell"><?php echo $row->documento ?></td>
                                                        <td class="h6"><?php echo $row->nombre; ?></td>
                                                        <td class="d-none d-md-table-cell"><?php echo $row->fecha_nacimiento; ?></td>
                                                        <td class="d-none d-lg-table-cell"><?php echo $row->direccion; ?></td>
                                                        <td class="d-none d-lg-table-cell"><?php echo $row->telefono; ?></td>
                                                        <td class="d-none d-xl-table-cell h6"><?php echo $row->estado; ?></td>
                                                        <td class="d-none d-xl-table-cell"><?php echo $row->genero; ?></td>
                                                        <td class="d-none d-xl-table-cell"><?php echo $row->eps; ?></td>
                                                        <td class="d-none d-xl-table-cell"><?php echo $row->email; ?></td>
                                                        <td class="text-center">
                                                            <a onClick="return confirm('Seguro Desea borrar Este Dato?')" href = "<?php echo "index.php?controller=Paciente&action=borrar&id=".$row->documento; ?>"><i class="fa fa-user-times text-danger"></i></a> 
                                                            <?php
                                                            if($_SESSION['tipo_usuario'] == "Admin"){
                                                                echo <<<agg
                                                            <a href = "index.php?controller=Paciente&action=ViewEdit&id=$row->documento"><i class="fa fa-edit text-primary ml-1"></i></a>
                                                            agg;
                                                            }          
                                                            ?>
                                                        
                                                            <a href = "<?php echo "index.php?controller=Paciente&action=ItemView&id=".$row->documento; ?>"><i class="fa fa-id-card-o text-success ml-1"></i></a>
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

        
                       


