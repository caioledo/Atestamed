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

    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
</head>

<body>
    <?php
    include("includes/header.inc.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
        if (isset($_POST['medico_id']) && isset($_POST['pac_nome']) && isset($_POST['pac_id'])) {
            $atestado = new Atestado();

            $atestado->setPacNome($_POST['pac_nome']);
            $atestado->setPacId($_POST['pac_id']);

            if (isset($_POST['datahora'])) {
                $atestado->setDatahora($_POST['datahora']);
            } else {
                $atestado->setDatahora(date('d/m/Y'));
            }

            if (isset($_POST['pac_endereco'])) {
                $atestado->setPacEndereco($_POST['pac_endereco']);
            }

            if (isset($_POST['pac_email'])) {
                $atestado->setPacEmail($_POST['pac_email']);
            }

            if (isset($_POST['pac_telefone'])) {
                $atestado->setPacTelefone($_POST['pac_telefone']);
            }


            if (isset($_POST['periodo_inicio']) && isset($_POST['periodo_fim'])) {
                $atestado->setPeriodoInicio($_POST['periodo_inicio']);
                $atestado->setPeriodoFim($_POST['periodo_fim']);
            }


            if(isset($_POST['cid'])){
                $atestado->setCid($_POST['cid']);
            }

            $medico = new Medico();
            $medico->setId(intval($_POST['medico_id']));

            $atestado->setMedico($medico);

            $atestado->gerarCodAutenticacao();

            $dao = new AtestadoDAO();
            if ($dao->insert($atestado)) {
                ?>
                <div class="linha3">
                    <div class="info2">
                        <h4><strong>Atestado gerado com sucesso</strong></h4>
                        <p>
                            Código de autenticação: <?= $atestado->getCodAutenticacao() ?>
                            <br/>
                            <a style="color:blue" href="emissao.php?auth=<?= $atestado->getCodAutenticacao() ?>">Imprimir Atestado</a>
                        </p>
                    </div>
                </div>
                <?php
            } else {
                echo "Erro ao gerar atestado";
            }
        } else {
            echo "Campos obrigatórios não preenchidos";
        }
    }
    ?>
    <section class="atest">
        <form class="formAtest" action="atestado.php" method="POST">
        <input type="hidden" name="medico_id" value="<?= $_SESSION['medico_id'] ?>"/>
           <div>
           <p>
               <?php
                        $medDao = new MedicoDAO();
                        $medico = $medDao->getMedico($_SESSION['medico_id']);
                        echo "Médico: " . $medico->getNome() . "  - CRM / " .$medico->getCrmUf(). ": ". $medico->getCrmNum();
                   ?>
                   </p>
            <fieldset class="dadosPac field1">

                <legend>Dados do Paciente</legend>
                <input class="campo" type="text" name="pac_nome" id="nome" placeholder="Nome *" required="required"></input>
                <br>
                <input class="campo" type="text" name="pac_id" id="identidade" placeholder="Identidade *" required="required"></input>
                <br>
                <input class="campo" name="pac_endereco" id="endereco" placeholder="Endereço" ></input>
                <br>
                <input class="campo" name="pac_email" id="email" placeholder="E-mail" ></input>
                <br>
                <input class="campo" type="text" name="pac_telefone" id="telefone" placeholder="Telefone" ></input>

            </fieldset>
            <fieldset class="dadosAtest field1">
                <legend>Dados do Atestado</legend>
                <input class="campo date" name="datahora" id="datahora" class="date" placeholder="Data da consulta *" required="required"></input>
                <br>
                <input class="campo date" type="text" name="periodo_inicio" id="periodo_inicio"  placeholder="Início do afastamento" ></input>
                <br>
                <input class="campo date" name="periodo_fim" id="periodo_fim" type="text" placeholder="Término do afastamento" ></input>
                <br>
                <input class="campo" type="text" name="cid" id="cid" placeholder="CID"></input>
                <br/>
            </fieldset>
        </div>
        <br/>
        <div style="margin-top: 250px; text-align: center;">
            <input type="submit" class="botao" value="Gerar Atestado" />
        </div>
    </form>
</section>

<?php
include("./includes/footer.inc.php");
?>

<script type="text/javascript">
    $(document).ready(function () {
        $('.date').mask('00/00/0000')
    });
</script>
</body>
</html>
