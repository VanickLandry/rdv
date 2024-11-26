<?php

/**
 * CrdmgrFicheConsentement form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrFicheConsentementForm extends BaseCrdmgrFicheConsentementForm
{
  public function configure()
  {

		// champs dispo: id,..,created_by,updated_by


		// retirer les champs(internes) à ne pas saisir
		// unset( $this['created_at'], $this['updated_at'], $this['created_by'], $this['updated_by']	);
		// preciser les champs à utiliser
		// loan_type_code,interest_amount,main_amount,loan_duration_months_count,first_monthly_payment_date,workflow_status_code,workflow_status_msg
		// '{0}', 
		$this->useFields(array('loan_type_code','interest_amount','main_amount','loan_duration_months_count','first_monthly_payment_date','workflow_status_code','workflow_status_msg', 'assurance_effect_date'
      ));

		// corriger au besoin les champs de saisie des valeurs
		// $this->widgetSchema['code_parametre'] = new sfWidgetFormInputText();
		# $this->widgetSchema['customer_id'] = new sfWidgetFormInputHidden();
		$this->widgetSchema['workflow_status_msg'] = new sfWidgetFormTextarea();    
    // field first_monthly_payment_date
		$a_years = range(1920, 2050);
		$this->widgetSchema['first_monthly_payment_date'] = new sfWidgetFormDate(
				array(	'format' => '%year%/%month%/%day%'
							, 'years' => array_combine($a_years, $a_years)
							)
			);
    // field assurance_effect_date
		$a_years = range(1920, 2050);
		$this->widgetSchema['assurance_effect_date'] = new sfWidgetFormDate(
				array(	'format' => '%year%/%month%/%day%'
							, 'years' => array_combine($a_years, $a_years)
							)
			);

		
		// preciser les valeurs pour liste deroulantes personnalisées
		// #region tchac.20110124_064318: permettre au master operateur de l'assurance principal de voir la liste complete
		/*
    if ( myUser::getCurrentUser()->hasMasterOperatorRootInsurancePermission () )
		{
			$this->widgetSchema['cust_id'] = new sfWidgetFormDoctrineChoice(array(				
					'model' => $this->getRelatedModelName('CtrCustomer'),
					'key_method' => 'getId', 'method' => 'getCustomerSummary',
					'query' => Doctrine::getTable('CrdmgrCustomer')->createQuery('a')
															->addWhere("is_active = ?", 1)
															->orderBy('a.nom asc, a.prenom asc')  ,  
					'add_empty' => false,'expanded' => false, 'multiple' => false,
				));			 
		} else 
		// #end_region tchac.20110124_064318
		{
			$this->widgetSchema['cust_id'] = new sfWidgetFormDoctrineChoice(array(				
					'model' => $this->getRelatedModelName('CtrCustomer'),
					'key_method' => 'getId', 'method' => 'getCustomerSummary',
					'query' => Doctrine::getTable('CrdmgrCustomer')->createQuery('a')
															->addWhere("institution_id = ?", myUser::getCurrentUser()->getInstitutionId())
															->addWhere("is_active = ?", 1)
															->orderBy('a.nom asc, a.prenom asc')  ,  
					'add_empty' => false,'expanded' => false, 'multiple' => false,
				));
		}
    */

		$this->widgetSchema['loan_type_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamLoanType'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->addWhere('a.type_parametre = ?', 'loan_type')->addWhere("is_active = ?", 1)->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));


		$this->widgetSchema['workflow_status_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamWorkflowStatus'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->addWhere('a.type_parametre = ?', 'workflow_status')->addWhere("is_active = ?", 1)->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));
 

		// validateurs pour liste deroulantes
		$this->validatorSchema['loan_type_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamLoanType'),
				'column' => 'code_parametre',
			));

		$this->validatorSchema['workflow_status_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamWorkflowStatus'),
				'column' => 'code_parametre',
			));

		// preciser les descriptifs
		// $this->widgetSchema->setHelp('bool_answer', "Oui/Non ?");

	
		// preciser les labels
		$this->widgetSchema->setLabels(array(
				// '{0}'    => '{0}',
				'workflow_status_code'    => 'Status de traitement?',					
				'workflow_status_msg'    => 'Message pour traitement',
				'workflow_status_msglog'    => 'Historique des traitements',
				// 'cust_id'    => 'Client',
				'loan_type_code'    => 'Type de pret',
				'interest_amount'    => 'Montant des interets',
				'main_amount'    => 'Montant du principal',
				'loan_duration_months_count'    => 'Duree du pret (en mois)',
				'first_monthly_payment_date'    => 'Date premiere mensualite',
				'assurance_effect_date'    => 'Date Effet Assurance',
			));


		$form = new FicheConsentementDetailCollectionForm(null, array(
			'FicheConsentement' => $this->getObject(),
			'size'    => 2,
		));
	 
		$this->embedForm('ficheConsentementDetails', $form);

  }
}
