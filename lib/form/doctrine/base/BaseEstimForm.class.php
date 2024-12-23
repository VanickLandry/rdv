<?php

/**
 * Estim form base class.
 *
 * @method Estim getObject() Returns the current form's model object
 *
 * @package    Rdv
 * @subpackage form
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstimForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'is_active'  => new sfWidgetFormInputCheckbox(),
      'largeur'    => new sfWidgetFormInputText(),
      'hauteur'    => new sfWidgetFormInputText(),
      'nombre_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('fk_detail'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'is_active'  => new sfValidatorBoolean(array('required' => false)),
      'largeur'    => new sfValidatorNumber(),
      'hauteur'    => new sfValidatorNumber(),
      'nombre_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('fk_detail'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('estim[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estim';
  }

}
