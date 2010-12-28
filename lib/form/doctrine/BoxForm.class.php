<?php

/**
 * Box form.
 *
 * @package    edenapps
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BoxForm extends BaseBoxForm
{
  public function configure()
  {
    $this->setValidator('picture', new sfValidatorFile(array(
      'mime_types' => 'web_images',
      'path' => sfConfig::get('sf_upload_dir').'/images/box',
      'required' => false
    )));

    $this->setWidget('picture', new sfWidgetFormInputFileEditable(array(
      'file_src'    => '/uploads/images/box/'.$this->getObject()->picture,
      'edit_mode'   => !$this->isNew(),
      'is_image'    => true,
      'with_delete' => true
    )));    
  }
}
