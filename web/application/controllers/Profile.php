<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		echo 'Ok';
	}

	public function offline() {
		$this->output
	        ->set_content_type('application/json')
	        ->set_output(file_get_contents('assets/instagram_api_response.json'));
	}

	public function check() {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);

		$this->load->helper('url');

		$local_ip = strstr($_SERVER['REMOTE_ADDR'], "127.") ? TRUE : FALSE;

		$instagProf = trim( $request->instagProf );
		$eMail = trim( $request->eMail );

		// Averiguar si estamos en linea o desconectados
		$cmd_output = shell_exec("nslookup www.google.com 8.8.8.8");
		// Limpiar un poco la salida del comando ejecutado
		$cleared_output = str_replace("  ", " ", strtolower(trim($cmd_output)));

		// Si la respuesta contiene una de estas cadenas, estamos offline
		$offline = strstr($cleared_output, "can't resolve") ||
		strstr($cleared_output, "connection time") ||
		strstr($cleared_output, "failed") ||
		strstr($cleared_output, "server: unknown") ? TRUE : FALSE;

		if ($offline || $local_ip) {
		  	// Si estamos offline, devolver JSON local de pruebas...
			echo file_get_contents('assets/instagram_api_response.json');
			exit();
		}
		else {
		  	// Si estamos en linea, pedir JSON a la API de Instagram...
			$User = NULL;
			if ($instagProf) {
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
					$error->r = $content;
					echo json_encode($error);
				}
			}
			else {
				$error = new \stdClass();
				$error->message = 'Empty parameters received.';
				echo json_encode($error);
			}
		}
	}
}
