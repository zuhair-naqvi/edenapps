<?php

/**
 * menu module helper.
 *
 * @package    edenapps
 * @subpackage menu
 * @author     Your name here
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuGeneratorHelper extends BaseMenuGeneratorHelper
{
  public function linkToImport($params)
  {
    if (!key_exists('ui-icon', $params)) $params['ui-icon'] = '';
    $params['params'] = UIHelper::addClasses($params, '');
    $params['ui-icon'] = $this->getIcon('new', $params);
    return '<li class="sf_admin_action_new">'.link_to(UIHelper::addIcon($params) . __($params['label'] , array(), 'sf_admin'), '@'.$this->getUrlForAction('import'), $params['params']).'</li>';
  }
}
