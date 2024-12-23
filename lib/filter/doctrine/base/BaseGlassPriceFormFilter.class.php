<?php

/**
 * GlassPrice filter form base class.
 *
 * @package    Rdv
 * @subpackage filter
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGlassPriceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'is_active'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'label'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'price'      => new sfWidgetFormFilterInput(),
      'created_by' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => true)),
      'updated_by' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'is_active'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'label'      => new sfValidatorPass(array('required' => false)),
      'type'       => new sfValidatorPass(array('required' => false)),
      'price'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_by' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrCreatedBy'), 'column' => 'id')),
      'updated_by' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrUpdatedBy'), 'column' => 'id')),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('glass_price_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GlassPrice';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'is_active'  => 'Boolean',
      'label'      => 'Text',
      'type'       => 'Text',
      'price'      => 'Number',
      'created_by' => 'ForeignKey',
      'updated_by' => 'ForeignKey',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
