<div class="col">
                    <div class="row">
                        <div class="col-12">
                        <div class="card-title text-center  bg-light font-weight-bold">  
                                        <h1>Citas</h1>
                        </div>

                        </div>
                        
                    </div>
                <br>

               
                <table class="table table-bordered ">
                        <thead class="thead-dark">
                        <th scope="col">Paciente</th>
                        <th scope="col">Medico</th>
                        <th scope="col">Sede</th>
                        <th scope="col">Consultorio</th>
                        <th scope="col">Fecha cita</th>
                        <th scope="col">Hora cita</th>
                        <th scope="col">Fecha registro</th>                
                        </thead>
                        
                    <?php
                    $all = function($dato1,$dato2,$allCitas){
                    if (isset($allCitas)) {
                        foreach ($allCitas as $row) { //recorremos el array de objetos y obtenemos el valor de las propiedades
                           if($dato1 != "" && $dato2 != ""){
                                if($dato1 == $row->medico_cod && $dato2 == $row->fecha_cita ){
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <th><?php echo $row->paciente_documento ?></th>
                                                    <td><?php echo $row->medico_cod; ?></td>
                                                    <td><?php echo $row->sede; ?></td>
                                                    <td><?php echo $row->consultorio; ?></td>
                                                    <td><?php echo $row->fecha_cita; ?></td>
                                                    <td><?php echo $row->hora_cita; ?></td>
                                                    <td><?php echo $row->fecha_registro; ?></td>
                                                    
                                                </tr>

                                            </tbody>
                                            <br>
                                        <?php
                                }

                            }else if($dato1 != "" && $dato2 == ""){
                                if($dato1 == $row->medico_cod){
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <th><?php echo $row->paciente_documento ?></th>
                                                    <td><?php echo $row->medico_cod; ?></td>
                                                    <td><?php echo $row->sede; ?></td>
                                                    <td><?php echo $row->consultorio; ?></td>
                                                    <td><?php echo $row->fecha_cita; ?></td>
                                                    <td><?php echo $row->hora_cita; ?></td>
                                                    <td><?php echo $row->fecha_registro; ?></td>
                                                    
                                                </tr>

                                            </tbody>
                                            <br>
                                        <?php
                                }

                            }else if($dato1 == "" && $dato2 != ""){
                                if($dato2 == $row->fecha_cita){
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <th><?php echo $row->paciente_documento ?></th>
                                                    <td><?php echo $row->medico_cod; ?></td>
                                                    <td><?php echo $row->sede; ?></td>
                                                    <td><?php echo $row->consultorio; ?></td>
                                                    <td><?php echo $row->fecha_cita; ?></td>
                                                    <td><?php echo $row->hora_cita; ?></td>
                                                    <td><?php echo $row->fecha_registro; ?></td>
                                                    
                                                </tr>

                                            </tbody>
                                            <br>
                                        <?php
                                }
                            }
                        }

                    }
                };

                $codMed= $cod;
                $fechCit= $fecha;
                $allcit= $allCitas;

                    $all($codMed,$fechCit,$allcit);

                    

                    ?>
                </table>
        
                
            <br><br>
        </div>
        </div>

