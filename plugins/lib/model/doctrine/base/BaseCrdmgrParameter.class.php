<?php

/**
 * BaseCrdmgrParameter
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property boolean $is_active
 * @property string $type_parametre
 * @property string $code_parametre
 * @property string $label_param
 * @property string $valeur_string
 * @property decimal $valeur_numeric
 * @property string $description_param
 * @property integer $created_by
 * @property integer $updated_by
 * @property sfGuardUser $CtrCreatedBy
 * @property sfGuardUser $CtrUpdatedBy
 * @property Doctrine_Collection $CrdmgrCommission
 * @property Doctrine_Collection $CrdmgrInstitution
 * @property Doctrine_Collection $CrdmgrAgency
 * @property Doctrine_Collection $CrdmgrCustomer
 * @property Doctrine_Collection $CrdmgrFicheConsentement
 * @property Doctrine_Collection $CrdmgrFicheConsentementDetail
 * @property Doctrine_Collection $CrdmgrBulletinAdhesion
 * @property Doctrine_Collection $CrdmgrBulletinAdhesionDetail
 * 
 * @method boolean             getIsActive()                      Returns the current record's "is_active" value
 * @method string              getTypeParametre()                 Returns the current record's "type_parametre" value
 * @method string              getCodeParametre()                 Returns the current record's "code_parametre" value
 * @method string              getLabelParam()                    Returns the current record's "label_param" value
 * @method string              getValeurString()                  Returns the current record's "valeur_string" value
 * @method decimal             getValeurNumeric()                 Returns the current record's "valeur_numeric" value
 * @method string              getDescriptionParam()              Returns the current record's "description_param" value
 * @method integer             getCreatedBy()                     Returns the current record's "created_by" value
 * @method integer             getUpdatedBy()                     Returns the current record's "updated_by" value
 * @method sfGuardUser         getCtrCreatedBy()                  Returns the current record's "CtrCreatedBy" value
 * @method sfGuardUser         getCtrUpdatedBy()                  Returns the current record's "CtrUpdatedBy" value
 * @method Doctrine_Collection getCrdmgrCommission()              Returns the current record's "CrdmgrCommission" collection
 * @method Doctrine_Collection getCrdmgrInstitution()             Returns the current record's "CrdmgrInstitution" collection
 * @method Doctrine_Collection getCrdmgrAgency()                  Returns the current record's "CrdmgrAgency" collection
 * @method Doctrine_Collection getCrdmgrCustomer()                Returns the current record's "CrdmgrCustomer" collection
 * @method Doctrine_Collection getCrdmgrFicheConsentement()       Returns the current record's "CrdmgrFicheConsentement" collection
 * @method Doctrine_Collection getCrdmgrFicheConsentementDetail() Returns the current record's "CrdmgrFicheConsentementDetail" collection
 * @method Doctrine_Collection getCrdmgrBulletinAdhesion()        Returns the current record's "CrdmgrBulletinAdhesion" collection
 * @method Doctrine_Collection getCrdmgrBulletinAdhesionDetail()  Returns the current record's "CrdmgrBulletinAdhesionDetail" collection
 * @method CrdmgrParameter     setIsActive()                      Sets the current record's "is_active" value
 * @method CrdmgrParameter     setTypeParametre()                 Sets the current record's "type_parametre" value
 * @method CrdmgrParameter     setCodeParametre()                 Sets the current record's "code_parametre" value
 * @method CrdmgrParameter     setLabelParam()                    Sets the current record's "label_param" value
 * @method CrdmgrParameter     setValeurString()                  Sets the current record's "valeur_string" value
 * @method CrdmgrParameter     setValeurNumeric()                 Sets the current record's "valeur_numeric" value
 * @method CrdmgrParameter     setDescriptionParam()              Sets the current record's "description_param" value
 * @method CrdmgrParameter     setCreatedBy()                     Sets the current record's "created_by" value
 * @method CrdmgrParameter     setUpdatedBy()                     Sets the current record's "updated_by" value
 * @method CrdmgrParameter     setCtrCreatedBy()                  Sets the current record's "CtrCreatedBy" value
 * @method CrdmgrParameter     setCtrUpdatedBy()                  Sets the current record's "CtrUpdatedBy" value
 * @method CrdmgrParameter     setCrdmgrCommission()              Sets the current record's "CrdmgrCommission" collection
 * @method CrdmgrParameter     setCrdmgrInstitution()             Sets the current record's "CrdmgrInstitution" collection
 * @method CrdmgrParameter     setCrdmgrAgency()                  Sets the current record's "CrdmgrAgency" collection
 * @method CrdmgrParameter     setCrdmgrCustomer()                Sets the current record's "CrdmgrCustomer" collection
 * @method CrdmgrParameter     setCrdmgrFicheConsentement()       Sets the current record's "CrdmgrFicheConsentement" collection
 * @method CrdmgrParameter     setCrdmgrFicheConsentementDetail() Sets the current record's "CrdmgrFicheConsentementDetail" collection
 * @method CrdmgrParameter     setCrdmgrBulletinAdhesion()        Sets the current record's "CrdmgrBulletinAdhesion" collection
 * @method CrdmgrParameter     setCrdmgrBulletinAdhesionDetail()  Sets the current record's "CrdmgrBulletinAdhesionDetail" collection
 * 
 * @package    credit_mng
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCrdmgrParameter extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('crdmgr_parameter');
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('type_parametre', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('code_parametre', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 100,
             ));
        $this->hasColumn('label_param', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('valeur_string', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 200,
             ));
        $this->hasColumn('valeur_numeric', 'decimal', null, array(
             'type' => 'decimal',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('description_param', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
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
        $this->hasOne('sfGuardUser as CtrCreatedBy', array(
             'local' => 'created_by',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as CtrUpdatedBy', array(
             'local' => 'updated_by',
             'foreign' => 'id'));

        $this->hasMany('CrdmgrCommission', array(
             'local' => 'code_parametre',
             'foreign' => 'type_commission'));

        $this->hasMany('CrdmgrInstitution', array(
             'local' => 'code_parametre',
             'foreign' => 'lieu_siege_social_code'));

        $this->hasMany('CrdmgrAgency', array(
             'local' => 'code_parametre',
             'foreign' => 'lieu_localisation_code'));

        $this->hasMany('CrdmgrCustomer', array(
             'local' => 'code_parametre',
             'foreign' => 'sexe_code'));

        $this->hasMany('CrdmgrFicheConsentement', array(
             'local' => 'code_parametre',
             'foreign' => 'cust_nbre_annee_prof_code'));

        $this->hasMany('CrdmgrFicheConsentementDetail', array(
             'local' => 'id',
             'foreign' => 'question_id'));

        $this->hasMany('CrdmgrBulletinAdhesion', array(
             'local' => 'code_parametre',
             'foreign' => 'cust_nbre_annee_prof_code'));

        $this->hasMany('CrdmgrBulletinAdhesionDetail', array(
             'local' => 'id',
             'foreign' => 'question_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}