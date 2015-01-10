<?php

/**
 * Get media files download url by given html source code (same as download helper)
 * 
 * @author Talis90
 */
class HtmlMediaFinder
{
	protected $config;
	
	/**
	 * @param array $config Provider Configuration
	 */
	function __construct(array $config) {
		$this->config = $config;
	}
	
	/**
	 * Find the downloadable media file in html source file
	 * 
	 * @param string $provider Provider name like given in config
	 * @param string $htmlSource
	 * @return string downloadable url
	 */
	function getDownloadUrl($provider, $htmlSource) {
		$ddoc = new DOMDocument();
		$ddoc->loadHTML($htmlSource);
		
		$dxpath = new DOMXPath($ddoc);
		$elements = $dxpath->query($this->config[$provider]['xpath']);
		
		$downloadUrl = $this->config[$provider]['getUrl']($elements);
		return $downloadUrl;
	}
}
