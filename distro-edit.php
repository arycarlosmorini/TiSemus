<?php
    session_start();
    include_once("conexao.php");
    $asd = "SELECT * FROM finalizados WHERE id = '36'";
    $result_user = mysqli_query($conn, $asd);
    $row_user = mysqli_fetch_assoc($result_user);
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
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="_css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="_css/style.css"/>
<!--===============================================================================================-->
    <link rel="stylesheet"  type="text/css" href="_css/index.css"/>
<!--===============================================================================================-->
    <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="_javascript/funcoes.js"></script>
<!--===============================================================================================-->
    </head>
    <body id="corpo">         
        <div class="limiter">
	    	<div class="container-login100">
		    	<div class="wrap-login100">
                    <div id="tela">
                        <div>	
                            <h1 id="titulo">Controle de Acesso de Ocorrências</h1>
                            <h6 id="titulo1">Versão 1.7.2</h6><br/><br/>
                        </div>
                        <?php
                            if (isset($_SESSION["msg"])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION["msg"]);
                            }
                        ?>
                        <form method="post" action="cad_edit.php" class="login100-form validate-form" id="formlogin" name="formlogin">
                            <fieldset>
                                <p><legend>Controle de Serviços</legend>                    
                                <div class="wrap-input100 validate-input">
                                    <label for="gem">Origem:</label><input class="input100" type="hidden" name="id" id="gem" class='foco' value="<?php echo $row_user['origem']; ?>" checked/>
                                </div>
                                <label for="cia">Ocorrência:</label><textarea class="input100" name="oco" id="cia" rows="3" cols="23"  value="<?php echo $row_user['ocorrencia']; ?>"class='foco'></textarea>
                                <fiedset><legend class="other">Situação:</legend>
                                    <input type='radio' name='sit' value='7'/>Finalizado
                                    <input type='radio' name='sit' value='8'/>Finalizado/Não Solucionado
                                    <input type='radio' name='sit' value='9'/>Finalizado/Solucionado
                                    <input type='radio' name='sit' value='0'/>Pendente
                                </fieldset>
                                <fieldset><p><legend class="other" >Atendente</legend>
                                    <input type="radio" name="ate" value="1">Arycarlos
                                    <input type="radio" name="ate" value="2">Felipe
                                    <input type="radio" name="ate" value="3">Gilbert
                                    <input type="radio" name="ate" value="4">Willian Jussim
                                    <input type="radio" name="ate" value="5">Própria Unidade
                                    <input type="radio" name="ate" value="6">Cancelado</p>
                                    <p>Relatório:<textarea class="input100" rows="3" cols="23" name="rel" placeholder="O que foi relatado" class='foco' value="<?php echo $row_user['relatorio']; ?>"></textarea>
                                    Abertura:<input class="input100" type="date" name="datai" class='input100' value="<?php echo $row_user['inicio']; ?>"/>
                                    Finalizado:<input class="input100" type="date" name="dataf" class='input100' value="<?php echo $row_user['final']; ?>"/></p>
                                </fieldset>
                                <div class="container-login100-form-btn">
						            <button class="login100-form-btn">
							            <input type="submit" value="Alterar" class="login100-form-btn"/>
                                    </button>
                                </div>
                                <a href="view.php" class="botaoV">Andamento</a>
                                <a href="finalizados.php" class="botao">Finalizado</a>
                                <a href="list-client.php" class="botaoV">Registrar</a><br/>
                            </fieldset>
                        </form>
                        <footer id="rodape">
                            <p>SEMUS - Secretaria Municipal de Saúde de Cachoeiro de Itapemirim-ES</p>
                        </footer>
                    </div>
    		    </div>
	        </div>
        </div>
    </body>
</html>