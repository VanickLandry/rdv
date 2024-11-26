<?php

/**
 * RdDetailMirroir form.
 *
 * @package    test
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RdDetailMirroirForm extends BaseRdDetailMirroirForm
{
  public function configure()
  {
        $this->useFields(array(
		'largeur_min', 
		'hauteur_min', 
		// 'quantite', 
	));
	
		$this->widgetSchema['largeur_min'] = new sfWidgetFormInputText();
		$this->widgetSchema['largeur_min'] ->setAttribute('class','span1');
		$this->widgetSchema['hauteur_min'] = new sfWidgetFormInputText();
		$this->widgetSchema['hauteur_min']->setAttribute('class','span1');
$this->validatorSchema['largeur_min'] = new sfValidatorNumber (array(
				'required' => false,
			));
$this->validatorSchema['hauteur_min'] = new sfValidatorNumber (array(
				'required' => false,
			));
			
			$this->widgetSchema->setLabels(array(
				'largeur_min'    => 'L',
				'hauteur_min'    => 'H',
				
			));
			

  }
}
