<?php
if (!isset($_SESSION)) {
    session_start();
}

session_destroy();

header("Location: ../../html/2pagina-Login.html");
?>