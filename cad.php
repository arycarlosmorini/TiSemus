 <?php
     
     session_start();
    include_once("conexao.php");

    $n = isset($_POST["ori"])?$_POST["ori"]:"SEMUS";
    $o = isset($_POST["oco"])?$_POST["oco"]:"Verificação";
    $t = isset($_POST["sit"])?$_POST["sit"]:"Sem Solução";
    $s = isset($_POST["ate"])?$_POST["ate"]:"";
    $r = isset($_POST["rel"])?$_POST["rel"]:"";
    $d = isset($_POST["datai"])?$_POST['datai']:date(Y-m-d);
    $f = isset($_POST["dataf"])?$_POST['dataf']:date(Y-m-d);

                    
    $rec = "INSERT INTO finalizado (origem, ocorrencia, situacao, atendente, relatorio, inicio, final) VALUES ('$n', '$o', '$t', '$s','$r', '$d','$f')";
    $ret = mysqli_query($conn, $rec);
        $_SESSION["msg"] = "<p style='color:green;'>OS finalizada com sucesso</p>";
        if (mysqli_insert_id($conn)) {
            header("Location: distro.php");
        }else {
            $_SESSION["msg"] = "<p style='color:red;'>OS não finalizada com sucesso</p>";
            header("Location: distro.php");
        }                   
?>