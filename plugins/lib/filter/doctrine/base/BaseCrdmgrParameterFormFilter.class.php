<?php

/**
 * CrdmgrParameter filter form base class.
 *
 * @package    credit_mng
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrParameterFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'is_active'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'type_parametre'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code_parametre'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CrdmgrCommission'), 'add_empty' => true)),
      'label_param'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'valeur_string'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'valeur_numeric'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description_param' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_by'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => true)),
      'updated_by'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => true)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'is_active'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'type_parametre'    => new sfValidatorPass(array('required' => false)),
      'code_parametre'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CrdmgrCommission'), 'column' => 'id')),
      'label_param'       => new sfValidatorPass(array('required' => false)),
      'valeur_string'     => new sfValidatorPass(array('required' => false)),
      'valeur_numeric'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'description_param' => new sfValidatorPass(array('required' => false)),
      'created_by'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrCreatedBy'), 'column' => 'id')),
      'updated_by'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrUpdatedBy'), 'column' => 'id')),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('crdmgr_parameter_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrParameter';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'is_active'         => 'Boolean',
      'type_parametre'    => 'Text',
      'code_parametre'    => 'ForeignKey',
      'label_param'       => 'Text',
      'valeur_string'     => 'Text',
      'valeur_numeric'    => 'Number',
      'description_param' => 'Text',
      'created_by'        => 'ForeignKey',
      'updated_by'        => 'ForeignKey',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
