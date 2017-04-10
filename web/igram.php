<?php

$instagProf = isset(@$_REQUEST['instagProf']) || 
  !empty(@$_REQUEST['instagProf']) ? trim($_REQUEST['instagProf']) :
  FALSE;
$eMail = isset(@$_REQUEST['eMail']) || 
  !empty(@$_REQUEST['eMail']) ? trim($_REQUEST['eMail']) :
  FALSE;

// Averiguar si estamos en linea o desconectados
$cmd_output = `nslookup www.google.com`;
// Limpiar un poco la salida del comando ejecutado
$cleared_output = str_replace("  ", " ", strtolower(trim($cmd_output)));
// Si la respuesta contiene una de estas cadenas, estamos offline
$offline = strstr($cleared_output, "can't resolve") ||
  strstr($cleared_output, "connection timeout") ||
  strstr($cleared_output, "failed") ||
  strstr($cleared_output, "server: unknown");

if ($offline) {
  // Si estamos offline, devolver JSON local de pruebas...
  echo file_get_contents('../include/instagram_api_response.json');
}
else {
  // Si estamos en linea, pedir JSON a la API de Instagram...
  $User = NULL;
  if ($instagProf != "") {
    $ch = curl_init("https://www.instagram.com/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_POST, FALSE);
    curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/web/search/topsearch/?context=blended&query=$instagProf");
    $html = curl_exec($ch);
    $content = json_decode($html);
    curl_close($ch);
    if (is_object($content) && $content->status === 'ok') {
      $users = $content->users;
      if (is_array($users)) {
        for ($i = 0; $i < count($users); $i++) {
          if ($users[$i]->user->username === $instagProf) {
            $User = $users[$i]->user;
            break;
          }
        }
        echo json_encode($User);
      }
    } else {
      $error = new \stdClass();
      $error->message = 'No such user or connection error.';
      echo json_encode($error);
    }
  }
}

?>