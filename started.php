<?php
     
    session_start();
    include_once("conexao.php"); 
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $resp = "DELETE FROM os WHERE id='$id'";
    $resul = mysqli_query($conn, $res);
    $result = mysqli_query($conn, $resp);
    if (mysqli_insert_id($conn)) {
        header("Location: view.php");
    }else {
        header("Location: view.php");
    }  
 ?>