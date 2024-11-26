<?php

/**
 * CrdmgrBulletinAdhesion form base class.
 *
 * @method CrdmgrBulletinAdhesion getObject() Returns the current form's model object
 *
 * @package    credit_mng
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrBulletinAdhesionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                             => new sfWidgetFormInputHidden(),
      'workflow_status_code'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamWorkflowStatus'), 'add_empty' => false)),
      'workflow_status_msg'            => new sfWidgetFormInputText(),
      'workflow_status_msglog'         => new sfWidgetFormTextarea(),
      'code_bulletin_adhesion'         => new sfWidgetFormInputText(),
      'code_police'                    => new sfWidgetFormInputText(),
      'customer_id'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCustomer'), 'add_empty' => false)),
      'loan_type_code'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamLoanType'), 'add_empty' => false)),
      'main_amount'                    => new sfWidgetFormInputText(),
      'interest_amount'                => new sfWidgetFormInputText(),
      'assured_amount'                 => new sfWidgetFormInputText(),
      'bank_acceptance_date'           => new sfWidgetFormDateTime(),
      'loan_duration_months_count'     => new sfWidgetFormInputText(),
      'accessory_amount'               => new sfWidgetFormInputText(),
      'other_amount'                   => new sfWidgetFormInputText(),
      'montant_prime_net'              => new sfWidgetFormInputText(),
      'total_prime_amount'             => new sfWidgetFormInputText(),
      'assurance_effect_date'          => new sfWidgetFormDateTime(),
      'first_monthly_payment_date'     => new sfWidgetFormDateTime(),
      'assurance_end_date'             => new sfWidgetFormDateTime(),
      'validation_status_code'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamValidationStatus'), 'add_empty' => false)),
      'validation_status_reason'       => new sfWidgetFormInputText(),
      'prime_type_code'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamPrimeType'), 'add_empty' => false)),
      'taux_applique'                  => new sfWidgetFormInputText(),
      'taux_supplementaire'            => new sfWidgetFormInputText(),
      'taux_base_deces'                => new sfWidgetFormInputText(),
      'taux_base_ipt'                  => new sfWidgetFormInputText(),
      'taux_surprime_deces'            => new sfWidgetFormInputText(),
      'taux_surprime_ipt'              => new sfWidgetFormInputText(),
      'taux_insolvabilite'             => new sfWidgetFormInputText(),
      'cust_nom'                       => new sfWidgetFormInputText(),
      'cust_prenom'                    => new sfWidgetFormInputText(),
      'cust_date_naissance'            => new sfWidgetFormDateTime(),
      'cust_lieu_naissance_code'       => new sfWidgetFormInputText(),
      'cust_profession'                => new sfWidgetFormInputText(),
      'cust_adresse'                   => new sfWidgetFormInputText(),
      'cust_societe_employeur'         => new sfWidgetFormInputText(),
      'cust_nbre_annee_prof_code'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamNbreAnnePro'), 'add_empty' => true)),
      'cust_categ_revenu_mensuel_code' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryRevenuMois'), 'add_empty' => true)),
      'cust_categorie_prof_code'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryProfessionel'), 'add_empty' => true)),
      'agence_id'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrAgency'), 'add_empty' => false)),
      'institution_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrInstitution'), 'add_empty' => false)),
      'created_by'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => false)),
      'updated_by'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => false)),
      'created_at'                     => new sfWidgetFormDateTime(),
      'updated_at'                     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'workflow_status_code'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamWorkflowStatus'))),
      'workflow_status_msg'            => new sfValidatorString(array('max_length' => 100)),
      'workflow_status_msglog'         => new sfValidatorString(array('max_length' => 4000)),
      'code_bulletin_adhesion'         => new sfValidatorString(array('max_length' => 100)),
      'code_police'                    => new sfValidatorString(array('max_length' => 100)),
      'customer_id'                    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCustomer'))),
      'loan_type_code'                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamLoanType'))),
      'main_amount'                    => new sfValidatorNumber(array('required' => false)),
      'interest_amount'                => new sfValidatorNumber(array('required' => false)),
      'assured_amount'                 => new sfValidatorNumber(array('required' => false)),
      'bank_acceptance_date'           => new sfValidatorDateTime(array('required' => false)),
      'loan_duration_months_count'     => new sfValidatorInteger(),
      'accessory_amount'               => new sfValidatorNumber(array('required' => false)),
      'other_amount'                   => new sfValidatorNumber(array('required' => false)),
      'montant_prime_net'              => new sfValidatorNumber(array('required' => false)),
      'total_prime_amount'             => new sfValidatorNumber(array('required' => false)),
      'assurance_effect_date'          => new sfValidatorDateTime(array('required' => false)),
      'first_monthly_payment_date'     => new sfValidatorDateTime(array('required' => false)),
      'assurance_end_date'             => new sfValidatorDateTime(array('required' => false)),
      'validation_status_code'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamValidationStatus'))),
      'validation_status_reason'       => new sfValidatorString(array('max_length' => 100)),
      'prime_type_code'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamPrimeType'))),
      'taux_applique'                  => new sfValidatorNumber(array('required' => false)),
      'taux_supplementaire'            => new sfValidatorNumber(array('required' => false)),
      'taux_base_deces'                => new sfValidatorNumber(array('required' => false)),
      'taux_base_ipt'                  => new sfValidatorNumber(array('required' => false)),
      'taux_surprime_deces'            => new sfValidatorNumber(array('required' => false)),
      'taux_surprime_ipt'              => new sfValidatorNumber(array('required' => false)),
      'taux_insolvabilite'             => new sfValidatorNumber(array('required' => false)),
      'cust_nom'                       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'cust_prenom'                    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'cust_date_naissance'            => new sfValidatorDateTime(array('required' => false)),
      'cust_lieu_naissance_code'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'cust_profession'                => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'cust_adresse'                   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'cust_societe_employeur'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'cust_nbre_annee_prof_code'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamNbreAnnePro'), 'required' => false)),
      'cust_categ_revenu_mensuel_code' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryRevenuMois'), 'required' => false)),
      'cust_categorie_prof_code'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryProfessionel'), 'required' => false)),
      'agence_id'                      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrAgency'))),
      'institution_id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrInstitution'))),
      'created_by'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'))),
      'updated_by'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'))),
      'created_at'                     => new sfValidatorDateTime(),
      'updated_at'                     => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'CrdmgrBulletinAdhesion', 'column' => array('code_bulletin_adhesion'))),
        new sfValidatorDoctrineUnique(array('model' => 'CrdmgrBulletinAdhesion', 'column' => array('code_police'))),
      ))
    );

    $this->widgetSchema->setNameFormat('crdmgr_bulletin_adhesion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrBulletinAdhesion';
  }

}
