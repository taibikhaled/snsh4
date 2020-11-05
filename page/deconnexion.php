<?php
        
//setcookie("id_user", null, time() - 3600, '/' , '', false , true);

setcookie("id_user", null, time() - 1, '/' , '', false , true);

header('location: ../index.php');
exit();
        
?> 