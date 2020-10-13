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
                <ul class="center">
                
                
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
                            
                                <h1 class="title">Código de autenticação</h1>

                                <input class="campoV" type="text" name="auth" id="auth" /><br>

                                <br>
                                <input type="submit" class="botao" value="Validar" />
                            </form>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </section>
            </ul>
        </div>
        <br><br><br>
        <?php
        include("./includes/footer.inc.php");
        ?>
    </body>
</html>
