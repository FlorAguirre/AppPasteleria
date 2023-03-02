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
                class="fa-solid fa-user-pen"></i></a>
                <button class="btn btn-outline-danger btn-sm" title="Eliminar Registro" onclick="fntDelStock('.$id_mp.')" ><i
                class="fa-solid fa-trash-can"></i></button>';
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
 
/*
    if($option == "verregistro"){
      if($_POST){
            $id_cliente = intval($_POST['id_cliente']);
            $arrPersona = $objPersona->gerPersonas($id_cliente);
            if(empty($arrPersona)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'msg' => 'Datos encontrados', 'data' => $arrPersona);
            }
            echo json_encode($arrResponse);
      }
        die();
    }

    if($option == "actualizar"){
        if($_POST){
            if(empty($_POST['txtId']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtEmail']) || empty($_POST['txtDNI']) || empty($_POST['txtTelefono']) || empty($_POST['txtCalle']) || empty($_POST['txtCiudad']) || empty($_POST['txtCP'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $intId = intval($_POST['txtId']);
                $strNombre = ucwords(trim($_POST['txtNombre']));
                $strApellido = ucwords(trim($_POST['txtApellido']));
                $strEmail = strtolower(trim($_POST['txtEmail']));
                $strDNI = ucwords(trim($_POST['txtDNI']));
                $intTelefono = trim($_POST['txtTelefono']);
                $strCalle = ucwords(trim($_POST['txtCalle']));
                $strCiudad = ucwords(trim($_POST['txtCiudad']));
                $strCP = ucwords(trim($_POST['txtCP']));
    
                $arrPersona = $objPersona->updatePersona($intId, $strNombre,$strApellido,$strEmail,$strDNI,$intTelefono,$strCalle,$strCiudad,$strCP);
                if($arrPersona->idp > 0){
                    $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'Error al actualizar o email ya existe');
                }
                }
                echo json_encode($arrResponse);
            }
    
    
            die();
    }

    if($option == "eliminar"){
       if($_POST){
            if(empty($_POST['id_cliente'])){
                $arrResponse = array('status' => false, 'msg' => 'Error de datos');
            }else{
                $idCliente = intval($_POST['id_cliente']);
                $arrInfo = $objPersona-> delPersona($idCliente);
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
           
                $arrInfo = $objPersona-> getPersonasBusqueda($strBuscar);
                if(!empty($arrInfo)){
                    $arrResponse = array('status' => true, 'found'=>count($arrInfo), 'data'=> $arrInfo);
                }
            }
            echo json_encode($arrResponse);
        }
        die();
    }
 
    die();
*/
?>