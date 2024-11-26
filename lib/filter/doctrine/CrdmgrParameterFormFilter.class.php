<?php

/**
 * CrdmgrParameter filter form.
 *
 * @package    credit_mng
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrParameterFormFilter extends BaseCrdmgrParameterFormFilter
{
  public function configure()
  {
  
  
 
  $this->widgetSchema->setLabels(array(
				// 'type_parametre'    => 'Type',
				// 'code_parametre'    => 'Code',
				'label_param'    => 'Label',
				'valeur_numeric'    => 'Dimension ',
				'valeur_string'    => 'Prix ',
				// 'valeur_numeric'    => 'Numeric value',
				// 'description_param'    => 'Description',			
			));
  }
}
