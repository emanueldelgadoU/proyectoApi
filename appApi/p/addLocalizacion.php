<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Añadir Localización</h6>
        </div>
        <div class="card-body">
            <div class="p-5">
                <div class="text-center">

                </div>
                <form class="user" action="controlador.php" method="get">
                <div class='mb-3'>
                            <label for='nombre' class='form-label'>Nombre</label>
                            <input type='text' name='nombre' class='form-control form-control-user'>
                        </div>

                        <div class='mb-3'>
                            <label for='descripcion' class='form-label'>Descripción</label>
                            <input type="text" class='form-control form-control-user' name="descripcion" id="">
                        </div>

                        <div class='mb-3'>
                            <label for='pInteres' class='form-label'>Punto de interes</label>
                            <input type='text' name='pInteres' class='form-control form-control-user'>
                        </div>

                        <div class='mb-3'>
                            <label for='importancia' class='form-label'>Importancia</label> <br>
                            <input type='number' name='importancia' class='form-control form-control-user' min='1' max='3'>
                        </div>

                    <input type="hidden" name="idjuegos" value="<?php echo $_GET['id']; ?>">

                    <input type="submit" id="add" name="accion" value="Insertar" class="btn btn-dark btn-user btn-block" />

                </form>
                <hr>
            </div>
        </div>
    </div>

</body>

</html>
<?php include("footer.php"); ?>