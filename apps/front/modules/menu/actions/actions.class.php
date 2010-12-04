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
  				 ->execute();
  	$this->plistData['dict']['array'] = $this->buildPlistData($menuItems);
  	echo '<pre>';
  	print_r($this->plistData);
  	echo '</pre>';
  }
  
  public function buildPlistData(Doctrine_Collection $menuItems)
  {	
  	$plistData = array();
	foreach ($menuItems as $i => $item)
  	{
  		if($item->getChildren()->count() > 0)
  		{
	  		$plistData = array(
	  			'dict' => array(
	  					'key' => 'Title',
	  					'string' => $item->getTitle(),
	  					'key' => 'Children',
	  					'array' => $this->buildPlistData($item->getChildren())
	  			)	  			
	  		);
  		}
  		else
  		{
  			$plistData = array(
	  			'dict' => array(
	  					'key' => 'Title',
	  					'string' => $item->getTitle(),
	  					'key' => 'ItemDesc',
	  					'string' => $item->getDescription(),
  						'key' => 'ItemPic',
  						'string' => $item->getPicture()
	  			)	  			
	  		);
  		}
  	}
  	return $plistData; 
  }
}
