<?php

/**
 * CrdmgrBulletinAdhesionDetail form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrBulletinAdhesionDetailForm extends BaseCrdmgrBulletinAdhesionDetailForm
{
  public function configure()
  {

		// champs dispo: id,fiche_consentement_id,question_id,bool_answer,string_answer,created_by,updated_by


		// retirer les champs(internes) à ne pas saisir
		// unset( $this['created_at'], $this['updated_at'], $this['created_by'], $this['updated_by']	);
		// preciser les champs à utiliser
		$this->useFields(array('bool_answer', 'string_answer'));
         

		
		// corriger au besoin les champs de saisie des valeurs
		// $this->widgetSchema['code_parametre'] = new sfWidgetFormInputText();
	

		
		/*
		// preciser les valeurs pour liste deroulantes personnalisé
		$this->widgetSchema['user_id'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrGuardUser'),
				'key_method' => 'getId', 'method' => 'getUserSummary',
				'query' => Doctrine::getTable('sfGuardUser')->createQuery('a')->orderBy('a.username asc, a.email_address asc')  ,  
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));

		$this->widgetSchema['agence_id'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrAgency'), 				
				'key_method' => 'getId', 'method' => 'getAgencySummary',
				'query' => Doctrine::getTable('CrdmgrAgency')->createQuery('a')->orderBy('a.nom_agence asc, a.nom_agence asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));

		// validateurs pour liste deroulantes
		$this->validatorSchema['user_id'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrGuardUser'),
				// 'query' => Doctrine::getTable('CrdmgrInstitution')->createQuery('a'),
				'column' => 'id',
			));

		$this->validatorSchema['agence_id'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrAgency'),
				'column' => 'id',
			));

		*/
		// preciser les autres validators
		/**
		$this->validatorSchema['nom_agence'] = new sfValidatorString(array('min_length' => 2, 'required' => true), array(
								'required'   => 'Nom agence requis',
								'min_length' => 'Nom agence trop court. il doit avoir au moins %min_length% caracteres.',
							  )); */

		// preciser les descriptifs
		// $this->widgetSchema->setHelp('bool_answer', "Oui/Non ?");


		// preciser les labels
		$this->widgetSchema->setLabels(array(
				'bool_answer'    => 'Oui/Non?',
				'string_answer'    => $this->getOption('question_text'),
			));


  }
}
