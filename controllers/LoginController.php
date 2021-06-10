<?php

class LoginController extends  BaseController
{

        public function __construct()
        {
                $this->layout = "login_layout.php";
                $this->admin = "admin_layout.php";
                parent::__construct();
                
        }

        public function home()
        {
                $current_view = 'views/home/home.php';
                require_once 'views/layouts/'.$this->admin;
        }

        public function initLogin()
        {
               
                $current_view = "views/login/LoginView.php";

                $verifyemail=false;
                $verifypass=false;

                $resp = array(
                        "success" => false,
                        "message" => "Error en la peticion AJAX",
                );

                if(isset($_POST['txtEmail'])&& isset($_POST['txtPassword'])){
                        $email =isset($_POST['txtEmail']) ? $_POST['txtEmail'] : ""; 
                        $password =isset($_POST['txtPassword']) ? $_POST['txtPassword'] : ""; 

                        $errors = "";               
                        if($email == "" || $password == ""){
                                $errors = "El usuario y contrase;a no pueden estar vacios";
                        }else
                        {

                                if ($email === "admin@" && $password === "admin"){
                                 $_SESSION['tipo_usuario'] = "Admin";
                                 $_SESSION['nombre'] = "Administrador";
                                 $_SESSION['timeout'] = time();
                                 session_regenerate_id();
                                 $resp["success"] = true;
                                 $resp["message"] = "Login realizado correctamente";
                                 $_SESSION["message"] = "Login realizado correctamente";
                                 header("Location:index.php?controller=Login&action=home");
                                }else{
                               
                                $pacient = new Paciente();
                                $pacient->setEmail($email);
                                $pacient->setPassword($password);
                                if($pacient->validarLogin() == True){

                                        $resp["success"] = true;
                                        $resp["message"] = "Login realizado correctamente";

                                  header("Location:index.php?controller=Login&action=home");
                                 
                                       
                        

                                }else{
                                        $resp["success"] = true;
                                        $resp["message"] = "Error en el login";

                                        $valores = $pacient->getValor();
                                        if($pacient->validarLogin() == False){
                                                $errors="email";  
                                                $verifyemail=true; 
                                        }

                                        if($valores == "pass"){
                                                $errors="pass";   
                                                $verifypass=true;
                                        }
                                }

                                $medic = new Medico();
                                $medic->setEmail($email);
                                $medic->setPassword($password);
                                if($medic->validarLogin() == True){

                                        $resp["success"] = true;
                                        $resp["message"] = "Login realizado correctamente";
                                        header("Location:index.php?controller=Login&action=home");

                                }else{

                                        $resp["success"] = true;
                                        $resp["message"] = "Erro en el login";

                                        $valores = $medic->getValor();
                                        if($medic->validarLogin() == False && $verifyemail == False){
                                                $errors="email";  
                                                $verifyemail=true; 
                                        }

                                        if($valores == "pass" && $verifypass == false){
                                                $errors="pass";   
                                                $verifypass=true;
                                        }
                                        require_once 'views/validaciones.php';
                                        require_once "views/layouts/".$this->layout;
                                }
                      

                                }

                        }


                }else{
                        require_once 'views/validaciones.php';
                        require_once 'views/layouts/'.$this->layout;
                }

                // header('Content-type: application/json; charset=utf-8');

                // echo json_encode($resp);

        }



        public function logout(){
                session_destroy();
                header("Location:index.php?controller=Login&action=initLogin");

        }

        public function error(){
                $codMessage = isset($_GET['msg'])? $_GET['msg']: 0;
                $message ="";

                switch($codMessage)
                {
                 case 1 :
                        $message ="No esta autorizado para realizar esta acción";
                 break;
                 case 2 :
                        $message ="la accion que intenta cargar no existe";
                 break;

                 default:
                        $message="Error desconocido";
                break;
                }
        }



       
}

?>