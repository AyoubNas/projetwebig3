<?php

setcookie('id',null,time()-1,null, null, false, true);
header('Location: login.php');
?>