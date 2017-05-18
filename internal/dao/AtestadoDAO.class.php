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

    public function getAtestadoCodAut($codAutenticacao) {
        $return = null;
        try {
            $db = new Database();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM atestado WHERE cod_autenticacao = '" . $codAutenticacao . "'";

            $result = $conn->query($sql);

            if ($result && $row = mysqli_fetch_assoc($result)) {
                $atest = new Atestado();

                $atest->setPacNome($row['pac_nome']);
                $atest->setPacId($row['pac_id']);
                $atest->setPacEmail($row['pac_email']);
                $atest->setPacEndereco($row['pac_endereco']);
                $atest->setPacTelefone($row['pac_telefone']);
                $atest->setCid($row['cid']);

                $medico = new Medico();
                $medico->setId($row['medico_id']);
                $atest->setMedico($medico);

                $atest->setId($row['id']);
                $atest->setCodAutenticacao($row['cod_autenticacao']);

                $atest->setDatahora($row['datahora']);

                $return = $atest;
            }

            $conn->close();

            return $return;
        } catch (Exception $ex) {
            return null;
        }
        return null;
    }

}
