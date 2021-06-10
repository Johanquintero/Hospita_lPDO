<?php

class Especialidad extends BaseModel
{
        private $cod_especialidad;
        private $nombre;
        private $descripcion;
        
        public function __construct($cod= null, $nom=null,$desc=null)
        {       
                $this->table = "especialidad";
                $this->cod_especialidad= $cod;
                $this->nombre= $nom;
                $this->descripcion= $desc;
                parent::__construct();

                
        }




        /**
         * Get the value of cod_especialidad
         */ 
        public function getCod_especialidad()
        {
                return $this->cod_especialidad;
        }

        /**
         * Set the value of cod_especialidad
         *
         * @return  self
         */ 
        public function setCod_especialidad($cod_especialidad)
        {
                $this->cod_especialidad = $cod_especialidad;

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
         * Get the value of descripcion
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        public function save()
        {

                $sql= $this->dbConnection->prepare(" INSERT INTO especialidad (cod_especialidad, nombre, descripcion) VALUES (?,?,?)");


                $cod_especialidad=$this->getCod_especialidad();
                $nombre=$this->getNombre();
                $descripcion=$this->getDescripcion();

                $sql->bindParam(1,$cod_especialidad);
                $sql->bindParam(2,$nombre);
                $sql->bindParam(3,$descripcion);

                $res = $sql->execute();

                return $res;
        }

        public function edit($cod_especialidad,$nombre,$descripcion,$cod_especialidad2)
        {
                $sql=$this->dbConnection->prepare("UPDATE especialidad SET cod_especialidad=:cod_especialidad2,
                nombre=:nombre, descripcion=:descripcion WHERE cod_especialidad=:cod_especialidad ");

                $sql->bindParam('cod_especialidad',$cod_especialidad);
                $sql->bindParam('cod_especialidad2',$cod_especialidad2);
                $sql->bindParam('nombre',$nombre);
                $sql->bindParam('descripcion',$descripcion);
                $sql->execute();

        }

        public function delete($cod)
        {
                $sql= $this->dbConnection->prepare("DELETE FROM especialidad WHERE cod_especialidad=:cod_especialidad ");

                $sql->bindParam('cod_especialidad',$cod);
                $sql->execute();


        }


}