<?php

/**
 * Estimation filter form base class.
 *
 * @package    Rdv
 * @subpackage filter
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstimationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'is_active'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'length'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'width'         => new sfWidgetFormFilterInput(),
      'percent'       => new sfWidgetFormFilterInput(),
      'price'         => new sfWidgetFormFilterInput(),
      'glassprice_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('glasspriceestimation'), 'add_empty' => true)),
      'created_by'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => true)),
      'updated_by'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => true)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'is_active'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'length'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'width'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'percent'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'price'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'glassprice_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('glasspriceestimation'), 'column' => 'id')),
      'created_by'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrCreatedBy'), 'column' => 'id')),
      'updated_by'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrUpdatedBy'), 'column' => 'id')),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('estimation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estimation';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'is_active'     => 'Boolean',
      'length'        => 'Number',
      'width'         => 'Number',
      'percent'       => 'Number',
      'price'         => 'Number',
      'glassprice_id' => 'ForeignKey',
      'created_by'    => 'ForeignKey',
      'updated_by'    => 'ForeignKey',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
