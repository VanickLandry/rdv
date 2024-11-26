<?php

/**
 * CrdmgrClient form base class.
 *
 * @method CrdmgrClient getObject() Returns the current form's model object
 *
 * @package    Rdv
 * @subpackage form
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrClientForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'is_active'              => new sfWidgetFormInputCheckbox(),
      'code_client'            => new sfWidgetFormInputText(),
      'nom_client'             => new sfWidgetFormInputText(),
      'secteuractivite'        => new sfWidgetFormInputText(),
      'adresse'                => new sfWidgetFormInputText(),
      'telephone'              => new sfWidgetFormInputText(),
      'email'                  => new sfWidgetFormInputText(),
      'lieu_localisation_code' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamLocalisation'), 'add_empty' => false)),
      'created_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => false)),
      'updated_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => false)),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'is_active'              => new sfValidatorBoolean(array('required' => false)),
      'code_client'            => new sfValidatorString(array('max_length' => 100)),
      'nom_client'             => new sfValidatorString(array('max_length' => 100)),
      'secteuractivite'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'adresse'                => new sfValidatorString(array('max_length' => 100)),
      'telephone'              => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'lieu_localisation_code' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamLocalisation'))),
      'created_by'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'))),
      'updated_by'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'))),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'CrdmgrClient', 'column' => array('code_client')))
    );

    $this->widgetSchema->setNameFormat('crdmgr_client[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrClient';
  }

}
