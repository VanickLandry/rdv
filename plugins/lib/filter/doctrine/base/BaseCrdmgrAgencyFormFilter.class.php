<?php

/**
 * CrdmgrAgency filter form base class.
 *
 * @package    credit_mng
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCrdmgrAgencyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'is_active'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'code_agence'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom_agence'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'adresse'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lieu_localisation_code' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrParamLocalisation'), 'add_empty' => true)),
      'institution_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrInstitution'), 'add_empty' => true)),
      'created_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrCreatedBy'), 'add_empty' => true)),
      'updated_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CtrUpdatedBy'), 'add_empty' => true)),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'is_active'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'code_agence'            => new sfValidatorPass(array('required' => false)),
      'nom_agence'             => new sfValidatorPass(array('required' => false)),
      'adresse'                => new sfValidatorPass(array('required' => false)),
      'lieu_localisation_code' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrParamLocalisation'), 'column' => 'id')),
      'institution_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrInstitution'), 'column' => 'id')),
      'created_by'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrCreatedBy'), 'column' => 'id')),
      'updated_by'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CtrUpdatedBy'), 'column' => 'id')),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('crdmgr_agency_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CrdmgrAgency';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'is_active'              => 'Boolean',
      'code_agence'            => 'Text',
      'nom_agence'             => 'Text',
      'adresse'                => 'Text',
      'lieu_localisation_code' => 'ForeignKey',
      'institution_id'         => 'ForeignKey',
      'created_by'             => 'ForeignKey',
      'updated_by'             => 'ForeignKey',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
    );
  }
}
