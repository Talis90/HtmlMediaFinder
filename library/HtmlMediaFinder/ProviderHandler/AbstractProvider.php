<?php

namespace HtmlMediaFinder\ProviderHandler;

use HtmlMediaFinder\RemoteXpathAdapter;

/**
 * Abstract Provider Handler with useful basic features
 * 
 * @author Cyberrebell
 */
abstract class AbstractProvider extends RemoteXpathAdapter
{
	protected $videoUrl;
	
	function __construct($videoUrl) {
		$this->videoUrl = $videoUrl;
	}
}
