<?php

class PacienteController extends BaseController
{
    public function __construct()
    {
        $this->layout = "admin_layout.php";
        $this->login = "login_layout.php";

        parent::__construct();
    }

    public function index()
    {
        if(!isset($_SESSION['nombre'])){
            header("Location:index.php?controller=Login&action=initLogin");
        }
        
        $val[] =['paciente','admin'];
    
        //Creamos el objeto usuario
        $paciente_obj = new Paciente();
        //Conseguimos todos los usuarios
        if ($_SESSION['tipo_usuario'] == "medico") {
            $paciente_obj->permisos($val);
        }


        $allPacientes = $paciente_obj->getAll();
        $current_view = 'views/paciente/indexView.php';

        if(isset($_SESSION['id_usuario'])){
            $cod=$_SESSION['id_usuario'];
            header("Location:index.php?controller=Paciente&action=ItemView&id=$cod");
        }

        require_once 'views/layouts/'.$this->layout;

    }

    public function ViewCreate()
    {
        $val[] =['paciente','admin'];

        //Creamos el objeto usuario
        $paciente_obj = new Paciente();
        //Conseguimos todos los usuarios
        if ($_SESSION['tipo_usuario'] == "medico") {
            $paciente_obj->permisos($val);
        }
        $allPacientes = $paciente_obj->getAll();
        $current_view = 'views/paciente/CreateView.php';
        require_once 'views/layouts/'.$this->layout;

    }


    public function ViewEdit()
    {
        $doc = isset($_GET['id'])?$_GET['id']:"";

       
        $val[] =['paciente','admin'];

        //Creamos el objeto usuario
        $paciente_obj = new Paciente();
        //Conseguimos todos los usuarios
        if ($_SESSION['tipo_usuario'] == "medico") {
            $paciente_obj->permisos($val);
        }
        $allPacientes = $paciente_obj->getONE($doc);

        $current_view = 'views/paciente/EditView.php';
        require_once 'views/layouts/'.$this->layout;

    }

    public function ItemView()
    {
        $documento = isset($_GET['id'])?$_GET['id']:"";
        
        $val[] =['paciente','admin'];

        //Creamos el objeto usuario
        $paciente_obj = new Paciente();
        //Conseguimos todos los usuarios
        if ($_SESSION['tipo_usuario'] == "medico") {
            $paciente_obj->permisos($val);
        }
        $allPacientes = $paciente_obj->getONE($documento);


        $current_view = 'views/paciente/ItemView.php';
        require_once 'views/layouts/'.$this->layout;

    }

    public function Validacion()
    {
        $errores = array();
        $campos = [];

        $validacion = false;
        if(isset($_POST['txtDocumento'])){
            $view=isset($_POST['view']) ? $_POST['view'] : "";
            $nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : "";
            $documento = isset($_POST['txtDocumento']) ? $_POST['txtDocumento'] : "";
            $documento2 = isset($_POST['txtDocumento2']) ? $_POST['txtDocumento2'] : "";
            $fecha_nac = isset($_POST['txtFechaNacimiento']) ? $_POST['txtFechaNacimiento'] : "";
            $direccion = isset($_POST['txtDireccion']) ? $_POST['txtDireccion'] : "";
            $telefono = isset($_POST['txtTelefono']) ? $_POST['txtTelefono'] : "";
            $estado = isset($_POST['txtEstado']) ? $_POST['txtEstado'] : "";
            $genero = isset($_POST['txtGenero']) ? $_POST['txtGenero'] : "";
            $eps = isset($_POST['txtEps']) ? $_POST['txtEps'] : "";
            $email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : "";

            if(isset($_POST['txtPassword']) && $_POST['txtPassword'] == "" &&  $view == "edit"){
                $password ="undefined";
            }else{
                $password = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : "";
            }
            

            
            
            if($view == "edit"){
                $arrayvar[]=['s1'=>$nombre,'f'=>$fecha_nac,'d'=>$direccion,
                'n3'=>$telefono,'s2'=>$estado,'s3'=>$genero,'s4'=>$eps,'e'=>$email,'p'=>$password,'n4'=>$documento2];
            }
            if($view == "create"){
                $arrayvar[]=['s1'=>$nombre,'n1'=>$documento,'f'=>$fecha_nac,'d'=>$direccion,
            'n3'=>$telefono,'s2'=>$estado,'s3'=>$genero,'s4'=>$eps,'e'=>$email,'p'=>$password];
            }

            $paciente_obj = new Paciente();
            $errores=$paciente_obj->valcampos($arrayvar);


            foreach ($errores as $key => $value)
            { 
                switch ($value) {
                    case 's1':
                        $campos['s1'] = 'El campo nombre no debe estar vacio o contener numeros';
                        break;
                    case 'n1':
                        $campos['n1'] = 'El campo documento no debe estar vacio o contener letras';
                        break;
                    case 'n4':
                        $campos['n4'] = 'El campo documento no debe estar vacio o contener letras';
                        break;
                    case 'f':
                        $campos['f'] = 'El campo Fecha de nacimiento no debe estar vacio o contener la fecha actual';
                        break;
                    case 'd':
                        $campos['d'] = 'El campo direccion no debe estar vacio o contener caracteres no validos';
                        break;
                    case 'n3':
                        $campos['n3'] = 'El campo telefono no debe estar vacio o contener letras';
                        break;
                    case 's2':
                        $campos['s2'] = 'El campo estado no debe estar vacio';
                        break;
                    case 's3':
                        $campos['s3'] = 'El campo genero no debe estar vacio';
                        break;
                    case 's4':
                        $campos['s4'] = 'El campo eps no debe estar vacio o contener numeros';
                        break;
                    case 'e':
                        $campos['e'] = 'El campo email debe ser valido';
                        break;
                    case 'p':
                        $campos['p'] = 'El campo password no debe estar vacio o tener longitud menor a 5 ';
                        break;
                    default:
                        # code...
                        break;
                }

           
            }


            
            if(isset($campos)){
                if (count($campos)>0 && $view =="create"){
                    
                    $action = isset($_GET["action"]) ? $_GET["action"] : "";                          
                    if(!isset($_SESSION['tipo_usuario'])){
                        $register = true;
                        $current_view = "views/login/LoginView.php";
                        require_once 'views/layouts/'.$this->login;
                        require_once 'views/validaciones.php';
                    }else{
                        $current_view = 'views/paciente/CreateView.php';
                        require_once 'views/layouts/'.$this->layout;
                        require_once 'views/validaciones.php';
                    }               


                }

                if(!$campos && $view =="create")
                {
                    $validacion= true;
                
                     $this->create($documento, $nombre, $direccion, $telefono, $fecha_nac, $estado, $genero, $eps, $email, $password);
                }
                
                
                if (count($campos)>0 && $view=="edit"){
       
                    //Creamos el objeto usuario
                    $paciente_obj = new Paciente();
                    //Conseguimos todos los usuarios
                    $allPacientes = $paciente_obj->getONE($documento);

                    $current_view = 'views/paciente/EditView.php';
                    require_once 'views/layouts/'.$this->layout;
                    require_once 'views/validaciones.php';
                }

                if(!$campos && $view=="edit"){
                    $this->editar($documento, $nombre, $direccion, $telefono, $fecha_nac, $estado, $genero, $eps, $email, $password,$documento2);

                }              
            }
        }
    }



