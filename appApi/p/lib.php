<?php
include_once('modelo.php');

//Función para limpiar los input de los formularios
function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

function pintarLibros()
{

    $libros = selectLibros();

    echo "<table class='table table-dark table-bordered text-center' style='font-size: 15px;align-items: center;' id='dataTable' width='100%' cellspacing='0'>";
    //Cabecera
    echo "<tr>";
    echo "<th> ISBN </th>";
    echo "<th> TITULO </th>";
    echo "<th> DESCRIPCION </th>";
    echo "<th> AUTOR </th>";
    echo "<th> EDITORIAL </th>";
    echo "<th> CATEGORIA</th>";
    echo "<th> ACCIONES</th>";
    echo "</tr>";

    //Contenido
    foreach ($libros as $libro) {
        echo '<tr>';
        echo '<td>' . $libro['isbn'] . '</td>';
        echo '<td>' . $libro['titulo'] . '</td>';
        echo '<td>' . $libro['descripcion'] . '</td>';
        echo '<td>' . $libro['autor'] . '</td>';
        echo '<td>' . $libro['editorial'] . '</td>';
        echo '<td>' . $libro['categoria'] . '</td>';

        // //Acciones
        // echo "<td><a href='localizaciones.php?id=" . $juego['id'] . "' class='btn btn-info btn-circle' style='--bs-btn-color: #ffffff; --bs-btn-hover-color: #fff;'> <i
        // class='fas fa-map'></i></a></>";
        // echo "<td><a href='controlador.php?accion=addLoca&id=" . $juego['id'] . "'  class='btn btn-success btn-circle'><i
        // class='fas fa-plus' ></i></a></td>";

        echo "<td><a href='controlador.php?accion=borrarLibro&idLibro=" . $libro['idLibro'] . "'  class='btn btn-danger'>Borrar</a></td>";

        // echo "</tr>";

    }
    echo "</table>";

}

function pintarUsuarios()
{

    $usuarios = selectUsuarios();

    echo "<table class='table table-dark table-bordered text-center' style='font-size: 15px;align-items: center;' id='dataTable' width='100%' cellspacing='0'>";
    //Cabecera
    echo "<tr>";
    echo "<th> DNI </th>";
    echo "<th> NOMBRE </th>";
    echo "<th> APELLIDO </th>";
    echo "<th> EDAD </th>";
    echo "<th> DIRECCION </th>";
    echo "<th> POBLACION </th>";
    echo "<th> TELEFONO </th>";
    echo "<th> ACCIONES </th>";
    echo "</tr>";


    //Contenido
    foreach ($usuarios as $usuario) {
        echo "<tr>";
        echo "<td>" . $usuario['dni'] . "</td>";
        echo "<td>" . $usuario['nombre'] . "</td>";
        echo "<td>" . $usuario['apellido'] . "</td>";
        echo "<td>" . $usuario['edad'] . "</td>";
        echo "<td>" . $usuario['direccion'] . "</td>";
        echo "<td>" . $usuario['poblacion'] . "</td>";
        echo "<td>" . $usuario['telefono'] . "</td>";
        echo "<td> <a href='controlador.php?accion=borrarUsuario&idUsuario=" . $usuario['idUsuario'] . "'class='btn btn-danger btn-circle'><i class='fas fa-trash' ></i></a></td>";
        echo "</tr>";

    }

    

    echo "</table>";
}


function pintarPrestamos()
{

    $prestamos = selectPrestamos();

    echo "<table class='table table-dark table-bordered text-center' style='font-size: 15px;align-items: center;' id='dataTable' width='100%' cellspacing='0'>";
    //Cabecera
    echo "<tr>";
    echo "<th> LIBRO </th>";
    echo "<th> CLIENTE </th>";
    echo "<th> INICIO </th>";
    echo "<th> FIN </th>";
    echo "<th> ESTADO </th>";
    echo "<th> BORRAR </th>";
    echo "<th> CAMBIAR ESTADO </th>";
    echo "</tr>";

    //Contenido
    foreach ($prestamos as $prestamo) {
        echo '<tr>';
        // //Acciones
        // echo "<td><a href='localizaciones.php?id=" . $juego['id'] . "' class='btn btn-info btn-circle' style='--bs-btn-color: #ffffff; --bs-btn-hover-color: #fff;'> <i
        // class='fas fa-map'></i></a></>";
        // echo "<td><a href='controlador.php?accion=addLoca&id=" . $juego['id'] . "'  class='btn btn-success btn-circle'><i
        // class='fas fa-plus' ></i></a></td>";
        
        
        //  echo '<td>' . selectNombreUsuario($prestamo['idUsuario']) . '</td>';

        foreach(selectNombreLibro($prestamo['idLibro']) as $libro){
            echo '<td>' . $libro. '</td>';
        }

        foreach(selectNombreUsuario($prestamo['idUsuario']) as $nombre){
            echo '<td>' . $nombre. '</td>';
        }

        echo '<td>' . $prestamo['fechaInicio'] . '</td>';
        echo '<td>' . $prestamo['fechaFin'] . '</td>';
        echo '<td>' . $prestamo['estado'] . '</td>';
        echo "<td><a href='controlador.php?accion=finalizar&idPrestamo=" . $prestamo['idPrestamo'] . "'  class='btn btn-danger'>Borrar</a></td>";
        echo "<td>" . 
        
        '<div class="dropdown">
            <a class="btn btn-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cambiar estado
            </a>
      
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">DEVUELTO</a></li>
            <li><a class="dropdown-item" href="#">ACTIVO</a></li>
    
            </ul>
        </div>'. "</td>";
        echo "</tr>";

     



    }
    echo "</table>";

}



?>