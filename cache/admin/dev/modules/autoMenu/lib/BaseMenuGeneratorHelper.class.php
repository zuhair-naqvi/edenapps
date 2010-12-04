<?php

/**
 * menu module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage menu
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseMenuGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'menu_item' : 'menu_item_'.$action;
  }
}