    public function create($documento, $nombre, $direccion, $telefono, $fecha_nac, $estado, $genero, $eps, $email, $password)
    {
        // Crear Objeto Paciente con los datos del formulario
        $paciente_obj = new Paciente($documento, $nombre, $direccion, $telefono, $fecha_nac, $estado, $genero, $eps, $email, $password);
        // Se llama al metodo que inserta en la base de datos.
        $paciente_obj->save();

        if($paciente_obj) {
            $resp["success"] = true;
            $resp["message"] = "el paciente se ha registrado correctamente";
        } else {
            $resp["success"] = true;
            $resp["message"] = "Error al guardar en la base de datos";
        }

        $validateRegister = true;
        $message["CreateUser"] = "Usuario registrado correctamente";

        $current_view = "views/login/LoginView.php";
        require_once 'views/layouts/'.$this->login;
    
    }

  

    public function borrar()
    {
           $documento = isset($_GET['id'])?$_GET['id']:"";
           $paciente_obj = new Paciente();
           $paciente_obj->delete($documento);
         header("Location:index.php?controller=Paciente&action=index");
    }

    public function editar($documento,$nombre,$direccion,$telefono,$fecha_nac,$estado,$genero,$eps,$email,$password,$documento2)
    {       
        $paciente_obj = new Paciente();
        $paciente_obj->edit($documento,$nombre,$direccion,$telefono,$fecha_nac,$estado,$genero,$eps,$email,$password,$documento2);
       
        header("Location:index.php?controller=Paciente&action=index");

    }


    public function createAjax()
    {
        //creamos un array con los datos de la respuesta
        $resp = array(
            "success" => false,
            "message" => "Error en la peticion AJAX",
        );

        if (isset($_POST["txtNombre"])) {
            $nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : "";
            $documento = isset($_POST['txtDocumento']) ? $_POST['txtDocumento'] : "";
            $documento2 = isset($_POST['txtDocumento2']) ? $_POST['txtDocumento2'] : "";
            $fecha_nac = isset($_POST['txtFechaNacimiento']) ? $_POST['txtFechaNacimiento'] : "";
            $direccion = isset($_POST['txtDireccion']) ? $_POST['txtDireccion'] : "";
            $telefono = isset($_POST['txtTelefono']) ? $_POST['txtTelefono'] : "";
            $estado = isset($_POST['txtEstado']) ? $_POST['txtEstado'] : "";
            $genero = isset($_POST['txtGenero']) ? $_POST['txtGenero'] : "";
            $eps = isset($_POST['txtEps']) ? $_POST['txtEps'] : "";
            $email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : "";
            $password = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : "";


            $paciente_obj =  new Paciente($documento, $nombre, $direccion, $telefono, $fecha_nac, $estado, $genero, $eps, $email, $password);
            $save = $paciente_obj->save();
            if($save) {
                $resp["success"] = true;
                $resp["message"] = "el paciente se ha registrado correctamente";
            } else {
                $resp["success"] = true;
                $resp["message"] = "Error al guardar en la base de datos";
            }
        }

        header('Content-type: application/json; charset=utf-8');

        echo json_encode($resp);

    }
}

?>