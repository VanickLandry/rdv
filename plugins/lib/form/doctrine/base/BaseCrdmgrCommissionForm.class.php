<?php

/**
 * CrdmgrCommission form base class.
 *
 * @method CrdmgrCommission getObject() Returns the current form's model object
 *
 * @package    credit_mng
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrCommissionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'is_active'       => new sfWidgetFormInputCheckbox(),
      'code_commission' => new sfWidgetFormInputText(),
      'institution_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrInstitution'), 'add_empty' => false)),
      'type_commission' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamTypeCommission'), 'add_empty' => true)),
      'commission_fixe' => new sfWidgetFormInputText(),
      'taux_commission' => new sfWidgetFormInputText(),
      'created_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => false)),
      'updated_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => false)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'is_active'       => new sfValidatorBoolean(array('required' => false)),
      'code_commission' => new sfValidatorString(array('max_length' => 100)),
      'institution_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrInstitution'))),
      'type_commission' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamTypeCommission'), 'required' => false)),
      'commission_fixe' => new sfValidatorNumber(array('required' => false)),
      'taux_commission' => new sfValidatorNumber(array('required' => false)),
      'created_by'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'))),
      'updated_by'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'))),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'CrdmgrCommission', 'column' => array('code_commission')))
    );

    $this->widgetSchema->setNameFormat('crdmgr_commission[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrCommission';
  }

}
