<?php

namespace HtmlMediaFinder\ProviderHandler;

use HtmlMediaFinder\RemoteXpathAdapter;

/**
 * Abstract Provider Handler with usefull basic features
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
