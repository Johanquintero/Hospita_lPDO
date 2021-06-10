<!doctype html>
<html lang="es">
<title> Senamas Eps</title>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
   
    <!-- Bootstrap core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <style>

    /* Animacion y estilo checbox */
    @keyframes check {0% {height: 0;width: 0;}
      25% {height: 0;width: 10px;}
      50% {height: 20px;width: 10px;}
    }
    .checkbox{background-color:#fff;display:inline-block;height:28px;margin:0 .25em;width:28px;border-radius:4px;border:1px solid #ccc;float:right}
    .checkbox span{display:block;height:28px;position:relative;width:28px;padding:0}
    .checkbox span:after{-moz-transform:scaleX(-1) rotate(135deg);-ms-transform:scaleX(-1) rotate(135deg);-webkit-transform:scaleX(-1) rotate(135deg);transform:scaleX(-1) rotate(135deg);-moz-transform-origin:left top;-ms-transform-origin:left top;-webkit-transform-origin:left top;transform-origin:left top;border-right:4px solid #fff;border-top:4px solid #fff;content:'';display:block;height:20px;left:3px;position:absolute;top:15px;width:10px}
    .checkbox span:hover:after{border-color:#999}
    .checkbox input{display:none}
    .checkbox input:checked + span:after{-webkit-animation:check .8s;-moz-animation:check .8s;-o-animation:check .8s;animation:check .8s;border-color:#555}
    .checkbox input:checked + .default:after{border-color:#444}
    .checkbox input:checked + .primary:after{border-color:#2196F3}
    .checkbox input:checked + .success:after{border-color:#8bc34a}
    .checkbox input:checked + .info:after{border-color:#3de0f5}
    .checkbox input:checked + .warning:after{border-color:#FFC107}
    .checkbox input:checked + .danger:after{border-color:#f44336}

         /* width */
    ::-webkit-scrollbar {
      width: 16px;
      height: 16px;

    }

    /* Track */
    ::-webkit-scrollbar-track {
      border-radius: 100vh;
      background: #edf2f7;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #cbd5e0;
      border-radius: 100vh;
      border: 3px solid #edf2f7;

    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #a0aec0;
    }

    li,ul {         
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    </style>
  
</head>
    <body>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-dark border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-white">Senamas EPS </div>
                    <div class="list-group list-group-flush">

                        <ul class="ml-0">
                            <li class="navbar-dark text-white">
                                  <a class="list-group-item list-group-item-action bg-dark text-white" href="index.php?controller=Login&action=home"><i class="fa fa-home"></i> Inicio </a>
                            </li>
                            <?php

                            if($_SESSION['tipo_usuario'] == "paciente" || $_SESSION['tipo_usuario'] == "Admin" ){
                                echo <<<barraP
                                <li class="navbar-dark text-white">
                                  <a class="list-group-item list-group-item-action bg-dark text-white" href="index.php?controller=Paciente&action=index"><i class="fa fa-user"></i> Pacientes </a>
                                </li>
                                barraP;
                            }
                          
                            if( $_SESSION['tipo_usuario'] == "Admin" ){
                                echo <<<barraE
                            <li class="navbar-dark text-white">
                            <a class="list-group-item list-group-item-action bg-dark text-white" href="index.php?controller=Especialidad&action=index"><i class="fa fa-user-md"></i> Especialidad </a>
                            </li>
                            barraE;
                            }
                            
                            if($_SESSION['tipo_usuario'] == "medico" || $_SESSION['tipo_usuario'] == "Admin" ){
                            echo <<<barraM
                                <li class="navbar-dark text-white">
                                <a class="list-group-item list-group-item-action bg-dark text-white" href="index.php?controller=Medico&action=index"><i class="fa fa-address-card"></i> Medicos </a>
                                </li>
                            barraM;
                            }

                            if($_SESSION['tipo_usuario'] == "medico" || $_SESSION['tipo_usuario'] == "Admin" ){
                                echo <<<barraM
                                    <li class="navbar-dark text-white">
                                    <a class="list-group-item list-group-item-action bg-dark text-white" href="index.php?controller=Citas&action=index"><i class="fa fa-address-card"></i> Citas </a>
                                    </li>
                                barraM;
                                }                           

                            ?>
                            
                            <li class="navbar-dark text-white">
                              <a class="list-group-item list-group-item-action bg-dark text-white" href="#"><i class="fa fa-info"></i>    Info</a>
                            </li>
                        </ul>
          </div>
        </div>
    <!-- /#sidebar-wrapper -->

      <!-- dropdown perfil -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <button class="btn btn-primary" id="menu-toggle" aria-label="Name"><i class="fa fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <!-- <li class="nav-item active">
              
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li> -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-circle-o mr-2 d-inline-	flex"></i><?php echo $_SESSION['nombre'];?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Perfil</a>
                <!-- <a class="dropdown-item" href="#">Another action</a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?controller=Login&action=logout">Salir</a>
              </div>
            </li>
            
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <!-- CONTENIDO TABLAS -->
        <?php
            include_once $current_view;
        ?>
      
      </div>
    </div>
<!-- /#page-content-wrapper -->
</div>
         

   <div class="row bg-dark py-3 mx-auto text-white fixed-bottom position-relative" >
     <p>Senamás - Ejemplo PHP con POO/MVC/PDO - <?php echo date("Y"); ?></p>
   </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>     -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script src="js\tablas.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>
</html>