<?php
    require_once("../../config/conexion.php");
?>

<!doctype html>
<html lang="es" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <title>Epps Proveedores | Moneda</title>
    <?php require_once("../html/head.php");?>

</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

    <?php require_once("../html/header.php");?>

        <?php require_once("../html/menu.php");?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Mantenimiento Moneda</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mantenimiento</a></li>
                                        <li class="breadcrumb-item active">Moneda</li>
                                    </ol>
                                </div>

                               
                                    
                               

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <!-- Buttons with Label -->
                                    <button type="button" id="btnnuevo" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i> Nuevo Registro</button>
                                </div>
                                <div class="card-body">
                                    <table id="table_data" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Fecha Creacion</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div>
                </div>
            </div>
            <?php require_once("../html/footer.php");?>
        </div>
    </div>
    <?php require_once("mantenimiento.php");?>
    <?php require_once("../html/js.php");?>
    <script type="text/javascript" src="mntmoneda.js"></script>

</body>

</html>