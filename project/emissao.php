<?php
session_start();
if (!isset($_SESSION['logado']) | boolval($_SESSION['logado']) != true) {
    header("Location: login.php");
}

require_once ('./internal/classes/Database.class.php');
require_once ('./internal/classes/TipoUsuario.php');

require_once ('./internal/model/Atestado.class.php');
require_once ('./internal/model/Medico.class.php');
require_once ('./internal/model/Paciente.class.php');
require_once ('./internal/model/Usuario.class.php');

require_once ('./internal/dao/AtestadoDAO.class.php');
require_once ('./internal/dao/MedicoDAO.class.php');
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
                                    <div style="background-color: #fff; border: #000 1px solid; width: 100%;">
                                            <h1 class="title">ATESTADO</h1>
                                            <div class="coluna col4">
                                                    <h1 class="title">Número: <?= str_pad($atestado->getId(), 4, '0', STR_PAD_LEFT) ?></h1>
                                        </div>

                                        <div class="linha2">
                                            <p style="margin: 0 10px">
                                                Atesto que <?= $atestado->getPacNome() ?>
                                                <?php
                                                if ($atestado->getPacId()) {
                                                    echo ", portador do documento de identidade número " . $atestado->getPacId() . " , ";
                                                }
                                                ?>
                                                esteve sob meus cuidados médicos em <?= $atestado->getDatahora() ?>
                                                <?php
                                                if (!empty($atestado->getPeriodoInicio()) && !empty($atestado->getPeriodoFim())) {
                                                    echo ", devendo ausentar-se de suas atividades no período de " . $atestado->getPeriodoInicio() . " a " . $atestado->getPeriodoFim() . ".";
                                                } else {
                                                    echo ".";
                                                }
                                                ?>
                                                <br/>
                                                <?php
                                                if ($atestado->getCid()) {
                                                    echo "CID: " . $atestado->getCid();
                                                }
                                                ?>
                                                <br/>
                                                Emissão: <?= date('d/m/Y H:i:s') ?>
                                            </p>
                                        </div>
<br/>
                                        <div class="linha2">
                                            <div class="coluna col4">
                                                <ul class="main inline sem-marcador">
                                                    <h1 class="title">Código de Autenticação:</h1>
                                                </ul>
                                            </div>

                                            <div class="coluna col5">
                                                <ul class="input-text">
                                                    <?= $atestado->getCodAutenticacao() ?>
                                                </ul>
                                            </div>

                                        </div>
                                        <br/>
                                        <?php
                                        $url = "http://localhost/atestamed/validar.php?auth=" . $atestado->getCodAutenticacao();
                                        ?>
                                        <img src="http://chart.apis.google.com/chart?cht=qr&chs=300x250&chl=<?= urlencode($url) ?>" alt="QRCode" title="QRCode" style="height: 100px; float: right;"/>

                                        <br/>
                                        <br/>
                                        <br/>

                                        <?php
                                        $medDao = new MedicoDAO();
                                        $medico = $medDao->getMedico($_SESSION['medico_id']);
                                        ?>

                                        <center>
                                            <br/>
                                            <?= $medico->getNome() ?>
                                            <br/>
                                            <?= "CRM-" . $medico->getCrmUf() . " " . $medico->getCrmNum() ?>
                                        </center>
                                    </div>
                                    <?php
                                } else {
                                    echo "Atestado não localizado";
                                }
                            } else {
                                ?>
                                <form action="emissao.php" method="GET">
                                
                                    <h1 class="title">Código de autenticação</h1>

                                    <input class="campoV" type="text" name="auth" id="auth" /><br>

                                    <br>
                                    <input type="submit" class="botao" value="Emitir Atestado" />
                                </form>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                </ul>
            </section>
        </div>
        <br><br><br>
        <?php
        include("./includes/footer.inc.php");
        ?>
    </body>
</html>
