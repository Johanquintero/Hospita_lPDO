<?php

class Paciente extends BaseModel {
    private $documento;
    private $nombre;
    private $direccion;
    private $telefono;
    private $fecha_nacimiento;
    private $estado;
    private $genero;
    private $eps;
    private $email;
    private $password;
    public $valor;


    public function crearPaciente ($email="", $pass=""){
        $this->email = $email;
        $this->password = $pass;
    }

    public function __construct ($doc=null, $nom=null, $dir=null, $tel=null, $fec=null, $est=null, $gen=null, $_eps=null, $_email=null, $_pass=null){
        $this->table = "paciente"; // tabla asociada en la base de datos
        $this->documento = $doc;
        $this->nombre = $nom;
        $this->direccion = $dir;
        $this->telefono = $tel;
        $this->fecha_nacimiento = $fec;
        $this->estado = $est;
        $this->genero = $gen;
        $this->eps = $_eps;
        $this->email = $_email;
        $this->password = $_pass;
        parent::__construct();
    }

    /**
     * Get the value of documento
     */ 
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set the value of documento
     *
     * @return  self
     */ 
    public function setDocumento($documento)
    {
        $this->documento = $documento;
        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * Get the value of fecha_nacimiento
     */ 
    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set the value of fecha_nacimiento
     *
     * @return  self
     */ 
    public function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;
        return $this;
    }

    /**
     * Get the value of eps
     */ 
    public function getEps()
    {
        return $this->eps;
    }

    /**
     * Set the value of eps
     *
     * @return  self
     */ 
    public function setEps($eps)
    {
        $this->eps = $eps;
        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function save()
    {
        // Preparar la consulta para insertar un paciente en la BD
          $sql = $this->dbConnection->prepare("INSERT INTO paciente (documento, nombre, direccion, telefono, fecha_nacimiento, estado, genero, eps, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $documento = $this->getDocumento();
        $nombre = $this->getNombre();
        $direccion = $this->getDireccion();
        $telefono = $this->getTelefono();
        $fecha_nac = $this->getFecha_nacimiento();
        $estado = $this->getEstado();
        $genero = $this->getGenero();
        $eps = $this->getEps();
        $email = $this->getEmail();
        $pass = $this->getPassword();

        $option = ['cost'=> 12];
        $contra = password_hash($pass, PASSWORD_BCRYPT,$option);


        $sql->bindParam(1, $documento);
        $sql->bindParam(2, $nombre);
        $sql->bindParam(3, $direccion);
        $sql->bindParam(4, $telefono);
        $sql->bindParam(5, $fecha_nac);
        $sql->bindParam(6, $estado);
        $sql->bindParam(7, $genero);
        $sql->bindParam(8, $eps);
        $sql->bindParam(9, $email);
        $sql->bindParam(10, $contra);
        // Excecute
        $sql->execute();
    }  

    public function delete($documento){

        $sql= $this->dbConnection->prepare("DELETE FROM paciente   WHERE documento=:documento");

        $sql->bindParam('documento',$documento);
        $sql->execute();
    }

    public function edit($documento,$nombre,$direccion,$telefono,$fecha_nac,$estado,$genero,$eps,$email,$password,$documento2)
    {
        if($password == "undefined")
        {
        $sql = $this->dbConnection->prepare("UPDATE paciente SET  documento=:documento2, nombre=:nombre, fecha_nacimiento=:fecha_nacimiento,
        direccion=:direccion, telefono=:telefono, estado=:estado, genero=:genero, eps=:eps, email=:email WHERE documento=:documento");

                
        $sql->bindParam('documento',$documento);
        $sql->bindParam('documento2',$documento2);
        $sql->bindParam('nombre',$nombre);
        $sql->bindParam('fecha_nacimiento',$fecha_nac);
        $sql->bindParam('direccion',$direccion);
        $sql->bindParam('telefono',$telefono);
        $sql->bindParam('estado',$estado);
        $sql->bindParam('genero',$genero);
        $sql->bindParam('eps',$eps);
        $sql->bindParam('email',$email);


        $sql->execute();



        }else{
            $sql = $this->dbConnection->prepare("UPDATE paciente SET  documento=:documento2, nombre=:nombre, fecha_nacimiento=:fecha_nacimiento,
            direccion=:direccion, telefono=:telefono, estado=:estado, genero=:genero, eps=:eps, email=:email, password=:password WHERE documento=:documento");
    
    
            $option = ['cost'=> 12];
            $contra = password_hash($password, PASSWORD_BCRYPT,$option);
                    
            $sql->bindParam('documento',$documento);
            $sql->bindParam('documento2',$documento2);
            $sql->bindParam('nombre',$nombre);
            $sql->bindParam('fecha_nacimiento',$fecha_nac);
            $sql->bindParam('direccion',$direccion);
            $sql->bindParam('telefono',$telefono);
            $sql->bindParam('estado',$estado);
            $sql->bindParam('genero',$genero);
            $sql->bindParam('eps',$eps);
            $sql->bindParam('email',$email);
            $sql->bindParam('password',$contra);
    
    
            $sql->execute();
        }
        

    }


    public function validarLogin(){
        try{
            
            $sql = $this->dbConnection->prepare("SELECT * FROM paciente WHERE email = ?");
            $email = $this->getEmail();
            $sql->bindParam(1, $email);
            $sql->execute();

            $resultSet = array();
            while($row = $sql->fetch(PDO::FETCH_OBJ)){
                $resultSet[] = $row;
            }
            

            if(count($resultSet)>0){
                $option = ['cost'=> 12,'salt'=> 'This is ADSI salt'];
                //variable que guarda el hash de la contrae;a que llega por formulario
                //$contra = password_hash($this->password, PASSWORD_BCRYPT,$option);
                $contra= $this->password;
                //variabel que guarda el  hash de la contrase;a que se optiene de la bd
                $hash_bd = $resultSet[0]->password;

                if(password_verify($contra, $hash_bd)){
                    $_SESSION['tipo_usuario'] = "paciente";
                    $_SESSION['nombre'] = $resultSet[0]->nombre;
                    $_SESSION['id_usuario'] =$resultSet[0]->documento;
                    $_SESSION['timeout'] = time();
                    session_regenerate_id();
                    return true;
                }else{
                    $ctr = new LoginController();
                    $valor="pass";
                    $this->setValor($valor);
                }

            }
            return false;


        }catch(PDOException $excep){
            echo $excep->getMessage();
        }

        
    }

    public function getValor()
    { 
           return $this->valor;

    }


    public function setValor($valor) 
    {
             if($valor == "pass"){
                     $valores=$valor;
             }else{
                     $valores="email";
             }

           $this->valor = $valores;
           return $this;
           
    }

   
}

?>