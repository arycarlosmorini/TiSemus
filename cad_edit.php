 <?php
     
     session_start();
    include_once("conexao.php");

    $i = $_POST["id"];
    $n = $_POST["ori"];
    $o = ($_POST["oco"];
    $t = $_POST["sit"];
    $s = $_POST["ate"];
    $r = $_POST["rel"];
    $d = $_POST["datai"];
    $f = $_POST["dataf"];

                    
    $rec = "UPDATE finalizado SET origem = $n, ocorrencia = $o, situacao = $t, atendente = $s, relatorio = $r, inicio = $d, final = $f WHERE id = '$i'";
    $ret = mysqli_query($conn, $rec);
        $_SESSION["msg"] = "<p style='color:green;'>OS finalizada com sucesso</p>";
        if (mysqli_insert_id($conn)) {
            header("Location: distro-edit.php");
        }else {
            $_SESSION["msg"] = "<p style='color:red;'>OS não finalizada com sucesso</p>";
            header("Location: distro-edit.php");
        }                   
?>