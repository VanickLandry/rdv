<?php

/**
 * RdFacture form.
 *
 * @package    simuce
 * @subpackage form
 * @author     UCE - Désire Talla Tueguem
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RdFactureForm extends BaseRdFactureForm
{
  public function configure()
  {
  $this->useFields(array(
  // 'detailmirroir_id',
  // 'rd_detail_mirroir_id',
  // 'prix_largeur_min',
  // 'prix_hauteur_min',
  // 'prix_rais_bas',
  // 'prix_rais_haut',
  // 'prix_dormant',
  // 'prix_couvre_joint',
  // 'prix_sernie',
  // 'prix_chicone',
  // 'prix_traverse',
  // 'prix_vitre',
  // 'quantite',
  // 'quantite_totale'
  ));
  
  
  // $this->widgetSchema['rd_detail_mirroir_id'] = new sfWidgetFormDoctrineChoice(array(				
				// 'model' => $this->getRelatedModelName('fk_facture'), 				
				// 'key_method' => 'getId', 'method' => 'getId',
				// 'query' => Doctrine::getTable('RdDetailMirroir')
				// ->createQuery('a'),
				// 'add_empty' => false,'expanded' => false, 'multiple' => false,
			// ));
  // $this->widgetSchema->setLabels(array(
				  // 'rd_detail_mirroir_id' =>'mirroir',
  // 'prix_largeur_min' =>'largeur',
  // 'prix_hauteur_min' =>'hauteur',
  // 'prix_rais_bas' =>'rais bas',
  // 'prix_rais_haut' =>'rais haut',
  // 'prix_dormant' =>'Dormant',
  // 'prix_couvre_joint' =>'Couvre Joint',
  // 'prix_sernie' =>'Sernie',
  // 'prix_chicone' =>'Chicone',
  // 'prix_traverse' =>'Traverse',
  // 'prix_vitre' =>'Vitre',
  // 'quantite' =>'Quantite',
  // 'quantite_totale'=>'Quantite totale'
			// ));
			
	$tab = Doctrine_Query::create()
						// ->select('a.mirroir_id as mirroir_id, sum(a.mirroir_id) as mirroir_id')
						->select('a.id, a.mirroir_id ')
						->from('RdDetailMirroir a')
 						->execute();
						// $result = $tab->count();
 	          foreach ($tab  as $rd_detail_mirroir) {  $idmirroir= $rd_detail_mirroir->getMirroirId();	  }
	     // recuperer les id des compteur et des mirroirs 		 
          
		  // echo $idmirroir= $rd_detail_mirroir->getMirroirId() ; exit;		
		   $idmirroir= $rd_detail_mirroir->getMirroirId() ;  		
           // $compteur= count($tab); 		
	     // end recuperation; 		 
		 // exit;
	$tabo = Doctrine_Query::create()
						// ->select('a.mirroir_id as mirroir_id, sum(a.mirroir_id) as mirroir_id')
						->select('a.id, a.mirroir_id ')
						->from('RdDetailMirroir a')
						->where('a.mirroir_id = ?',$idmirroir)
						->orderby( 'a.mirroir_id Desc' )
 						->execute();
						 
					// echo $compteur= count($tabo); exit;				             
					  $compteur= count($tabo);  			             
					// echo ($compteur); 					             
 
   $subForm = new sfForm();
  for ($i = 0; $i < $compteur; $i++)
  {
    $rd_detail_mirroir = new RdDetailMirroir();
    $rd_detail_mirroir->fk_detailmirroir = $this->getObject();
 
    $form = new FactureForm($rd_detail_mirroir);
 
    $subForm->embedForm($i, $form);
  }
  $this->embedForm('newPhotos', $subForm);
  
  
  	  // $this->embedRelation('fk_facture');

  
}
  }
 
