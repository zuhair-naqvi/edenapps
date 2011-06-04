<?php

/**
 * members actions.
 *
 * @package    edenapps
 * @subpackage members
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class membersActions extends sfActions
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
  	$member = Doctrine_Query::create()
  				 ->from('Members m')
  				 ->where('m.id = ?', $request->getParameter('id'))
  				 ->execute();
  	if($member->count() > 0)
  	{
  	  $member = $member->getFirst();
  	  $memberData = array(
    	          'dict' => array(
   	  					    'key0' => 'exists',
   	  					    'string0' => 'true',
   	  					    'key1' => 'name',
   	  					    'string1' => htmlspecialchars($member->getName()),
     						    'key2' => 'email',
     						    'string2' => $member->getEmail(),
     						    'key3' => 'level',
     						    'string3' => $member->getLevel()
     						)
   	  			);
  	}
  	else
  	{
  	  $memberData = array(
    	          'dict' => array(
   	  					    'key0' => 'exists',
   	  					    'string0' => 'false',
     						)
   	  			);
  	}
      	
	  $rawXml =  $this->arrayToXml($memberData, new SimpleXMLElement('<wrapper/>'))->asXML();
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
  	$xml = str_replace('string0', 'string', $xml);
  	$xml = str_replace('string1', 'string', $xml);
  	$xml = str_replace('string2', 'string', $xml);  	
    $xml = str_replace('string3', 'string', $xml);
  	return $xmlPrefix . $xml . $xmlSuffix;
  }

  private function arrayToXml(array $arr, SimpleXMLElement $xml)
  {
	foreach ($arr as $k => $v) {
	  is_array($v) ? $this->arrayToXml($v, $xml->addChild($k)) : $xml->addChild($k, $v);
	}
    return $xml;
  }

 public function executeBooking(sfWebRequest $request)
 {
 	$memberId= $request->getParameter('mid');
	$member = Doctrine_Query::create()
		  ->from('Members m')
		  ->where('m.id = ?', $memberId)
		  ->execute()
		  ->getFirst();

	echo $member->name;

	exit;
 } 
  
}
