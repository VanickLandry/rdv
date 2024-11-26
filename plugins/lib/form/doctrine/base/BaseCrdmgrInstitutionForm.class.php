<?php

/**
 * CrdmgrInstitution form base class.
 *
 * @method CrdmgrInstitution getObject() Returns the current form's model object
 *
 * @package    credit_mng
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrInstitutionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                             => new sfWidgetFormInputHidden(),
      'is_active'                      => new sfWidgetFormInputCheckbox(),
      'code_institution'               => new sfWidgetFormInputText(),
      'nom_institution'                => new sfWidgetFormInputText(),
      'type_institution_code'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamTypeInstitution'), 'add_empty' => false)),
      'adresse'                        => new sfWidgetFormInputText(),
      'lieu_siege_social_code'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamLieuSiege'), 'add_empty' => false)),
      'consentmnt_taux_supplement'     => new sfWidgetFormInputText(),
      'consentmnt_taux_chomage'        => new sfWidgetFormInputText(),
      'consentmnt_taux_deces'          => new sfWidgetFormInputText(),
      'consentmnt_taux_ipt'            => new sfWidgetFormInputText(),
      'consentmnt_montant_accessoire'  => new sfWidgetFormInputText(),
      'consentmnt_montant_divers'      => new sfWidgetFormInputText(),
      'bulladhesion_taux_supplement'   => new sfWidgetFormInputText(),
      'bulladhesion_taux_deces'        => new sfWidgetFormInputText(),
      'bulladhesion_taux_ipt'          => new sfWidgetFormInputText(),
      'bulladhesion_taux_surprm_deces' => new sfWidgetFormInputText(),
      'bulladhesion_taux_surprm_ipt'   => new sfWidgetFormInputText(),
      'bulladhesion_taux_insolvabilit' => new sfWidgetFormInputText(),
      'bulladhesion_montant_accessoir' => new sfWidgetFormInputText(),
      'bulladhesion_montant_divers'    => new sfWidgetFormInputText(),
      'consentmnt_prime_minimale'      => new sfWidgetFormInputText(),
      'bulladhesion_prime_minimale'    => new sfWidgetFormInputText(),
      'created_by'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => false)),
      'updated_by'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => false)),
      'created_at'                     => new sfWidgetFormDateTime(),
      'updated_at'                     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'is_active'                      => new sfValidatorBoolean(array('required' => false)),
      'code_institution'               => new sfValidatorString(array('max_length' => 100)),
      'nom_institution'                => new sfValidatorString(array('max_length' => 100)),
      'type_institution_code'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamTypeInstitution'))),
      'adresse'                        => new sfValidatorString(array('max_length' => 100)),
      'lieu_siege_social_code'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamLieuSiege'))),
      'consentmnt_taux_supplement'     => new sfValidatorNumber(array('required' => false)),
      'consentmnt_taux_chomage'        => new sfValidatorNumber(array('required' => false)),
      'consentmnt_taux_deces'          => new sfValidatorNumber(array('required' => false)),
      'consentmnt_taux_ipt'            => new sfValidatorNumber(array('required' => false)),
      'consentmnt_montant_accessoire'  => new sfValidatorNumber(array('required' => false)),
      'consentmnt_montant_divers'      => new sfValidatorNumber(array('required' => false)),
      'bulladhesion_taux_supplement'   => new sfValidatorNumber(array('required' => false)),
      'bulladhesion_taux_deces'        => new sfValidatorNumber(array('required' => false)),
      'bulladhesion_taux_ipt'          => new sfValidatorNumber(array('required' => false)),
      'bulladhesion_taux_surprm_deces' => new sfValidatorNumber(array('required' => false)),
      'bulladhesion_taux_surprm_ipt'   => new sfValidatorNumber(array('required' => false)),
      'bulladhesion_taux_insolvabilit' => new sfValidatorNumber(array('required' => false)),
      'bulladhesion_montant_accessoir' => new sfValidatorNumber(array('required' => false)),
      'bulladhesion_montant_divers'    => new sfValidatorNumber(array('required' => false)),
      'consentmnt_prime_minimale'      => new sfValidatorNumber(array('required' => false)),
      'bulladhesion_prime_minimale'    => new sfValidatorNumber(array('required' => false)),
      'created_by'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'))),
      'updated_by'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'))),
      'created_at'                     => new sfValidatorDateTime(),
      'updated_at'                     => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'CrdmgrInstitution', 'column' => array('code_institution'))),
        new sfValidatorDoctrineUnique(array('model' => 'CrdmgrInstitution', 'column' => array('nom_institution'))),
      ))
    );

    $this->widgetSchema->setNameFormat('crdmgr_institution[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrInstitution';
  }

}
