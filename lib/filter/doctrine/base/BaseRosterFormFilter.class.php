<?php

/**
 * Roster filter form base class.
 *
 * @package    edenapps
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRosterFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'monday'     => new sfWidgetFormFilterInput(),
      'tuesday'    => new sfWidgetFormFilterInput(),
      'wednesday'  => new sfWidgetFormFilterInput(),
      'thursday'   => new sfWidgetFormFilterInput(),
      'friday'     => new sfWidgetFormFilterInput(),
      'saturday'   => new sfWidgetFormFilterInput(),
      'sunday'     => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'member_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Member'), 'column' => 'id')),
      'monday'     => new sfValidatorPass(array('required' => false)),
      'tuesday'    => new sfValidatorPass(array('required' => false)),
      'wednesday'  => new sfValidatorPass(array('required' => false)),
      'thursday'   => new sfValidatorPass(array('required' => false)),
      'friday'     => new sfValidatorPass(array('required' => false)),
      'saturday'   => new sfValidatorPass(array('required' => false)),
      'sunday'     => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('roster_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Roster';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'member_id'  => 'ForeignKey',
      'monday'     => 'Text',
      'tuesday'    => 'Text',
      'wednesday'  => 'Text',
      'thursday'   => 'Text',
      'friday'     => 'Text',
      'saturday'   => 'Text',
      'sunday'     => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
