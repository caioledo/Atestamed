<?php

require_once ('./internal/classes/Database.class.php');
require_once ('./internal/classes/TipoUsuario.php');

require_once ('./internal/model/Atestado.class.php');
require_once ('./internal/model/Medico.class.php');
require_once ('./internal/model/Paciente.class.php');
require_once ('./internal/model/Usuario.class.php');

require_once ('./internal/dao/AtestadoDAO.class.php');


$medico = new Medico();
$medico->setId(1);

$paciente = new Paciente();
$paciente->setId(1);


$atest = new Atestado();

$atest->setMedico($medico);
$atest->setPaciente($paciente);
$atest->setCid("A123");
$atest->setObservacoes("ek3ek20909d32d");

$atDAO = new AtestadoDAO();
$atDAO->insert($atest);
?>