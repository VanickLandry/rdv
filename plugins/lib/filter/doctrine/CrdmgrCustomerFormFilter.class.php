<?php

/**
 * CrdmgrCustomer filter form.
 *
 * @package    credit_mng
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrCustomerFormFilter extends BaseCrdmgrCustomerFormFilter
{
  public function configure()
  {

		//champs dispo: is_active,code_client,nom,prenom,titre_code,date_naissance,lieu_naissance_code,sexe_code,statut_marital_code,adresse,telephone,email,type_piece_identite_code,numero_identite,date_delivrance_identite,lieu_delivrance_identite,date_expiration_identite,profession,societe_employeur,secteur_activite,date_debut_service,lieu_residence,lieu_travail,categorie_professionel_code,categorie_revenu_mensuel_code,nbre_annee_professionel_code,autres_sources_revenu,autres_assurances,agence_id,institution_id,created_by,updated_by
		// ,created_at,updated_at

		// preciser les champs à utiliser : is_active, nom, prenom
		$this->useFields(array( 'nom', 'prenom', 'institution_id'));

		// form fields
		$this->widgetSchema['nom'] = new sfWidgetFormInputText();
		$this->widgetSchema['prenom'] = new sfWidgetFormInputText();
    # virtual form field
		$this->widgetSchema['nom_agence'] = new sfWidgetFormInputText();



		// preciser les valeurs pour liste deroulantes personnalisé
    // -- preciser valeurs pour liste deroulante "institution_id"
      if ( myUser::getCurrentUser()->hasMasterOperatorRootInsurancePermission () )
      {
        $this->widgetSchema['institution_id'] = new sfWidgetFormDoctrineChoice(array(				
            'model' => $this->getRelatedModelName('CtrInstitution'),
            'key_method' => 'getId', 'method' => 'getInstitutionSummary',
            'query' => Doctrine::getTable('CrdmgrInstitution')->createQuery('a') 
                                ->addWhere("is_active = ?", 1)
                                ->orderBy('a.type_institution_code  asc, a.nom_institution asc')  ,  
            'add_empty' => true,'expanded' => false, 'multiple' => false,
          ));			 
      } else // si l'user ne doit pas voir toute les institutions dispo
      {
        $this->widgetSchema['institution_id'] = new sfWidgetFormDoctrineChoice(array(				
            'model' => $this->getRelatedModelName('CtrInstitution'),
            'key_method' => 'getId', 'method' => 'getInstitutionSummary',
            'query' => Doctrine::getTable('CrdmgrInstitution')->createQuery('a')
                                ->addWhere("id = ?", myUser::getCurrentUser()->getInstitutionId())
                                ->addWhere("is_active = ?", 1)
                                ->orderBy('a.type_institution_code asc, a.nom_institution asc')  ,  
            'add_empty' => true,'expanded' => false, 'multiple' => false,
          ));
      }


		// validator
		/*
		$this->validatorSchema['type_parametre'] = new sfValidatorChoice(array(
			'choices' =>
			array_keys(Doctrine_Core::getTable('CrdmgrParameter')->getTypeParametres()),
			));
			*/

		// other validator
		/*
		$this->validatorSchema['valeur_string'] = new sfValidatorString(array('min_length' => 0, 'required' => false)
								, array(
								'required'   => 'Valeur requise',
								'min_length' => 'Valeur trop courte. elle doit avoir au moins %min_length% caracteres.',
							  ));
		*/
    
    // validator pour nom_agence :: ps :  mentionner le critere de validation afin de filter->isValid () retourne true
		$this->validatorSchema['nom_agence'] = new sfValidatorString(array('min_length' => 0, 'required' => false)
								, array(
								'required'   => 'Valeur requise',
								'min_length' => 'Valeur trop courte. elle doit avoir au moins %min_length% caracteres.',
							  ));
		
		// Initialiser le filtre :: mettre les valeurs par defaut
		#$usr = sfContext::getInstance()->getUser();
    #$this->setDefault('email', 'Your Email Here'); 
    /*
    $this->setDefaults(array(
				//'{0}'    => '{0}',
        'nom' => 'nom client', 
      ));
     */
 

 		// preciser les labels
		$this->widgetSchema->setLabels(array(
				//'{0}'    => '{0}',
				'nom'    => 'Nom',
				'prenom'    => 'Prenom',
				'institution_id'    => 'Institution',
				'nom_agence'    => 'Agence',
			));		
        
  }

	
	public function doBuildQuery(array $values) 
	{

		// create standard query for invoice
		$query = parent::doBuildQuery($values);
    // ajout jointure necessaire :: r represente toujours la table racine du buildquery
    $query->innerJoin("r.CtrAgency b");

    # var_dump( $values );  echo $query->getSqlQuery();   exit(); # afficher la requete sql
		// add our joins for product :: r represente toujours la table racine du buildquery
		//$query->innerJoin("r.InvoiceProduct ip")
		//			->innerJoin("ip.Product p"); 	
		/*
		if (isset($values['nom']) && $values['nom'] != "")
		{
			$query->addWhere("nom = ?", $values['nom']);
		}
		*/

		// filtre sur les clients créer par un operateur de l'institution du user courant
		if (! myUser::getCurrentUser()->hasRootInsurancePermission() )
		{
			$query->addWhere("institution_id = ?", myUser::getCurrentUser()->getInstitutionId());
		}

    // filtre lié à la corbeille
		if ( myUser::getCurrentUser()->getIsBindToggleActivated() )
		{
			$query->addWhere("is_active = ?", 0);
		} else
    {
			$query->addWhere("is_active = ?", 1);
    }
		
		// Filtre   nom
		if (isset($values['nom']) && $values['nom'] != "")
		{
			$query->addWhere("nom like ?", "%".$values['nom']."%");
		}
		// Filtre   prenom
		if (isset($values['prenom']) && $values['prenom'] != "")
		{
			$query->addWhere("prenom like ?", "%".$values['prenom']."%");
		}
		// Filtre   institution_id
		if (isset($values['institution_id']) && $values['institution_id'] != "")
		{
			$query->addWhere("institution_id = ?", $values['institution_id']);
		}
		// Filtre   nom_agence
		if (isset($values['nom_agence']) && $values['nom_agence'] != "")
		{
			$query->addWhere("b.nom_agence like ?", "%".$values['nom_agence']."%");
		}

    /*
		if (isset($values['is_active']) && $values['is_active'] != "")
		{
			$query->addWhere("is_active = ?", $values['is_active']);
		}
    */

		return $query;

	}

}
