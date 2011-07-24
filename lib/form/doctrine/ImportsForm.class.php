<?php

/**
 * Imports form.
 *
 * @package    edenapps
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ImportsForm extends BaseImportsForm
{
  public function configure()
  {
    unset($this->widgetSchema['created_at']);
    unset($this->widgetSchema['updated_at']);
    unset($this->validatorSchema['created_at']);
    unset($this->validatorSchema['updated_at']);
    
    $this->disableCSRFProtection();
    $this->setValidator('datafile', new sfValidatorFile(array(
    'mime_types' => array('text/csv', 'text/comma-separated-values'),
    'mime_type_guessers' => array('guessFromFileinfo'),  
    'path' => sfConfig::get('sf_upload_dir').'/data/menu',
    'required' => false
    )));

    $this->setWidget('datafile', new sfWidgetFormInputFile());
  }
}
