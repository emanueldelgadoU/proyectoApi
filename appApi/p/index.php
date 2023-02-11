<?php
include("header.php");
include("lib.php");
?>


<!DOCTYPE html>
<html lang="en">

<body id="page-top">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark text-center">LIBROS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
            pintarLibros();
            ?>
            </div>
        </div>
    </div>

</body>

</html>

<?php include("footer.php"); ?>