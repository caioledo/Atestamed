<?php
session_start();
require_once ('./internal/classes/Database.class.php');
require_once ('./internal/classes/TipoUsuario.php');

require_once ('./internal/model/Atestado.class.php');
require_once ('./internal/model/Medico.class.php');
require_once ('./internal/model/Paciente.class.php');
require_once ('./internal/model/Usuario.class.php');

require_once ('./internal/dao/AtestadoDAO.class.php');
require_once ('./internal/dao/MedicoDAO.class.php');
require_once ('./internal/dao/UsuarioDAO.class.php');


$cadastro = false;
$statusCadastro = false;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cadastro = true;

    if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['senha']) && !empty($_POST['senha']) && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['crm_uf']) && !empty($_POST['crm_uf']) && isset($_POST['crm_num']) && !empty($_POST['crm_num'])) {
        $login = $_POST['login'];
        $senhaMd5 = md5($_POST['senha']);


        $usuario = new Usuario();
        $usuario->setNome($_POST['nome']);
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha(md5($_POST['senha']));

        $medico = new Medico();
        $medico->setNome($_POST['nome']);
        $medico->setCrmUf($_POST['crm_uf']);
        $medico->setCrmNum(intval($_POST['crm_num']));
        $medico->setEspecialidade($_POST['espec']);


        $dao = new MedicoDAO();
        $status = $dao->cadastrarMedicoUsuario($medico, $usuario);


        if ($status === true) {
            $statusCadastro = true;
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
            <li class="login">
                <a href="login.php">Login</a>
            </li>

            <li class="validar">
                <a href="validar.php">Validar Atestado</a>
            </li>
        </ul>
            </fieldset>
        </header>

        <ul class="center">
            <?php
            if ($cadastro === true) {
                if ($statusCadastro === true) {
                    ?>
                    <p style="font-weight: bold;"><span style="color: green;">Usuário cadastrado com sucesso.</span><br/><a href="login.php">Clique aqui para entrar.</a></p>
                    <?php
                } else {
                    ?>
                    <p style="color: red; font-weight: bold;">Erro ao cadastrar usuário.</p>
                    <?php
                }
            }
            ?>
            <fieldset>
                <ul class="margin-leftish">
                    <h1 class="title">Cadastro de Médico</h1>
                </ul>

                <form action="cadastro.php" method="post">
                    <input class="campo" name="nome" type="text" placeholder="Nome" required><br>

                    <input class="campo" name="login" type="text" placeholder="Login" required><br>

                    <input class="campo" name="senha" type="password" placeholder="Senha" required><br>

                    <input class="campo" name="crm_num" type="text" placeholder="Número do CRM" required>
                    <select class="campo" name="crm_uf">
                        <option disabled="disabled" selected="selected" value="0">UF</option>
                        <option value="PA">PA</option>
                        <option value="MA">MA</option>
                        <option value="TO">TO</option>
                        <option value="SP">SP</option>
                        <option value="SC">SC</option>
                        <option value="RJ">RJ</option>
                        <option value="AP">AP</option>
                        <option value="BA">BA</option>
                        <option value="AM">AM</option>
                        <option value="DF">DF</option>
                        <option value="GO">GO</option>
                        <option value="MG">MG</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="AC">AC</option>
                        <option value="RO">RO</option>
                    </select>
                    <br/>

                    <input class="campo" name="espec" type="text" placeholder="Especialidade" required><br>

                    <br>
                    <input class="botao" type="submit" value="Cadastrar">
                </form>
            </fieldset>
        </ul>

        <footer></footer>
    </body>
</html>