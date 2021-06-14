<?php
setcookie( "jwt", "",time()-3600000 ,httponly:true );
header("Location: http://localhost/testingWeb/html+php/index.php");
?>