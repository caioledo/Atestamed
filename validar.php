<?php
require_once ('./internal/classes/Database.class.php');
require_once ('./internal/classes/TipoUsuario.php');

require_once ('./internal/model/Atestado.class.php');
require_once ('./internal/model/Medico.class.php');
require_once ('./internal/model/Paciente.class.php');
require_once ('./internal/model/Usuario.class.php');

require_once ('./internal/dao/AtestadoDAO.class.php');
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
        <?php
        include("includes/header.inc.php");
        ?>
        <div class="linha3">
            <section>
                <div class="tab">


                    <div class="linha3">
                        <?php
                        if (isset($_GET['auth']) && !empty($_GET['auth'])) {
                            $dao = new AtestadoDAO();
                            $atestado = $dao->getAtestadoCodAut($_GET['auth']);
                            if ($atestado && $atestado->getCodAutenticacao()) {
                                ?>
                                <p>
                                    Atestado válido emitido em <?= $atestado->getDatahora() ?>.<br/>
                                    Paciente: <?= $atestado->getPacNome() ?></br>
                                    <a href="emissao.php?auth=<?= $_GET['auth'] ?>">Visualizar atestado</a>
                                </p>
                                <?php
                            } else {
                                echo "Atestado não localizado";
                            }
                        } else {
                            ?>
                            <form action="validar.php" method="GET">
                                <div class="linha2">
                                    <div class="coluna col4">
                                        <ul class="main inline sem-marcador">
                                            <h1 class="info">Código de autenticação:</h1>
                                        </ul>
                                    </div>

                                    <div class="coluna col5">
                                        <ul class="input-text">
                                            <input type="text" name="auth" id="auth" />
                                        </ul>
                                    </div>
                                </div>
                                <div class="linha2">
                                    <div class="coluna col6">
                                        <ul class="button-margin-right">
                                            <input type="submit" class="botao" value="Validar" />
                                        </ul>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </section>
        </div>

        <?php
        include("./includes/footer.inc.php");
        ?>
    </body>
</html>
