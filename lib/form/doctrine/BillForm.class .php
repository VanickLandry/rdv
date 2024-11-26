<?php

/**
 * RdDetailMirroir form.
 *
 * @package    test
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BillForm extends BaseRdDetailMirroirForm
{
  public function configure()
  {
        $this->useFields(array(
		// 'largeur_min', 
		// 'hauteur_min', 
		// 'quantite', 
		'mirroir_id', 
		'largeur_min', 
		'hauteur_min', 
		'rais_bas', 
		'rais_haut', 
		'dormant', 
		'hauteur_couvre_joint', 
		'largeur_couvre_joint', 
		'sernie', 
		'chicone', 
		'traverse', 
		'largeur_vitre', 
		'hauteur_vitre', 
		'quantite', 
		
       
	));
	
		// $this->widgetSchema['largeur_min'] = new sfWidgetFormInputText();
		// $this->widgetSchema['hauteur_min'] = new sfWidgetFormInputText();
// $this->validatorSchema['largeur_min'] = new sfValidatorNumber (array(
				// 'required' => false,
			// ));
// $this->validatorSchema['hauteur_min'] = new sfValidatorNumber (array(
				// 'required' => false,
			// ));
	// $rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      // ->createQuery('a')
      // ->execute();
	  	
			$this->widgetSchema['mirroir_id'] = new sfWidgetFormDoctrineChoice(array(				
				'model' => $this->getRelatedModelName('fk_detailmirroir'), 				
				'key_method' => 'getId', 'method' => 'getId',
				'query' => Doctrine::getTable('RdMirroir')->createQuery('a')->orderBy('a.id desc')->limit(1) , 
				// 'query' => Doctrine::getTable('RdMirroir')->createQuery('a')  , 
				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));
			// $this->widgetSchema->setLabels(array(
				// 'largeur_min'    => 'Largeur desiree',
				// 'hauteur_min'    => 'Hauteur desiree',
				
			// ));
			

  }
}
