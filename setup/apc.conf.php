<?php
  defaults('USE_AUTHENTICATION', 0);

  if (getenv('ENABLE_APC') != 'true') {
    header('HTTP/1.0 403 Forbidden');
    exit();
  }
?>