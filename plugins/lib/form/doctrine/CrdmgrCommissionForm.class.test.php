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
 
    # recuperer les options passées en parametre du form
    $crdmgr_commission_current = $this->getOption('crdmgr_commission_current');   
    $lastSelectedLivraisonId = $this->getOption('lastSelectedLivraisonId');   
    # valeur par defaut
    ////if ($lastSelectedLivraisonId == NULL) $lastSelectedLivraisonId = -1;

		// preciser les champs à utiliser:  '{0}', 
		$this->useFields(array('is_active','type_livraison_id','produit_id','quantite','pu','pt'));
		// corriger au besoin les champs de saisie des valeurs
		
		// preciser les valeurs pour liste deroulantes personnalisé
		$this->widgetSchema['type_livraison_id'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('fk_type_livraison_id'), 				
				'key_method' => 'getId', 'method' => 'getLabelParam',
				'query' => Doctrine::getTable('LbpParameter')->createQuery('a')->where('a.type_parametre = ?', 'type_livraison')->orderBy('a.type_parametre asc, a.label_param asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));
			
		if ($crdmgr_commission_current == NULL)
    {
      $this->widgetSchema['produit_id'] = new sfWidgetFormDoctrineChoice(array(				
          'model' => $this->getRelatedModelName('fk_produit_id'), 				
          'key_method' => 'getId', 'method' => 'getProduitSummary',
          'query' => Doctrine::getTable('LbpProduit')->createQuery('a') 
                                            # limiter le choix aux produits non encore choisi
                                            ->addWhere('a.id  NOT IN (select produit_id FROM crdmgr_commission  WHERE livraison_id = ? )  ', $lastSelectedLivraisonId)
                                            ->orderBy('a.numero_position asc')  , 
          'add_empty' => false,'expanded' => false, 'multiple' => false,
        ));
    } else
    {
		$this->widgetSchema['produit_id'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('fk_produit_id'), 				
				'key_method' => 'getId', 'method' => 'getProduitSummary',
				'query' => Doctrine::getTable('LbpProduit')->createQuery('a')->where('a.is_active = ?', '1')->orderBy('a.nom asc')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));
	 }		
		// preciser les valeurs pour liste deroulantes personnalisé
		
			$this->validatorSchema['produit_id'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('fk_produit_id'),
				'column' => 'id',
			));
    
			// validateurs pour liste deroulantes
		$this->validatorSchema['type_livraison_id'] = new sfValidatorDoctrineChoice (array(
				'model' => $this->getRelatedModelName('fk_type_livraison_id'),
				'column' => 'id',
			));
    
  
		// preciser les labels
		$this->widgetSchema->setLabels(array(
        // '{0}'    => '{0}',
        'is_active'    => 'Actif ?',
        'produit_id'    => 'Produit',
		///'livraison_id' => 'Livreur',
		'type_livraison_id'    => 'Type de Livraison',
        'quantite'    => 'Quantite',
		'pu'    => 'PU',
		'pt'    => 'Prix Total',
        ////'type_livraison' => ' Objet de la Transaction'

			));
	
  }
}
