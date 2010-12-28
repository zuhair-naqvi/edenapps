<?php

/**
 * Roster form base class.
 *
 * @method Roster getObject() Returns the current form's model object
 *
 * @package    edenapps
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRosterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'member_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'monday'     => new sfWidgetFormInputText(),
      'tuesday'    => new sfWidgetFormInputText(),
      'wednesday'  => new sfWidgetFormInputText(),
      'thursday'   => new sfWidgetFormInputText(),
      'friday'     => new sfWidgetFormInputText(),
      'saturday'   => new sfWidgetFormInputText(),
      'sunday'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'member_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'required' => false)),
      'monday'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tuesday'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'wednesday'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'thursday'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'friday'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'saturday'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sunday'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('roster[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Roster';
  }

}
