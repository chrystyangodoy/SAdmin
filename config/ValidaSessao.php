<?php

if (!isset($_SESSION['ID_Usuario'])) {
    header("Location: Index.php");
    die();
}
