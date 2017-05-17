<?php

class AtestadoDAO {

    public function insert(Atestado $atest) {
        $db = new Database();
        $conn = $db->getConnection();

        if ($conn->begin_transaction()) {
            $sql = "INSERT INTO atestado (datahora, periodo_inicio, periodo_fim, paciente_id, medico_id, cid, observacoes) VALUES ('?', '?', '?', ?, ?, '?', '?')";

            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $datahora = date('Y-m-d H:i:s');

                //TODO
                $periodo_inicio = null;
                $periodo_fim = null;

                $paciente_id = $atest->getPaciente()->getId();
                $medico_id = $atest->getMedico()->getId();
                $cid = $atest->getCid();
                $observacoes = $atest->getObservacoes();

                $stmt->bind_param('sssiiss', $datahora, $periodo_inicio, $periodo_fim, $paciente_id, $medico_id, $cid, $observacoes);

                if ($stmt->execute() && !$this->mysqlConnection->connect_error && !$this->mysqlConnection->error) {
                    $stmt->close();
                    $stmt->commit();
                    return true;
                }
            }
        }
        return false;
    }

}
