<?php
    /* TODO: LLamando Clases */
    require_once("../config/conexion.php");
    require_once("../models/Rol.php");

    /* TODO: Inicializando Clases */
    $rol=new Rol();

    switch($_GET["op"]){
        /* TODO: Guardar y Editar, guardar cuando el ID este vacio y actualizar cuando se envie el ID */
        case "guardaryeditar":
            if(empty($_POST["rol_id"])){
                $rol->insert_rol($_POST["suc_id"],$_POST["rol_nom"]);
            }else{
                $rol->update_rol($_POST["rol_id"],$_POST["suc_id"],$_POST["rol_nom"]);
            }
            break;

            /* TODO: Listado de registros formato JSON para Datatable JS */
        case "listar":
            $datos=$rol->get_rol_x_suc_id($_POST["suc_id"]);
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array = $row["rol_nom"];
                $sub_array = "Editar";
                $sub_array = "Eliminar";
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
            
            /* TODO: Mostrar información de registros segun su ID */
        case "mostrar":
            $datos=$rol->get_rol_x_rol_id($_POST["rol_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["rol_id"]=$row["rol_id"];
                    $output["suc_id"]=$row["suc_id"];
                    $output["rol_nom"]=$row["rol_nom"];
                }
                echo json_encode($output);
            }
            break;

            /* TODO: Cambiar a estado 0 del registro */
        case "eliminar":
            $rol->delete_rol($_POST["rol_id"]);
            break;

    }
?>