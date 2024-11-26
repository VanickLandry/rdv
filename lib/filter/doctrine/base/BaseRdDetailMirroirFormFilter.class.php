<?php

/**
 * RdDetailMirroir filter form base class.
 *
 * @package    Rdv
 * @subpackage filter
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRdDetailMirroirFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mirroir_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('fk_detailmirroir'), 'add_empty' => true)),
      'largeur_min'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hauteur_min'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rais_bas'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rais_haut'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dormant'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hauteur_couvre_joint' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'largeur_couvre_joint' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sernie'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chicone'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'traverse'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'largeur_vitre'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hauteur_vitre'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hauteur_dormant'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'largeur_dormant'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hauteur_parclose30'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'largeur_parclose30'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hauteur_zporte'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'largeur_zporte'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'traverse140'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hauteur_cadre'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'largeur_cadre'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ljb'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hjb'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'quantite'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'mirroir_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('fk_detailmirroir'), 'column' => 'id')),
      'largeur_min'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'hauteur_min'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'rais_bas'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'rais_haut'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'dormant'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'hauteur_couvre_joint' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'largeur_couvre_joint' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'sernie'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'chicone'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'traverse'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'largeur_vitre'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'hauteur_vitre'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'hauteur_dormant'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'largeur_dormant'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'hauteur_parclose30'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'largeur_parclose30'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'hauteur_zporte'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'largeur_zporte'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'traverse140'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'hauteur_cadre'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'largeur_cadre'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'ljb'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'hjb'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'quantite'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('rd_detail_mirroir_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RdDetailMirroir';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'mirroir_id'           => 'ForeignKey',
      'largeur_min'          => 'Number',
      'hauteur_min'          => 'Number',
      'rais_bas'             => 'Number',
      'rais_haut'            => 'Number',
      'dormant'              => 'Number',
      'hauteur_couvre_joint' => 'Number',
      'largeur_couvre_joint' => 'Number',
      'sernie'               => 'Number',
      'chicone'              => 'Number',
      'traverse'             => 'Number',
      'largeur_vitre'        => 'Number',
      'hauteur_vitre'        => 'Number',
      'hauteur_dormant'      => 'Number',
      'largeur_dormant'      => 'Number',
      'hauteur_parclose30'   => 'Number',
      'largeur_parclose30'   => 'Number',
      'hauteur_zporte'       => 'Number',
      'largeur_zporte'       => 'Number',
      'traverse140'          => 'Number',
      'hauteur_cadre'        => 'Number',
      'largeur_cadre'        => 'Number',
      'ljb'                  => 'Number',
      'hjb'                  => 'Number',
      'quantite'             => 'Number',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
