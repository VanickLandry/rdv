<?php

/**
 * GlassPrice form.
 *
 * @package    simuce
 * @subpackage form
 * @author     UCE - Désire Talla Tueguem
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GlassPriceForm extends BaseGlassPriceForm
{
  public function configure()
  {
   $this->useFields(array(
		'label', 
		'price', 
		// 'quantite', 
	
		
       
	));
	
		$this->widgetSchema->setLabels(array(
				'label'    => 'Type  ',
				
		'price'=> 'Unit Price  ',
				
			));
  }
}
