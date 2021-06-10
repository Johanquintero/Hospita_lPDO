<?php

# Configuración global
require_once 'config/Global.php';

# Base para los controladores
require_once 'core/BaseController.php';

# Se capturan el controlador y la acción que vienen por método GET
$controller = isset($_GET["controller"]) ? $_GET["controller"] : "";
$action = isset($_GET["action"]) ? $_GET["action"] : "";

# Se evalua el controlador que llega por URL, en caso que no llegue nada, se toma el Controlador por defecto
switch (ucwords($controller)) {
    # EN la medidad que se incluyan más controladores, se deben referenciar en un case
    case 'Paciente':
        $controlador = 'PacienteController';
        break;
    case 'Especialidad':
         $controlador = 'EspecialidadController';
         break;
         
    case 'Medico':
            $controlador = 'MedicoController';
            break;
    case 'Citas':
            $controlador = 'CitasController';
             break;
    case 'Login':
        $controlador = 'LoginController';
            break;
            
    default:
        $controlador = CONTROLADOR_DEFECTO;
        break;
}
$strFileController = 'controllers/' . $controlador . '.php';

# Si el archivo existe se procede a crear un objeto de dicha clase controlador
if (is_file($strFileController)) {
    # Se incluye el archivo del controlador para poder ser instanciado
    require_once $strFileController;
    # Se crea un objeto de la clase del controlador segun la peticion del usuario
    $controllerObj = new $controlador();

    # Si no llega ninguna accion por GET se toma la acción por defecto
    if ($action == "") {
        $action = ACCION_DEFECTO;
    }

    // Se comprueba que la acción o método que solicita el usuario existe en ese controlador
    if (method_exists($controllerObj, $action)) {
        // Se carga la accion requerida, es decir, se llama al metodo del controlador
        $controllerObj->$action();
    } else {
        echo "No existe el método en el controlador";
    }
}

if(!isset($_SESSION['tipo_usuario'])){
    if($action == "initLogin" || $action == "Validacion"){

    }else{
        header("Location:index.php?controller=Login&action=initLogin");
    }
}

?>

