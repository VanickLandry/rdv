<?php

/**
 * BaseCrdmgrInstitution
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property boolean $is_active
 * @property string $code_institution
 * @property string $nom_institution
 * @property string $type_institution_code
 * @property string $adresse
 * @property string $lieu_siege_social_code
 * @property decimal $consentmnt_taux_supplement
 * @property decimal $consentmnt_taux_chomage
 * @property decimal $consentmnt_taux_deces
 * @property decimal $consentmnt_taux_ipt
 * @property decimal $consentmnt_montant_accessoire
 * @property decimal $consentmnt_montant_divers
 * @property decimal $bulladhesion_taux_supplement
 * @property decimal $bulladhesion_taux_deces
 * @property decimal $bulladhesion_taux_ipt
 * @property decimal $bulladhesion_taux_surprm_deces
 * @property decimal $bulladhesion_taux_surprm_ipt
 * @property decimal $bulladhesion_taux_insolvabilit
 * @property decimal $bulladhesion_montant_accessoir
 * @property decimal $bulladhesion_montant_divers
 * @property decimal $consentmnt_prime_minimale
 * @property decimal $bulladhesion_prime_minimale
 * @property integer $created_by
 * @property integer $updated_by
 * @property CrdmgrParameter $CtrParamLieuSiege
 * @property CrdmgrParameter $CtrParamTypeInstitution
 * @property sfGuardUser $CtrCreatedBy
 * @property sfGuardUser $CtrUpdatedBy
 * @property Doctrine_Collection $CrdmgrCommission
 * @property Doctrine_Collection $CrdmgrAgency
 * @property Doctrine_Collection $CrdmgrCustomer
 * @property Doctrine_Collection $CrdmgrFicheConsentement
 * @property Doctrine_Collection $CrdmgrBulletinAdhesion
 * 
 * @method boolean             getIsActive()                       Returns the current record's "is_active" value
 * @method string              getCodeInstitution()                Returns the current record's "code_institution" value
 * @method string              getNomInstitution()                 Returns the current record's "nom_institution" value
 * @method string              getTypeInstitutionCode()            Returns the current record's "type_institution_code" value
 * @method string              getAdresse()                        Returns the current record's "adresse" value
 * @method string              getLieuSiegeSocialCode()            Returns the current record's "lieu_siege_social_code" value
 * @method decimal             getConsentmntTauxSupplement()       Returns the current record's "consentmnt_taux_supplement" value
 * @method decimal             getConsentmntTauxChomage()          Returns the current record's "consentmnt_taux_chomage" value
 * @method decimal             getConsentmntTauxDeces()            Returns the current record's "consentmnt_taux_deces" value
 * @method decimal             getConsentmntTauxIpt()              Returns the current record's "consentmnt_taux_ipt" value
 * @method decimal             getConsentmntMontantAccessoire()    Returns the current record's "consentmnt_montant_accessoire" value
 * @method decimal             getConsentmntMontantDivers()        Returns the current record's "consentmnt_montant_divers" value
 * @method decimal             getBulladhesionTauxSupplement()     Returns the current record's "bulladhesion_taux_supplement" value
 * @method decimal             getBulladhesionTauxDeces()          Returns the current record's "bulladhesion_taux_deces" value
 * @method decimal             getBulladhesionTauxIpt()            Returns the current record's "bulladhesion_taux_ipt" value
 * @method decimal             getBulladhesionTauxSurprmDeces()    Returns the current record's "bulladhesion_taux_surprm_deces" value
 * @method decimal             getBulladhesionTauxSurprmIpt()      Returns the current record's "bulladhesion_taux_surprm_ipt" value
 * @method decimal             getBulladhesionTauxInsolvabilit()   Returns the current record's "bulladhesion_taux_insolvabilit" value
 * @method decimal             getBulladhesionMontantAccessoir()   Returns the current record's "bulladhesion_montant_accessoir" value
 * @method decimal             getBulladhesionMontantDivers()      Returns the current record's "bulladhesion_montant_divers" value
 * @method decimal             getConsentmntPrimeMinimale()        Returns the current record's "consentmnt_prime_minimale" value
 * @method decimal             getBulladhesionPrimeMinimale()      Returns the current record's "bulladhesion_prime_minimale" value
 * @method integer             getCreatedBy()                      Returns the current record's "created_by" value
 * @method integer             getUpdatedBy()                      Returns the current record's "updated_by" value
 * @method CrdmgrParameter     getCtrParamLieuSiege()              Returns the current record's "CtrParamLieuSiege" value
 * @method CrdmgrParameter     getCtrParamTypeInstitution()        Returns the current record's "CtrParamTypeInstitution" value
 * @method sfGuardUser         getCtrCreatedBy()                   Returns the current record's "CtrCreatedBy" value
 * @method sfGuardUser         getCtrUpdatedBy()                   Returns the current record's "CtrUpdatedBy" value
 * @method Doctrine_Collection getCrdmgrCommission()               Returns the current record's "CrdmgrCommission" collection
 * @method Doctrine_Collection getCrdmgrAgency()                   Returns the current record's "CrdmgrAgency" collection
 * @method Doctrine_Collection getCrdmgrCustomer()                 Returns the current record's "CrdmgrCustomer" collection
 * @method Doctrine_Collection getCrdmgrFicheConsentement()        Returns the current record's "CrdmgrFicheConsentement" collection
 * @method Doctrine_Collection getCrdmgrBulletinAdhesion()         Returns the current record's "CrdmgrBulletinAdhesion" collection
 * @method CrdmgrInstitution   setIsActive()                       Sets the current record's "is_active" value
 * @method CrdmgrInstitution   setCodeInstitution()                Sets the current record's "code_institution" value
 * @method CrdmgrInstitution   setNomInstitution()                 Sets the current record's "nom_institution" value
 * @method CrdmgrInstitution   setTypeInstitutionCode()            Sets the current record's "type_institution_code" value
 * @method CrdmgrInstitution   setAdresse()                        Sets the current record's "adresse" value
 * @method CrdmgrInstitution   setLieuSiegeSocialCode()            Sets the current record's "lieu_siege_social_code" value
 * @method CrdmgrInstitution   setConsentmntTauxSupplement()       Sets the current record's "consentmnt_taux_supplement" value
 * @method CrdmgrInstitution   setConsentmntTauxChomage()          Sets the current record's "consentmnt_taux_chomage" value
 * @method CrdmgrInstitution   setConsentmntTauxDeces()            Sets the current record's "consentmnt_taux_deces" value
 * @method CrdmgrInstitution   setConsentmntTauxIpt()              Sets the current record's "consentmnt_taux_ipt" value
 * @method CrdmgrInstitution   setConsentmntMontantAccessoire()    Sets the current record's "consentmnt_montant_accessoire" value
 * @method CrdmgrInstitution   setConsentmntMontantDivers()        Sets the current record's "consentmnt_montant_divers" value
 * @method CrdmgrInstitution   setBulladhesionTauxSupplement()     Sets the current record's "bulladhesion_taux_supplement" value
 * @method CrdmgrInstitution   setBulladhesionTauxDeces()          Sets the current record's "bulladhesion_taux_deces" value
 * @method CrdmgrInstitution   setBulladhesionTauxIpt()            Sets the current record's "bulladhesion_taux_ipt" value
 * @method CrdmgrInstitution   setBulladhesionTauxSurprmDeces()    Sets the current record's "bulladhesion_taux_surprm_deces" value
 * @method CrdmgrInstitution   setBulladhesionTauxSurprmIpt()      Sets the current record's "bulladhesion_taux_surprm_ipt" value
 * @method CrdmgrInstitution   setBulladhesionTauxInsolvabilit()   Sets the current record's "bulladhesion_taux_insolvabilit" value
 * @method CrdmgrInstitution   setBulladhesionMontantAccessoir()   Sets the current record's "bulladhesion_montant_accessoir" value
 * @method CrdmgrInstitution   setBulladhesionMontantDivers()      Sets the current record's "bulladhesion_montant_divers" value
 * @method CrdmgrInstitution   setConsentmntPrimeMinimale()        Sets the current record's "consentmnt_prime_minimale" value
 * @method CrdmgrInstitution   setBulladhesionPrimeMinimale()      Sets the current record's "bulladhesion_prime_minimale" value
 * @method CrdmgrInstitution   setCreatedBy()                      Sets the current record's "created_by" value
 * @method CrdmgrInstitution   setUpdatedBy()                      Sets the current record's "updated_by" value
 * @method CrdmgrInstitution   setCtrParamLieuSiege()              Sets the current record's "CtrParamLieuSiege" value
 * @method CrdmgrInstitution   setCtrParamTypeInstitution()        Sets the current record's "CtrParamTypeInstitution" value
 * @method CrdmgrInstitution   setCtrCreatedBy()                   Sets the current record's "CtrCreatedBy" value
 * @method CrdmgrInstitution   setCtrUpdatedBy()                   Sets the current record's "CtrUpdatedBy" value
 * @method CrdmgrInstitution   setCrdmgrCommission()               Sets the current record's "CrdmgrCommission" collection
 * @method CrdmgrInstitution   setCrdmgrAgency()                   Sets the current record's "CrdmgrAgency" collection
 * @method CrdmgrInstitution   setCrdmgrCustomer()                 Sets the current record's "CrdmgrCustomer" collection
 * @method CrdmgrInstitution   setCrdmgrFicheConsentement()        Sets the current record's "CrdmgrFicheConsentement" collection
 * @method CrdmgrInstitution   setCrdmgrBulletinAdhesion()         Sets the current record's "CrdmgrBulletinAdhesion" collection
 * 
 * @package    credit_mng
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCrdmgrInstitution extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('crdmgr_institution');
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('code_institution', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 100,
             ));
        $this->hasColumn('nom_institution', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 100,
             ));
        $this->hasColumn('type_institution_code', 'string', 70, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 70,
             ));
        $this->hasColumn('adresse', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('lieu_siege_social_code', 'string', 70, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 70,
             ));
        $this->hasColumn('consentmnt_taux_supplement', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0,
             'length' => 16,
             ));
        $this->hasColumn('consentmnt_taux_chomage', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0.02,
             'length' => 16,
             ));
        $this->hasColumn('consentmnt_taux_deces', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0.006,
             'length' => 16,
             ));
        $this->hasColumn('consentmnt_taux_ipt', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0.0012,
             'length' => 16,
             ));
        $this->hasColumn('consentmnt_montant_accessoire', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0,
             'length' => 16,
             ));
        $this->hasColumn('consentmnt_montant_divers', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0,
             'length' => 16,
             ));
        $this->hasColumn('bulladhesion_taux_supplement', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0,
             'length' => 16,
             ));
        $this->hasColumn('bulladhesion_taux_deces', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0.006,
             'length' => 16,
             ));
        $this->hasColumn('bulladhesion_taux_ipt', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0.0012,
             'length' => 16,
             ));
        $this->hasColumn('bulladhesion_taux_surprm_deces', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0,
             'length' => 16,
             ));
        $this->hasColumn('bulladhesion_taux_surprm_ipt', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0,
             'length' => 16,
             ));
        $this->hasColumn('bulladhesion_taux_insolvabilit', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0.02,
             'length' => 16,
             ));
        $this->hasColumn('bulladhesion_montant_accessoir', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0,
             'length' => 16,
             ));
        $this->hasColumn('bulladhesion_montant_divers', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 0,
             'length' => 16,
             ));
        $this->hasColumn('consentmnt_prime_minimale', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 5000,
             'length' => 16,
             ));
        $this->hasColumn('bulladhesion_prime_minimale', 'decimal', 16, array(
             'type' => 'decimal',
             'notnull' => true,
             'size' => 16,
             'scale' => 4,
             'default' => 5000,
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
        $this->hasOne('CrdmgrParameter as CtrParamLieuSiege', array(
             'local' => 'lieu_siege_social_code',
             'foreign' => 'code_parametre'));

        $this->hasOne('CrdmgrParameter as CtrParamTypeInstitution', array(
             'local' => 'type_institution_code',
             'foreign' => 'code_parametre'));

        $this->hasOne('sfGuardUser as CtrCreatedBy', array(
             'local' => 'created_by',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as CtrUpdatedBy', array(
             'local' => 'updated_by',
             'foreign' => 'id'));

        $this->hasMany('CrdmgrCommission', array(
             'local' => 'id',
             'foreign' => 'institution_id'));

        $this->hasMany('CrdmgrAgency', array(
             'local' => 'id',
             'foreign' => 'institution_id'));

        $this->hasMany('CrdmgrCustomer', array(
             'local' => 'id',
             'foreign' => 'institution_id'));

        $this->hasMany('CrdmgrFicheConsentement', array(
             'local' => 'id',
             'foreign' => 'institution_id'));

        $this->hasMany('CrdmgrBulletinAdhesion', array(
             'local' => 'id',
             'foreign' => 'institution_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}