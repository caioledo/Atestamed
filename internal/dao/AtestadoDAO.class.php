<?php

class AtestadoDAO {

    public function insert(Atestado $atest) {
        try {
            $db = new Database();
            $conn = $db->getConnection();

            $sql = "INSERT INTO atestado (datahora, periodo_inicio, periodo_fim, medico_id, pac_nome, pac_id, pac_endereco, pac_email, pac_telefone, cid, observacoes, cod_autenticacao) "
                    . "VALUES (NULL, NULL, NULL, " . $atest->getMedico()->getId() . ", '" . $atest->getPacNome() . "', '" . $atest->getPacId() . "', '" . $atest->getPacEndereco() . "', '" . $atest->getPacEmail() . "', '" . $atest->getPacTelefone() . "', '" . $atest->getCid() . "', '" . $atest->getObservacoes() . "', '" . $atest->getCodAutenticacao() . "')";

            $conn->query($sql);
            $conn->close();
            if ($conn->connect_error || $conn->error) {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }

}
