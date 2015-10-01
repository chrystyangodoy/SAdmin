<?php

if ($_SESSION['ID_Usuario'] == null || $_SESSION['ID_Usuario'] == 0 || !isset($_SESSION['ID_Usuario'])) {
    header("Location: Index.php");
    die();
}
