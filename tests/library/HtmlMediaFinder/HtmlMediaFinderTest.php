<?php
namespace HtmlMediaFinder;

class HtmlMediaFinderTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * takes 11 sec
	 */
    function testgetDownloadUrl() {
    	$result = HtmlMediaFinder::getDownloadUrl(base64_decode('aHR0cDovL3N0cmVhbWNsb3VkLmV1L29wYjhxaXZxamYxdC9TMDFFMDFfRXNfd2VpaG5hY2h0ZXRfc2Nod2VyX19CQl8uYXZp'));
    	
    	$this->assertTrue(strlen($result) > 0);
    }
    
    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage There is no special implementation for the provider wikipedia.org!
     */
    function testgetDownloadUrlOnNotExistingProvider() {
    	HtmlMediaFinder::getDownloadUrl('http://wikipedia.org/');
    }
}
