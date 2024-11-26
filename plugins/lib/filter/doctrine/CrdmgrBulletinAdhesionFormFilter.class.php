<?php

/**
 * CrdmgrBulletinAdhesion filter form.
 *
 * @package    credit_mng
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrBulletinAdhesionFormFilter extends BaseCrdmgrBulletinAdhesionFormFilter
{
  public function configure()
  {

		//champs dispo: workflow_status_code,workflow_status_msg,workflow_status_msglog,code_bulletin_adhesion,code_police,customer_id,loan_type_code,main_amount,interest_amount,bank_acceptance_date,loan_duration_months_count,first_monthly_payment_date,assurance_end_date,validation_status_code,validation_status_reason,mortuary_base_rate,ipt_base_rate,mortuary_suprime_rate,ipt_suprime_rate,prime_amount_per_month,accessory_amount,other_amount,prime_type_code,total_prime_amount,agence_id,institution_id,created_by,updated_by
		// ,xcreated_at,xupdated_at


		// preciser les champs à utiliser : workflow_status_code, code_bulletin_adhesion, created_at_startdate
		$this->useFields(array( 'code_bulletin_adhesion', 'workflow_status_code', 'institution_id' ));


		// form fields
		$this->widgetSchema['code_bulletin_adhesion'] = new sfWidgetFormInputText();
		// field created_at_startdate
		$a_years = range(1980, 2050);
		$this->widgetSchema['created_at_startdate'] = new sfWidgetFormDate(
				array(	'format' => '%year%/%month%/%day%'
							, 'years' => array_combine($a_years, $a_years)
							)
			);
    # virtual form field: nom_agence, created_at_enddate
		$this->widgetSchema['nom_agence'] = new sfWidgetFormInputText();
		$this->widgetSchema['created_at_enddate'] = new sfWidgetFormDate(
				array(	'format' => '%year%/%month%/%day%'
							, 'years' => array_combine($a_years, $a_years)
							)
			);

		// preciser les valeurs pour liste deroulantes personnalisé
		$this->widgetSchema['workflow_status_code'] = new sfWidgetFormDoctrineChoice(array(								
				'model' => $this->getRelatedModelName('CtrParamWorkflowStatus'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'workflow_status')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => true,'expanded' => false, 'multiple' => false,
			));


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
		$this->validatorSchema['workflow_status_code'] = new sfValidatorDoctrineChoice (array(
				'required' => false,
				'model' => $this->getRelatedModelName('CtrParamWorkflowStatus'),
				'column' => 'code_parametre',
			));

    // validator pour nom_agence :: ps :  mentionner le critere de validation afin de filter->isValid () retourne true
		$this->validatorSchema['nom_agence'] = new sfValidatorString(array('min_length' => 0, 'required' => false)
								, array(
								'required'   => 'Valeur requise',
								'min_length' => 'Valeur trop courte. elle doit avoir au moins %min_length% caracteres.',
							  ));

        $this->validatorSchema['created_at_startdate'] = new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59'))));
        $this->validatorSchema['created_at_enddate'] = new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59'))));

		// other validator
		/*
		$this->validatorSchema['valeur_string'] = new sfValidatorString(array('min_length' => 0, 'required' => false)
								, array(
								'required'   => 'Valeur requise',
								'min_length' => 'Valeur trop courte. elle doit avoir au moins %min_length% caracteres.',
							  ));
		*/


		
		// Initialiser le filtre
		//$usr = sfContext::getInstance()->getUser();
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
				'code_bulletin_adhesion'    => 'Nom Client / Code bulletin',
				'created_at_startdate'    => 'Creer le - Date de debut',
				'created_at_enddate'    => 'Creer le - Date de fin',
				'workflow_status_code'    => 'Statut de traitement',
				'institution_id'    => 'Institution',
				'nom_agence'    => 'Agence',
			));		

  }

	
	public function doBuildQuery(array $values) 
	{

		// create standard query for invoice
		$query = parent::doBuildQuery($values);
		// r :: fait toujours reference à la requete creer automatiquement ici
		$query->innerJoin("r.CtrCustomer c");
    // ajout jointure necessaire :: r represente toujours la table racine du buildquery
    $query->innerJoin("r.CtrAgency b");

		// add our joins for product
		//$query->innerJoin("r.InvoiceProduct ip")
		//			->innerJoin("ip.Product p"); 
	
		/*
		if (isset($values['nom']) && $values['nom'] != "")
		{
			$query->addWhere("nom = ?", $values['nom']);
		}
		*/

    // filtre lié à la corbeille
		if ( myUser::getCurrentUser()->getIsBindToggleActivated() )
		{
			$query->addWhere("workflow_status_code = ?", "workflow_status_deleted");
		} else
    {
			$query->addWhere("workflow_status_code <> ?", "workflow_status_deleted");
    }


		// filtre sur les clients créer par un operateur de l'institution du user courant
		if (! myUser::getCurrentUser()->hasRootInsurancePermission() )
		{
			$query->addWhere("institution_id = ?", myUser::getCurrentUser()->getInstitutionId());
		}

		// Filtre   created_at_startdate, created_at_enddate
		if (isset($values['created_at_startdate']) && $values['created_at_startdate'] != "" && $values['created_at_startdate']["day"] != "" )
		{
			$query->addWhere("created_at >= ?", $values['created_at_startdate']["year"]."-".$values['created_at_startdate']["month"]."-".$values['created_at_startdate']["day"]); 
			// date('Y-m-d')
		}
		if (isset($values['created_at_enddate']) && $values['created_at_enddate'] != "" && $values['created_at_enddate']["day"] != "" )
		{
			$query->addWhere("created_at < DATE_ADD( ? , INTERVAL 1 DAY) ", $values['created_at_enddate']["year"]."-".$values['created_at_enddate']["month"]."-".$values['created_at_enddate']["day"]); 
			// date('Y-m-d')
		}

		// Filtre  code_bulletin_adhesion
		if (isset($values['code_bulletin_adhesion']) && $values['code_bulletin_adhesion'] != "")
		{
			// nom du client, prenom, et code fiche de consentement
			$query->addWhere("     ( c.nom like ? or c.prenom like ?  or code_bulletin_adhesion like ? ) ", array ("%".trim($values['code_bulletin_adhesion'])."%", "%".trim($values['code_bulletin_adhesion'])."%", "%".trim($values['code_bulletin_adhesion'])."%" ) );
		}
		// Filtre  workflow_status_code
		if (isset($values['workflow_status_code']) && $values['workflow_status_code'] != "" )
		{
			$query->addWhere("workflow_status_code = ?", $values['workflow_status_code']);
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

		// echo $query->getSqlQuery();

		return $query;

	}
}
