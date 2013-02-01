<?php
  if (getenv("ENABLE_SYSTEM_ACCESS") != "true") {
    header("HTTP/1.0 403 Forbidden");
    exit();
  }

  if (getenv("SYSTEM_USERNAME") == "" || getenv("SYSTEM_PASSWORD") == "") {
    header("HTTP/1.0 403 Forbidden");
    exit();
  }

  if ($_SERVER["PHP_AUTH_USER"] == getenv("SYSTEM_USERNAME") &&
      $_SERVER["PHP_AUTH_PW"] == getenv("SYSTEM_PASSWORD")) {
    phpinfo();
  } else {
    header("WWW-Authenticate: Basic realm='System access'");
    header("HTTP/1.0 401 Unauthorized");
    print "Access denied!\n";
  }
?>