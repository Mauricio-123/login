<?php
$connection = mysqli_connect('localhost','root','');
if (!$connection){
    echo 'Database Connection Failed' . die(mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'web');
if (!$select_db){
    echo 'Database Selection Failed' . die(mysqli_error($connection));
}
?>