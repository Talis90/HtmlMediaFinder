<?php

namespace HtmlMediaFinder;

/**
 * Get the download url of a video url
 * 
 * @author Talis90
 */
class HtmlMediaFinder
{
	/**
	 * Get the download url of a video url
	 * @param string $videoUrl
	 * @return string
	 */
	static function getDownloadUrl($videoUrl) {
		$toplevelDomain = 'streamcloud.eu';
		
		if (!is_dir(__FILE__ . 'library/HtmlMediaFinder/ProviderHandler/' . $toplevelDomain)) {
			throw new \Exception('There is no special implementation for the provider ' . $toplevelDomain . '!');
		}
		
		require_once __FILE__ . 'library/HtmlMediaFinder/ProviderHandler/' . $toplevelDomain . '/Provider.php';
		$provider = new \Provider($videoUrl);
		return $provider->getDownloadUrl();
	}
}
