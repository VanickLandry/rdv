<?php

/**
 * CrdmgrCommission form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CrdmgrCommissionForm extends BaseCrdmgrCommissionForm
{
  public function configure()
  {	
		// retirer les champs(internes) à ne pas saisir 
		// unset( $this['created_at'], $this['updated_at'], $this['created_by'], $this['updated_by']	);
		// preciser les champs à utiliser
    // , '{0}'
		$this->useFields(array('is_active', 'institution_id', 'type_commission', 'commission_fixe', 'taux_commission'));
		// corriger au besoin les champs de saisie des valeurs		
	
		$this->widgetSchema['type_commission'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrParamTypeCommission'),
				'key_method' => 'getCodeParametre', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'type_commission')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => true,'expanded' => false, 'multiple' => false,
			));
			
			$this->widgetSchema['institution_id'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('CtrInstitution'),
				'key_method' => 'getId', 'method' => 'getNomInstitution',
				'query' => Doctrine::getTable('CrdmgrInstitution','CrdmgrCommission')->createQuery('a','b'), 
				'add_empty' => true,'expanded' => false, 'multiple' => false,
			));
	
		$this->validatorSchema['type_commission'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrParamTypeCommission'),
				'query' => Doctrine::getTable('CrdmgrParameter')->createQuery('a')->where('a.type_parametre = ?', 'type_commission'),
				'column' => 'code_parametre',
			));			
$this->validatorSchema['institution_id'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('CtrInstitution','CtrCommission'),
				'query' => Doctrine::getTable('CrdmgrInstitution')->createQuery('a')->where('a.id = ,'1'),

				'column' => 'id',
			));
			
	// preciser les autres validators
		// preciser les labels
		$this->widgetSchema->setLabels(array(
      // '{0}'    => '{1}',
			'is_active'    => 'Actif ?',
			'institution_id'	   => 'Nom Apporteur ',
			'type_commission'    => 'Type de commission pour cet apporteur',
			'commission_fixe'    => 'Montant Fixe de la Commission pour cet apporteur',
			'taux_commission'    => 'Taux de la Commission pour cet Apporteur',	

			));
  }
}
