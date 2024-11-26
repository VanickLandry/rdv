<?php

/**
 * BaseCrdmgrUserAgency
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $agence_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property sfGuardUser $CtrGuardUser
 * @property CrdmgrAgency $CtrAgency
 * @property sfGuardUser $CtrCreatedBy
 * @property sfGuardUser $CtrUpdatedBy
 * 
 * @method integer          getUserId()       Returns the current record's "user_id" value
 * @method integer          getAgenceId()     Returns the current record's "agence_id" value
 * @method integer          getCreatedBy()    Returns the current record's "created_by" value
 * @method integer          getUpdatedBy()    Returns the current record's "updated_by" value
 * @method sfGuardUser      getCtrGuardUser() Returns the current record's "CtrGuardUser" value
 * @method CrdmgrAgency     getCtrAgency()    Returns the current record's "CtrAgency" value
 * @method sfGuardUser      getCtrCreatedBy() Returns the current record's "CtrCreatedBy" value
 * @method sfGuardUser      getCtrUpdatedBy() Returns the current record's "CtrUpdatedBy" value
 * @method CrdmgrUserAgency setUserId()       Sets the current record's "user_id" value
 * @method CrdmgrUserAgency setAgenceId()     Sets the current record's "agence_id" value
 * @method CrdmgrUserAgency setCreatedBy()    Sets the current record's "created_by" value
 * @method CrdmgrUserAgency setUpdatedBy()    Sets the current record's "updated_by" value
 * @method CrdmgrUserAgency setCtrGuardUser() Sets the current record's "CtrGuardUser" value
 * @method CrdmgrUserAgency setCtrAgency()    Sets the current record's "CtrAgency" value
 * @method CrdmgrUserAgency setCtrCreatedBy() Sets the current record's "CtrCreatedBy" value
 * @method CrdmgrUserAgency setCtrUpdatedBy() Sets the current record's "CtrUpdatedBy" value
 * 
 * @package    simuce
 * @subpackage model
 * @author     UCE - D�sire Talla Tueguem
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCrdmgrUserAgency extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('crdmgr_user_agency');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('agence_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('created_by', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('updated_by', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as CtrGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('CrdmgrAgency as CtrAgency', array(
             'local' => 'agence_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as CtrCreatedBy', array(
             'local' => 'created_by',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as CtrUpdatedBy', array(
             'local' => 'updated_by',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}