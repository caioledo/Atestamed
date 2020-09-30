<?php
session_start();
if (isset($_SESSION['logado']) && boolval($_SESSION['logado']) == true) {
    //mostrar painel
    header("Location: atestado.php");
}

require_once ('./internal/classes/Database.class.php');
require_once ('./internal/classes/TipoUsuario.php');

require_once ('./internal/model/Atestado.class.php');
require_once ('./internal/model/Medico.class.php');
require_once ('./internal/model/Paciente.class.php');
require_once ('./internal/model/Usuario.class.php');

require_once ('./internal/dao/AtestadoDAO.class.php');
require_once ('./internal/dao/MedicoDAO.class.php');
require_once ('./internal/dao/UsuarioDAO.class.php');

$statusLogin = true;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
        $login = $_POST['login'];
        $senhaMd5 = md5($_POST['senha']);

        $usuarioDao = new UsuarioDAO();
        $statusLogin = $usuarioDao->login($login, $senhaMd5);

        if ($statusLogin === true) {
            $statusLogin = true;
            $_SESSION['logado'] = true;
            header("Location: atestado.php");
        } else {
            //eroor login
            $statusLogin = false;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>AtestaMed</title>
        <link rel="stylesheet" href="css/normalize.css" />
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,300,100' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/estilo.css" />
    </head>
    <body>
    
        <header>
               <div class="logo-background">
                <br>
                <h1 class="logo">AtestaMed</h1>
                <h1 class="down-logo">Sistema de Emissão de Documentos Médicos</h1><br>
            </div>

            <fieldset>
            <ul class="menu inline">
            <li class="cadastro">
                <a href="cadastro.php">Cadastrar</a>
            </li>

            <li class="validar">
                <a href="validar.php">Validar Atestado</a>
            </li>
        </ul>
    </fieldset>
        </header>
        <br/>

        <?php
        if ($statusLogin == false) {
            ?>
            <div>
                <center style="color: red; font-weight: bold;">Usuário inválido ou senha incorreta.</center>
            </div>
            <?php
        }
        ?>


        <fieldset>
            <ul class="center">
                <form action="login.php" method="POST">
                    <input class="campo" name="login" type="text" placeholder="Login" required><br>

                    <input class="campo" name="senha" type="password" placeholder="Senha" required><br>

                    <br>
                    <input class="botao" type="submit" value="Enviar">
                </form>
            </ul>
        </fieldset>


    </body>
</html>
