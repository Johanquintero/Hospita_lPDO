<?php

class Cita extends BaseModel
{
        private $id;
        private $paciente_documento;
        private $medico_cod;
        private $sede;
        private $consultorio;
        private $fecha_cita;
        private $hora_cita;
        private $fecha_registro;
        
        public function __construct($paciente_documento=null,
        $medico_cod=null,$sede= null, $consultorio=null,$fecha_cita=null,$hora_cita= null, $fecha_registro=null)
        {       
                $this->table = "citas";
                $this->paciente_documento= $paciente_documento;
                $this->medico_cod= $medico_cod;
                $this->sede= $sede;
                $this->consultorio= $consultorio;
                $this->fecha_cita= $fecha_cita;
                $this->hora_cita= $hora_cita;
                $this->fecha_registro= $fecha_registro;
                parent::__construct();

                
        }


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of paciente_documento
         */ 
        public function getPaciente_documento()
        {
                return $this->paciente_documento;
        }

        /**
         * Set the value of paciente_documento
         *
         * @return  self
         */ 
        public function setPaciente_documento($paciente_documento)
        {
                $this->paciente_documento = $paciente_documento;

                return $this;
        }

        /**
         * Get the value of medico_cod
         */ 
        public function getMedico_cod()
        {
                return $this->medico_cod;
        }

        /**
         * Set the value of medico_cod
         *
         * @return  self
         */ 
        public function setMedico_cod($medico_cod)
        {
                $this->medico_cod = $medico_cod;

                return $this;
        }

        /**
         * Get the value of sede
         */ 
        public function getSede()
        {
                return $this->sede;
        }

        /**
         * Set the value of sede
         *
         * @return  self
         */ 
        public function setSede($sede)
        {
                $this->sede = $sede;

                return $this;
        }

        /**
         * Get the value of consultorio
         */ 
        public function getConsultorio()
        {
                return $this->consultorio;
        }

        /**
         * Set the value of consultorio
         *
         * @return  self
         */ 
        public function setConsultorio($consultorio)
        {
                $this->consultorio = $consultorio;

                return $this;
        }

        /**
         * Get the value of fecha_cita
         */ 
        public function getFecha_cita()
        {
                return $this->fecha_cita;
        }

        /**
         * Set the value of fecha_cita
         *
         * @return  self
         */ 
        public function setFecha_cita($fecha_cita)
        {
                $this->fecha_cita = $fecha_cita;

                return $this;
        }

        /**
         * Get the value of hora_cita
         */ 
        public function getHora_cita()
        {
                return $this->hora_cita;
        }

        /**
         * Set the value of hora_cita
         *
         * @return  self
         */ 
        public function setHora_cita($hora_cita)
        {
                $this->hora_cita = $hora_cita;

                return $this;
        }

        /**
         * Get the value of fecha_registro
         */ 
        public function getFecha_registro()
        {
                return $this->fecha_registro;
        }

        /**
         * Set the value of fecha_registro
         *
         * @return  self
         */ 
        public function setFecha_registro($fecha_registro)
        {
                $this->fecha_registro = $fecha_registro;

                return $this;
        }

        public function save()
        {

                $sql= $this->dbConnection->prepare(" INSERT INTO citas (paciente_documento, medico_cod, sede, consultorio, fecha_cita, hora_cita, fecha_registro) VALUES (?,?,?,?,?,?,?)");


                $paciente_documento=$this->getPaciente_documento();
                $medico_cod=$this->getMedico_cod();
                $sede=$this->getSede();
                $consultorio=$this->getConsultorio();
                $fecha_cita=$this->getFecha_cita();
                $hora_cita=$this->getHora_cita();
                $fecha_registro=$this->getFecha_registro();

                $sql->bindParam(1,$paciente_documento);
                $sql->bindParam(2,$medico_cod);
                $sql->bindParam(3,$sede);
                $sql->bindParam(4,$consultorio);
                $sql->bindParam(5,$fecha_cita);
                $sql->bindParam(6,$hora_cita);
                $sql->bindParam(7,$fecha_registro);

                $res = $sql->execute();

                return $res;
        }

        public function edit($id,$paciente_documento, $medico_cod,$sede, $consultorio, $fecha_cita,$hora_cita, $fecha_registro)
        {
                $sql=$this->dbConnection->prepare("UPDATE citas SET paciente_documento=:paciente_documento,
                medico_cod=:medico_cod, sede=:sede, consultorio=:consultorio, fecha_cita=:fecha_cita, hora_cita=:hora_cita, fecha_registro=:fecha_registro WHERE id=:id");

                $sql->bindParam('paciente_documento',$paciente_documento);
                $sql->bindParam('medico_cod',$medico_cod);
                $sql->bindParam('sede',$sede);
                $sql->bindParam('consultorio',$consultorio);
                $sql->bindParam('fecha_cita',$fecha_cita);
                $sql->bindParam('hora_cita',$hora_cita);
                $sql->bindParam('fecha_registro',$fecha_registro);
                $sql->bindParam('id',$id);
                $sql->execute();

        }

        public function delete($id)
        {
                $sql= $this->dbConnection->prepare("DELETE FROM citas WHERE id=:id ");

                $sql->bindParam('id',$id);
                $sql->execute();


        }
}