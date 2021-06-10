<?php

class BaseModel extends Connection
{

    protected $table;

    public function __construct()
    {
        // Se llama al constructor de la clase Padre
        parent::__construct();
    }

    public function getAll()
    {
        try {
            // FETCH_OBJ
            $sql = $this->dbConnection->prepare("SELECT * FROM ".$this->table);
            
            // Ejecutamos
            $sql->execute();
            $resultSet = null;
            // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $resultSet[] = $row;
            }
            return $resultSet;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    //Paciente
    public function getONE($documento)
    {
        try {
            // FETCH_OBJ
    
            $sql = $this->dbConnection->prepare("SELECT * FROM $this->table WHERE documento=:documento");

            $sql->bindParam('documento',$documento);
            // Ejecutamos
            $sql->execute();
            $resultSet = null;
            // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
            if($row = $sql->fetch(PDO::FETCH_OBJ)){
                $obj = new Paciente($row->documento,$row->nombre,$row->direccion,$row->telefono,$row->fecha_nacimiento,$row->estado,$row->genero,$row->eps,$row->email);
            }else{
                $obj=null;
            }
            return $obj; 
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    //ESpecialidad

    public function getEspecialidad($cod)
    {
        try {
            // FETCH_OBJ
    
            $sql = $this->dbConnection->prepare("SELECT * FROM $this->table WHERE cod_especialidad=:cod_especialidad");

            $sql->bindParam('cod_especialidad',$cod);
            // Ejecutamos
            $sql->execute();
            $resultSet = null;
            // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
            if($row = $sql->fetch(PDO::FETCH_OBJ)){
                $obj = new Especialidad($row->cod_especialidad,$row->nombre,$row->descripcion);
            }else{
                $obj=null;
            }
            return $obj; 
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function getCita($id)
    {
        try {
            // FETCH_OBJ
    
            $sql = $this->dbConnection->prepare("SELECT * FROM $this->table WHERE id=:id");

            $sql->bindParam('id',$id);
            // Ejecutamos
            $sql->execute();
            $resultSet = null;
            // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
            if($row = $sql->fetch(PDO::FETCH_OBJ)){
                $obj = new Cita($row->paciente_documento,$row->medico_cod,$row->sede,$row->consultorio,$row->fecha_cita,$row->hora_cita,$row->fecha_registro);
            }else{
                $obj=null;
            }
            return $obj; 
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }


    //ESpecialidad

    public function getMedic($cod)
    {
        try {
            // FETCH_OBJ
    
            $sql = $this->dbConnection->prepare("SELECT * FROM $this->table WHERE cod_medico=:cod_medico");

            $sql->bindParam('cod_medico',$cod);
            // Ejecutamos
            $sql->execute();
            $resultSet = null;
            // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
            if($row = $sql->fetch(PDO::FETCH_OBJ)){
                $obj = new Medico($row->cod_medico,$row->nombre,$row->apellido,$row->documento,$row->fecha_nacimiento,$row->genero,$row->email,$row->telefono,$row->perfil_profesional,$row->fecha_ingreso,$row->anios_experiencia,
            $row->password,$row->cod_postal,$row->municipio,$row->departamento);
            }else{
                $obj=null;
            }
            return $obj; 
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    //EspecialidadMedico
    public function getEspMedic($cod)
    {
        try {
            // FETCH_OBJ
    
            $sql = $this->dbConnection->prepare("SELECT * FROM $this->table WHERE cod_especialidad=:cod_especialidad");

            $sql->bindParam('cod_especialidad',$cod);
            // Ejecutamos
            $sql->execute();
            $resultSet = null;
            // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
            if($row = $sql->fetch(PDO::FETCH_OBJ)){
                $obj = new EspecialidadMedico($row->id,$row->especialidad,$row->medico);
            }else{
                $obj=null;
            }
            return $obj; 
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function valcampos($val)
    {
        try {

           // print_r($val);
            $array=$val[0];

           $campos =array();
           $numeros ="/[0-9]/";
           $string ="/[a-zA-Z]/";
           $fecha= "/^\d{4}([\-/.])(0?[1-9]|1[1-2])\1(3[01]|[12][0-9]|0?[1-9])$/";
           $fechaActual= date('Y-m-d');
           $email="/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/";





            foreach ($array as $key => $value) {
                
                if(strpos($key,'s') !== false){
                    if($value == "" || preg_match($numeros, $value) === 1){
                        array_push($campos,$key);
                    }
                }

                if(strpos($key,'n') !== false){
                    if($value == "" || preg_match($string, $value) === 1){
                        array_push($campos,$key);
                    }
                }

                if(strpos($key,'f') !== false){
                    if($value == "" || $value == $fechaActual){
                        array_push($campos,$key);
                    }
                }

                if(strpos($key,'d') !== false){
                    if($value == ""){
                        array_push($campos,$key);
                    }
                }

                if(strpos($key,'e') !== false){
                    
                    if($value == "" || preg_match($email, $value) === 1){
                        array_push($campos,$key);
                    }
                }

                if(strpos($key,'p') !== false){
                    if($value == "" || strlen($value) < 5){
                        array_push($campos,$key);
                    }
                }


            }
            
            
            return $campos;    

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        } 
    }

    public function permisos($val)
    {

        try {

           // print_r($val);
            $array=$val;

            if (!isset($_SESSION['tipo_usuario'])){
                header("Location:index.php?controller=Login&action=initLogin");
            }else{

                if(!in_array($_SESSION['tipo_usuario'], $array)) {
                    
                    $tipo=$_SESSION['tipo_usuario'];
                    header("Location:index.php?controller=$tipo&action=index&error=1");
                    
                }       
            }
        } 
        catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }    
    /*
    * Aqui podemos incluir los demás métodos que nos ayuden
    * a hacer operaciones con la base de datos de forma común
    */
}


?>