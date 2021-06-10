<?php
//se inicia la sesión
session_start();

class BaseController
{
    protected $layout;

    public function __construct()
    {
        date_default_timezone_set("America/Bogota");
        require_once 'Connection.php';
        require_once 'BaseModel.php';

        //Incluir todos los modelos
        /*foreach (glob("models/*.php") as $file) {
            require_once $file;
        }*/
        require_once 'models/Paciente.class.php';
        require_once 'models/Especialidad.class.php';
        require_once 'models/Medico.class.php';
        require_once 'models/EspecialidadMedico.class.php';
        require_once 'models/Cita.class.php';



        if(isset($_SESSION['timeout'])) {

            $tiempoSesion = time() -$_SESSION['timeout'];
            if($tiempoSesion > (TIEMPO_INACTIVIDAD * 60)) {
                session_destroy();
                header("Location::index.php?controller=Login&action=initLogin");
            }else {
                $_SESSION['timeout']= time();
            }
        }

    }

    // Crear los Métodos que sean comunes para todos los controladores


    public function readonly(){
        if($_SESSION['tipo_usuario'] == "medico" || $_SESSION['tipo_usuario'] == "paciente" ){
            echo "readonly";
        }
        
    }

}
?>