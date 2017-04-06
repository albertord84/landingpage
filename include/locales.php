<?php

namespace DUMBU;

// Lista de idiomas de DUMBU
$d_llist = [ 'en', 'pt' ];

// Global de el id de dos caracteres que identifica el idioma
// y que se pasa en la peticion como parametro. Por defecto es
// idioma portugues.
$d_l = $_REQUEST['l'];
if (!in_array($d_l, $d_llist)) {
  $d_l = 'pt';
}

// Esto luego se puede pasar a una BD o a archivos
// independientes por cada idioma
$d_locales = [
	'en' => [
		'lang' => 'EN - US',
		'h4-1' => 'Actual Instagram results updated!',
		'h4-2' => 'Check your account below:',
		'p-upper' => 'DUMBU is global!',
		'small1' => 'We have customers in more than 200 countries.',
		'small2' => 'Take advantage of one of the most growing Startups nowadays!',
		'center' => 'After checking your account will be redirected to your site',
		'frm_title' => 'Check your Instagram here',
		'lb_user' => 'Instagram user',
		'lb_email' => 'E-mail',
		'frm_bt' => 'Verify',
		'map_title' => 'Countries with Dumbu subscribers',
		'copy_r' => 'All rights reserved'
	],
	'pt' => [
		'lang' => 'PT - BR',
		'h4-1' => 'Resultados reais para seu Instagram!',
		'h4-2' => 'Analise sua conta abaixo:',
		'p-upper' => '&iexcl;DUMBU &eacute; global!',
		'small1' => 'Temos clientes em mais de 200 pa&iacute;ses.',
		'small2' => 'Fa&ccedil;a parte de uma das Startups que mais cresce nos ' . 
		            '&uacute;ltimos tempos!',
		'center' => 'Ap&oacute;s analisar sua conta voc&ecirc; ser&aacute; ' . 
		            'direcionado para o site',
		'frm_title' => 'Verifique seu instagram aqui',
		'lb_user' => 'Usu&aacute;rio do Instagram',
		'lb_email' => 'E-mail',
		'frm_bt' => 'Analisar',
		'map_title' => 'Pa&iacute;ses com assinantes Dumbu',
		'copy_r' => 'TODOS OS DIREITOS RESERVADOS'
	]
];

class I18N
{
	public static function dl() {
		return $GLOBALS['d_l'];
	}

	public static function getLangList() {
		return $GLOBALS['d_llist'];
	}

	public static function getLocaleList() {
		$localeList = [];
		foreach ($GLOBALS['d_locales'] as $key => $locale) {
			$localeList[ $key ] = $locale['lang'];
		}
		return $localeList;
	}

	public static function l($s_id) {
		$l = $GLOBALS['d_l'];
		echo $GLOBALS['d_locales'][ $l ][ $s_id ];
	}
}

