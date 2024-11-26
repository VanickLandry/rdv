<?php

/**
 * CrdmgrBulletinAdhesion form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     achilleromuald@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 20101012_225736 Kris.Wallsmith $
 */
class CrdmgrBulletinAdhesionForm extends BaseCrdmgrBulletinAdhesionForm
{
  public function configure()
  {
		// champs dispo: id,..,created_by,updated_by


		// retirer les champs(internes) à ne pas saisir
		// unset( $this['created_at'], $this['updated_at'], $this['created_by'], $this['updated_by']	);
		// preciser les champs à utiliser
		// workflow_status_code,workflow_status_msg,loan_type_code,main_amount,interest_amount,bank_acceptance_date,loan_duration_months_count,first_monthly_payment_date,validation_status_code,validation_status_reason,accessory_amount,other_amount,prime_type_code
		// , '{0}'
		$this->useFields(array('workflow_status_code','workflow_status_msg','loan_type_code','main_amount','interest_amount','bank_acceptance_date','loan_duration_months_count','first_monthly_payment_date','validation_status_code','validation_status_reason','accessory_amount','other_amount','prime_type_code', 'taux_base_deces', 'taux_base_ipt', 'taux_surprime_deces', 'taux_surprime_ipt', 'taux_insolvabilite', 'assurance_effect_date'));

		// corriger au besoin les champs de saisie des valeurs
		// $this->widgetSchema['{0}'] = new sfWidgetFormInputText();
		$this->widgetSchema['workflow_status_msg'] = new sfWidgetFormTextarea();
		$this->widgetSchema['validation_status_reason'] = new sfWidgetFormTextarea();

		//
		$a_years = range(1920, 2050);
		$this->widgetSchema['bank_acceptance_date'] = new sfWidgetFormDate(
				array(	'format' => '%year%/%month%/%day%'
							, 'years' => array_combine($a_years, $a_years)
							)
			);
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
		}
		// #end_region tchac.20110124_064318
		else
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

		$this->widgetSchema['validation_status_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamValidationStatus'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->addWhere('a.type_parametre = ?', 'validation_status')->addWhere("is_active = ?", 1)->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			)); 

		$this->widgetSchema['prime_type_code'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamPrimeType'), 				
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->addWhere('a.type_parametre = ?', 'prime_type')->addWhere("is_active = ?", 1)->orderBy('a.type_parametre asc, a.label_param asc')  , 
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

		$this->validatorSchema['validation_status_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamValidationStatus'),
				'column' => 'code_parametre',
			));

		$this->validatorSchema['prime_type_code'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamPrimeType'),
				'column' => 'code_parametre',
			));

		// preciser les autres validators
		/**
		$this->validatorSchema['nom_agence'] = new sfValidatorString(array('min_length' => 2, 'required' => true), array(
								'required'   => 'Nom agence requis',
								'min_length' => 'Nom agence trop court. il doit avoir au moins %min_length% caracteres.',
							  )); */

		// preciser les descriptifs
		// $this->widgetSchema->setHelp('bool_answer', "Oui/Non ?");




		$form = new BulletinAdhesionDetailCollectionForm(null, array(
			'BulletinAdhesion' => $this->getObject(),
			'size'    => 2,
		));
	 
		$this->embedForm('bulletinAdhesionDetails', $form);

		// preciser les labels
		$this->widgetSchema->setLabels(array(
        // '{0}'    => '{1}',
        'workflow_status_code'    => 'Status de traitement?',					
        'workflow_status_msg'    => 'Message pour traitement',
        // 'cust_id'    => 'Client',
        'loan_type_code'    => 'Type de pret',
        'interest_amount'    => 'Montant des interets',
        'main_amount'    => 'Montant du principal',
        'bank_acceptance_date'    => 'Date approbation banque',
        'loan_duration_months_count'    => 'Duree du pret (en mois)',
        'first_monthly_payment_date'    => 'Date premiere mensualite',
        'validation_status_code'    => 'Validation',
        'validation_status_reason'    => 'Motif validation',
        'accessory_amount'    => 'Montant des accessoires',
        'other_amount'    => 'Montant des divers',
        'prime_type_code'    => 'Type prime',          
        // 
        'taux_base_deces'    => 'Taux Base Deces',
        'taux_base_ipt'    => 'Taux Base Ipt',
        'taux_surprime_deces'    => 'Taux Surprime Deces',
        'taux_surprime_ipt'    => 'Taux Surprime Ipt',
        'taux_insolvabilite'    => 'Taux Insolvabilite',
				'assurance_effect_date'    => 'Date Effet Assurance',
			));



  }

  public static function getClassFileFullPath()
  {
    # var_dump($this->widgetSchema);
    return __FILE__;
  }

}
