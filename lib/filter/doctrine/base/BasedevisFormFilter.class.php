<?php

/**
 * Devis filter form base class.
 *
 * @package    Rdv
 * @subpackage filter
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDevisFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'is_active'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'largeur'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hauteur'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'prix'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'codetype'   => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'is_active'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'largeur'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'hauteur'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'type'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'prix'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'codetype'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('devis_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Devis';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'is_active'  => 'Boolean',
      'largeur'    => 'Number',
      'hauteur'    => 'Number',
      'type'       => 'Number',
      'prix'       => 'Number',
      'codetype'   => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
