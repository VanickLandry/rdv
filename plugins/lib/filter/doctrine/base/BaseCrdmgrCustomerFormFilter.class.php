<?php

/**
 * CrdmgrCustomer filter form base class.
 *
 * @package    credit_mng
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrCustomerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'is_active'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'code_client'                   => new sfWidgetFormFilterInput(),
      'nom'                           => new sfWidgetFormFilterInput(),
      'prenom'                        => new sfWidgetFormFilterInput(),
      'titre_code'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamTitre'), 'add_empty' => true)),
      'date_naissance'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'lieu_naissance_code'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sexe_code'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamSexe'), 'add_empty' => true)),
      'statut_marital_code'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamStatutMarital'), 'add_empty' => true)),
      'adresse'                       => new sfWidgetFormFilterInput(),
      'telephone'                     => new sfWidgetFormFilterInput(),
      'email'                         => new sfWidgetFormFilterInput(),
      'type_piece_identite_code'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamTypeIdentite'), 'add_empty' => true)),
      'numero_identite'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_delivrance_identite'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'lieu_delivrance_identite'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_expiration_identite'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'profession'                    => new sfWidgetFormFilterInput(),
      'societe_employeur'             => new sfWidgetFormFilterInput(),
      'secteur_activite'              => new sfWidgetFormFilterInput(),
      'date_debut_service'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'lieu_residence'                => new sfWidgetFormFilterInput(),
      'lieu_travail'                  => new sfWidgetFormFilterInput(),
      'categorie_professionel_code'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryProfessionel'), 'add_empty' => true)),
      'categorie_revenu_mensuel_code' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryRevenuMois'), 'add_empty' => true)),
      'nbre_annee_professionel_code'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamNbreAnnePro'), 'add_empty' => true)),
      'autres_sources_revenu'         => new sfWidgetFormFilterInput(),
      'autres_assurances'             => new sfWidgetFormFilterInput(),
      'agence_id'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrAgency'), 'add_empty' => true)),
      'institution_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrInstitution'), 'add_empty' => true)),
      'created_by'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => true)),
      'updated_by'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => true)),
      'created_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'is_active'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'code_client'                   => new sfValidatorPass(array('required' => false)),
      'nom'                           => new sfValidatorPass(array('required' => false)),
      'prenom'                        => new sfValidatorPass(array('required' => false)),
      'titre_code'                    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamTitre'), 'column' => 'id')),
      'date_naissance'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'lieu_naissance_code'           => new sfValidatorPass(array('required' => false)),
      'sexe_code'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamSexe'), 'column' => 'id')),
      'statut_marital_code'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamStatutMarital'), 'column' => 'id')),
      'adresse'                       => new sfValidatorPass(array('required' => false)),
      'telephone'                     => new sfValidatorPass(array('required' => false)),
      'email'                         => new sfValidatorPass(array('required' => false)),
      'type_piece_identite_code'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamTypeIdentite'), 'column' => 'id')),
      'numero_identite'               => new sfValidatorPass(array('required' => false)),
      'date_delivrance_identite'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'lieu_delivrance_identite'      => new sfValidatorPass(array('required' => false)),
      'date_expiration_identite'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'profession'                    => new sfValidatorPass(array('required' => false)),
      'societe_employeur'             => new sfValidatorPass(array('required' => false)),
      'secteur_activite'              => new sfValidatorPass(array('required' => false)),
      'date_debut_service'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'lieu_residence'                => new sfValidatorPass(array('required' => false)),
      'lieu_travail'                  => new sfValidatorPass(array('required' => false)),
      'categorie_professionel_code'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamCategoryProfessionel'), 'column' => 'id')),
      'categorie_revenu_mensuel_code' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamCategoryRevenuMois'), 'column' => 'id')),
      'nbre_annee_professionel_code'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamNbreAnnePro'), 'column' => 'id')),
      'autres_sources_revenu'         => new sfValidatorPass(array('required' => false)),
      'autres_assurances'             => new sfValidatorPass(array('required' => false)),
      'agence_id'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrAgency'), 'column' => 'id')),
      'institution_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrInstitution'), 'column' => 'id')),
      'created_by'                    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrCreatedBy'), 'column' => 'id')),
      'updated_by'                    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrUpdatedBy'), 'column' => 'id')),
      'created_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('crdmgr_customer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrCustomer';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'is_active'                     => 'Boolean',
      'code_client'                   => 'Text',
      'nom'                           => 'Text',
      'prenom'                        => 'Text',
      'titre_code'                    => 'ForeignKey',
      'date_naissance'                => 'Date',
      'lieu_naissance_code'           => 'Text',
      'sexe_code'                     => 'ForeignKey',
      'statut_marital_code'           => 'ForeignKey',
      'adresse'                       => 'Text',
      'telephone'                     => 'Text',
      'email'                         => 'Text',
      'type_piece_identite_code'      => 'ForeignKey',
      'numero_identite'               => 'Text',
      'date_delivrance_identite'      => 'Date',
      'lieu_delivrance_identite'      => 'Text',
      'date_expiration_identite'      => 'Date',
      'profession'                    => 'Text',
      'societe_employeur'             => 'Text',
      'secteur_activite'              => 'Text',
      'date_debut_service'            => 'Date',
      'lieu_residence'                => 'Text',
      'lieu_travail'                  => 'Text',
      'categorie_professionel_code'   => 'ForeignKey',
      'categorie_revenu_mensuel_code' => 'ForeignKey',
      'nbre_annee_professionel_code'  => 'ForeignKey',
      'autres_sources_revenu'         => 'Text',
      'autres_assurances'             => 'Text',
      'agence_id'                     => 'ForeignKey',
      'institution_id'                => 'ForeignKey',
      'created_by'                    => 'ForeignKey',
      'updated_by'                    => 'ForeignKey',
      'created_at'                    => 'Date',
      'updated_at'                    => 'Date',
    );
  }
}
