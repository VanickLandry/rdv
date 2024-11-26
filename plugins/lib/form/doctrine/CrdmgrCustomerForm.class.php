<?php

/**
 * CrdmgrCustomer form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     achilleromuald@gmail.com at 20100922_003041
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrCustomerForm extends BaseCrdmgrCustomerForm
{
  public function configure()
  {	
 

		// champs dispo: id,is_active,nom,prenom,titre_code,date_naissance,lieu_naissance_code,sexe,statut_marital_code,adresse,telephone,email,type_piece_identite_code,numero_identite,date_delivrance_identite,lieu_delivrance_identite,date_expiration_identite,profession,societe_employeur,secteur_activite,date_debut_service,lieu_residence,lieu_travail,categorie_professionel_code,categorie_revenu_mensuel_code,nbre_annee_professionel_code,autres_sources_revenu,autres_assurances,agence_id,institution_id,create_by_user_id,created_by,updated_by,created_at,updated_at,


		// ini via code: ,type_piece_identite_code,agence_id,institution_id,create_by_user_id,created_by,updated_by,created_at,updated_at

		// is_active,nom,prenom,titre_code,date_naissance,lieu_naissance_code,sexe,statut_marital_code,adresse,telephone,email,numero_identite,date_delivrance_identite,lieu_delivrance_identite,date_expiration_identite,profession,societe_employeur,secteur_activite,date_debut_service,lieu_residence,lieu_travail,categorie_professionel_code,categorie_revenu_mensuel_code,nbre_annee_professionel_code,autres_sources_revenu,autres_assurances



		// retirer les champs(internes) à ne pas saisir
		// unset( $this['created_at'], $this['updated_at'], $this['created_by'], $this['updated_by']	);
		// preciser les champs à utiliser
		$this->useFields(array('is_active','nom','prenom','titre_code','date_naissance','lieu_naissance_code','sexe_code','statut_marital_code','adresse','telephone','email','type_piece_identite_code','numero_identite','date_delivrance_identite','lieu_delivrance_identite','date_expiration_identite','profession','societe_employeur','secteur_activite','date_debut_service','lieu_residence','lieu_travail','categorie_professionel_code','categorie_revenu_mensuel_code','nbre_annee_professionel_code','autres_sources_revenu','autres_assurances'));

		// corriger au besoin les champs de saisie des valeurs
		// $this->widgetSchema['code_parametre'] = new sfWidgetFormInputText();
	

	

		//
		// $this->widgetSchema['code_xxx'] = new sfWidgetFormInputText();
		$a_years = range(1920, 2050);
		$this->widgetSchema['date_naissance'] = new sfWidgetFormDate(
				array(	'format' => '%year%/%month%/%day%'
							, 'years' => array_combine($a_years, $a_years)
							)
			);
		$this->widgetSchema['date_delivrance_identite'] = new sfWidgetFormDate(
				array(	'format' => '%year%/%month%/%day%'
							, 'years' => array_combine($a_years, $a_years)
							)
			);
		$this->widgetSchema['date_expiration_identite'] = new sfWidgetFormDate(
				array(	'format' => '%year%/%month%/%day%'
							, 'years' => array_combine($a_years, $a_years)
							)
			);
		$this->widgetSchema['date_debut_service'] = new sfWidgetFormDate(
				array(	'format' => '%year%/%month%/%day%'
							, 'years' => array_combine($a_years, $a_years)
							)
			);
 

		// preciser les valeurs pour liste deroulantes personnalisé
		$this->widgetSchema['type_piece_identite_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamTypeIdentite'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'type_piece_identite')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));
		$this->widgetSchema['nbre_annee_professionel_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamNbreAnnePro'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'nbre_annee_professionel')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));
		$this->widgetSchema['sexe_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamSexe'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'sexe')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));
		$this->widgetSchema['titre_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamNbreAnnePro'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'titre')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));
		$this->widgetSchema['statut_marital_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamStatutMarital'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'statut_marital')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));
		$this->widgetSchema['categorie_revenu_mensuel_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamCategoryRevenuMois'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'categorie_revenu_mensuel')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));
		$this->widgetSchema['categorie_professionel_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamCategoryProfessionel'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'categorie_professionnelle')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));

		// validateurs pour liste deroulantes
		$this->validatorSchema['type_piece_identite_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamTypeIdentite'),
				'column' => 'code_parametre',
			));
		$this->validatorSchema['nbre_annee_professionel_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamNbreAnnePro'),
				'column' => 'code_parametre',
			));
		$this->validatorSchema['sexe_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamSexe'),
				'column' => 'code_parametre',
			));
		$this->validatorSchema['titre_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamTitre'),
				'column' => 'code_parametre',
			));
		$this->validatorSchema['statut_marital_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamStatutMarital'),
				'column' => 'code_parametre',
			));
		$this->validatorSchema['categorie_revenu_mensuel_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamCategoryRevenuMois'),
				'column' => 'code_parametre',
			));
		$this->validatorSchema['categorie_professionel_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamCategoryProfessionel'),
				'column' => 'code_parametre',
			));

		
		// preciser les autres validators
		/**
		$this->validatorSchema['nom_agence'] = new sfValidatorString(array('min_length' => 2, 'required' => true), array(
								'required'   => 'Nom agence requis',
								'min_length' => 'Nom agence trop court. il doit avoir au moins %min_length% caracteres.',
							  )); */


		// preciser les labels
		$this->widgetSchema->setLabels(array(
				'is_active'    => 'Actif ?',
				'nom'    => 'Nom',
				'prenom'    => 'Prenom',
				'titre_code'    => 'Titre',
				'date_naissance'    => 'Date naissance',
				'lieu_naissance_code'    => 'Lieu naissance',
				'sexe_code'    => 'sexe',
				'statut_marital_code'    => 'Statut marital',
				'adresse'    => 'Adresse',
				'telephone'    => 'Telephone',
				'email'    => 'Email',
				'numero_identite'    => 'Numero CNI/Passe-port',
				'type_piece_identite_code'    => 'Type piece identite',
				'date_delivrance_identite'    => 'Date delivrance CNI/Passe-port',
				'lieu_delivrance_identite'    => 'Lieu delivrance CNI/Passe-port',
				'date_expiration_identite'    => 'Date expiration CNI/Passe-port',
				'profession'    => 'Profession',
				'societe_employeur'    => 'Societe Employeur',
				'secteur_activite'    => "Secteur d'activite",
				'date_debut_service'    => 'Date debut service',
				'lieu_residence'    => 'Lieu residence',
				'lieu_travail'    => 'Lieu travail',
				'categorie_professionel_code'    => 'Categorie professionelle',
				'categorie_revenu_mensuel_code'    => 'Categorie revenu mensuel',
				'nbre_annee_professionel_code'    => 'Nbre annee experience prof.',
				'autres_sources_revenu'    => 'Autres sources revenu',
				'autres_assurances'    => 'Autres assurances',
			));


		// preciser les descriptifs
		// $this->widgetSchema->setHelp('is_active', "Etat d'activation du parametre.");


  }
}
