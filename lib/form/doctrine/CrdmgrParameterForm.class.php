<?php

/**
 * CrdmgrParameter form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrParameterForm extends BaseCrdmgrParameterForm
{
  public function configure()
  {
  
  		$this->useFields(array(
		// 'type_parametre',
		// 'code_parametre',
		'label_param',
		'valeur_numeric',
		'valeur_string',
		// 'description_param'
		));
$this->widgetSchema->setLabels(array(
				// 'type_parametre'    => 'Type',
				// 'code_parametre'    => 'Code',
				'label_param'    => 'Label',
				'valeur_numeric'    => 'Dimension',
				'valeur_string'    => 'Price Or Unit meter Price',
				// 'valeur_numeric'    => 'Numeric value',
				// 'description_param'    => 'Description',			
			));
  }
}
