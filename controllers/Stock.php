<?php
    
    require_once "../models/StockModel.php";

    $option = $_REQUEST['op'];
    $objStock = new StockModel();

    if($option == "liststock"){
        $arrResponse = array('status' => false, 'data' => "");
        $arrStock = $objStock->getStock();

        if(!empty($arrStock)){
            for($i=0;$i < count($arrStock); $i++){
                $id_mp = $arrStock[$i]->id_mp;
                $options = ' <a href="'.BASE_URL.'views/stock/editar-stock.php?p='.$id_mp.'" class="btn btn-outline-primary btn-sm" title="Editar Registro"><i
                class="fa-solid fa-user-pen"></i></a>';
                $arrStock[$i]->options = $options;
            }
            $arrResponse['status'] = true;
            $arrResponse['data'] = $arrStock;
        }
        echo json_encode($arrResponse);
        die();
    }

    if($option == "registroStock"){
        if($_POST){
        if(empty($_POST['txtNombreStock']) || empty($_POST['txtCantidad']) || empty($_POST['txtMedida'])){
            $arrResponse = array('status' => false, 'msg' => 'Error de datos');
        }else{
            $strNombreStock = ucwords(trim($_POST['txtNombreStock']));
            $intCantidad = trim($_POST['txtCantidad']);
            $strMedida= ucwords(trim($_POST['txtMedida']));
       

            $arrStock = $objStock->insertStock($strNombreStock, $intCantidad, $strMedida);
            if($arrStock->id > 0){
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');
            }else{
                $arrResponse = array('status' => false, 'msg' => 'Error al guardar o materia prima ya existe');
            }
            }
            echo json_encode($arrResponse);
        }


        die();
    }
 

    if($option == "verstock"){
      if($_POST){
            $id_mp = intval($_POST['id_mp']);
            $arrStock = $objStock->gerStock($id_mp);
            if(empty($arrStock)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'msg' => 'Datos encontrados', 'data' => $arrStock);
            }
            echo json_encode($arrResponse);
      }
        die();
    }

    if($option == "actualizar"){
        if($_POST){
            if(empty($_POST['txtId']) || empty($_POST['txtNombreStock']) || empty($_POST['txtCantidad']) || empty($_POST['txtMedida'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $intId = intval($_POST['txtId']);
                $strNombreStock = ucwords(trim($_POST['txtNombreStock']));
                $intCantidad = trim($_POST['txtCantidad']);
                $strMedida = ucwords(trim($_POST['txtMedida']));
    
                $arrStock = $objStock->updateStock($intId, $strNombreStock,$intCantidad,$strMedida);
                if($arrStock->idp > 0){
                    $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al actualizar o la materia prima ya existe');
                }
                }
                echo json_encode($arrResponse);
            }
    
    
            die();
    }

    
    if($option == "eliminar"){
       if($_POST){
            if(empty($_POST['id_mp'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $idStock = intval($_POST['id_mp']);
                $arrInfo = $objStock-> delStock($idStock);
                if($arrInfo->id){
                    $arrResponse = array('status' => true, 'msg' => 'Registro Eliminado');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
                }
            }
            echo json_encode($arrResponse);
       }
       
    }

    
    if($option == "buscar"){
        if($_POST){
            if(empty($_POST['txtBuscar'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $strBuscar = trim($_POST['txtBuscar']);
                $arrResponse = array('status' => false, 'found'=>0, 'data'=> "");
           
                $arrInfo = $objStock-> getStockBusqueda($strBuscar);
                if(!empty($arrInfo)){
                    $arrResponse = array('status' => true, 'found'=>count($arrInfo), 'data'=> $arrInfo);
                }
            }
            echo json_encode($arrResponse);
        }
        die();
    }
 
    die();

?>