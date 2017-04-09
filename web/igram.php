<?php

$offline = empty(trim(exec("nslookup www.google.com 8.8.8.8")));

if ($offline) {
  // Devolver el JSON local de pruebas...
}
else {
  // Pedir el JSON a la API de Instagram...
}

?>