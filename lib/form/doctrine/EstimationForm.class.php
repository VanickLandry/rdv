<?php

/**
 * Estimation form.
 *
 * @package    simuce
 * @subpackage form
 * @author     UCE - Désire Talla Tueguem
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EstimationForm extends BaseEstimationForm
{
  public function configure()
  {
   $this->useFields(array(
		'length', 
		'width', 
		// 'percent', 
		
       
	));
	  // $this->validatorSchema['length'] = new sfValidatorNumber (array(
				// 'required' => false,
			// ));

			  // $this->validatorSchema['width'] = new sfValidatorNumber (array(
				// 'required' => false,
			// ));

	$this->widgetSchema->setLabels(array(
				'percent'    => '% ',
				// 'hauteur_min'    => 'Hauteur desiree',
	
				
			));
  }
}
