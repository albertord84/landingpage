<?php

$_llist = [ 'en', 'pt' ];

$_locales = [
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

$_dd_llist = [];
foreach ($_locales as $key => $locale) {
	$_dd_llist[ $key ] = $locale['lang'];
}

?>