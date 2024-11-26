<?php

/**
 * CrdmgrFicheConsentement filter form base class.
 *
 * @package    credit_mng
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrFicheConsentementFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'workflow_status_code'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamWorkflowStatus'), 'add_empty' => true)),
      'workflow_status_msg'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'workflow_status_msglog'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code_fiche_consentement'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'customer_id'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCustomer'), 'add_empty' => true)),
      'loan_type_code'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamLoanType'), 'add_empty' => true)),
      'main_amount'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'interest_amount'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'assured_amount'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'loan_duration_months_count'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'accessory_amount'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'other_amount'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'montant_prime_net'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'total_prime_amount'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'assurance_effect_date'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'first_monthly_payment_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'assurance_end_date'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'taux_applique'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'taux_supplementaire'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cust_nom'                       => new sfWidgetFormFilterInput(),
      'cust_prenom'                    => new sfWidgetFormFilterInput(),
      'cust_date_naissance'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'cust_lieu_naissance_code'       => new sfWidgetFormFilterInput(),
      'cust_profession'                => new sfWidgetFormFilterInput(),
      'cust_adresse'                   => new sfWidgetFormFilterInput(),
      'cust_societe_employeur'         => new sfWidgetFormFilterInput(),
      'cust_nbre_annee_prof_code'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamNbreAnnePro'), 'add_empty' => true)),
      'cust_categ_revenu_mensuel_code' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryRevenuMois'), 'add_empty' => true)),
      'cust_categorie_prof_code'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryProfessionel'), 'add_empty' => true)),
      'agence_id'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrAgency'), 'add_empty' => true)),
      'institution_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrInstitution'), 'add_empty' => true)),
      'created_by'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => true)),
      'updated_by'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => true)),
      'created_at'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'workflow_status_code'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamWorkflowStatus'), 'column' => 'id')),
      'workflow_status_msg'            => new sfValidatorPass(array('required' => false)),
      'workflow_status_msglog'         => new sfValidatorPass(array('required' => false)),
      'code_fiche_consentement'        => new sfValidatorPass(array('required' => false)),
      'customer_id'                    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrCustomer'), 'column' => 'id')),
      'loan_type_code'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamLoanType'), 'column' => 'id')),
      'main_amount'                    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'interest_amount'                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'assured_amount'                 => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'loan_duration_months_count'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'accessory_amount'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'other_amount'                   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'montant_prime_net'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'total_prime_amount'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'assurance_effect_date'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'first_monthly_payment_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'assurance_end_date'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'taux_applique'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'taux_supplementaire'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cust_nom'                       => new sfValidatorPass(array('required' => false)),
      'cust_prenom'                    => new sfValidatorPass(array('required' => false)),
      'cust_date_naissance'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cust_lieu_naissance_code'       => new sfValidatorPass(array('required' => false)),
      'cust_profession'                => new sfValidatorPass(array('required' => false)),
      'cust_adresse'                   => new sfValidatorPass(array('required' => false)),
      'cust_societe_employeur'         => new sfValidatorPass(array('required' => false)),
      'cust_nbre_annee_prof_code'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamNbreAnnePro'), 'column' => 'id')),
      'cust_categ_revenu_mensuel_code' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamCategoryRevenuMois'), 'column' => 'id')),
      'cust_categorie_prof_code'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamCategoryProfessionel'), 'column' => 'id')),
      'agence_id'                      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrAgency'), 'column' => 'id')),
      'institution_id'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrInstitution'), 'column' => 'id')),
      'created_by'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrCreatedBy'), 'column' => 'id')),
      'updated_by'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrUpdatedBy'), 'column' => 'id')),
      'created_at'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('crdmgr_fiche_consentement_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrFicheConsentement';
  }

  public function getFields()
  {
    return array(
      'id'                             => 'Number',
      'workflow_status_code'           => 'ForeignKey',
      'workflow_status_msg'            => 'Text',
      'workflow_status_msglog'         => 'Text',
      'code_fiche_consentement'        => 'Text',
      'customer_id'                    => 'ForeignKey',
      'loan_type_code'                 => 'ForeignKey',
      'main_amount'                    => 'Number',
      'interest_amount'                => 'Number',
      'assured_amount'                 => 'Number',
      'loan_duration_months_count'     => 'Number',
      'accessory_amount'               => 'Number',
      'other_amount'                   => 'Number',
      'montant_prime_net'              => 'Number',
      'total_prime_amount'             => 'Number',
      'assurance_effect_date'          => 'Date',
      'first_monthly_payment_date'     => 'Date',
      'assurance_end_date'             => 'Date',
      'taux_applique'                  => 'Number',
      'taux_supplementaire'            => 'Number',
      'cust_nom'                       => 'Text',
      'cust_prenom'                    => 'Text',
      'cust_date_naissance'            => 'Date',
      'cust_lieu_naissance_code'       => 'Text',
      'cust_profession'                => 'Text',
      'cust_adresse'                   => 'Text',
      'cust_societe_employeur'         => 'Text',
      'cust_nbre_annee_prof_code'      => 'ForeignKey',
      'cust_categ_revenu_mensuel_code' => 'ForeignKey',
      'cust_categorie_prof_code'       => 'ForeignKey',
      'agence_id'                      => 'ForeignKey',
      'institution_id'                 => 'ForeignKey',
      'created_by'                     => 'ForeignKey',
      'updated_by'                     => 'ForeignKey',
      'created_at'                     => 'Date',
      'updated_at'                     => 'Date',
    );
  }
}
