<?php
    
    require_once "../models/PersonaModel.php";

    $option = $_REQUEST['op'];
    $objPersona = new PersonaModel();

    if($option == "listregistros"){
        $arrResponse = array('status' => false, 'data' => "");
        $arrPersona = $objPersona->getPersonas();

        if(!empty($arrPersona)){
            $arrResponse['status'] = true;
            $arrResponse['data'] = $arrPersona;
        }
        echo json_encode($arrResponse);
        die();
    }

    if($option == "registro"){
        echo "Registrar cliente";
    }
 
    if($option == "verregistro"){
        echo "Ver un cliente";
    }

    if($option == "actualizar"){
        echo "Actualizar cliente";
    }

    if($option == "eliminar"){
        echo "Eliminar cliente";
    }
 
    die();

?>