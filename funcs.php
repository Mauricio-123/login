<?php

$conexion = conexion();

function conexion(){

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "web";


    $conexion = mysqli_connect($server, $user, $pass,$bd)
    or die("Ha sucedido un error inexperado en la conexion de la base de datos");

    return $conexion;
}

function desconectar($conexion){

    $close = mysqli_close($conexion) 
        or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

    return $close;
}
function register($username,$email,$password){

    
        //print_r($_POST);
        $conexion = conexion();
        $sql = "INSERT INTO `user` (username, email, password) VALUES ('$username', '$email', '$password')";
        echo $sql;
        $result = mysqli_query($conexion, $sql);
        return $result;
}




?>