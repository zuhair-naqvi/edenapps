<?php

/**
 * box actions.
 *
 * @package    edenapps
 * @subpackage box
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class boxActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
    public function executePlist(sfWebRequest $request)
    {  	
    	$box = Doctrine_Query::create()
    				 ->from('Box b')
    				 ->execute()
    				 ->getFirst();
    	$boxData = array(
    	          'dict' => array(
   	  					    'key0' => 'title',
   	  					    'string0' => htmlspecialchars($box->getTitle()),
   	  					    'key1' => 'description',
   	  					    'string1' => htmlspecialchars($box->getDescription()),
     						    'key2' => 'picture',
     						    'string2' => 'uploads/images/box/'.$box->getPicture()
     						)
   	  			);
  	  $rawXml =  $this->arrayToXml($boxData, new SimpleXMLElement('<wrapper/>'))->asXML();
  	  $plistXml = $this->xmlToPlist($rawXml);

  	  $this->getResponse()->setContentType('text/xml');	
  	  echo $plistXml;
    	exit;
    }

    private function xmlToPlist($xml)
    {
    	$xmlPrefix =<<<EOD
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
EOD;
  	$xmlSuffix = "</plist>";
  	$xml = str_replace('<?xml version="1.0"?>', '', $xml);
  	$xml = preg_replace("/<wrapper>/","",$xml);
  	$xml = preg_replace("/<\/wrapper>/","",$xml);
    	$xml = preg_replace("/<\d>/","",$xml);
    	$xml = preg_replace("/<\/\d>/","",$xml);
    	$xml = str_replace('key0', 'key', $xml);
    	$xml = str_replace('key1', 'key', $xml);
    	$xml = str_replace('key2', 'key', $xml);
    	$xml = str_replace('string0', 'string', $xml);
    	$xml = str_replace('string1', 'string', $xml);
    	$xml = str_replace('string2', 'string', $xml);  	

    	return $xmlPrefix . $xml . $xmlSuffix;
    }

    private function arrayToXml(array $arr, SimpleXMLElement $xml)
    {
  	foreach ($arr as $k => $v) {
  	  is_array($v) ? $this->arrayToXml($v, $xml->addChild($k)) : $xml->addChild($k, $v);
  	}
      return $xml;
    }
}
