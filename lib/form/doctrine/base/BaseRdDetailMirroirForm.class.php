<?php

/**
 * RdDetailMirroir form base class.
 *
 * @method RdDetailMirroir getObject() Returns the current form's model object
 *
 * @package    Rdv
 * @subpackage form
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRdDetailMirroirForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'mirroir_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('fk_detailmirroir'), 'add_empty' => false)),
      'largeur_min'          => new sfWidgetFormInputText(),
      'hauteur_min'          => new sfWidgetFormInputText(),
      'rais_bas'             => new sfWidgetFormInputText(),
      'rais_haut'            => new sfWidgetFormInputText(),
      'dormant'              => new sfWidgetFormInputText(),
      'hauteur_couvre_joint' => new sfWidgetFormInputText(),
      'largeur_couvre_joint' => new sfWidgetFormInputText(),
      'sernie'               => new sfWidgetFormInputText(),
      'chicone'              => new sfWidgetFormInputText(),
      'traverse'             => new sfWidgetFormInputText(),
      'largeur_vitre'        => new sfWidgetFormInputText(),
      'hauteur_vitre'        => new sfWidgetFormInputText(),
      'hauteur_dormant'      => new sfWidgetFormInputText(),
      'largeur_dormant'      => new sfWidgetFormInputText(),
      'hauteur_parclose30'   => new sfWidgetFormInputText(),
      'largeur_parclose30'   => new sfWidgetFormInputText(),
      'hauteur_zporte'       => new sfWidgetFormInputText(),
      'largeur_zporte'       => new sfWidgetFormInputText(),
      'traverse140'          => new sfWidgetFormInputText(),
      'hauteur_cadre'        => new sfWidgetFormInputText(),
      'largeur_cadre'        => new sfWidgetFormInputText(),
      'ljb'                  => new sfWidgetFormInputText(),
      'hjb'                  => new sfWidgetFormInputText(),
      'quantite'             => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'mirroir_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('fk_detailmirroir'))),
      'largeur_min'          => new sfValidatorNumber(array('required' => false)),
      'hauteur_min'          => new sfValidatorNumber(array('required' => false)),
      'rais_bas'             => new sfValidatorNumber(),
      'rais_haut'            => new sfValidatorNumber(),
      'dormant'              => new sfValidatorNumber(),
      'hauteur_couvre_joint' => new sfValidatorNumber(),
      'largeur_couvre_joint' => new sfValidatorNumber(),
      'sernie'               => new sfValidatorNumber(),
      'chicone'              => new sfValidatorNumber(),
      'traverse'             => new sfValidatorNumber(),
      'largeur_vitre'        => new sfValidatorNumber(array('required' => false)),
      'hauteur_vitre'        => new sfValidatorNumber(array('required' => false)),
      'hauteur_dormant'      => new sfValidatorNumber(array('required' => false)),
      'largeur_dormant'      => new sfValidatorNumber(array('required' => false)),
      'hauteur_parclose30'   => new sfValidatorNumber(array('required' => false)),
      'largeur_parclose30'   => new sfValidatorNumber(array('required' => false)),
      'hauteur_zporte'       => new sfValidatorNumber(array('required' => false)),
      'largeur_zporte'       => new sfValidatorNumber(array('required' => false)),
      'traverse140'          => new sfValidatorNumber(array('required' => false)),
      'hauteur_cadre'        => new sfValidatorNumber(array('required' => false)),
      'largeur_cadre'        => new sfValidatorNumber(array('required' => false)),
      'ljb'                  => new sfValidatorNumber(),
      'hjb'                  => new sfValidatorNumber(),
      'quantite'             => new sfValidatorNumber(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('rd_detail_mirroir[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RdDetailMirroir';
  }

}
