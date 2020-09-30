<?php

session_start();
if (isset($_SESSION['logado']) && boolval($_SESSION['logado']) == true) {
    //mostrar painel
    header("Location: atestado.php");
} else {
    //mostrar login
    header("Location: login.php");
}
?>