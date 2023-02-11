<?php

//CONECCION A BASE DE DATOS HEROKU
// function conexionBD()
// {
//     $dbh = null;

//     try {
//         //         //mariadb --> nombre del contenedor donde tengamos mysql
//         //         //FALTA CONECTARTLO A HEROKU 
//         $dsn = "mysql:host=eu-cdbr-west-03.cleardb.net;dbname=heroku_b15a104a533637d";
//         $dbh = new PDO($dsn, "b694b3e375ac30", "cde4ad6f");
//     } catch (PDOException $e) {
//         echo $e->getMessage();
//     }

//     return $dbh;
// }


 function conexionBD() {

       $dbh = null;

       try {
        //mariadb --> nombre del contenedor donde tengamos mysql
        //host-> nombre de la casita arriba a la izquierda
        //dbname -> nombre de la base de datos que queremos acceder
           $dsn = "mysql:host=mariadb;dbname=libreria";
           $dbh = new PDO($dsn, "root", "toor");
       } catch (PDOException $e){
           echo $e->getMessage();
       }
        return $dbh;
   }
  
//MOSTRAR TABLA LIBROS DE LA BASE DE DATOS
function selectLibros(){

    $conexion = conexionBD();
    $libros = null;

    try {
        $stmt = $conexion->prepare("SELECT * FROM libros");
        $stmt->execute();
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión

    return $libros;
}

function selectUsuarios(){

    $conexion = conexionBD();
    $usuarios = null;

    try {
        $stmt = $conexion->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión

    return $usuarios;
}

function selectPrestamos(){

    $conexion = conexionBD();
    $prestamos = null;

    try {
        $stmt = $conexion->prepare("SELECT * FROM prestamos");
        $stmt->execute();
        $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión

    return $prestamos;
}

function selectNombreUsuario($idUsuario){

    $conexion = conexionBD();
    $nombreUsuario = null;

    try {
        $stmt = $conexion->prepare("SELECT nombre FROM usuarios WHERE idUsuario = ?");
        $stmt ->bindValue(1,$idUsuario);
        $stmt->execute();
        $nombreUsuario = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión

    return $nombreUsuario;
}


function selectNombreLibro($idLibro){

    $conexion = conexionBD();
    $titulo = null;

    try {
        $stmt = $conexion->prepare("SELECT titulo FROM libros WHERE idLibro = ?");
        $stmt ->bindValue(1,$idLibro);
        $stmt->execute();
        $titulo = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión

    return $titulo;
}



//FUNCION BORRAR LIBRO DE LA BASE DE DATOS
function borrarLibro($idLibro)
{
    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("DELETE FROM libros WHERE id = ?");
        $stmt->bindValue(1, $idLibro);
        $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión
}

//FUNCION INSERTAR PRESTAMO EN LA BASE DE DATOS
function insertarPrestamo($titulo, $descripcion, $plataforma, $genero)
{

    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("INSERT INTO prestamos (titulo, descripcion, plataforma, genero) VALUES (?, ?, ?, ?)");

        $stmt->bindValue(1, $titulo);
        $stmt->bindValue(2, $descripcion);
        $stmt->bindValue(3, $plataforma);
        $stmt->bindValue(4, $genero);
        $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}


function buscarLibrosPorDNI($dni){

    $conexion = conexionBD();
    $titulo = null;

    try {
        $stmt = $conexion->prepare("SELECT * FROM prestamos WHERE $dni = ?");
        $stmt ->bindValue(1,$dni);
        $stmt->execute();
        $titulo = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión

    return $titulo;
}



















//FUNCION INSERTAR JUEGO EN LA BASE DE DATOS
function insertarJuego($titulo, $descripcion, $plataforma, $genero)
{

    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("INSERT INTO juegos (titulo, descripcion, plataforma, genero) VALUES (?, ?, ?, ?)");

        $stmt->bindValue(1, $titulo);
        $stmt->bindValue(2, $descripcion);
        $stmt->bindValue(3, $plataforma);
        $stmt->bindValue(4, $genero);
        $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

//FUNCION INSERTAR LOCALIZACION EN LA BASE DE DATOS
function insertarLocalizacion($nombre, $descripcion, $pInteres, $importancia, $idJuegos)
{

    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("INSERT INTO localizaciones (nombre, descripcion, pInteres, importancia, idjuegos) VALUES (?, ?, ?, ?, ?)");

        $stmt->bindValue(1, $nombre);
        $stmt->bindValue(2, $descripcion);
        $stmt->bindValue(3, $pInteres);
        $stmt->bindValue(4, $importancia);
        $stmt->bindValue(5, $idJuegos);
        //$_GET['$idJuego']

        $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}





function borrarLocalizacion($idLoca)
{

    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("DELETE FROM localizaciones WHERE idLoca = ?");
        $stmt->bindValue(1, $idLoca);
        $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión
}

function borrarLocalizacion2($ids)
{
    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("DELETE FROM localizaciones WHERE idLoca = ?");
        $stmt->bindValue(1, $ids);
        $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión
}


//MOSTRAR TABLA juegos DE LA BASE DE DATOS
function selectLocalizacion($idJuegos)
{

    $conexion = conexionBD();
    $tareas = null;

    try {
        $stmt = $conexion->prepare("SELECT * FROM localizaciones WHERE idJuegos = ?");
        $stmt->bindValue(1, $idJuegos);
        $stmt->execute();
        $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión

    return $tareas;
}
