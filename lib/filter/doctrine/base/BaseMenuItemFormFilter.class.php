<?php

/**
 * MenuItem filter form base class.
 *
 * @package    edenapps
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMenuItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pseudo_id'        => new sfWidgetFormFilterInput(),
      'pseudo_parent_id' => new sfWidgetFormFilterInput(),
      'name'             => new sfWidgetFormFilterInput(),
      'title'            => new sfWidgetFormFilterInput(),
      'description'      => new sfWidgetFormFilterInput(),
      'picture'          => new sfWidgetFormFilterInput(),
      'parent_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'pseudo_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pseudo_parent_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'             => new sfValidatorPass(array('required' => false)),
      'title'            => new sfValidatorPass(array('required' => false)),
      'description'      => new sfValidatorPass(array('required' => false)),
      'picture'          => new sfValidatorPass(array('required' => false)),
      'parent_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parent'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('menu_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MenuItem';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'pseudo_id'        => 'Number',
      'pseudo_parent_id' => 'Number',
      'name'             => 'Text',
      'title'            => 'Text',
      'description'      => 'Text',
      'picture'          => 'Text',
      'parent_id'        => 'ForeignKey',
    );
  }
}
