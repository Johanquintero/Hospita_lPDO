<?php


class Medico extends BaseModel

{
        private $cod_medico;
        private $nombre;
        private $apellido;
        private $documento;
        private $fecha_nacimiento;
        private $genero;
        private $email;
        private $telefono;
        private $perfil_profesional;
        private $fecha_ingreso;
        private $anios_experiencia;
        private $password;
        private $cod_postal;
        private $municipio;
        private $departamento;
        public $valor;

        public function __construct($cod=null,$nom=null,$ape=null,$doc=null,$fnac=null,
        $gen=null,$email=null,$tel=null,$perfil=null,$fingre=null,$expe=null,$pass=null,$codpo=null,$mun=null,$dep=null)
        {
                $this->table = "medico";
                $this->cod_medico = $cod;
                $this->nombre = $nom;
                $this->apellido = $ape;
                $this->documento = $doc;
                $this->fecha_nacimiento = $fnac;
                $this->genero = $gen;
                $this->email = $email;
                $this->telefono = $tel;
                $this->perfil_profesional = $perfil;
                $this->fecha_ingreso = $fingre;
                $this->anios_experiencia = $expe;
                $this->password = $pass;
                $this->cod_postal = $codpo;
                $this->municipio = $mun;
                $this->departamento = $dep;
                parent::__construct();
                
        }


        /**
         * Get the value of cod_medico
         */ 
        public function getCod_medico()
        {
                return $this->cod_medico;
        }

