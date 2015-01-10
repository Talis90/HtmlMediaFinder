<?php
/**
 * provider configuration
 */
return [
	'streamcloud.eu' => [
		'xpath' => '/html/body/div[3]/div[2]/div[2]/div[1]/script[3]',
		'getUrl' => function(DOMNodeList $elements){
			$textContent = $elements->item(0)->textContent;
			preg_match('/".*\.mp4"/U', $textContent, $matches);
			return trim(reset($matches), '"');
		}
	]
];
