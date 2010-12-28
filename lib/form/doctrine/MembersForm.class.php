<?php

/**
 * Members form.
 *
 * @package    edenapps
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MembersForm extends BaseMembersForm
{
  public function configure()
  {
    unset($this['created_at']);
    unset($this['updated_at']);
    $this->widgetSchema['id'] = new sfWidgetFormInputText();
    $this->widgetSchema['id']->setAttribute('disabled','disabled');
  }
}
