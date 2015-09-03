<?php
 session_start();
 echo 'Welcome '.$_SESSION['username'];
?>


<?php
 session_start();
 session_destroy();
 header("location:index.php");
 exit;
?>