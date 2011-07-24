<?php

/**
 * BaseImports
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $datafile
 * 
 * @method string  getDatafile() Returns the current record's "datafile" value
 * @method Imports setDatafile() Sets the current record's "datafile" value
 * 
 * @package    edenapps
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseImports extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('imports');
        $this->hasColumn('datafile', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}