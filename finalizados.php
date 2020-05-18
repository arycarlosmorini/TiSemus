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
                        <h6 id="titulo1"><a href="view.php" class="ninja">Versão 1.7.2</a></h6><br/><br/>
                        <div>
                            <a href="viewcopy.php" class="botaoV1">Recebidos</a><br/><br/>
                            <a href="list-client.php" class="botaoV1">Registrar Novo</a><br/><br/>
                        </div>
                        <?php
                            if (isset($_SESSION["msg"])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION["msg"]);
                            }

                            //Paginação
                            $pagina_atual = filter_input(INPUT_GET,'pagina');
                            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                            //Setar quantidade de itens
                            $qnt_result_pg = 3;

                            //Calcular o inicio visual

                            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                            $cons = "SELECT * FROM finalizado LIMIT $inicio, $qnt_result_pg";
                            $result = mysqli_query($conn, $cons);
                            while ($a = mysqli_fetch_assoc($result)) {
                                echo "<fieldset class='zen'><legend>Controle:<a href='distro-edit.php' class='a'> " . $a['idos'] . "</a></legend>";
                                echo " <p><b>Origem:</b> " . $a['origem'] . "<br/>";
                                echo " <b>Ocorrência:</b> " . $a['ocorrencia'] . "<br/>";
                                echo " <b>Situação:</b> ";
                                $a['situacao'];
                                switch ($a['situacao']) {
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
                                        echo "<h3 id='grau0'>Pendente</h3><br>";
                                        break;                       
                                }
                                echo "<p><b>Atendente: </b> </p>";
                                switch ($a['atendente']) {
                                    case '1':
                                        echo "<h3 id='grau'>Arycarlos</h3><br/><br>";
                                        break;
                                    case '2':
                                        echo "<h3 id='grau'>Felipe</h3><br/><br>";
                                        break;
                                    case '3':
                                        echo "<h3 id='grau'>Gilbert</h3><br/><br>";
                                        break;
                                    case '4':
                                        echo "<h3 id='grau'>Willian Jussim</h3><br/><br>";
                                        break;
                                    case '5':
                                        echo "<h3 id='grau'>Própria unidade</h3><br/><br>";
                                        break;
                                    case '6':
                                        echo "<h3 id='grau'>Cancelado</h3><br/><br>";
                                        break;
                                    }
                                echo "<p><b>Relatório:</b> " . $a['relatorio'] . "<br/>";
                                echo "<b>Início:</b> " . $a['inicio'] . "<br/>";
                                echo "<b>final:</b> " . $a['final'] . "</p></fieldset>";
                            }
                            
                            //Paginação - opções
                            $result_pg = "SELECT COUNT(idos) AS num_result FROM finalizado";
                            $resultado_pg = mysqli_query($conn, $result_pg);
                            $row_pg = mysqli_fetch_assoc($resultado_pg);

                            //quantidade de paginas 
                            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                            //Limite de links

                            $max_links = 2;
                            echo "<a href='finalizados.php?pagina=1'>Primeira </a>";

                            for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) { 
                                if($pag_ant >= 1){
                                    echo "<a href='finalizados.php?pagina=$pag_ant'> $pag_ant </a>";
                                }
                            }
                            echo " $pagina ";

                            for ($pag_dep = $pagina +1; $pag_dep <= $pagina + $max_links; $pag_dep ++) { 
                                if($pag_dep <= $quantidade_pg){
                                    echo "<a href='finalizados.php?pagina=$pag_dep'> $pag_dep </a>";
                                }
                            }
                            echo "<a href='finalizados.php?pagina=$quantidade_pg'> Ultima</a>";
                        ?>
                    </div>
                    <footer id="rodape">
                        <p>SEMUS - Secretaria Municipal de Saúde de Cachoeiro de Itapemirim-ES</p>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>