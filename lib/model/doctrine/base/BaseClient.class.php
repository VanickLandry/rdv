<?php

/**
 * BaseClient
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property boolean $is_active
 * @property string $nom
 * @property string $numtel
 * @property string $description
 * @property decimal $percent
 * @property Doctrine_Collection $fk_detail
 * 
 * @method boolean             getIsActive()    Returns the current record's "is_active" value
 * @method string              getNom()         Returns the current record's "nom" value
 * @method string              getNumtel()      Returns the current record's "numtel" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method decimal             getPercent()     Returns the current record's "percent" value
 * @method Doctrine_Collection getFkDetail()    Returns the current record's "fk_detail" collection
 * @method Client              setIsActive()    Sets the current record's "is_active" value
 * @method Client              setNom()         Sets the current record's "nom" value
 * @method Client              setNumtel()      Sets the current record's "numtel" value
 * @method Client              setDescription() Sets the current record's "description" value
 * @method Client              setPercent()     Sets the current record's "percent" value
 * @method Client              setFkDetail()    Sets the current record's "fk_detail" collection
 * 
 * @package    Rdv
 * @subpackage model
 * @author     Bongas
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClient extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('client');
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('nom', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('numtel', 'string', 15, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 15,
             ));
        $this->hasColumn('description', 'string', 1000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 1000,
             ));
        $this->hasColumn('percent', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Estimation as fk_detail', array(
             'local' => 'nombre_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}