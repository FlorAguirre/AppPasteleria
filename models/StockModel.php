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

            public function gerStock(int $id_mp){
                $sql = $this->conexion->query("call sp_selectStock('{$id_mp}')");
                $sql = $sql->fetch_object();
                return $sql;
            }
                
            
            public function updateStock(int $id_mp,string $nombre,int $cantidad, string $medida){
                $sql = $this->conexion->query("call sp_actualizarStock('{$id_mp}','{$nombre}','{$cantidad}','{$medida}')");
                $sql = $sql->fetch_object();
                return $sql;
            }


            public function delStock(int $id_mp ){
                $sql = $this->conexion->query("call sp_eliminarStock('{$id_mp}')");
                $sql = $sql->fetch_object();
                return $sql;
        }


            public function getStockBusqueda(string $busqueda){
                $arrRegistros = array();
                $sql = $this->conexion->query("call sp_buscarStock('{$busqueda}')");
           
                while ($obj = $sql->fetch_object()){
                    array_push($arrRegistros, $obj);
                }
                
                return $arrRegistros;
    }
        
} 
   
      
    

?>