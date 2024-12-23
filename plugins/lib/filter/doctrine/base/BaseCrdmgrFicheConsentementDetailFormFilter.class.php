<?php

/**
 * CrdmgrFicheConsentementDetail filter form base class.
 *
 * @package    credit_mng
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrFicheConsentementDetailFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'fiche_consentement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrFicheConsentement'), 'add_empty' => true)),
      'question_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrQuestion'), 'add_empty' => true)),
      'bool_answer'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'string_answer'         => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'fiche_consentement_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrFicheConsentement'), 'column' => 'id')),
      'question_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrQuestion'), 'column' => 'id')),
      'bool_answer'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'string_answer'         => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('crdmgr_fiche_consentement_detail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrFicheConsentementDetail';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'fiche_consentement_id' => 'ForeignKey',
      'question_id'           => 'ForeignKey',
      'bool_answer'           => 'Boolean',
      'string_answer'         => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}
