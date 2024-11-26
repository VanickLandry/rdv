<?php

/**
 * Client form base class.
 *
 * @method Client getObject() Returns the current form's model object
 *
 * @package    Rdv
 * @subpackage form
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClientForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'nom'         => new sfWidgetFormInputText(),
      'numtel'      => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'percent'     => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'is_active'   => new sfValidatorBoolean(array('required' => false)),
      'nom'         => new sfValidatorString(array('max_length' => 255)),
      'numtel'      => new sfValidatorString(array('max_length' => 15)),
      'description' => new sfValidatorString(array('max_length' => 1000)),
      'percent'     => new sfValidatorNumber(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('client[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Client';
  }

}
