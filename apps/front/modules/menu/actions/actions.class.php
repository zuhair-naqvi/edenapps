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
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executePlist(sfWebRequest $request)
  {  	
  	$menuItems = Doctrine_Query::create()
  				 ->from('MenuItem m')
  				 ->execute();
  	$plistData = $this->buildPlistData($menuItems);
  	echo '<pre>';
  	print_r($plistData);
  	echo '</pre>';
  }
  
  public function buildPlistData(Doctrine_Collection $menuItems)
  {
	$plistData = array('dict'=>array('key'=>'rows','array'=>array()));
  	
	foreach ($menuItems as $i => $item)
  	{
  		if($item->getChildren()->count() > 0)
  		{
	  		$plistData['dict']['array'] = array(
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
