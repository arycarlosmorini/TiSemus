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
                        <form method="post" action="cadastra.php" class="login100-form validate-form" id="formlogin" name="formlogin">
                            <div class="wrap-input100 validate-input">
						        <label for="gem">Origem:</label><input class="input100" type="text" name="ori" id="gem" maxlength="40" placeholder="Unidade de Saúde" class='foco' checked/>
						        <span class="symbol-input100"></span>
                            </div>
                            
                            <label for="cia">Ocorrência:</label><textarea class="input100" name="oco" id="cia" rows="3" cols="23" placeholder="Acontecimento..." class='foco'></textarea>
                            <div class="wrap-input100 validate-input">
                                <label for="itel">Tel.:</label><input class="input100" type="number" name="tel" id="itel" min="31550000" maxlength="11" placeholder="contato" class='foco'/>
                                <span class="symbol-input100"></span>
                            </div>
                            <fieldset>
                                <legend class="other">Situação:</legend>
                                    <input type='radio' name='sit' value='1'/>Leve
                                    <input type='radio' name='sit' value='2'/>Moderado
                                    <input type='radio' name='sit' value='3'/>Alto
                                    <input type='radio' name='sit' value='4'/>Urgente
                                    <input type='radio' name='sit' value='5'/>Crítico
                            </fieldset><br/>
                                Abertura:<input class="input100" type="date" name="data" class='foco'/></p>
                            </fieldset><br>
                            <div class="container-login100-form-btn">
						        <button class="login100-form-btn">
							        <input type="submit" value="Cadastrar" class="login100-form-btn"/>
                                </button>
                            </div>
                            <a href="viewcopy.php" class="botaoV">Recebidos</a>
                            <a href="finalizados.php" class="botaoV">Finalizados</a><br/>
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