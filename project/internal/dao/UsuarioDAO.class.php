<?php

class UsuarioDAO {

    public function login($login, $senhaMd5) {
        $result = false;

        try {
            $db = new Database();
            $conn = $db->getConnection();

            $sql = "SELECT id, nome, login, senha, tipo, medico_id FROM usuario WHERE login = '" . $login . "' AND senha='" . $senhaMd5 . "'";

            $result = $conn->query($sql);

            if ($result) {
                if ($row = mysqli_fetch_assoc($result)) {
                    if ($row['login'] == $login && $row['senha'] == $senhaMd5) {
                        $result = true;
                        $_SESSION['userid'] = $row['id'];
                        $_SESSION['usertipo'] = $row['tipo'];
                        $_SESSION['medico_id'] = $row['medico_id'];
                    }
                }
            }

            $conn->close();

            return $result;
        } catch (Exception $ex) {
            return false;
        }


        return false;
    }

}
