<?php


class CitasController extends BaseController
{
        public function __construct()
        {
                $this->layout = "admin_layout.php";

                parent::__construct();
                
        }
        public function index(){
            
            if(!isset($_SESSION['nombre'])){
                header("Location:index.php?controller=Login&action=initLogin");
            }

            $cita_obj = new Cita();

            $val[] =['paciente','medico','admin'];

            if ($_SESSION['tipo_usuario'] == "paciente" || $_SESSION['tipo_usuario'] == "medico" ) {
                $cita_obj->permisos($val);
            }

                if(isset($_SESSION['id_usuario'])){                 
                    $cod = $_SESSION['id_usuario'];
                    header("Location:index.php?controller=Citas&action=ItemView");
                    $current_view = 'views/cita/ItemView.php';
                    require_once 'views/layouts/'.$this->layout;
                }

               // echo "se muestra listado de citas";
               
               $allCitas = $cita_obj->getAll();
               $current_view = 'views/cita/indexView.php';
               require_once 'views/layouts/'.$this->layout;

        }

        public function EditView(){
                $id=isset($_GET['id'])?$_GET['id']:"";
                // echo "se muestra listado de citas";

                $medico_obj = new Medico();
                $allMedicos = $medico_obj->getAll();

                $paciente_obj = new Paciente();
                $allPacientes = $paciente_obj->getAll();
                
                $cita_obj = new Cita();
                $allCita = $cita_obj->getCita($id);
 
                $current_view = 'views/cita/EditView.php';
               require_once 'views/layouts/'.$this->layout;

        }

        public function ItemView(){
                $id=isset($_GET['id'])?$_GET['id']:"";

                if(isset($_SESSION['id_usuario'])){                 
                    $cod = $_SESSION['id_usuario'];
                    $fecha="";
                }else{
                    $cod=isset($_POST['cod'])?$_POST['cod']:"";
                    $fecha=isset($_POST['fecha'])?$_POST['fecha']:"";
                }
                
                // echo "se muestra listado de citas";
                $_SESSION['search_post'] = $_POST;

                $cita_obj = new Cita();
                $allCitas = $cita_obj->getAll();
 
                $current_view = 'views/cita/ItemView.php';
               require_once 'views/layouts/'.$this->layout;

        }

        public function CreateView(){

            $medico_obj = new Medico();
            $allMedicos = $medico_obj->getAll();

            $paciente_obj = new Paciente();
            $allPacientes = $paciente_obj->getAll();

            $current_view = 'views/cita/CreateView.php';
            require_once 'views/layouts/'.$this->layout;

                
        }


        public function create(){         
            
            $cita_obj = new Cita();
            $cita_obj->save();
               
           header("Location:index.php?controller=Citas&action=index");
        }


        public function update()
        {          

            if(isset($_POST['paciente_documento'])){
                $id=isset($_POST['id']) ? $_POST['id'] : "";
                $paciente_documento = isset($_POST['paciente_documento']) ? $_POST['paciente_documento'] : "";
                $medico_cod = isset($_POST['medico_cod']) ? $_POST['medico_cod'] : "";
                $sede = isset($_POST['sede']) ? $_POST['sede'] : "";
                $consultorio = isset($_POST['consultorio']) ? $_POST['consultorio'] : "";
                $fecha_cita = isset($_POST['fecha_cita']) ? $_POST['fecha_cita'] : "";
                $hora_cita = isset($_POST['hora_cita']) ? $_POST['hora_cita'] : "";
                $fecha_registro = isset($_POST['fecha_registro']) ? $_POST['fecha_registro'] : "";              

                $cita_obj = new Cita();
                $cita_obj->edit($id,$paciente_documento, $medico_cod,$sede, $consultorio, $fecha_cita,$hora_cita, $fecha_registro);
        
                header("Location:index.php?controller=Citas&action=index");

            }

        }

        public function delete(){
                //echo"se elimina dato";
                if(isset($_GET['id'])){   

                        $id=isset($_GET['id'])?$_GET['id']:"";
                        $cita_obj = new Cita();

                        $cita_obj->delete($id);

                }  

                header("Location:index.php?controller=Citas&action=index");

        }



        public function createAjax()
        {
            //creamos un array con los datos de la respuesta
            $resp = array(
                "success" => false,
                "message" => "Error en la peticion AJAX",
            );

            if (isset($_POST["sede"])) {  
                date_default_timezone_set("America/Bogota");             
                $paciente_documento = isset($_POST['paciente_documento'])?$_POST['paciente_documento']:"";
                $medico_cod = isset($_POST['medico_cod'])?$_POST['medico_cod']:"";
                $sede = isset($_POST['sede'])?$_POST['sede']:"";
                $consultorio = isset($_POST['consultorio'])?$_POST['consultorio']:"";
                $fecha_cita = isset($_POST['fecha_cita'])?$_POST['fecha_cita']:"";
                $hora_cita = isset($_POST['hora_cita'])?$_POST['hora_cita']:"";
                // $fecha_registro = isset($_POST['fecha_cita'])?$_POST['fecha_cita']:"";
                $fecha_registro = date("o-m-d");

                $cita_obj = new Cita($paciente_documento, $medico_cod, $sede, $consultorio, $fecha_cita,$hora_cita, $fecha_registro);
                $save = $cita_obj->save();
                if($save) {
                    $resp["success"] = true;
                    $resp["message"] = "la cita se ha registrado correctamente";
                } else {
                    $resp["success"] = true;
                    $resp["message"] = "Error al guardar en la base de datos";
                }
            }

            header('Content-type: application/json; charset=utf-8');

            echo json_encode($resp);

        }
}