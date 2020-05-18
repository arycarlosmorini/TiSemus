 <?php
     
    session_start();
    include_once("conexao.php");

    $n = isset($_POST["ori"])?$_POST["ori"]:"SEMUS";
    $o = isset($_POST["oco"])?$_POST["oco"]:"Verificação";
    $t = isset($_POST["tel"])?$_POST["tel"]:"00000000000";
    $s = isset($_POST["sit"])?$_POST["sit"]:"Leve";
    $d = isset($_POST["data"])?$_POST['data']:date(Y-m-d);

                    
    $res = "INSERT INTO os (origem, ocorrencia, tel, situacao, abertura) VALUES ('$n', '$o', '$t', '$s', '$d')";
    $ret = mysqli_query($conn, $res);
        $_SESSION["msg"] = "<p style='color:green;'>OS registrada com sucesso</p>";
        if (mysqli_insert_id($conn)) {
            header("Location: list-client.php");
        }else {
            $_SESSION["msg"] = "<p style='color:red;'>OS não registrada com sucesso</p>";
            header("Location: list-client.php");
        }                   
?>