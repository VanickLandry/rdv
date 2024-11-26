<?php

/**
 * CrdmgrUserAgency filter form.
 *
 * @package    credit_mng
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrUserAgencyFormFilter extends BaseCrdmgrUserAgencyFormFilter
{
  public function configure()
  {

		// champs dispo: 
    // -- ,created_at,updated_at,

    // 

    // -- champ auto: 

		// preciser les champs à utiliser :  is_active, type_examen_parent_id, nature : , '{0}'
		$this->useFields(array( ));

		// form fields
    /*
		$a_years = range(1990, 2050);
		$this->widgetSchema['created_at'] = new sfWidgetFormDate(
				array(	'format' => '%year%/%month%/%day%'
							, 'years' => array_combine($a_years, $a_years)
							)
			);
    */

    # virtual form field
    # $this->widgetSchema['nom_patient'] = new sfWidgetFormInputText();
    # $this->widgetSchema['show_root_examen_only'] = new sfWidgetFormChoice(array('choices' => array('' => 'Non', 1 => 'Oui')));
    $this->widgetSchema['nom_utilisateur'] = new sfWidgetFormInputText();
    /*
		// preciser les valeurs pour liste deroulantes personnalisé
		$this->widgetSchema['type_examen_parent_id'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('fk_type_examen_parent_id'), 				
				'key_method' => 'getId', 'method' => 'getItemSummary',
				'query' => Doctrine::getTable('LbpTypeExamen')->createQuery('a')->where('(a.is_active = ? and type_examen_parent_id is null )', '1')->orderBy('a.type_examen_parent_id asc, a.numero_position asc')  , 
				'add_empty' => true,'expanded' => false, 'multiple' => false,
			));
      */

		// validateurs pour liste deroulantes
    /*
		$this->validatorSchema['type_examen_parent_id'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('fk_type_examen_parent_id'),
				'column' => 'id',
        'required' => false,
			));
      */
		// other validator
		# $this->validatorSchema['show_root_examen_only'] = new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0)));
		$this->validatorSchema['nom_utilisateur'] = new sfValidatorString(array('min_length' => 0, 'required' => false)
								, array(
								'required'   => 'Valeur requise',
								'min_length' => 'Valeur trop courte. elle doit avoir au moins %min_length% caracteres.',
							  ));
    
		
		// Initialiser le filtre :: mettre les valeurs par defaut
		#$usr = sfContext::getInstance()->getUser();
    #$this->setDefault('email', 'Your Email Here');     
    /*
    $dt_tmp = new sfDate(myFrontendHelper::getNowDateTimeInternalCode()); // sample: sfDate('2007-04-17 19:39:05') :: $dt_tmp->dump()
    $this->setDefaults(array(
				//'{0}'    => '{0}',
        'date_creation' => $dt_tmp->dump(), 
        'created_at' => $dt_tmp->dump(), 
      ));
        */
     
 

 		// preciser les labels
		$this->widgetSchema->setLabels(array(
				//'{0}'    => '{0}',
        'nom_utilisateur'    => 'Nom ou prenom utilisateur',
			));		

  }


	public function doBuildQuery(array $values) 
	{

		// create standard query for invoice
		$query = parent::doBuildQuery($values);
    // ajout jointure necessaire :: r represente toujours la table racine du buildquery
    $query->innerJoin("r.CtrGuardUser b");
    # $query->innerJoin("r.fk_patient_id b");
    # $query->innerJoin("r.fk_workflow_status_id c");

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

		// Filtre  utilisateur
		if (isset($values['nom_utilisateur']) && $values['nom_utilisateur'] != "")
		{
			$query->addWhere("     ( b.first_name like ? or b.last_name like ? or b.username like ?  ) ", array ("%".trim($values['nom_utilisateur'])."%", "%".trim($values['nom_utilisateur'])."%", "%".trim($values['nom_utilisateur'])."%" ));
		}

    /*
		if (isset($values['show_root_examen_only']) && $values['show_root_examen_only'] = '1')
		{
			$query->addWhere("type_examen_parent_id is null ");
		}


		// filtre sur les clients créer par un operateur de l'institution du user courant
    /*
		if (! myUser::getCurrentUser()->hasRootInsurancePermission() )
		{
			$query->addWhere("institution_id = ?", myUser::getCurrentUser()->getInstitutionId());
		}
    *#

    // filtre lié à la corbeille
		if ( myUser::getCurrentUser()->getIsBindToggleActivated() )
		{
			$query->addWhere("is_active = ?", 0);
		} else
    {
			$query->addWhere("is_active = ?", 1);
    }
		
		// Filtre   nom_patient
		if (isset($values['nom_patient']) && $values['nom_patient'] != "")
		{
			$query->addWhere("     ( b.nom like ? or b.prenom like ?  ) ", array ("%".trim($values['nom_patient'])."%", "%".trim($values['nom_patient'])."%" ));
		}
		// Filtre   code_dossier
		if (isset($values['code_dossier']) && $values['code_dossier'] != "")
		{
			$query->addWhere("code_dossier like ?", "%".$values['code_dossier']."%");
		}
		// Filtre   workflow_status_id
		if (isset($values['workflow_status_id']) && $values['workflow_status_id'] != "")
		{
			$query->addWhere("workflow_status_id = ?", $values['workflow_status_id']);
		}
		// Filtre   prescripteur_id
		if (isset($values['prescripteur_id']) && $values['prescripteur_id'] != "")
		{
			$query->addWhere("prescripteur_id = ?", $values['prescripteur_id']);
		}
		// Filtre   created_at
		if (isset($values['created_at']) && $values['created_at'] != "" && $values['created_at']["day"] != "" )
		{
			$query->addWhere("created_at >= ?", $values['created_at']["year"]."-".$values['created_at']["month"]."-".$values['created_at']["day"]); 
			// date('Y-m-d')
		}
		// Filtre   date_creation
		if (isset($values['date_creation']) && $values['date_creation'] != "" && $values['date_creation']["day"] != "" )
		{
			$query->addWhere("date_creation >= ?", $values['date_creation']["year"]."-".$values['date_creation']["month"]."-".$values['date_creation']["day"]); 
			// date('Y-m-d')
		}





    /*
		// Filtre   code_fiche_consentement
		if (isset($values['code_fiche_consentement']) && $values['code_fiche_consentement'] != "")
		{
			// nom du client, prenom, et code fiche de consentement
			$query->addWhere("     ( c.nom like ? or c.prenom like ?  or code_fiche_consentement like ? ) ", array ("%".trim($values['code_fiche_consentement'])."%", "%".trim($values['code_fiche_consentement'])."%", "%".trim($values['code_fiche_consentement'])."%" ) );
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
    *#

    /*
		if (isset($values['is_active']) && $values['is_active'] != "")
		{
			$query->addWhere("is_active = ?", $values['is_active']);
		}
    */
    #

		return $query;

	}

}
