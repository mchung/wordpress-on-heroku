<?php #unset($_COOKIE["OptimizePress_LastPage"]);
/*
*/
#$cookie_expiry=time()+60*60*24*30;
#setcookie("OptimizePressLastPage", 850, $cookie_expiry);
#setcookie("OptimizePressLastPage", "750", $cookie_expiry, '/', 'hozyali');
echo $_COOKIE["OptPressSqueeze"]."<br />";
echo $_COOKIE["OptimizePressLastPage"];

?>