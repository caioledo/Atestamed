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

}
