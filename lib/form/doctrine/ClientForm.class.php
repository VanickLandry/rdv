<?php

/**
 * Client form.
 *
 * @package    Rdv
 * @subpackage form
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClientForm extends BaseClientForm
{
  public function configure()
  {
   $this->useFields(array(
		'nom', 
		'numtel', 
		'percent', 
		'description', 
	));
	$this->widgetSchema->setLabels(array(
				'nom'    => 'Client Name',
				
		'numtel'=> 'Mobile  ',
				
			));
			 $this->validatorSchema['numtel'] = new sfValidatorNumber (array(
				'required' => false,
			));
			
 			
			
			 $this->validatorSchema['nom'] = new sfValidatorString (array(
				'required' => false,
			));
  }
}
