<?php

/**
 * menu actions.
 *
 * @package    edenapps
 * @subpackage menu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
	
  private $plistData;
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executePlist(sfWebRequest $request)
  {  	
  	$this->plistData = array('key'=>'rows','array'=>array());
  	$menuItems = Doctrine_Query::create()
  				 ->from('MenuItem m')
  				 ->where('m.parent_id is NULL')
  				 ->execute();
  	$this->plistData['array'] = $this->buildPlistData($menuItems);
//  	echo '<pre>';
//  	print_r($this->plistData);
//  	echo '</pre>';
	$rawXml =  $this->arrayToXml($this->plistData, new SimpleXMLElement('<dict/>'))->asXML();
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
  
  public function buildPlistData(Doctrine_Collection $menuItems)
  {	
  	$plistData = array();
	foreach ($menuItems as $i => $item)
  	{
  		if($item->getChildren()->count() > 0)
  		{
	  		$plistData[$i]['dict'] = array(
				  					'key0' => 'Title',
				  					'string0' => htmlspecialchars($item->getTitle()),
				  					'key1' => 'Children',
				  					'array' => $this->buildPlistData($item->getChildren())		
	  		);
  		}
  		else
  		{
  			$plistData[$i]['dict'] = array(
	  					'key0' => 'Title',
	  					'string0' => htmlspecialchars($item->getTitle()),
	  					'key1' => 'ItemDesc',
	  					'string1' => htmlspecialchars($item->getDescription()),
  						'key2' => 'ItemPic',
  						'string2' => $item->getPicture()
	  			);
  		}
  	}
  	return $plistData; 
  }
}
