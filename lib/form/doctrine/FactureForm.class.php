<?php

/**
 * RdDetailMirroir form.
 *
 * @package    test
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FactureForm extends BaseRdDetailMirroirForm
{
  public function configure()
  {
        $this->useFields(array(
		'mirroir_id', 
		'prix_largeur_min', 
		'prix_hauteur_min', 
		'prix_rais_bas', 
		'prix_rais_haut', 
		'prix_dormant', 
		'prix_couvre_joint', 
		'prix_sernie', 
		'prix_chicone', 
		'prix_traverse', 
		'prix_vitre', 
		'quantite', 
		// 'quantite_totale', 
	));
	
		// $this->widgetSchema['largeur_min'] = new sfWidgetFormInputText(array(
				// 'required' => false,);
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
 				'add_empty' => false,'expanded' => false, 'multiple' => false,
			));
			//champs dynamiques pour  label

			$rdfactures = Doctrine_Core::getTable('RdDetailMirroir')
			  ->createQuery('a')
			  ->execute();
			  foreach ($rdfactures as $rd_detail_mirroir) :
			  // $s_param_largeur= $rdfacture->FkFacture() ->getLargeur() ;
	// $s_param_hauteur= $rdfacture->FkFacture() ->getHauteur() ;
	$s_param_largeur= $rd_detail_mirroir->getFkDetailmirroir()->getLargeur() ;
	$s_param_hauteur= $rd_detail_mirroir->getFkDetailmirroir()->getHauteur() ;
	$s_param_largeur_min= $rd_detail_mirroir->getLargeurMin() ;
	$s_param_hauteur_min= $rd_detail_mirroir->getHauteurMin() ;
	$rais_bas=$rd_detail_mirroir->getRaisBas();
	$rais_haut=$rais_bas;
	// $dormant=$s_param_hauteur_min * 2;
	$dormant=$rd_detail_mirroir->getDormant();
	$hauteur_couvrejoint=$rd_detail_mirroir->getHauteurCouvreJoint();
	$largeur_couvrejoint=$rd_detail_mirroir->getLargeurCouvreJoint();
	$sernie=$rd_detail_mirroir->getSernie();
	$chicone=$rd_detail_mirroir->getChicone();
 	$largeur_vitre=$rd_detail_mirroir->getLargeurVitre() ;
	// $hauteur_vitre=$s_param_hauteur_min -5;
	$hauteur_vitre=$rd_detail_mirroir->getHauteurVitre();
	$traverse=$rd_detail_mirroir->getTraverse() ;
	$quantite=$rd_detail_mirroir->getQuantite()  ;
			
			$this->widgetSchema->setLabels(array(
				// 'largeur_min'    => 'Largeur desiree',
				// 'hauteur_min'    => 'Hauteur desiree',
				// 'prix_largeur_min', 
				
				
		'prix_hauteur_min'  => 'UP',
		'prix_rais_bas'=> $rais_bas, 
		'prix_rais_haut'=> 'UP', 
		'prix_dormant'=> 'UP', 
		'prix_couvre_joint'=> 'UP', 
		'prix_sernie'=> 'UP', 
		'prix_chicone'=> 'UP', 
		'prix_traverse'=> 'UP', 
		'prix_vitre'=> 'UP', 
		'quantite'=> 'UP', 
		'quantite_totale'=> 'UP',
				
			));
			
	endforeach;

  }
}
