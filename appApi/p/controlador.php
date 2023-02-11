<?php
include_once("lib.php");
include_once("modelo.php");
?>
<?php


// //para añadir juego
// if (isset($_GET["insertar"])) {
//     $titulo = filtrado($_GET["titulo"]);
//     $descripcion = filtrado($_GET["descripcion"]);
//     $plataforma = filtrado($_GET["plataforma"]);
//     $genero = filtrado($_GET["genero"]);
//     insertarJuego($titulo, $descripcion, $plataforma, $genero);
//     echo '<script>window.location="' . "index.php" . '"</script>';
// }




    //para los botones con variable accion
    if (isset($_GET["accion"])) {

    //BORRAR LIBRO
    if ($_GET["accion"] == "borrarLibro") {
        borrarLibro(filtrado($_GET["idLibro"]));
        echo '<script>window.location="'."index.php".'"</script>';
    }


    if ($_GET["accion"] == "addLoca") {
        $id = $_GET['id'];
        echo '<script>window.location="' . "addLocalizacion.php?id=".$id.'"</script>';
    }


    //borrar localizacion por el id 
    if ($_GET["accion"] == "borrarLocalizacion") {
        borrarLocalizacion2(filtrado($_GET["idLoca"]));
        echo '<script>window.location="'."index.php".'"</script>';
        
    }
    if ($_GET["accion"] == "infoLocalizacion") {
        $i = $_GET["id"];
        echo '<script>window.location="'."localizaciones.php?valor=$i".'"</script>';
       
    }

    if ($_GET["accion"] == "addLoca") {
        $i = $_GET["id"];
        echo '<script>window.location="'."addLocalizacion.php?valor=$i".'"</script>';
    }

    if ($_GET["accion"] == "Insertar") {
        insertarLocalizacion($_GET["nombre"],$_GET["descripcion"],$_GET["pInteres"],$_GET["importancia"],$_GET["idjuegos"]);
        echo '<script>window.location="'."index.php".'"</script>';
    }

}


?>

