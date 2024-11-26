<?php

/**
 * CrdmgrInstitution form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     achilleromuald@gmail.com at 20100921_114754
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrInstitutionForm extends BaseCrdmgrInstitutionForm
{

  public function configure()
  {	
		// champs dispo: id,is_active,nom_institution,type_institution_code,adresse,lieu_siege_social_code,created_by,updated_by,created_at,updated_at
    // , consentmnt_taux_supplement, consentmnt_taux_chomage, consentmnt_taux_deces, consentmnt_taux_ipt, consentmnt_montant_accessoire, consentmnt_montant_divers, bulladhesion_taux_supplement, bulladhesion_taux_deces, bulladhesion_taux_ipt, bulladhesion_taux_surprm_deces, bulladhesion_taux_surprm_ipt, bulladhesion_taux_insolvabilit, bulladhesion_montant_accessoir, bulladhesion_montant_divers
    // , consentmnt_prime_minimale, bulladhesion_prime_minimale




		// retirer les champs(internes) à ne pas saisir
		// unset( $this['created_at'], $this['updated_at'], $this['created_by'], $this['updated_by']	);
		// preciser les champs à utiliser
    // , '{0}'
		$this->useFields(array('is_active', 'nom_institution', 'type_institution_code', 'adresse', 'lieu_siege_social_code'
    , 'consentmnt_taux_chomage', 'consentmnt_taux_deces', 'consentmnt_taux_ipt', 'consentmnt_taux_supplement', 'consentmnt_montant_accessoire', 'consentmnt_montant_divers', 'consentmnt_prime_minimale'
    , 'bulladhesion_taux_deces', 'bulladhesion_taux_ipt', 'bulladhesion_taux_surprm_deces', 'bulladhesion_taux_surprm_ipt', 'bulladhesion_taux_insolvabilit', 'bulladhesion_taux_supplement', 'bulladhesion_montant_accessoir', 'bulladhesion_montant_divers'
    , 'bulladhesion_prime_minimale'
    ));

		// corriger au besoin les champs de saisie des valeurs
		// $this->widgetSchema['code_parametre'] = new sfWidgetFormInputText();
	

	
		// preciser les valeurs pour liste deroulantes personnalisé
		$this->widgetSchema['type_institution_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamTypeInstitution'),
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'type_institution')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));

		$this->widgetSchema['lieu_siege_social_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamLieuSiege'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'ville')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));

		// validateurs pour liste deroulantes
		$this->validatorSchema['type_institution_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamTypeInstitution'),
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'type_institution'),
				'column' => 'code_parametre',
			));

		$this->validatorSchema['lieu_siege_social_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamLieuSiege'),
				'column' => 'code_parametre',
			));

		
		// preciser les autres validators
		$this->validatorSchema['nom_institution'] = new sfValidatorString(array('min_length' => 2, 'required' => true), array(
								'required'   => 'Nom institution requis',
								'min_length' => 'Nom institution trop court. il doit avoir au moins %min_length% caracteres.',
							  ));

		// preciser les descriptifs
		// $this->widgetSchema->setHelp('is_active', "Etat d'activation du parametre.");


		// preciser les labels
		$this->widgetSchema->setLabels(array(
      // '{0}'    => '{1}',
			'is_active'    => 'Actif ?',
			'nom_institution'    => 'Nom',
			'type_institution_code'    => 'Type institution',
			'adresse'    => 'adresse',
			'lieu_siege_social_code'    => 'Lieu siege social',
      // maj :: 20110315_082816  
      'consentmnt_taux_supplement'    => 'Consentement Taux Supplementaire',
      'consentmnt_taux_chomage'    => 'Consentement Taux Chomage',
      'consentmnt_taux_deces'    => 'Consentement Taux Deces',
      'consentmnt_taux_ipt'    => 'Consentement Taux Ipt',
      'consentmnt_montant_accessoire'    => 'Consentement Montant Accessoire',
      'consentmnt_montant_divers'    => 'Consentement Montant Divers',
      'consentmnt_prime_minimale'    => 'Consentement Montant Prime Minimale',

      'bulladhesion_taux_supplement'    => 'Bull. Adhesion Taux Supplementaire',
      'bulladhesion_taux_deces'    => 'Bull. Adhesion Taux Deces',
      'bulladhesion_taux_ipt'    => 'Bull. Adhesion Taux Ipt',
      'bulladhesion_taux_surprm_deces'    => 'Bull. Adhesion Taux Surprime Deces',
      'bulladhesion_taux_surprm_ipt'    => 'Bull. Adhesion Taux Surprime Ipt',
      'bulladhesion_taux_insolvabilit'    => 'Bull. Adhesion Taux Insolvabilite',
      'bulladhesion_montant_accessoir'    => 'Bull. Adhesion Montant Accessoire',
      'bulladhesion_montant_divers'    => 'Bull. Adhesion Montant Divers',
      'bulladhesion_prime_minimale'    => 'Bull. Adhesion Montant Prime Minimale',

			));

  }
}
