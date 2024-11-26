<?php

/**
 * CrdmgrInstitution filter form base class.
 *
 * @package    credit_mng
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrInstitutionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'is_active'                      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'code_institution'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom_institution'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type_institution_code'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamTypeInstitution'), 'add_empty' => true)),
      'adresse'                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lieu_siege_social_code'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamLieuSiege'), 'add_empty' => true)),
      'consentmnt_taux_supplement'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'consentmnt_taux_chomage'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'consentmnt_taux_deces'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'consentmnt_taux_ipt'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'consentmnt_montant_accessoire'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'consentmnt_montant_divers'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bulladhesion_taux_supplement'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bulladhesion_taux_deces'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bulladhesion_taux_ipt'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bulladhesion_taux_surprm_deces' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bulladhesion_taux_surprm_ipt'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bulladhesion_taux_insolvabilit' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bulladhesion_montant_accessoir' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bulladhesion_montant_divers'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'consentmnt_prime_minimale'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bulladhesion_prime_minimale'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_by'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => true)),
      'updated_by'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => true)),
      'created_at'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'is_active'                      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'code_institution'               => new sfValidatorPass(array('required' => false)),
      'nom_institution'                => new sfValidatorPass(array('required' => false)),
      'type_institution_code'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamTypeInstitution'), 'column' => 'id')),
      'adresse'                        => new sfValidatorPass(array('required' => false)),
      'lieu_siege_social_code'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamLieuSiege'), 'column' => 'id')),
      'consentmnt_taux_supplement'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'consentmnt_taux_chomage'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'consentmnt_taux_deces'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'consentmnt_taux_ipt'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'consentmnt_montant_accessoire'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'consentmnt_montant_divers'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bulladhesion_taux_supplement'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bulladhesion_taux_deces'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bulladhesion_taux_ipt'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bulladhesion_taux_surprm_deces' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bulladhesion_taux_surprm_ipt'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bulladhesion_taux_insolvabilit' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bulladhesion_montant_accessoir' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bulladhesion_montant_divers'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'consentmnt_prime_minimale'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'bulladhesion_prime_minimale'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_by'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrCreatedBy'), 'column' => 'id')),
      'updated_by'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrUpdatedBy'), 'column' => 'id')),
      'created_at'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('crdmgr_institution_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrInstitution';
  }

  public function getFields()
  {
    return array(
      'id'                             => 'Number',
      'is_active'                      => 'Boolean',
      'code_institution'               => 'Text',
      'nom_institution'                => 'Text',
      'type_institution_code'          => 'ForeignKey',
      'adresse'                        => 'Text',
      'lieu_siege_social_code'         => 'ForeignKey',
      'consentmnt_taux_supplement'     => 'Number',
      'consentmnt_taux_chomage'        => 'Number',
      'consentmnt_taux_deces'          => 'Number',
      'consentmnt_taux_ipt'            => 'Number',
      'consentmnt_montant_accessoire'  => 'Number',
      'consentmnt_montant_divers'      => 'Number',
      'bulladhesion_taux_supplement'   => 'Number',
      'bulladhesion_taux_deces'        => 'Number',
      'bulladhesion_taux_ipt'          => 'Number',
      'bulladhesion_taux_surprm_deces' => 'Number',
      'bulladhesion_taux_surprm_ipt'   => 'Number',
      'bulladhesion_taux_insolvabilit' => 'Number',
      'bulladhesion_montant_accessoir' => 'Number',
      'bulladhesion_montant_divers'    => 'Number',
      'consentmnt_prime_minimale'      => 'Number',
      'bulladhesion_prime_minimale'    => 'Number',
      'created_by'                     => 'ForeignKey',
      'updated_by'                     => 'ForeignKey',
      'created_at'                     => 'Date',
      'updated_at'                     => 'Date',
    );
  }
}
