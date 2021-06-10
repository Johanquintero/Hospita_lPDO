<?php


class EspecialidadController extends BaseController
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

            $especialidad_obj = new Especialidad();

            $val[] =['admin'];

            if ($_SESSION['tipo_usuario'] == "paciente" || $_SESSION['tipo_usuario'] == "medico" ) {
                $especialidad_obj->permisos($val);
            }


               // echo "se muestra listado de especialidades";
               
               $allEspecialidad = $especialidad_obj->getAll();
               $current_view = 'views/especialidad/indexView.php';
               require_once 'views/layouts/'.$this->layout;

        }

        public function EditView(){
                $cod=isset($_GET['cod'])?$_GET['cod']:"";
                // echo "se muestra listado de especialidades";
                $especialidad_obj = new Especialidad();
                $allEspecialidad = $especialidad_obj->getEspecialidad($cod);
 
                $current_view = 'views/especialidad/EditView.php';
               require_once 'views/layouts/'.$this->layout;

        }

        public function ItemView(){
                $cod=isset($_GET['cod'])?$_GET['cod']:"";
                // echo "se muestra listado de especialidades";
                $especialidad_obj = new Especialidad();
                $allEspecialidad = $especialidad_obj->getEspecialidad($cod);
 
                $current_view = 'views/especialidad/ItemView.php';
               require_once 'views/layouts/'.$this->layout;

        }

        public function CreateView(){

                $current_view = 'views/especialidad/CreateView.php';
               require_once 'views/layouts/'.$this->layout;

                
        }


        public function Validacion()
        {
            $errores = array();
            $campos = [];
    
            $validacion = false;
            if(isset($_POST['txtCodEspecialidad'])){
                $view=isset($_POST['view']) ? $_POST['view'] : "";
                $cod_especialidad = isset($_POST['txtCodEspecialidad'])?$_POST['txtCodEspecialidad']:"";
                $cod_especialidad2 = isset($_POST['txtCodEspecialidad2'])?$_POST['txtCodEspecialidad2']:"";
                $nombre = isset($_POST['txtNombre'])?$_POST['txtNombre']:"";
                $descripcion = isset($_POST['txtDescripcion'])?$_POST['txtDescripcion']:"";
    
                if($view=="edit"){
                    $arrayvar[]=['n4'=>$cod_especialidad2,'s1'=>$nombre,'s2'=>$descripcion];
                }

                if ($view == "create") {
                    $arrayvar[]=['n3'=>$cod_especialidad,'s1'=>$nombre,'s2'=>$descripcion];
                }

                $especialidad_obj = new Especialidad();
                $errores=$especialidad_obj->valcampos($arrayvar);

                
    
    
                foreach ($errores as $key => $value)
                { 
                    switch ($value) {
                        case 'n3':
                            $campos['n4']='El campo Codigo especialidad no debe estar vacio o contener letras';
                            break;
                        case 's1':
                            $campos['s1']='El campo nombre no debe estar vacio o contener numeros';
                            break;
                        case 's2':
                            $campos['s2']='El campo descripcion no debe estar vacio o contener numeros';
                            break;
                        case 'n4':
                            $campos['n3']='El campo Codigo especialidad no debe estar vacio o contener letras';
                            break;
                        default:
                            # code...
                            break;
                    }

                    
    
               
                }
               
                
                if(isset($campos)){
                    if (count($campos)>0 && $view =="create"){
                        $current_view = 'views/especialidad/CreateView.php';
                        require_once 'views/layouts/'.$this->layout;
                        require_once 'views/validaciones.php';
                    }
                    if(!$campos && $view =="create")
                    {
                        $validacion= true;
                    
                         $this->create($cod_especialidad,$nombre,$descripcion);
                    }
                    
                    
                    if (count($campos)>0 && $view=="edit"){
                        // echo "se muestra listado de especialidades";
                        $especialidad_obj = new Especialidad();
                        $allEspecialidad = $especialidad_obj->getEspecialidad($cod_especialidad);
                        $current_view = 'views/especialidad/EditView.php';
                        require_once 'views/layouts/'.$this->layout;
                        require_once 'views/validaciones.php';

                        
                    }
    
                    if(!$campos && $view=="edit"){
                        $this->update($cod_especialidad,$nombre,$descripcion,$cod_especialidad2);
    
                    }            
                }
            }
        }

        public function create($cod_especialidad,$nombre,$descripcion){

            $especialidad_obj = new Especialidad($cod_especialidad,$nombre,$descripcion);
            $especialidad_obj->save();
               
        header("Location:index.php?controller=Especialidad&action=index");
        }


        public function update($cod_especialidad,$nombre,$descripcion,$cod_especialidad2)
        {
            $especialidad_obj = new Especialidad();
            $especialidad_obj->edit($cod_especialidad,$nombre,$descripcion,$cod_especialidad2);
    
            header("Location:index.php?controller=Especialidad&action=index");

        }

        public function delete(){
                //echo"se elimina dato";
                if(isset($_GET['cod'])){   

                        $cod=isset($_GET['cod'])?$_GET['cod']:"";
                        $especialidad_obj = new Especialidad();

                        $especialidad_obj->delete($cod);

                }  

                header("Location:index.php?controller=Especialidad&action=index");

        }



        public function createAjax()
        {
            //creamos un array con los datos de la respuesta
            $resp = array(
                "success" => false,
                "message" => "Error en la peticion AJAX",
            );

            if (isset($_POST["txtNombre"])) {
                $view=isset($_POST['view']) ? $_POST['view'] : "";
                $cod_especialidad = isset($_POST['txtCodEspecialidad'])?$_POST['txtCodEspecialidad']:"";
                $cod_especialidad2 = isset($_POST['txtCodEspecialidad2'])?$_POST['txtCodEspecialidad2']:"";
                $nombre = isset($_POST['txtNombre'])?$_POST['txtNombre']:"";
                $descripcion = isset($_POST['txtDescripcion'])?$_POST['txtDescripcion']:"";


                $especialidad_obj = new Especialidad($cod_especialidad,$nombre,$descripcion);
                $save = $especialidad_obj->save();
                if($save) {
                    $resp["success"] = true;
                    $resp["message"] = "la especialidad se ha registrado correctamente";
                } else {
                    $resp["success"] = true;
                    $resp["message"] = "Error al guardar en la base de datos";
                }
            }

            header('Content-type: application/json; charset=utf-8');

            echo json_encode($resp);

        }
}