<?php 
    session_start();
    include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Controle de Serviços</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	    <link rel="icon" type="image/png" href="_imagens/tisemus.png"/>
<!--===============================================================================================-->
	    <link rel="stylesheet" type="text/css" href="_vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	    <link rel="stylesheet" type="text/css" href="_fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	    <link rel="stylesheet" type="text/css" href="_vendor/animate/animate.css">
<!--===============================================================================================-->	
	    <link rel="stylesheet" type="text/css" href="_vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	    <link rel="stylesheet" type="text/css" href="_vendor/select2/select2.min.css">
<!--===============================================================================================-->
	    <link rel="stylesheet" type="text/css" href="_css/util.css">
	    <link rel="stylesheet" type="text/css" href="_css/main.css">
	    <link rel="stylesheet" type="text/css" href="_css/style.css"/>
        <link rel="stylesheet"  type="text/css" href="_css/index.css"/>
<!--===============================================================================================-->
        <script type="text/javascript" src="_javascript/notification.js"></script>
    </head>
    <body id="corpo">            
        <div class="limiter">
		    <div class="container-login100">
    			<div class="wrap-login100">
                    <div id="tela">
                        <a href="distro.php"><h1 id="titulo">Controle de Acesso de Ocorrências</h1></a>
                        <h6 id="titulo1">Versão 1.7.2</h6><br/><br/>
                        <div>                
                            <a href="list-client.php" class="botaoV1">Registrar Novo</a>
                            <a href="finalizados.php" class="botao">Finalizados</a><br/><br/>
                        </div>
                        <?php
                            if (isset($_SESSION["msg"])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION["msg"]);
                            }
                            //paginação
                            $atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
                            $pag = (!empty($atual)) ? $atual :1;

                            //limitação de paginas

                            $qunt_pag = 3;

                            //inicio visual

                            $index = ($qunt_pag * $pag) - $qunt_pag;

                            $cons = "SELECT * FROM os LIMIT $index, $qunt_pag";
                            $result = mysqli_query($conn, $cons);
                            while ($a = mysqli_fetch_assoc($result)) {
                                echo "<fieldset class='zen'><legend>Controle: " . $a['id'] . "</legend>";
                                echo " <p>Origem: " . $a['origem'] . "<br/>";
                                echo " Ocorrência: " . $a['ocorrencia'] . "<br/>";
                                echo "Tel.:" . $a['tel'] . "<br/>";
                                echo " Situação: ";
                                $a['situacao'];
                                switch ($a['situacao']) {
                                    case '1':
                                        echo "<h3 id='grau1'>Leve</h3><br>";
                                        break;
                                    case '2':
                                        echo "<h3 id='grau2'>Moderado</h3><br>";
                                        break;
                                    case '3':
                                        echo "<h3 id='grau3'>Alto</h3><br>";
                                        break;
                                    case '4':
                                        echo "<h3 id='grau4'>Urgência</h3><br>";
                                        break;
                                    case '5':
                                        echo "<h3 id='grau5'>Crítico</h3><br>";
                                        break;
                                    case '6':
                                        echo "<h3 id='grau6'>Em andamento</h3><br>";
                                        break;
                                    case '7':
                                        echo "<h3 id='grau7'>Finalizado</h3><br>";
                                        break;
                                    case '8':
                                        echo "<h3 id='grau8'>Finalizado/Não Solucionado</h3><br>";
                                        break;
                                    case '9':
                                        echo "<h3 id='grau9'>Finalizado/Solucionado</h3><br>";
                                        break;
                                    case '0':
                                        echo "<h3 id='grau0'>Finalizado/Solucionado</h3><br>";
                                        break;
                                }
                                echo "<p>Abertura: " . $a['abertura'] . "</p>";
                                echo "<fieldset><legend class='other'>Status</legend>";
                                echo "<a href='started.php?id=" . $a['id'] . "' class='botao'>Finalizar</a>";
                                echo "<a href='alter.php?id=" . $a['id'] . "' class='botaoV1'>Atualizar</a></fieldset></fieldset><br><br>";
                            }

                            $view = "SELECT COUNT(id) AS num_result FROM os";
                            $view_pg = mysqli_query($conn, $view);
                            $row = mysqli_fetch_assoc($view_pg);
                            //echo $row['num_result'];
                            //quantidade de paginas
                            $qunt_pag_view = ceil($row['num_result'] / $qunt_pag);

                            //limite de links
                            $max_link = 2;
                            echo "<a href='view.php?pagina=1'>Primeira </a>";
                            
                            for ($pag_ant = $atual - $max_link; $pag_ant <= $atual - 1; $pag_ant++) { 
                                if($pag_ant >= 1){
                                    echo "<a href='view.php?pagina=$pag_ant'> $pag_ant </a>";
                                }
                            }
                            echo " $atual ";

                            for ($pag_dep = $atual +1; $pag_dep <= $atual + $max_link; $pag_dep ++) { 
                                if($pag_dep <= $qunt_pag_view){
                                    echo "<a href='view.php?pagina=$pag_dep'> $pag_dep </a>";
                                }
                            }
                            echo "<a href='view.php?pagina=$qunt_pag_view'>Ultima</a>";
                        ?>
                        <footer id="rodape">
                            <p>SEMUS - Secretaria Municipal de Saúde de Cachoeiro de Itapemirim-ES</p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> 