        /**
         * Set the value of cod_medico
         *
         * @return  self
         */ 
        public function setCod_medico($cod_medico)
        {
                $this->cod_medico = $cod_medico;

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
         * Get the value of apellido
         */ 
        public function getApellido()
        {
                return $this->apellido;
        }

        /**
         * Set the value of apellido
         *
         * @return  self
         */ 
        public function setApellido($apellido)
        {
                $this->apellido = $apellido;

                return $this;
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
         * Get the value of perfil_profesional
         */ 
        public function getPerfil_profesional()
        {
                return $this->perfil_profesional;
        }

        /**
         * Set the value of perfil_profesional
         *
         * @return  self
         */ 
        public function setPerfil_profesional($perfil_profesional)
        {
                $this->perfil_profesional = $perfil_profesional;

                return $this;
        }

        /**
         * Get the value of fecha_ingreso
         */ 
        public function getFecha_ingreso()
        {
                return $this->fecha_ingreso;
        }

        /**
         * Set the value of fecha_ingreso
         *
         * @return  self
         */ 
        public function setFecha_ingreso($fecha_ingreso)
        {
                $this->fecha_ingreso = $fecha_ingreso;

                return $this;
        }

        /**
         * Get the value of anios_experiencia
         */ 
        public function getAnios_experiencia()
        {
                return $this->anios_experiencia;
        }

        /**
         * Set the value of anios_experiencia
         *
         * @return  self
         */ 
        public function setAnios_experiencia($anios_experiencia)
        {
                $this->anios_experiencia = $anios_experiencia;

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

        /**
         * Get the value of cod_postal
         */ 
        public function getCod_postal()
        {
                return $this->cod_postal;
        }

        /**
         * Set the value of cod_postal
         *
         * @return  self
         */ 
        public function setCod_postal($cod_postal)
        {
                $this->cod_postal = $cod_postal;

                return $this;
        }

        /**
         * Get the value of municipio
         */ 
        public function getMunicipio()
        {
                return $this->municipio;
        }

        /**
         * Set the value of municipio
         *
         * @return  self
         */ 
        public function setMunicipio($municipio)
        {
                $this->municipio = $municipio;

                return $this;
        }

        /**
         * Get the value of departamento
         */ 
        public function getDepartamento()
        {
                return $this->departamento;
        }

        /**
         * Set the value of departamento
         *
         * @return  self
         */ 
        public function setDepartamento($departamento)
        {
                $this->departamento = $departamento;

                return $this;
        }

        public function save()
        {
                $sql=$this->dbConnection->prepare("INSERT INTO medico (cod_medico, nombre, apellido, documento, fecha_nacimiento,
                 genero, email, telefono, perfil_profesional, fecha_ingreso, anios_experiencia, 
                 password, cod_postal, municipio, departamento) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

                $cod_medico=$this->getCod_medico();
                $nombre=$this->getNombre();
                $apellido=$this->getApellido();
                $documento=$this->getDocumento();
                $fecha_nacimiento=$this->getFecha_nacimiento();
                $genero=$this->getGenero();
                $email=$this->getEmail();
                $telefono=$this->getTelefono();
                $perfil_profesional=$this->getPerfil_profesional();
                $fecha_ingreso=$this->getFecha_ingreso();
                $anios_experiencia=$this->getAnios_experiencia();
                $password=$this->getPassword();
                $cod_postal=$this->getCod_postal();
                $municipio=$this->getMunicipio();
                $departamento=$this->getDepartamento();    

                $option = ['cost'=> 12];
                $contra = password_hash($password, PASSWORD_BCRYPT,$option);
        
                $sql->bindParam(1,$cod_medico);
                $sql->bindParam(2,$nombre);
                $sql->bindParam(3,$apellido);
                $sql->bindParam(4,$documento);
                $sql->bindParam(5,$fecha_nacimiento);
                $sql->bindParam(6,$genero);
                $sql->bindParam(7,$email);
                $sql->bindParam(8,$telefono);
                $sql->bindParam(9,$perfil_profesional);
                $sql->bindParam(10,$fecha_ingreso);
                $sql->bindParam(11,$anios_experiencia);
                $sql->bindParam(12,$contra);
                $sql->bindParam(13,$cod_postal);
                $sql->bindParam(14,$municipio);
                $sql->bindParam(15,$departamento);
                $sql->execute();

        }

        public function edit($cod_medico,$nombre,$apellido,$documento,$fecha_nacimiento,$genero,$email,$telefono,
        $perfil_profesional,$fecha_ingreso,$anios_experiencia,$password,$cod_postal,$municipio,$departamento,$cod_medico2)
        {
                if($password == "undefined"){

                $sql = $this->dbConnection->prepare("UPDATE medico SET cod_medico=:cod_medico2, nombre=:nombre,
                apellido=:apellido, documento=:documento, fecha_nacimiento=:fecha_nacimiento, genero=:genero,
                email=:email, telefono=:telefono, perfil_profesional=:perfil_profesional, fecha_ingreso=:fecha_ingreso,
                anios_experiencia=:anios_experiencia, cod_postal=:cod_postal, municipio=:municipio,
                departamento=:departamento   WHERE cod_medico=:cod_medico");

                

                $sql->bindParam('cod_medico',$cod_medico);
                $sql->bindParam('cod_medico2',$cod_medico2);
                $sql->bindParam('nombre',$nombre);
                $sql->bindParam('apellido',$apellido);
                $sql->bindParam('documento',$documento);
                $sql->bindParam('fecha_nacimiento',$fecha_nacimiento);
                $sql->bindParam('genero',$genero);
                $sql->bindParam('email',$email);
                $sql->bindParam('telefono',$telefono);
                $sql->bindParam('perfil_profesional',$perfil_profesional);
                $sql->bindParam('fecha_ingreso',$fecha_ingreso);
                $sql->bindParam('anios_experiencia',$anios_experiencia);
                $sql->bindParam('cod_postal',$cod_postal);
                $sql->bindParam('municipio',$municipio);
                $sql->bindParam('departamento',$departamento);

                $sql->execute();


                }else{
                        
                 $sql = $this->dbConnection->prepare("UPDATE medico SET cod_medico=:cod_medico2, nombre=:nombre,
                apellido=:apellido, documento=:documento, fecha_nacimiento=:fecha_nacimiento, genero=:genero,
                email=:email, telefono=:telefono, perfil_profesional=:perfil_profesional, fecha_ingreso=:fecha_ingreso,
                anios_experiencia=:anios_experiencia, password=:password, cod_postal=:cod_postal, municipio=:municipio,
                departamento=:departamento   WHERE cod_medico=:cod_medico");


                $option = ['cost'=> 12];
                $contra = password_hash($password, PASSWORD_BCRYPT,$option);
                

                $sql->bindParam('cod_medico',$cod_medico);
                $sql->bindParam('cod_medico2',$cod_medico2);
                $sql->bindParam('nombre',$nombre);
                $sql->bindParam('apellido',$apellido);
                $sql->bindParam('documento',$documento);
                $sql->bindParam('fecha_nacimiento',$fecha_nacimiento);
                $sql->bindParam('genero',$genero);
                $sql->bindParam('email',$email);
                $sql->bindParam('telefono',$telefono);
                $sql->bindParam('perfil_profesional',$perfil_profesional);
                $sql->bindParam('fecha_ingreso',$fecha_ingreso);
                $sql->bindParam('anios_experiencia',$anios_experiencia);
                $sql->bindParam('password',$contra);
                $sql->bindParam('cod_postal',$cod_postal);
                $sql->bindParam('municipio',$municipio);
                $sql->bindParam('departamento',$departamento);

                $sql->execute();




                }
                

        }

        public function delete($cod)
        {
                        $sql = $this->dbConnection->prepare("DELETE FROM medico WHERE cod_medico=:cod_medico");

                        $sql->bindParam('cod_medico',$cod);
                        $sql->execute();

        }

        public function validarLogin(){
                try{
                    
                    $sql = $this->dbConnection->prepare("SELECT * FROM medico WHERE email = ?");
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
                            $_SESSION['tipo_usuario'] = "medico";
                            $_SESSION['nombre'] = $resultSet[0]->nombre;
                            $_SESSION['id_usuario'] =$resultSet[0]->cod_medico;
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




















