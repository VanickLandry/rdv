<?php

/**
 * BaseCrdmgrCommission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property boolean $is_active
 * @property string $code_commission
 * @property integer $institution_id
 * @property string $type_commission
 * @property decimal $commission_fixe
 * @property decimal $taux_commission
 * @property integer $created_by
 * @property integer $updated_by
 * @property CrdmgrParameter $CtrParamTypeCommission
 * @property CrdmgrInstitution $CtrInstitution
 * @property sfGuardUser $CtrCreatedBy
 * @property sfGuardUser $CtrUpdatedBy
 * 
 * @method boolean           getIsActive()               Returns the current record's "is_active" value
 * @method string            getCodeCommission()         Returns the current record's "code_commission" value
 * @method integer           getInstitutionId()          Returns the current record's "institution_id" value
 * @method string            getTypeCommission()         Returns the current record's "type_commission" value
 * @method decimal           getCommissionFixe()         Returns the current record's "commission_fixe" value
 * @method decimal           getTauxCommission()         Returns the current record's "taux_commission" value
 * @method integer           getCreatedBy()              Returns the current record's "created_by" value
 * @method integer           getUpdatedBy()              Returns the current record's "updated_by" value
 * @method CrdmgrParameter   getCtrParamTypeCommission() Returns the current record's "CtrParamTypeCommission" value
 * @method CrdmgrInstitution getCtrInstitution()         Returns the current record's "CtrInstitution" value
 * @method sfGuardUser       getCtrCreatedBy()           Returns the current record's "CtrCreatedBy" value
 * @method sfGuardUser       getCtrUpdatedBy()           Returns the current record's "CtrUpdatedBy" value
 * @method CrdmgrCommission  setIsActive()               Sets the current record's "is_active" value
 * @method CrdmgrCommission  setCodeCommission()         Sets the current record's "code_commission" value
 * @method CrdmgrCommission  setInstitutionId()          Sets the current record's "institution_id" value
 * @method CrdmgrCommission  setTypeCommission()         Sets the current record's "type_commission" value
 * @method CrdmgrCommission  setCommissionFixe()         Sets the current record's "commission_fixe" value
 * @method CrdmgrCommission  setTauxCommission()         Sets the current record's "taux_commission" value
 * @method CrdmgrCommission  setCreatedBy()              Sets the current record's "created_by" value
 * @method CrdmgrCommission  setUpdatedBy()              Sets the current record's "updated_by" value
 * @method CrdmgrCommission  setCtrParamTypeCommission() Sets the current record's "CtrParamTypeCommission" value
 * @method CrdmgrCommission  setCtrInstitution()         Sets the current record's "CtrInstitution" value
 * @method CrdmgrCommission  setCtrCreatedBy()           Sets the current record's "CtrCreatedBy" value
 * @method CrdmgrCommission  setCtrUpdatedBy()           Sets the current record's "CtrUpdatedBy" value
 * 
 * @package    credit_mng
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCrdmgrCommission extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('crdmgr_commission');
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('code_commission', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 100,
             ));
        $this->hasColumn('institution_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('type_commission', 'string', 70, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 70,
             ));
        $this->hasColumn('commission_fixe', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0,
             'length' => 16,
             ));
        $this->hasColumn('taux_commission', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0,
             'length' => 16,
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
        $this->hasOne('CrdmgrParameter as CtrParamTypeCommission', array(
             'local' => 'type_commission',
             'foreign' => 'code_parametre'));

        $this->hasOne('CrdmgrInstitution as CtrInstitution', array(
             'local' => 'institution_id',
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