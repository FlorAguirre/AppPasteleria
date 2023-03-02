<?php

    require_once "../libraries/conexion.php";

    class StockModel{
            private $conexion;
            function __construct(){
                $this->conexion = new Conexion();
                $this->conexion = $this->conexion->conect();

            }   
            public function getStock(){
                $arrRegistros = array() ;
                $rs = $this->conexion->query("call sp_extraerStocks()");

                while ($obj = $rs->fetch_object()){
                    array_push($arrRegistros, $obj);
                }
                
                return $arrRegistros;

            }       
            public function insertStock(string $nom,int $cant, string $medida){
                $sql = $this->conexion->query("call sp_insertarStock('{$nom}','{$cant}','{$medida}')");
                $sql = $sql->fetch_object();
                return $sql;

            }

            public function gerPersonas(int $id_cliente){
                $sql = $this->conexion->query("call sp_selectCliente('{$id_cliente}')");
                $sql = $sql->fetch_object();
                return $sql;
            }
                
            
            public function updatePersona(int $id_cliente,string $nombre, string $apellido, string $email, string $dni, int $telefono, string $calle, string $ciudad, string $cp ){
                $sql = $this->conexion->query("call sp_actualizarRegistro('{$id_cliente}','{$nombre}','{$apellido}','{$email}','{$dni}','{$telefono}','{$calle}','{$ciudad}', '{$cp}')");
                $sql = $sql->fetch_object();
                return $sql;
            }


            public function delPersona(int $id_cliente ){
                $sql = $this->conexion->query("call sp_eliminarRegistro('{$id_cliente}')");
                $sql = $sql->fetch_object();
                return $sql;
        }


            
            public function getPersonasBusqueda(string $busqueda){
                $arrRegistros = array();
                $sql = $this->conexion->query("call sp_buscarRegistro('{$busqueda}')");
           
                while ($obj = $sql->fetch_object()){
                    array_push($arrRegistros, $obj);
                }
                
                return $arrRegistros;
    }
        
} 
   
      
    

?>