<html>
<head>
<title>Upload</title>
</head>
 
<body>
<h4>Upload de arquivos.</h4>
<?php

include ("class.upload.php");

$myUpload = new Upload($_FILES["arquivo"]);

$verificar = $myUpload->makeUpload();


?>
</body>
</html>
 