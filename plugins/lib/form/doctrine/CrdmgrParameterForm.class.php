<?php

/**
 * CrdmgrParameter form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     achilleromuald@gmail.com at 20100921_114759
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrParameterForm extends BaseCrdmgrParameterForm
{

  public function configure()
  {	



		// $usr = sfContext::getInstance()->getUser();


		// retirer les champs(internes) à ne pas saisir
		// unset( $this['created_at'], $this['updated_at'], $this['created_by'], $this['updated_by']	);
		// preciser les champs à utiliser
		$this->useFields(array('is_active', 'type_parametre', 'code_parametre', 'label_param',
						'valeur_string', 'valeur_numeric', 'description_param'));

		// corriger au besoin les champs de saisie des valeurs
		$this->widgetSchema['code_parametre'] = new sfWidgetFormInputText(); 

		// preciser les valeurs pour liste deroulantes personnalisé
		$this->widgetSchema['type_parametre'] = new sfWidgetFormChoice(array(
				'choices'  => Doctrine_Core::getTable('CrdmgrParameter')->getTypeParametres(),
				'expanded' => false, 'multiple' => false,
			));
		 
		$this->validatorSchema['type_parametre'] = new sfValidatorChoice(array(
			'choices' =>
			array_keys(Doctrine_Core::getTable('CrdmgrParameter')->getTypeParametres()),
			));
		
		// preciser les validator
		$this->validatorSchema['code_parametre'] = new sfValidatorString(array('min_length' => 2, 'required' => true), array(
								'required'   => 'Code parametre est requis',
								'min_length' => 'Code parametre est requis trop court. il doit avoir au moins %min_length% caracteres.',
							  ));

		// preciser les labels
		$this->widgetSchema->setLabels(array(
			'valeur_string'    => 'Valeur chaines de caracteres',
			'valeur_numeric'      => 'Valeur numerique',
			'description_param'   => 'Description',
			'label_param'   => 'Libelle',
			'is_active'   => 'Actif ?',
			'type_parametre'   => 'Classe parametre',
			));

		// preciser les descriptifs
		// $this->widgetSchema->setHelp('is_active', "Etat d'activation du parametre.");




  }
}
