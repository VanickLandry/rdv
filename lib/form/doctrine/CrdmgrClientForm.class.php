<?php

/**
 * CrdmgrAgency form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     achilleromuald@gmail.com at 20100921_174605
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrClientForm extends BaseCrdmgrClientForm
{
  public function configure()
  {	
		// champs dispo: id,is_active,nom_agence,adresse,lieu_localisation_code,institution_id,created_by,updated_by,created_at,updated_at

 

		// retirer les champs(internes) à ne pas saisir
		// unset( $this['created_at'], $this['updated_at'], $this['created_by'], $this['updated_by']	);
		// preciser les champs à utiliser
		$this->useFields(array('is_active','nom_client','secteuractivite','adresse','telephone','email','lieu_localisation_code'));

		// corriger au besoin les champs de saisie des valeurs
		// $this->widgetSchema['code_parametre'] = new sfWidgetFormInputText();
	

	
		// preciser les valeurs pour liste deroulantes personnalisé

		$this->widgetSchema['lieu_localisation_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamLocalisation'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'ville')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));

		// validateurs pour liste deroulantes

		$this->validatorSchema['lieu_localisation_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamLocalisation'),
				'column' => 'code_parametre',
			));

		
		// preciser les autres validators
		$this->validatorSchema['nom_client'] = new sfValidatorString(array('min_length' => 2, 'required' => true), array(
								'required'   => 'Nom client requis',
								'min_length' => 'Nom client trop court. il doit avoir au moins %min_length% caracteres.',
							  ));

		// preciser les descriptifs
		// $this->widgetSchema->setHelp('is_active', "Etat d'activation du parametre.");


		// preciser les labels
		$this->widgetSchema->setLabels(array(
				'is_active'    => 'Actif ?',
				'nom_client'    => 'Nom de l\'entreprise',
				'secteuractivite'    => 'Secteur Activite',
				'telephone'    => 'Telephone',
				'adresse'    => 'Adresse',
				'email'    => 'Email',			
				'lieu_localisation_code'    => 'Ville',
			));
  }
}
