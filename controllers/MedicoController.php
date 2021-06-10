<?php

class MedicoController extends BaseController
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

            $val[] =['medico','admin'];

            $medico_obj = new Medico();
           

            if ($_SESSION['tipo_usuario'] == "paciente") {
                $medico_obj->permisos($val);
            }

            $allMedicos = $medico_obj->getAll();
            $current_view = 'views/medico/indexView.php';

           
            if(isset($_SESSION['id_usuario'])){
                $cod=$_SESSION['id_usuario'];
                    header("Location:index.php?controller=Medico&action=ItemView&cod=$cod");
            }

            require_once 'views/layouts/'.$this->layout;


        }

        public function EditView(){
                $cod=isset($_GET['cod'])?$_GET['cod']:"";
                $especialidad = new Especialidad();
                $espMedic = new EspecialidadMedico();

                $val[] =['admin'];

                $medico_obj = new Medico();
               if ($_SESSION['tipo_usuario'] == "paciente") {
                    $medico_obj->permisos($val);
                }

                $allMedicos = $medico_obj->getMedic($cod);
                $allEspMedic = $espMedic->getAll();
                $allEspecialidad = $especialidad->getAll();
                $current_view = 'views/medico/EditView.php';
               require_once 'views/layouts/'.$this->layout;

        }

        public function ItemView(){
                $cod=isset($_GET['cod'])?$_GET['cod']:"";

                $val[] =['medico','admin'];

                $medico_obj = new Medico();
                if ($_SESSION['tipo_usuario'] == "paciente") {
                    $medico_obj->permisos($val);
                   }
                $allMedicos = $medico_obj->getMedic($cod);
                $current_view = 'views/medico/ItemView.php';
               require_once 'views/layouts/'.$this->layout;

        }

        public function CreateView(){

            $val[] =['admin'];

                $medico_obj = new Medico();
                $especialidad = new Especialidad();
                if ($_SESSION['tipo_usuario'] == "paciente") {
                    $medico_obj->permisos($val);
                }

                $allEspecialidad = $especialidad->getAll();
                $current_view = 'views/medico/CreateView.php';
               require_once 'views/layouts/'.$this->layout;
                
        }

        public function Validacion()
    {
        $errores = array();
        $campos = array();

        $validacion = false;
                if(isset($_POST['txtCodMedico']))
               {
                $view=isset($_POST['view']) ? $_POST['view'] : "";
                $cod_medico = isset($_POST['txtCodMedico'])?$_POST['txtCodMedico']:"";
                $cod_medico2 = isset($_POST['txtCodMedico2'])?$_POST['txtCodMedico2']:"";
                $nombre = isset($_POST['txtNombre'])?$_POST['txtNombre']:"";
                $apellido = isset($_POST['txtApellido'])?$_POST['txtApellido']:"";
                $documento = isset($_POST['txtDocumento'])?$_POST['txtDocumento']:"";
                $fecha_nacimiento = isset($_POST['txtFechaNacimiento'])?$_POST['txtFechaNacimiento']:"";
                $genero = isset($_POST['txtGenero'])? $_POST['txtGenero'] : "";
                $email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : "";
                $telefono = isset($_POST['txtTelefono'])?$_POST['txtTelefono']:"";
                $perfil_profesional = isset($_POST['txtPerfilProfesional'])?$_POST['txtPerfilProfesional']:"";
                $fecha_ingreso = isset($_POST['txtFechaIngreso'])?$_POST['txtFechaIngreso']:"";
                $anios_experiencia = isset($_POST['txtAniosExperiencia'])?$_POST['txtAniosExperiencia']:"";

                if(isset($_POST['txtPassword']) && $_POST['txtPassword'] == "" && $view == "edit"){
                    $password = "undefined";
                }else{
                    $password = isset($_POST['txtPassword'])? $_POST['txtPassword']  :"";
                }
           
                $cod_postal = isset($_POST['txtCodPostal'])?$_POST['txtCodPostal']:"";
                $municipio = isset($_POST['txtMunicipio'])?$_POST['txtMunicipio']:"";
                $departamento = isset($_POST['txtDepartamento'])?$_POST['txtDepartamento']:"";
                $especialidadOld= isset($_POST['especialidad'])?$_POST['especialidad']:"";
                $idEspecialidad = isset($_POST['id'])?$_POST['id']:"";


            
                if($view == "edit"){
                    $arrayvar[]=['s'=>$nombre,'s1'=>$apellido,'n1'=>$documento,'f'=>$fecha_nacimiento,
                    's2'=>$genero,'e'=>$email,'n2'=>$telefono,'s3'=>$perfil_profesional,'f1'=>$fecha_ingreso,'n3'=>$anios_experiencia,
                    'p'=>$password,'n5'=>$cod_postal,'s4'=>$municipio,'s6'=>$departamento,'n6'=>$cod_medico2];
                }
                if($view == "create")
                {
                    $arrayvar[]=['n'=>$cod_medico,'s'=>$nombre,'s1'=>$apellido,'n1'=>$documento,'f'=>$fecha_nacimiento,
                    's2'=>$genero,'e'=>$email,'n2'=>$telefono,'s3'=>$perfil_profesional,'f1'=>$fecha_ingreso,'n3'=>$anios_experiencia,
                    'p'=>$password,'n5'=>$cod_postal,'s4'=>$municipio,'s6'=>$departamento];
    
                }

          
                    
            
            

            $medico_obj = new Medico();
            $errores=$medico_obj->valcampos($arrayvar);


            foreach ($errores as $key => $value)
            { 
                switch ($value) {
                    case 'n':
                        $campos['n'] = 'El campo Codigo medico no debe estar vacio o contener letras';
                        break;
                    case 's':
                        $campos['s1'] = 'El campo nombre no debe estar vacio o contener numeros';
                            break;
                    case 's1':
                        $campos['s5'] = 'El campo apellido no debe estar vacio o contener numeros';
                        break;
                    case 'n1':
                        $campos['n1'] = 'El campo documento  no debe estar vacio o contener letras';
                        break;
                    case 'f':
                        $campos['f'] = 'El campo fecha de nacimiento no debe estar vacio o contener la fecha actual';
                        break;
                    case 's2':
                        $campos['s3'] = 'El campo genero no debe estar vacio';
                        break;
                    case 'e':
                        $campos['e'] = 'El campo email debe ser valido';
                        break;
                    case 'n2':
                        $campos['n3'] = 'El campo telefono no debe estar vacio o contener letras';
                        break;
                    case 's3':
                        $campos['s'] = 'El campo perfil profesional no debe estar vacio o contener numeros';
                        break;
                    case 'f1':
                        $campos['f1'] = 'El campo fecha de ingreso no debe estar vacio ni contener la fecha actual';
                        break;
                    case 'n3':
                        $campos['n2'] = 'El campo experiencia no debe estar vacio o conteneer letras ';
                        break;
                    case 'p':               
                        $campos['p'] = 'El campo password no debe estar vacio o tener longitud menor a 5 ';
                        break;

                    case 'n5':
                        $campos['n5'] = 'El campo codigo postal no debe estar vacio o contener letras ';
                        break;
                    case 's4':
                        $campos['s4'] = 'El campo municipio no debe estar vacio o contener numeros';
                        break;
                    case 's6':
                        $campos['s6'] = 'El campo departamento no debe estar vacio o contener numeros';
                        break; 
                    case 'n6':
                        $campos['n6'] = 'El campo Codigo medico no debe estar vacio o contener letras';
                        break;                  
                    default:
                        # code...
                        break;
                }

            }


            
            if(isset($campos)){

                if (count($campos)>0 && $view =="create"){
                    
                    $medico_obj = new Medico();
                    $medEspecialidad = new Especialidad();

                    $allEspecialidad = $medEspecialidad->getAll();
                    $current_view = 'views/medico/CreateView.php';
                    require_once 'views/layouts/'.$this->layout;
                    require_once 'views/validaciones.php';
                }

                if(!$campos && $view =="create")
                {
                    $validacion= true;

                    $this->create($cod_medico,$nombre,$apellido,$documento,$fecha_nacimiento,$genero,$email,$telefono,
                    $perfil_profesional,$fecha_ingreso,$anios_experiencia,$password,$cod_postal,$municipio,$departamento,$cod_medico2);

                    $objEspMed= new EspecialidadMedico();
                    $count= count($especialidadOld);
                    $valor="";
                    //se recorre el arreglo especialidad  para crear la especialidadMedico //
                    $objEspMed->delete($cod_medico);
                    for ($i=0; $i < $count ; $i++) { 
                        $valor=$especialidadOld[$i];
                        
                        $objEspMed->save($valor,$cod_medico);
                    }
                                   
                }
                
                
                if (count($campos)>0 && $view=="edit"){
                    //Creamos el objeto usuario
                    $medico_obj = new Medico();
                    $especialidad = new Especialidad();
                    $espMedic= new EspecialidadMedico();

                    //Conseguimos todos los usuarios
                    $allMedicos = $medico_obj->getMedic($cod_medico);
                    $allEspecialidad = $especialidad->getAll();
                    $allEspMedic = $espMedic->getAll();


                    $current_view = 'views/medico/EditView.php';
                    require_once 'views/layouts/'.$this->layout;
                    require_once 'views/validaciones.php';
                    
                }

                if(!$campos && $view=="edit"){
                    $this->update($cod_medico,$nombre,$apellido,$documento,$fecha_nacimiento,$genero,$email,$telefono,
                    $perfil_profesional,$fecha_ingreso,$anios_experiencia,$password,$cod_postal,$municipio,$departamento,$cod_medico2);
               
                    $objEspMed= new EspecialidadMedico();
                    $count= count($especialidadOld);
                    $valor="";
                    //se recorre el arreglo especialidad  para crear la especialidadMedico //
                    $objEspMed->delete($cod_medico);
                    for ($i=0; $i < $count ; $i++) { 
                        $valor=$especialidadOld[$i];
                        
                        $objEspMed->save($valor,$cod_medico);
                    }

                }              
            }
        }
    }

        public function create($cod_medico,$nombre,$apellido,$documento,$fecha_nacimiento,$genero,$email,$telefono,
        $perfil_profesional,$fecha_ingreso,$anios_experiencia,$password,$cod_postal,$municipio,$departamento,$cod_medico2){
              
                $medico_obj = new Medico($cod_medico,$nombre,$apellido,$documento,$fecha_nacimiento,$genero,$email,$telefono,
                $perfil_profesional,$fecha_ingreso,$anios_experiencia,$password,$cod_postal,$municipio,$departamento);
                $medico_obj->save();
               
        header("Location:index.php?controller=Medico&action=index");
        }


        public function update($cod_medico,$nombre,$apellido,$documento,$fecha_nacimiento,$genero,$email,$telefono,
        $perfil_profesional,$fecha_ingreso,$anios_experiencia,$password,$cod_postal,$municipio,$departamento,$cod_medico2){
                //echo "se muestra formulario con los datos precargados de la especial;idad";
               
                $medico_obj = new Medico();
                $medico_obj->edit($cod_medico,$nombre,$apellido,$documento,$fecha_nacimiento,$genero,$email,$telefono,
                $perfil_profesional,$fecha_ingreso,$anios_experiencia,$password,$cod_postal,$municipio,$departamento,$cod_medico2);

                header("Location:index.php?controller=Medico&action=index");

        }

        public function delete(){
                //echo"se elimina dato";
                if(isset($_GET['cod'])){   

                        $cod=isset($_GET['cod'])?$_GET['cod']:"";
                        $medico_obj = new Medico();

                        $medico_obj->delete($cod);

                }  

                header("Location:index.php?controller=Medico&action=index");

        }
}



?>