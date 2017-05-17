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

        if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
            if (true) {
                $atestado = new Atestado();

                $atestado->setPacNome($_POST['pac_nome']);
                $atestado->setPacId($_POST['pac_id']);
                $atestado->setPacEndereco($_POST['pac_endereco']);
                $atestado->setPacEmail($_POST['pac_email']);
                $atestado->setPacTelefone($_POST['pac_telefone']);

                $medico = new Medico();
                $medico->setId(1);

                $atestado->setMedico($medico);

                $atestado->gerarCodAutenticacao();

                $dao = new AtestadoDAO();
                if ($dao->insert($atestado)) {
                    ?>
                    <div>
                        <strong>Atestado gerado com sucesso</strong>
                        <br/>
                        Código de autenticação: <?= $atestado->getCodAutenticacao() ?>
                        <br/>
                        <a href="emissao.php?auth=<?= $atestado->getCodAutenticacao() ?>">Imprimir Atestado</a>
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
        <div class="linha3">
            <form action="atestado.php" method="POST">
                <section>
                    <div class="tab">
                        <div class="linha3">
                            <div class="linha2">
                                <div class="coluna col4">
                                    <ul class="main inline sem-marcador">
                                        <h1 class="info">Médico</h1>
                                    </ul>
                                </div>

                                <div class="coluna col5">
                                    <ul class="input-text">
                                        <select name="medico_id">
                                            <option value="0" disabled="disabled">Selecione</option>
                                            <option value="1" selected="selected">Medico de teste</option>
                                        </select>
                                    </ul>
                                </div>
                            </div>

                            <div class="linha2">
                                <div class="coluna col12">
                                    <ul class="title-margin">
                                        <h1 class="title">Dados do Paciente</h1>
                                    </ul>
                                </div>
                            </div>

                            <div class="linha2">
                                <div class="coluna col4">
                                    <ul class="main inline sem-marcador">
                                        <h1 class="info">Nome</h1>
                                    </ul>
                                </div>

                                <div class="coluna col5">
                                    <ul class="input-text">
                                        <input type="text" name="pac_nome" id="nome" />
                                    </ul>
                                </div>
                            </div>

                            <div class="linha2">
                                <div class="coluna col4">
                                    <ul class="main inline sem-marcador">
                                        <h1 class="info">Identidade</h1>
                                    </ul>
                                </div>

                                <div class="coluna col5">
                                    <ul class="input-text">
                                        <input type="text" name="pac_id" id="nome" />
                                    </ul>
                                </div>
                            </div>

                            <div class="linha2">
                                <div class="coluna col4">
                                    <ul class="main inline sem-marcador">
                                        <h1 class="info">Endereço</h1>
                                    </ul>
                                </div>

                                <div class="coluna col5">
                                    <ul class="input-text">
                                        <input type="text" name="pac_endereco" id="endr" />
                                    </ul>
                                </div>
                            </div>

                            <div class="linha2">
                                <div class="coluna col4">
                                    <ul class="main inline sem-marcador">
                                        <h1 class="info">Email</h1>
                                    </ul>
                                </div>

                                <div class="coluna col5">
                                    <ul class="input-text">
                                        <input type="text" name="pac_email" id="email" />
                                    </ul>
                                </div>
                            </div>

                            <div class="linha2">
                                <div class="coluna col4">
                                    <ul class="main inline sem-marcador">
                                        <h1 class="info">Telefone</h1>
                                    </ul>
                                </div>

                                <div class="coluna col5">
                                    <ul class="input-text">
                                        <input type="text" name="pac_telefone" id="tel" />
                                    </ul>
                                </div>
                            </div>


                            <div class="linha2">
                                <div class="coluna col12">
                                    <ul class="title-margin">
                                        <h1 class="title">Dados do Atestado</h1>
                                    </ul>
                                </div>
                            </div>


                            <div class="linha2">
                                <div class="coluna col4">
                                    <ul class="main inline sem-marcador">
                                        <h1 class="info">Data e horário da consulta/procedimento</h1>
                                    </ul>
                                </div>

                                <div class="coluna col5">
                                    <ul class="input-text">
                                        <input type="text" name="data" id="dataconsulta" placeholder="DD/MM/YYYY" />
                                    </ul>
                                    <ul class="input-text">
                                        <input type="text" name="hora_inicio" id="hora_inicio" placeholder="HH:MM"/>
                                        a 
                                        <input type="text" name="hora_fim" id="hora_fim" placeholder="HH:MM" />
                                    </ul>
                                </div>
                            </div>


                            <div class="linha2">
                                <div class="coluna col4">
                                    <ul class="main inline sem-marcador">
                                        <h1 class="info">Período de afastamento</h1>
                                    </ul>
                                </div>

                                <div class="coluna col5">
                                    <ul class="input-text">
                                        <input type="text" name="periodo_inicio" id="periodo_inicio" placeholder="DD/MM/YYYY" />
                                        a 
                                        <input type="text" name="periodo_fim" id="periodo_fim" placeholder="DD/MM/YYYY" />
                                    </ul>
                                </div>
                            </div>

                            <div class="linha2">
                                <div class="coluna col4">
                                    <ul class="main inline sem-marcador">
                                        <h1 class="info">CID</h1>
                                    </ul>
                                </div>

                                <div class="coluna col5">
                                    <ul class="input-text">
                                        <input type="text" name="cid" id="cid" />
                                    </ul>
                                </div>
                            </div>

                            <div class="linha2">
                                <div class="coluna col6">
                                    <ul class="button-margin-right">
                                        <input type="submit" class="botao" value="Gerar Atestado" />
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>

        <div class="footer">
            <div class="linha2">
                <footer>
                    <div class="coluna col12">
                        <span>&copy; 2017 - Cesupa</span>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
