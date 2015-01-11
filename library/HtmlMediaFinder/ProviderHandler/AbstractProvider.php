<?php

namespace HtmlMediaFinder\ProviderHandler;

/**
 * Abstract Provider Handler with usefull basic features
 * 
 * @author Cyberrebell
 */
abstract class AbstractProvider
{
	protected $videoUrl;
	
	function __construct($videoUrl) {
		$this->videoUrl = $videoUrl;
	}
	
	/**
	 * Curl the $url and get the elements matching the given $xpath
	 * @param string $url
	 * @param string $xpath
	 * @return DOMNodeList
	 */
	protected function remoteXpathQuery($url, $xpath, array $post = []) {
		if (count($post) > 0) {
			$cont = $this->postRequest($url, $post);
		} else {
			$cont = file_get_contents($url);
		}
		return $this->xpathQuery($cont, $xpath);
	}
	
	/**
	 * Get the elements matching the given $xpath
	 * @param string $html
	 * @param string $xpath
	 * @return DOMNodeList
	 */
	protected function xpathQuery($html, $xpath) {
		$ddoc = new \DOMDocument();
		@$ddoc->loadHTML($html);
		
		$dxpath = new \DOMXPath($ddoc);
		return $dxpath->query($xpath);
	}
	
	/**
	 * Get result string of post request
	 * @param string $url
	 * @param array $post
	 * @return string
	 */
	protected function postRequest($url, array $post) {
		$handle = curl_init($url);
		
		curl_setopt_array($handle, [
			CURLOPT_POST => count($post),
			CURLOPT_POSTFIELDS => http_build_query($post),
			CURLOPT_RETURNTRANSFER => 1
		]);
		
		$result = curl_exec($handle);
		curl_close($handle);
		
		return $result;
	}
}
