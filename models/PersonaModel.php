<?php

    require_once "../libraries/conexion.php";

    class PersonaModel{
            private $conexion;
            function __construct(){
                $this->conexion = new Conexion();
                $this->conexion = $this->conexion->conect();

            }   
     public function getPersonas(){
        $arrRegistros = array() ;
        $rs = $this->conexion->query("call sp_extraerRegistros()");

        while ($obj = $rs->fetch_object()){
            array_push($arrRegistros, $obj);
        }
        
        return $arrRegistros;

    }     
        }
        
   

    

?>