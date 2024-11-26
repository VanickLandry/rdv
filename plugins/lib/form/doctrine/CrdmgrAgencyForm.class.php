<?php

/**
 * CrdmgrAgency form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     achilleromuald@gmail.com at 20100921_174605
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrAgencyForm extends BaseCrdmgrAgencyForm
{
  public function configure()
  {	
		// champs dispo: id,is_active,nom_agence,adresse,lieu_localisation_code,institution_id,created_by,updated_by,created_at,updated_at

 

		// retirer les champs(internes) à ne pas saisir
		// unset( $this['created_at'], $this['updated_at'], $this['created_by'], $this['updated_by']	);
		// preciser les champs à utiliser
		$this->useFields(array('is_active','nom_agence','adresse','lieu_localisation_code','institution_id'));

		// corriger au besoin les champs de saisie des valeurs
		// $this->widgetSchema['code_parametre'] = new sfWidgetFormInputText();
	

	
		// preciser les valeurs pour liste deroulantes personnalisé
		$this->widgetSchema['institution_id'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrInstitution'),
				'key_method' => 'getId', 'method' => 'getNomInstitution',
				'query' => Doctrine::getTable('CrdmgrInstitution')->createQuery('a'), 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));

		$this->widgetSchema['lieu_localisation_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamLocalisation'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'ville')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));

		// validateurs pour liste deroulantes
		$this->validatorSchema['institution_id'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrInstitution'),
				'query' => Doctrine::getTable('CrdmgrInstitution')->createQuery('a'),
				'column' => 'id',
			));

		$this->validatorSchema['lieu_localisation_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamLocalisation'),
				'column' => 'code_parametre',
			));

		
		// preciser les autres validators
		$this->validatorSchema['nom_agence'] = new sfValidatorString(array('min_length' => 2, 'required' => true), array(
								'required'   => 'Nom agence requis',
								'min_length' => 'Nom agence trop court. il doit avoir au moins %min_length% caracteres.',
							  ));

		// preciser les descriptifs
		// $this->widgetSchema->setHelp('is_active', "Etat d'activation du parametre.");


		// preciser les labels
		$this->widgetSchema->setLabels(array(
				'is_active'    => 'Actif ?',
				'institution_id'    => 'Entreprise',
				'nom_agence'    => 'Nom agence',
				'adresse'    => 'Adresse',
				'lieu_localisation_code'    => 'Ville',
			));
  }
}
