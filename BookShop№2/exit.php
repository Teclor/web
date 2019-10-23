<?php
setcookie('id', $data['id'], time()-3600, "/");
//setcookie('hash', $hash, time()-3600, "/");
header('Location: cabinet.php');
?>