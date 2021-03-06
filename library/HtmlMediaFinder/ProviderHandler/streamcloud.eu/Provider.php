<?php

use HtmlMediaFinder\ProviderHandler\AbstractProvider;

/**
 * Handler to get the download url for streamcloud.eu
 * 
 * @author Cyberrebell
 */
class Provider extends AbstractProvider
{
	/**
	 * Special provider implementation
	 * @return string
	 */
	function getDownloadUrl() {
		$inputs = self::remoteXpathQuery($this->videoUrl, '/html/body/div[3]/div[2]/div[2]/div[7]/form/input[@name]');
		
		$postFields = [];
		foreach ($inputs as $input) {
			$postFields[$input->getAttribute('name')] = $input->getAttribute('value');
		}
		
		sleep(11);	//10 sek wait-time is required
		$scriptElements = self::remoteXpathQuery($this->videoUrl, '/html/body/div[3]/div[2]/div[2]/div[1]/script[3]', $postFields);
		
		$textContent = $scriptElements->item(0)->textContent;
		preg_match('/file: ".*\..*"/U', $textContent, $matches);
		$url = substr(reset($matches), 6);
		return trim($url, '"');
	}
}
