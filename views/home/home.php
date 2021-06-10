    <div class="row">
        <div class="col-12">
            <section id="cards" class="bg-faded py-2">
                <div class="row">
                    <div class="col-12">
                     <!-- Jumbotron -->
                        <div class="jumbotron m-auto">
                            <h1 class="display-4">Bienvenido a Senamas EPS!</h1>
                            <p class="lead"><?php echo $_SESSION['nombre'];?> este sistema de información es creado a tu comodidad.</p>
                        </div>                  
                    </div>                  
                </div>

                <div class="row mt-3">
                    <div class="col-xl-6 col-lg-4 mb-4">

                        <!-- Card -->
                        <div class="card border-primary h-100">
                            <div class="card-body d-flex flex-column align-items-start">
                                <h4 class="card-title text-primary">Citas medicas</h4>
                                <?php if($_SESSION['tipo_usuario'] == "Admin"){?>
                                    <p class="card-text">Puedes estar al tanto a tus citas y agregar de manera sencilla una nueva cita tambien visualizar citas pendientes o modificar cada una de ellas.</p></p>                              
                                <?php } else if($_SESSION['tipo_usuario'] == "medico"){?>
                                    <p class="card-text"><?php echo $_SESSION['nombre'];?>, Accede a toda la información de el itinerario para el día <?php echo date("o-m-d"); ?> </p>
                                <?php }?>
                                <?php if($_SESSION['tipo_usuario'] == "paciente"){?>
                                    <p class="card-text">Puedes estar al tanto a tus citas acceder a tu información y modifacarla en caso de ser necesario.</p></p>                              
                                <?php }?>
                                   
                                <?php if($_SESSION['tipo_usuario'] == "Admin"){?>
                                    <a href="index.php?controller=Citas&action=index" class="btn btn-primary mt-auto">Ver citas</a>                                 
                                    <a href="<?php echo 'index.php?controller=Citas&action=CreateView' ?>" class="btn btn-primary mt-2">Agregar nueva cita</a>
                                <?php } else if($_SESSION['tipo_usuario'] == "medico" || $_SESSION['tipo_usuario'] == "paciente" ){?>
                                    <a href="index.php?controller=Citas&action=index" class="btn btn-primary mt-auto">Ver citas pendientes</a>
                                <?php }?>
                            </div>
                        </div>

               

                    </div>
                    <div class="col-xl-6 col-lg-4 mb-4">
                        <div class="card border-primary h-100">
                            <div class="card-body">

                                <!-- List Group -->
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action active">Dona sangre, dona vida</a>
                                    <a href="#" class="list-group-item list-group-item-action">¡Actualiza tus datos!</a>
                                    <a href="#" class="list-group-item list-group-item-action">Pide tus citas</a>
                                    <a href="#" class="list-group-item list-group-item-action disabled">Lineas de atención 01-8000-0000 Manizales 870-0000</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-4 mb-4">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body d-flex flex-column align-items-start">
                                <h4 class="card-title">Novedades</h4>
                                <p class="card-text">Porque nuestro compromiso es contigo, te damos a conocer las noticias y novedades que tenemos en nuestra EPS y que son importantes para tí.</p>
                                <a href="#" class="btn btn-primary border-white mt-auto">Contáctanos.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
        </div>
    </div>

</div>