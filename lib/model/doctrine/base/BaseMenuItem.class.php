<?php

/**
 * BaseMenuItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $title
 * @property clob $description
 * @property string $picture
 * @property integer $parent_id
 * @property MenuItem $Parent
 * @property Doctrine_Collection $Children
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getTitle()       Returns the current record's "title" value
 * @method clob                getDescription() Returns the current record's "description" value
 * @method string              getPicture()     Returns the current record's "picture" value
 * @method integer             getParentId()    Returns the current record's "parent_id" value
 * @method MenuItem            getParent()      Returns the current record's "Parent" value
 * @method Doctrine_Collection getChildren()    Returns the current record's "Children" collection
 * @method MenuItem            setName()        Sets the current record's "name" value
 * @method MenuItem            setTitle()       Sets the current record's "title" value
 * @method MenuItem            setDescription() Sets the current record's "description" value
 * @method MenuItem            setPicture()     Sets the current record's "picture" value
 * @method MenuItem            setParentId()    Sets the current record's "parent_id" value
 * @method MenuItem            setParent()      Sets the current record's "Parent" value
 * @method MenuItem            setChildren()    Sets the current record's "Children" collection
 * 
 * @package    edenapps
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMenuItem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('menu_item');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('description', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('picture', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('parent_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('MenuItem as Parent', array(
             'local' => 'parent_id',
             'foreign' => 'id'));

        $this->hasMany('MenuItem as Children', array(
             'local' => 'id',
             'foreign' => 'parent_id'));
    }
}