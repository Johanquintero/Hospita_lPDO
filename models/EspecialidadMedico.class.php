<?php

class EspecialidadMedico extends BaseModel
{
        private $id;
        private $especialidad;
        private $medico;
        
        public function __construct($esp=null,$med=null)
        {       
                $this->table = "especialidadmedico";
                $this->especialidad= $esp;
                $this->medico= $med;
                parent::__construct();

        }

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getEspec()
        {
                return $this->especialidad;
        }

        public function setEspecialidad($especialidad)
        {
                $this->especialidad = $especialidad;

                return $this;
        }

        public function getMedico()
        {
                return $this->medico;
        }


        public function setMedico($medico)
        {
                $this->medico = $medico;

                return $this;
        }

        public function save($especialidad,$medico)
        {

                $sql= $this->dbConnection->prepare(" INSERT INTO especialidadmedico (especialidad, medico) VALUES (?,?)");
                
                $especialidad=$especialidad;
                $medico=$medico;
               
                $sql->bindParam(1,$especialidad);
                $sql->bindParam(2,$medico);

                $sql->execute();

        }

        public function edit($id,$especialidad,$medico)
        {
                $sql=$this->dbConnection->prepare("UPDATE especialidadmedico SET id=:id,
                especialidad=:especialidad, medico=:medico WHERE id=:id ");

                $sql->bindParam('id',$id);
                $sql->bindParam('especialidad',$especialidad);
                $sql->bindParam('medico',$medico);
                $sql->execute();

        }
        public function delete($cod)
        {
                        $sql = $this->dbConnection->prepare("DELETE FROM especialidadmedico WHERE medico=:medico");

                        $sql->bindParam('medico',$cod);
                        $sql->execute();

        }

}