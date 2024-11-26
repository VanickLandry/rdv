<?php

/**
 * CrdmgrCustomer form base class.
 *
 * @method CrdmgrCustomer getObject() Returns the current form's model object
 *
 * @package    credit_mng
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrCustomerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'is_active'                     => new sfWidgetFormInputCheckbox(),
      'code_client'                   => new sfWidgetFormInputText(),
      'nom'                           => new sfWidgetFormInputText(),
      'prenom'                        => new sfWidgetFormInputText(),
      'titre_code'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamTitre'), 'add_empty' => false)),
      'date_naissance'                => new sfWidgetFormDateTime(),
      'lieu_naissance_code'           => new sfWidgetFormInputText(),
      'sexe_code'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamSexe'), 'add_empty' => false)),
      'statut_marital_code'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamStatutMarital'), 'add_empty' => false)),
      'adresse'                       => new sfWidgetFormInputText(),
      'telephone'                     => new sfWidgetFormInputText(),
      'email'                         => new sfWidgetFormInputText(),
      'type_piece_identite_code'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamTypeIdentite'), 'add_empty' => false)),
      'numero_identite'               => new sfWidgetFormInputText(),
      'date_delivrance_identite'      => new sfWidgetFormDateTime(),
      'lieu_delivrance_identite'      => new sfWidgetFormInputText(),
      'date_expiration_identite'      => new sfWidgetFormDateTime(),
      'profession'                    => new sfWidgetFormInputText(),
      'societe_employeur'             => new sfWidgetFormInputText(),
      'secteur_activite'              => new sfWidgetFormInputText(),
      'date_debut_service'            => new sfWidgetFormDateTime(),
      'lieu_residence'                => new sfWidgetFormInputText(),
      'lieu_travail'                  => new sfWidgetFormInputText(),
      'categorie_professionel_code'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryProfessionel'), 'add_empty' => false)),
      'categorie_revenu_mensuel_code' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryRevenuMois'), 'add_empty' => false)),
      'nbre_annee_professionel_code'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamNbreAnnePro'), 'add_empty' => false)),
      'autres_sources_revenu'         => new sfWidgetFormInputText(),
      'autres_assurances'             => new sfWidgetFormInputText(),
      'agence_id'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrAgency'), 'add_empty' => false)),
      'institution_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrInstitution'), 'add_empty' => false)),
      'created_by'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => false)),
      'updated_by'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => false)),
      'created_at'                    => new sfWidgetFormDateTime(),
      'updated_at'                    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'is_active'                     => new sfValidatorBoolean(array('required' => false)),
      'code_client'                   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'nom'                           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'prenom'                        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'titre_code'                    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamTitre'))),
      'date_naissance'                => new sfValidatorDateTime(array('required' => false)),
      'lieu_naissance_code'           => new sfValidatorString(array('max_length' => 100)),
      'sexe_code'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamSexe'))),
      'statut_marital_code'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamStatutMarital'))),
      'adresse'                       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'telephone'                     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email'                         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'type_piece_identite_code'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamTypeIdentite'))),
      'numero_identite'               => new sfValidatorString(array('max_length' => 100)),
      'date_delivrance_identite'      => new sfValidatorDateTime(array('required' => false)),
      'lieu_delivrance_identite'      => new sfValidatorString(array('max_length' => 100)),
      'date_expiration_identite'      => new sfValidatorDateTime(array('required' => false)),
      'profession'                    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'societe_employeur'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'secteur_activite'              => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'date_debut_service'            => new sfValidatorDateTime(array('required' => false)),
      'lieu_residence'                => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'lieu_travail'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'categorie_professionel_code'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryProfessionel'))),
      'categorie_revenu_mensuel_code' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamCategoryRevenuMois'))),
      'nbre_annee_professionel_code'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamNbreAnnePro'))),
      'autres_sources_revenu'         => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'autres_assurances'             => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'agence_id'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrAgency'))),
      'institution_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrInstitution'))),
      'created_by'                    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'))),
      'updated_by'                    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'))),
      'created_at'                    => new sfValidatorDateTime(),
      'updated_at'                    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'CrdmgrCustomer', 'column' => array('code_client')))
    );

    $this->widgetSchema->setNameFormat('crdmgr_customer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrCustomer';
  }

}
