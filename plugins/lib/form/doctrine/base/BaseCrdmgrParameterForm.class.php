<?php

/**
 * CrdmgrParameter form base class.
 *
 * @method CrdmgrParameter getObject() Returns the current form's model object
 *
 * @package    credit_mng
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrParameterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'is_active'         => new sfWidgetFormInputCheckbox(),
      'type_parametre'    => new sfWidgetFormInputText(),
      'code_parametre'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CrdmgrCommission'), 'add_empty' => false)),
      'label_param'       => new sfWidgetFormInputText(),
      'valeur_string'     => new sfWidgetFormInputText(),
      'valeur_numeric'    => new sfWidgetFormInputText(),
      'description_param' => new sfWidgetFormInputText(),
      'created_by'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => false)),
      'updated_by'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => false)),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'is_active'         => new sfValidatorBoolean(array('required' => false)),
      'type_parametre'    => new sfValidatorString(array('max_length' => 100)),
      'code_parametre'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CrdmgrCommission'))),
      'label_param'       => new sfValidatorString(array('max_length' => 150)),
      'valeur_string'     => new sfValidatorString(array('max_length' => 200)),
      'valeur_numeric'    => new sfValidatorNumber(array('required' => false)),
      'description_param' => new sfValidatorString(array('max_length' => 150)),
      'created_by'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'))),
      'updated_by'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'))),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'CrdmgrParameter', 'column' => array('code_parametre')))
    );

    $this->widgetSchema->setNameFormat('crdmgr_parameter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrParameter';
  }

}
