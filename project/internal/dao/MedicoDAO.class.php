<?php

class MedicoDAO {

    public function getMedicos() {
        $medicos = null;
        try {
            $db = new Database();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM medico ORDER BY nome ASC";

            $result = $conn->query($sql);

            if ($result) {
                $medicos = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $med = new Medico();

                    $med->setId($row['id']);
                    $med->setNome($row['nome']);
                    $med->setCrmNum($row['crm_num']);
                    $med->setCrmUf($row['crm_uf']);
                    $med->setEspecialidade($row['especialidade']);

                    $medicos[] = $med;
                }
            }

            $conn->close();

            return $medicos;
        } catch (Exception $ex) {
            return null;
        }
        return null;
    }

    public function getMedico($id) {
        $med = null;
        try {
            $db = new Database();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM medico WHERE id=" . $id;
            $result = $conn->query($sql);

            if ($result) {
                if ($row = mysqli_fetch_assoc($result)) {
                    $med = new Medico();

                    $med->setId($row['id']);
                    $med->setNome($row['nome']);
                    $med->setCrmNum($row['crm_num']);
                    $med->setCrmUf($row['crm_uf']);
                    $med->setEspecialidade($row['especialidade']);
                }
            }

            $conn->close();

            return $med;
        } catch (Exception $ex) {
            return null;
        }
        return null;
    }

    public function cadastrarMedicoUsuario(Medico $medico, Usuario $usuario) {

        try {
            $db = new Database();
            $conn = $db->getConnection();

            $sql = "INSERT INTO medico (nome, crm_uf, crm_num, especialidade) VALUES ('" . $medico->getNome() . "', '" . $medico->getCrmUf() . "', " . intval($medico->getCrmNum()) . ", '" . $medico->getEspecialidade() . "')";
            $conn->query($sql);

            $sql = "INSERT INTO usuario (nome, login, senha, tipo, medico_id) VALUES ('" . $usuario->getNome() . "', '" . $usuario->getLogin() . "', '" . $usuario->getSenha() . "', " . TipoUsuario::MEDICO . ", (SELECT id FROM medico WHERE crm_uf='" . $medico->getCrmUf() . "' AND crm_num=" . $medico->getCrmNum() . "))";
            $conn->query($sql);

            $conn->close();
            return true;
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

}
