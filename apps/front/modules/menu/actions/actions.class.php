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
  	$this->plistData = array('dict'=>array('key'=>'rows','array'=>array()));
  	$menuItems = Doctrine_Query::create()
  				 ->from('MenuItem m')
  				 ->where('m.parent_id is NULL')
  				 ->execute();
  	$this->plistData['dict']['array'] = $this->buildPlistData($menuItems);
//  	echo '<pre>';
//  	print_r($this->plistData);
//  	echo '</pre>';
	echo $this->arrayToXml($this->plistData, new SimpleXMLElement('<plist/>'))->asXML();
  	exit;
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
				  					'string0' => $item->getTitle(),
				  					'key1' => 'Children',
				  					'array' => $this->buildPlistData($item->getChildren())		
	  		);
  		}
  		else
  		{
  			$plistData[$i]['dict'] = array(
	  					'key0' => 'Title',
	  					'string0' => $item->getTitle(),
	  					'key1' => 'ItemDesc',
	  					'string1' => $item->getDescription(),
  						'key2' => 'ItemPic',
  						'string2' => $item->getPicture()
	  			);
  		}
  	}
  	return $plistData; 
  }
}
