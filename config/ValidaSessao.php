<?php

if ($_SESSION['ID_Usuario'] == null || $_SESSION['ID_Usuario'] == 0) {
    header("Location: Index.php");
    die();
}
