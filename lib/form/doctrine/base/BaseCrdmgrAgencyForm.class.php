<?php

/**
 * CrdmgrAgency form base class.
 *
 * @method CrdmgrAgency getObject() Returns the current form's model object
 *
 * @package    Rdv
 * @subpackage form
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrAgencyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'is_active'              => new sfWidgetFormInputCheckbox(),
      'code_agence'            => new sfWidgetFormInputText(),
      'nom_agence'             => new sfWidgetFormInputText(),
      'adresse'                => new sfWidgetFormInputText(),
      'lieu_localisation_code' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamLocalisation'), 'add_empty' => false)),
      'institution_id'         => new sfWidgetFormInputText(),
      'telephone'              => new sfWidgetFormInputText(),
      'email'                  => new sfWidgetFormInputText(),
      'created_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => false)),
      'updated_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => false)),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'is_active'              => new sfValidatorBoolean(array('required' => false)),
      'code_agence'            => new sfValidatorString(array('max_length' => 100)),
      'nom_agence'             => new sfValidatorString(array('max_length' => 100)),
      'adresse'                => new sfValidatorString(array('max_length' => 100)),
      'lieu_localisation_code' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamLocalisation'))),
      'institution_id'         => new sfValidatorInteger(),
      'telephone'              => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_by'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'))),
      'updated_by'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'))),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'CrdmgrAgency', 'column' => array('code_agence')))
    );

    $this->widgetSchema->setNameFormat('crdmgr_agency[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrAgency';
  }

}
