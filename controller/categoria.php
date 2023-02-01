<?php
    /* TODO: LLamando Clases */
    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");

    /* TODO: Inicializando Clases */
    $categoria=new Categoria();

    switch($_GET["op"]){
        /* TODO: Guardar y Editar, guardar cuando el ID este vacio y actualizar cuando se envie el ID */
        case "guardaryeditar":
            if(empty($_POST["cat_id"])){
                $categoria->insert_categoria($_POST["suc_id"],$_POST["cat_nom"]);
            }else{
                $categoria->update_categoria($_POST["cat_id"],$_POST["suc_id"],$_POST["cat_nom"]);
            }
            break;

            /* TODO: Listado de registros formato JSON para Datatable JS */
        case "listar":
            $datos=$categoria->get_categoria_x_suc_id($_POST["suc_id"]);
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["CAT_NOM"];
                $sub_array[] = $row["FECH_CREA"];
                $sub_array[] = '<button type="button" onclick="editar('.$row["CAT_ID"].')" id="'.$row["CAT_ID"].'" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-edit-line"></i></button>';
                $sub_array[] = '<button type="button" onclick="eliminar('.$row["CAT_ID"].')" id="'.$row["CAT_ID"].'" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></button>';
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
            $datos=$categoria->get_categoria_x_cat_id($_POST["cat_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["CAT_ID"]=$row["CAT_ID"];
                    $output["SUC_ID"]=$row["SUC_ID"];
                    $output["CAT_NOM"]=$row["CAT_NOM"];
                }
                echo json_encode($output);
            }
            break;

            /* TODO: Cambiar a estado 0 del registro */
        case "eliminar":
            $categoria->delete_categoria($_POST["cat_id"]);
            break;

        case "combo";
            $datos=$categoria->get_categoria_x_suc_id($_POST["suc_id"]);
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["CAT_ID"]."'>".$row["CAT_NOM"]."</option>";
                }
                echo $html;
            }
            break;

    }
?>