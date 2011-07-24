<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImportMenuForm
 *
 * @author zuhair
 */
class ImportMenuForm extends BaseFormDoctrine {
  public function setup()
  {
    $this->disableCSRFProtection();
    $this->setValidator('data', new sfValidatorFile(array(
    'mime_types' => array('text/csv'),
    'path' => sfConfig::get('sf_upload_dir').'/data/menu',
    'required' => false
    )));

    $this->setWidget('data', new sfWidgetFormInputFile());

    $this->widgetSchema->setNameFormat('menu_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MenuItem';
  }

}

?>
