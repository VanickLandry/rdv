<?php

/**
 * Estimation form base class.
 *
 * @method Estimation getObject() Returns the current form's model object
 *
 * @package    Rdv
 * @subpackage form
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstimationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'is_active'     => new sfWidgetFormInputCheckbox(),
      'length'        => new sfWidgetFormInputText(),
      'width'         => new sfWidgetFormInputText(),
      'percent'       => new sfWidgetFormInputText(),
      'price'         => new sfWidgetFormInputText(),
      'glassprice_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('glasspriceestimation'), 'add_empty' => true)),
      'created_by'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => true)),
      'updated_by'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => true)),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'is_active'     => new sfValidatorBoolean(array('required' => false)),
      'length'        => new sfValidatorNumber(),
      'width'         => new sfValidatorNumber(array('required' => false)),
      'percent'       => new sfValidatorNumber(array('required' => false)),
      'price'         => new sfValidatorNumber(array('required' => false)),
      'glassprice_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('glasspriceestimation'), 'required' => false)),
      'created_by'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'required' => false)),
      'updated_by'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('estimation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estimation';
  }

}
