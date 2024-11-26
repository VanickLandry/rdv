<?php

/**
 * Devis form base class.
 *
 * @method Devis getObject() Returns the current form's model object
 *
 * @package    Rdv
 * @subpackage form
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDevisForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'is_active'  => new sfWidgetFormInputCheckbox(),
      'largeur'    => new sfWidgetFormInputText(),
      'hauteur'    => new sfWidgetFormInputText(),
      'type'       => new sfWidgetFormInputText(),
      'prix'       => new sfWidgetFormInputText(),
      'codetype'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'is_active'  => new sfValidatorBoolean(array('required' => false)),
      'largeur'    => new sfValidatorNumber(),
      'hauteur'    => new sfValidatorNumber(),
      'type'       => new sfValidatorNumber(),
      'prix'       => new sfValidatorNumber(),
      'codetype'   => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('devis[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Devis';
  }

}
