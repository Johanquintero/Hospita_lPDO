 <div class="col">
                <div class="row">
                    <div class="col-12">
                        <div class="card-title text-center  bg-light font-weight-bold">  
                                        <h1>Citas</h1>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-5">
                    <div class="col-12 d-flex justify-content-end p-0">
                        <a href="<?php echo 'index.php?controller=Citas&action=CreateView' ?>"  class="btn btn-dark mr-5"><i class="fa fa-user-plus"></i></a>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-12">
                        <form action="<?php echo 'index.php?controller=Citas&action=ItemView' ?>" id="Searh" method="post">
                            <div class="form-row">
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="cod">Codigo medico: </label>
                                        <input type="number" class="form-control" id="cod" name="cod" >
                                    </div>
                                </div>
                                <div class="col-8 col-md-4 col-lg-3">
                                    <div class="form-group">
                                            <label class="font-weight-bold" for="fecha">Fecha cita: </label>
                                            <input type="date" class="form-control" id="fecha" name="fecha">
                                        </div>
                                </div>
                                <div class="col-4 col-md-2 col-lg-2 mt-2">
                                    <button type="submit" id="btnSearch" class="btn btn-dark mt-4"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>

                            
                        </form>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered ">
                                    <thead class="thead-dark">
                                    <th scope="col">Paciente</th>
                                    <th class="d-none d-md-table-cell" scope="col">Medico</th>
                                    <th class="d-none d-md-table-cell" scope="col">Sede</th>
                                    <th class="d-none d-lg-table-cell" scope="col">Consultorio</th>
                                    <th class="d-none d-xl-table-cell" scope="col">Fecha cita</th>
                                    <th class="d-none d-xl-table-cell" scope="col">Hora cita</th>
                                    <th class="d-none d-xl-table-cell" scope="col">Fecha registro</th>
                                    <th scope="col">Opciones</th>
                                
                                    </thead>
                                    
                                <?php
                                if (isset($allCitas)) {
                                    foreach ($allCitas as $row) { //recorremos el array de objetos y obtenemos el valor de las propiedades
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td class="h6"><?php echo $row->paciente_documento ?></td>
                                                    <td class="d-none d-md-table-cell"><?php echo $row->medico_cod; ?></td>
                                                    <td class="d-none d-md-table-cell"><?php echo $row->sede; ?></td>
                                                    <td class="d-none d-lg-table-cell"><?php echo $row->consultorio; ?></td>
                                                    <td class="d-none d-xl-table-cell"><?php echo $row->fecha_cita; ?></td>
                                                    <td class="d-none d-xl-table-cell h6"><?php echo $row->hora_cita; ?></td>
                                                    <td class="d-none d-xl-table-cell"><?php echo $row->fecha_registro; ?></td>
                                                    
                                                    <td class="text-center">
                                                        <a onClick="return confirm('Seguro Desea borrar Este Dato?')" href = "<?php echo "index.php?controller=Citas&action=Delete&id=" . $row->id; ?>"><i class="fa fa-user-times text-danger"></i></a>
                                                        <a href = "<?php echo "index.php?controller=Citas&action=EditView&id=". $row->id; ?>"><i class="fa fa-edit text-primary ml-2"></i></a>
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



