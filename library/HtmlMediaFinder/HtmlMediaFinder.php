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
		$toplevelDomain = parse_url($videoUrl);
		$toplevelDomain = $toplevelDomain['host'];
		
		if (!is_dir(__DIR__ . DIRECTORY_SEPARATOR . 'ProviderHandler' . DIRECTORY_SEPARATOR . $toplevelDomain)) {
			throw new \Exception('There is no special implementation for the provider ' . $toplevelDomain . '!');
		}
		
		require_once __DIR__ . DIRECTORY_SEPARATOR . 'ProviderHandler' . DIRECTORY_SEPARATOR . $toplevelDomain . DIRECTORY_SEPARATOR . 'Provider.php';
		$provider = new \Provider($videoUrl);
		return $provider->getDownloadUrl();
	}
}
