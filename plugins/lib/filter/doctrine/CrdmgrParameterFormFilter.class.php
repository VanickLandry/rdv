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

		//champs dispo: is_active,type_parametre,code_parametre,label_param,valeur_string,valeur_numeric,description_param,created_by,updated_by,created_at,updated_at

		// preciser les champs à utiliser : is_active,type_parametre,valeur_string
		$this->useFields(array( 'type_parametre', 'valeur_string', 'is_active'));


		// form fields
		$this->widgetSchema['valeur_string'] = new sfWidgetFormInputText();

		// preciser les valeurs pour liste deroulantes personnalisé
		$this->widgetSchema['type_parametre'] = new sfWidgetFormChoice(array(
				'choices'  => Doctrine_Core::getTable('CrdmgrParameter')->getTypeParametres(),
				'expanded' => false, 'multiple' => false,
			));


		// validator
		$this->validatorSchema['type_parametre'] = new sfValidatorChoice(array(
			'choices' =>
			array_keys(Doctrine_Core::getTable('CrdmgrParameter')->getTypeParametres()),
			));

		// other validator
		$this->validatorSchema['valeur_string'] = new sfValidatorString(array('min_length' => 0, 'required' => false)
								, array(
								'required'   => 'Valeur requise',
								'min_length' => 'Valeur trop courte. elle doit avoir au moins %min_length% caracteres.',
							  ));


		
		// Initialiser le filtre
		//$usr = sfContext::getInstance()->getUser();
		//$formFilter = $usr->getAttribute('mlparameter.filters', array(), 'mlparameter');
 

 		// preciser les labels
		$this->widgetSchema->setLabels(array(
				//'{0}'    => '{0}',
				'is_active'    => 'Actif ?',
				'type_parametre'    => 'Type parametre',
				'valeur_string'    => 'Valeur',
			));		

  }


	public function doBuildQuery(array $values) 
	{

		// create standard query for invoice
		$query = parent::doBuildQuery($values);

		// add our joins for product
		//$query->innerJoin("r.InvoiceProduct ip")
		//			->innerJoin("ip.Product p"); 

		if (isset($values['type_parametre']) && $values['type_parametre'] != "")
		{
			$query->addWhere("type_parametre = ?", $values['type_parametre']);
		}

		if (isset($values['valeur_string']) && $values['valeur_string'] != "")
		{
			$query->addWhere("valeur_string like ?", "%".$values['valeur_string']."%");
		}

		if (isset($values['is_active']) && $values['is_active'] != "")
		{
			$query->addWhere("is_active = ?", $values['is_active']);
		}

		return $query;

	}
}
