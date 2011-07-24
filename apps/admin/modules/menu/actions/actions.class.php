<?php

require_once dirname(__FILE__).'/../lib/menuGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/menuGeneratorHelper.class.php';

/**
 * menu actions.
 *
 * @package    edenapps
 * @subpackage menu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuActions extends autoMenuActions
{
    public function executeImport(sfWebRequest $request)
    {        
        $this->form = new ImportsForm();
        $this->menu_item = $this->form->getObject();
        if($request->isMethod('post'))
        {            
            $files = $request->getFiles($this->form->getName());
            $this->form->bind($request->getParameter($this->form->getName()), $files);
            if($this->form->isValid())
            {
                $this->form->save();
                include(sfConfig::get('sf_root_dir').'/lib/vendor/csv/DataSource.php');
                $csv = new File_CSV_DataSource();
                $csv->load(sfConfig::get('sf_upload_dir').'/data/menu/' . $this->form->getObject()->getDatafile());
                $csvMenuItems = $csv->connect();
                $menuMapping = array();
                foreach ($csvMenuItems as $item)
                {
                    $menuItem = new MenuItem();                    
                    $menuItem->setName($item['name']);
                    $menuItem->setTitle($item['title']);
                    $menuItem->setDescription($item['description']);
                    $menuItem->setPseudoId($item['id']);
                    if(is_numeric($item['parent_id']))
                    {
                        $menuItem->setPseudoParentId($item['parent_id']);
                    }
                    $menuItem->save();
                    $menuMapping []= array('pk'=>$menuItem['id'], 'pi'=>$item['id']);
                }
                foreach ($csvMenuItems as $item)
                {
                    $itemsToMap = Doctrine::getTable('MenuItem')->findByPseudoParentId($item['id']);
                    
                    $parent = Doctrine_Query::create()
                              ->from('MenuItem m')
                              ->where('m.pseudo_id = ?', $item['id'])
                              ->execute()
                              ->getFirst();
                    
                    foreach ($itemsToMap as $itemToMap)
                    {                    
                        $itemToMap->setParent($parent);
                        $itemToMap->save();
                    }
                }
                $this->flushPseudos();
                $this->redirect('menu/index');
            }
        }
    }
    
    private function flushPseudos()
    {
        $q = Doctrine_Query::create()
             ->update('MenuItem m')
             ->set('m.pseudo_id', '?', new Doctrine_Null())
             ->set('m.pseudo_parent_id', '?', new Doctrine_Null())
             ->execute();
    }
}
