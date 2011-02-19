<?php

/**
 * roster actions.
 *
 * @package    edenapps
 * @subpackage roster
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class rosterActions extends sfActions
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
  	$this->plistData = array('dict' => array('key'=>'Rows','array'=>array()));
  	$rosterItems = Doctrine_Query::create()
  				 ->from('Roster r')
  				 ->where('r.member_id = ?', $request->getParameter('id'))
  				 ->execute()
  				 ->getLast();
  				 			 
  	$this->plistData['dict']['array'] = $this->buildPlistData($rosterItems);

	$rawXml =  $this->arrayToXml($this->plistData, new SimpleXMLElement('<wrapper/>'))->asXML();
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
  	$xml = str_replace('key3', 'key', $xml);
  	$xml = str_replace('key4', 'key', $xml);
  	$xml = str_replace('key5', 'key', $xml);
  	$xml = str_replace('key6', 'key', $xml);  	
  	$xml = str_replace('string0', 'string', $xml);
  	$xml = str_replace('string1', 'string', $xml);
  	$xml = str_replace('string2', 'string', $xml);  	
  	$xml = str_replace('string3', 'string', $xml);
  	$xml = str_replace('string4', 'string', $xml);
  	$xml = str_replace('string5', 'string', $xml);  	
  	$xml = str_replace('string6', 'string', $xml);  	

  	return $xmlPrefix . $xml . $xmlSuffix;
  }

  private function arrayToXml(array $arr, SimpleXMLElement $xml)
  {
	foreach ($arr as $k => $v) {
	  is_array($v) ? $this->arrayToXml($v, $xml->addChild($k)) : $xml->addChild($k, $v);
	}
    return $xml;
  }

  public function buildPlistData($item)
  {	
  	$plistData = array();
		$plistData[0]['dict'] = array(
					'key0' => 'Monday',
					'string0' => $item->getMonday(),
					'key1' => 'Tuesday',
					'string1' => $item->getTuesday(),
					'key2' => 'Wednesday',
					'string2' => $item->getWednesday(),
					'key3' => 'Thursday',
					'string3' => $item->getThursday(),
					'key4' => 'Friday',
					'string4' => $item->getFriday(),
					'key5' => 'Saturday',
					'string5' => $item->getSaturday(),
					'key6' => 'Sunday',
					'string6' => $item->getSunday()								
			);
  	return $plistData; 
  }
  
}
