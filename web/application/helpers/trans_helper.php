<?php

// Lista de idiomas de DUMBU
$GLOBALS['d_llist'] = [ 'en', 'pt', 'es' ];

// Esto luego se puede pasar a una BD o a archivos
// independientes por cada idioma
$GLOBALS['d_locales'] = [
	'en' => [
		'lang' => 'EN - US',
		'h4-1' => 'Actual Instagram results updated!',
		'h4-2' => 'Check your account below:',
		'p-upper' => 'DUMBU is global!',
		'small1' => 'We have customers in more than 200 countries.',
		'small2' => 'Take advantage of one of the most growing Startups nowadays!',
		'center' => 'After checking your account will be redirected',
		'frm_title' => 'Check your Instagram here',
		'lb_user' => 'Instagram user',
		'lb_email' => 'E-mail',
		'frm_bt' => 'Verify',
		'frm_bt2' => 'Go to website',
		'map_title' => 'Countries with Dumbu subscribers',
		'copy_r' => 'All rights reserved'
	],
	'pt' => [
		'lang' => 'PT - BR',
		'h4-1' => 'Resultados reais para seu Instagram!',
		'h4-2' => 'Analise sua conta abaixo:',
		'p-upper' => 'DUMBU &eacute; global!',
		'small1' => 'Temos clientes em mais de 200 pa&iacute;ses.',
		'small2' => 'Fa&ccedil;a parte de uma das Startups que mais cresce nos ' . 
		            '&uacute;ltimos tempos!',
		'center' => 'Ap&oacute;s analisar sua conta voc&ecirc; ser&aacute; ' . 
		            'direcionado para o site',
		'frm_title' => 'Verifique seu Instagram aqui',
		'lb_user' => 'Usu&aacute;rio do Instagram',
		'lb_email' => 'E-mail',
		'frm_bt' => 'Analisar',
		'frm_bt2' => 'Ir para o site',
		'map_title' => 'Pa&iacute;ses com assinantes Dumbu',
		'copy_r' => 'TODOS OS DIREITOS RESERVADOS'
    ],
	'es' => [
		'lang' => 'ES - ES',
		'h4-1' => '&iexcl;Resultados reales para tu Instagram!',
		'h4-2' => 'Verifique su cuenta abajo:',
		'p-upper' => '&iexcl;DUMBU es global!',
		'small1' => 'Tenemos clientes en m&aacute;s de 200 pa&iacute;ses.',
		'small2' => '&iexcl;Hazte participante de uno de los Startups m&aacute;s crecientes de ' . 
		            'estos tiempos!',
		'center' => 'Al verificar su cuenta ser&aacute; redirigido ' . 
		            'a su sitio',
		'frm_title' => 'Verifica tu Instagram aqu&iacute;',
		'lb_user' => 'Usuario de Instagram',
		'lb_email' => 'E-mail',
		'frm_bt' => 'Verificar',
		'frm_bt2' => 'Ir al sitio',
		'map_title' => 'Pa&iacute;ses con clientes Dumbu',
		'copy_r' => 'TODOS LOS DERECHOS RESERVADOS'
	]
];

function d_get_locale($locale) {
	if ( ! in_array($locale, $GLOBALS['d_llist']) ) {
	  return $GLOBALS['d_locales']['pt'];
	}
	return $GLOBALS['d_locales'][ $locale ];
}

function d_get_locale_list() {
	$list = [];
	foreach ($GLOBALS['d_locales'] as $key => $locale) {
		$list[ $key ] = $locale[ 'lang' ];
	}
	return $list;
}

