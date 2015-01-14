<?php
namespace HtmlMediaFinder;

class RemoteXpathAdapterTest extends \PHPUnit_Framework_TestCase
{
    function testXpathQueryValid() {
    	$result = RemoteXpathAdapter::xpathQuery('<html><body><div></div><div></div></body></html>', '/html/body/div[2]');
        
    	$this->assertInstanceOf('\DOMNodeList', $result);
    	$this->assertEquals(1, $result->length);
    	$this->assertInstanceOf('\DOMNode', $result->item(0));
    	$this->assertEquals('div', $result->item(0)->localName);
    }
    
    function testXpathQueryOnNoHtml() {
    	$result = RemoteXpathAdapter::xpathQuery('Hallo Welt', '/html/body/div[2]');
    
    	$this->assertInstanceOf('\DOMNodeList', $result);
    	$this->assertEquals(0, $result->length);
    }
    
    function testPostRequestOnNotExistingPort() {
    	$result = RemoteXpathAdapter::postRequest('127.0.0.1:9998', ['username' => 'hans']);
    
    	$this->assertFalse($result);
    }
    
    function testRemoteXpathQueryOnNotExistingPort() {
    	$result = RemoteXpathAdapter::remoteXpathQuery('127.0.0.1:9998', '/html/body/div[2]', ['username' => 'hans']);

    	$this->assertInstanceOf('\DOMNodeList', $result);
    	$this->assertEquals(0, $result->length);
    }
    
    function testRemoteXpathQueryOnLocalFile() {
    	$result = RemoteXpathAdapter::remoteXpathQuery(__DIR__ . '/postRequest.html', '/html/head/title');

    	$this->assertInstanceOf('\DOMNodeList', $result);
    	$this->assertEquals(1, $result->length);
    	$this->assertInstanceOf('\DOMNode', $result->item(0));
    	$this->assertEquals('title', $result->item(0)->localName);
    }
}
