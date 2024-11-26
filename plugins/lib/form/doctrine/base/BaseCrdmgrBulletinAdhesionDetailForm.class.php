<?php

/**
 * CrdmgrBulletinAdhesionDetail form base class.
 *
 * @method CrdmgrBulletinAdhesionDetail getObject() Returns the current form's model object
 *
 * @package    credit_mng
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrBulletinAdhesionDetailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'bulletin_adhesion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrBulletinAdhesion'), 'add_empty' => false)),
      'question_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrQuestion'), 'add_empty' => false)),
      'bool_answer'          => new sfWidgetFormInputCheckbox(),
      'string_answer'        => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'bulletin_adhesion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrBulletinAdhesion'))),
      'question_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CtrQuestion'))),
      'bool_answer'          => new sfValidatorBoolean(array('required' => false)),
      'string_answer'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('crdmgr_bulletin_adhesion_detail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrBulletinAdhesionDetail';
  }

}
