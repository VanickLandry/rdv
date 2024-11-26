<?php

/**
 * BaseEstim
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property boolean $is_active
 * @property decimal $largeur
 * @property decimal $hauteur
 * @property integer $nombre_id
 * @property Doctrine_Collection $fk_detail
 * 
 * @method boolean             getIsActive()  Returns the current record's "is_active" value
 * @method decimal             getLargeur()   Returns the current record's "largeur" value
 * @method decimal             getHauteur()   Returns the current record's "hauteur" value
 * @method integer             getNombreId()  Returns the current record's "nombre_id" value
 * @method Doctrine_Collection getFkDetail()  Returns the current record's "fk_detail" collection
 * @method Estim               setIsActive()  Sets the current record's "is_active" value
 * @method Estim               setLargeur()   Sets the current record's "largeur" value
 * @method Estim               setHauteur()   Sets the current record's "hauteur" value
 * @method Estim               setNombreId()  Sets the current record's "nombre_id" value
 * @method Estim               setFkDetail()  Sets the current record's "fk_detail" collection
 * 
 * @package    Rdv
 * @subpackage model
 * @author     Bongas
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEstim extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('estim');
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('largeur', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('hauteur', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             ));
        $this->hasColumn('nombre_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
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