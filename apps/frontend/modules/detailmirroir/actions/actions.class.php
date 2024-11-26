<?php

/**
 * detailmirroir actions.
 *
 * @package    simuce
 * @subpackage detailmirroir
 * @author     UCE - Désire Talla Tueguem
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class detailmirroirActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  }
public function executeRaishaut(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  }
  
  public function executeCouvrejoint(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  } 
  public function executeCouvrejoint2(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  } 
  
  public function executeSerrure(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  } 
  
   public function executeTraverse(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  } 
  
  public function executeChicone(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  }  
  
 
  
  public function executeRaisbas(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  }
  
  public function executeDormant(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  }
  public function executeViewquantity(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  }
  public function executeBill(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
	  $this->form= new BillForm();
	  // $this->form= new RdDetailMirroirForm();
	  $this->setTemplate('bill');


  }
  
  public function executePrint(sfWebRequest $request)
  {
		// preciser le layout pour impression
		$this->setLayout("print_layout");

		// recuperer les infos utiles par la suite
    // $this->rd_detail_mirroir = Doctrine_Core::getTable('RdDetailMirroir')->find(array($request->getParameter('id')));
    // $this->forward404Unless($this->crdmgr_facture);
    // recuperer les infos sur le dossier d'examen et le patient
$this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
 } 
   public function executePrintclient(sfWebRequest $request)
  {
		// preciser le layout pour impression
		$this->setLayout("printclient_layout");

		// recuperer les infos utiles par la suite
    // $this->rd_detail_mirroir = Doctrine_Core::getTable('RdDetailMirroir')->find(array($request->getParameter('id')));
    // $this->forward404Unless($this->crdmgr_facture);
    // recuperer les infos sur le dossier d'examen et le patient
$this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
 } 
  public function executeResult(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
	 $form = new ClientForm();

  }
  public function executeUnbattant(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  }
  public function executeDeuxbattant(sfWebRequest $request)
  {
    $this->rd_detail_mirroirs = Doctrine_Core::getTable('RdDetailMirroir')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->rd_detail_mirroir = Doctrine_Core::getTable('RdDetailMirroir')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->rd_detail_mirroir);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RdDetailMirroirForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RdDetailMirroirForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($rd_detail_mirroir = Doctrine_Core::getTable('RdDetailMirroir')->find(array($request->getParameter('id'))), sprintf('Object rd_detail_mirroir does not exist (%s).', $request->getParameter('id')));
    $this->form = new RdDetailMirroirForm($rd_detail_mirroir);
    $this->form = new BillForm($rd_detail_mirroir);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($rd_detail_mirroir = Doctrine_Core::getTable('RdDetailMirroir')->find(array($request->getParameter('id'))), sprintf('Object rd_detail_mirroir does not exist (%s).', $request->getParameter('id')));
    $this->form = new RdDetailMirroirForm($rd_detail_mirroir);
    $this->form = new BillForm($rd_detail_mirroir);

    $this->processForm($request, $this->form);
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($rd_detail_mirroir = Doctrine_Core::getTable('RdDetailMirroir')->find(array($request->getParameter('id'))), sprintf('Object rd_detail_mirroir does not exist (%s).', $request->getParameter('id')));
    $rd_detail_mirroir->delete();

    $this->redirect('detailmirroir/index');
  }

   protected function processForm(sfWebRequest $request, sfForm $form)
  {
		// @variables locales
		$s_current_item_defaut_businesscode = "";
		$b_formobject_isnew = false;

		// modifier les saisies
		$a_web_request_parameters = $request->getParameter($form->getName());
		/*
		$s_param_type = trim ($a_web_request_parameters['type_parametre']);
		$s_param_code = trim ($a_web_request_parameters['code_parametre']);
		
		// calculer le code du parametre de configuration
		if (substr ($s_param_code, 0, strlen ($s_param_type)) != $s_param_type)
		{			
			$s_param_code = $s_param_type.'_'.$s_param_code;
			$a_web_request_parameters['code_parametre'] = $s_param_code;
		}
		*/
		
		// $largeur_min = trim ($a_web_request_parameters['largeur_min']);
		// $hauteur_min = trim ($a_web_request_parameters['hauteur_min']);
		// $rais_haut = trim ($a_web_request_parameters['rais_haut']);
		// $rais_bas = trim ($a_web_request_parameters['rais_bas']);
		// $dormant = trim ($a_web_request_parameters['dormant']);
		// $hauteur_couvrejoint = trim ($a_web_request_parameters['hauteur_couvre_joint']);
		// $largeur_couvrejoint = trim ($a_web_request_parameters['largeur_couvre_joint']);
		// $sernie = trim ($a_web_request_parameters['sernie']);
		// $chicone = trim ($a_web_request_parameters['chicone']);
		// $largeur_vitre = trim ($a_web_request_parameters['largeur_vitre']);
		// $hauteur_vitre = trim ($a_web_request_parameters['hauteur_vitre']);
		// $traverse = trim ($a_web_request_parameters['traverse']);
		// $quantite = trim ($a_web_request_parameters['quantite']);
		
		// $prix_rais_haut=trim ($a_web_request_parameters['prix_rais_haut']);
 		// $prix_rais_bas = trim ($a_web_request_parameters['prix_rais_bas']);
		// $prix_dormant = trim ($a_web_request_parameters['prix_dormant']);
		// $prix_couvre_joint = trim ($a_web_request_parameters['prix_couvre_joint']);
		// $prix_sernie = trim ($a_web_request_parameters['prix_sernie']);
		// $prix_vitre = trim ($a_web_request_parameters['prix_vitre']);
		// $prix_chicone = trim ($a_web_request_parameters['prix_chicone']);
		// $prix_traverse = trim ($a_web_request_parameters['prix_traverse']);
       
	    // $total_rais_haut=$prix_rais_haut*$quantite;
 		// $total_rais_bas =$prix_rais_bas*$quantite;
		// $total_dormant =$prix_dormant *$quantite;
		// $total_couvre_joint =$prix_couvre_joint *$quantite;
		// $total_sernie = $prix_sernie*$quantite;
		// $total_vitre = $prix_vitre*$quantite;
		// $total_chicone =  $prix_chicone*$quantite;
		// $total_traverse = $prix_traverse*$quantite;
		// $total=$total_rais_haut + $total_rais_bas+$total_dormant+$total_couvre_joint+$total_sernie+$total_vitre+$total_chicone+$total_traverse;
       

		// recuperer les saisies
    $form->bind($a_web_request_parameters, $request->getFiles($form->getName()));

		// Positionné les valeurs calculée et non saisie
		// $form->getObject()->setXxxx(yyy); 
		// $n_user_id = $this->getUser()->getGuardUser()->getId();

		// si creation nouvelle
		if ($form->getObject()->isNew() )
		{
			// marquer k c'est un insert
			$b_formobject_isnew = true;

			//
			// $form->getObject()->setCreatedById($n_user_id);
			// $form->getObject()->setCreatedById($n_user_id);

			// preciser aussi l'agence et l'institution d'appartenance du client
			// $a_affectations = $this->getUser()->getGuardUser()->getCrdmgrUserAgency();
			// $o_agency = $a_affectations [0] ->getCtrAgency();
			//	
			// $form->getObject()->setAgenceId($o_agency->getId());
			// $form->getObject()->setInstitutionId($o_agency->getInstitutionId());

			# calculer le code par defaut de l'element. Format: {prefix}{datetimecode}.{id_institution}.{id_agence}.{id_item}
			 
		}
		// si simple maj
		// $form->getObject()->setUpdatedById($n_user_id);


    //$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $rd_detail_mirroir = $form->save();
      // $rd_detail_mirroir = "";
			
			// si la modification effectué etait une insertion 
			if ($b_formobject_isnew)
			{
				# ajouter l'id obtenu à partir d l autoincrement				
				// $rd_detail_mirroir->setLargeurMin($largeur_min);
				// $rd_detail_mirroir->setHauteurMin($hauteur_min);
				// $rd_detail_mirroir->setRaisBas($rais_bas);
				// $rd_detail_mirroir->setRaisHaut($rais_haut);
				// $rd_detail_mirroir->setDormant($dormant);
				// $rd_detail_mirroir->setHauteurCouvreJoint($hauteur_couvrejoint);
				// $rd_detail_mirroir->setLargeurCouvreJoint($largeur_couvrejoint);
				// $rd_detail_mirroir->setSernie($sernie);
				// $rd_detail_mirroir->setChicone($chicone);
				// $rd_detail_mirroir->setTraverse($traverse);
				// $rd_detail_mirroir->setLargeurVitre($largeur_vitre);
				// $rd_detail_mirroir->setHauteurVitre($hauteur_vitre);
				// $rd_detail_mirroir->setQuantite($quantite);
				// $rd_detail_mirroir->setPrixLargeurMin($);
				// $rd_detail_mirroir->setPrixHauteurMin($);
				// $rd_detail_mirroir->setPrixRaisBas($prix_rais_haut);
				// $rd_detail_mirroir->setPrixRaisHaut($prix_rais_bas);
				// $rd_detail_mirroir->setPrixDormant($prix_dormant);
				// $rd_detail_mirroir->setPrixCouvreJoint($prix_couvre_joint);
				// $rd_detail_mirroir->setPrixSernie($prix_sernie);
				// $rd_detail_mirroir->setPrixChicone($prix_chicone);
				// $rd_detail_mirroir->setPrixTraverse($prix_traverse);
				// $rd_detail_mirroir->setPrixVitre($prix_vitre);
				// $rd_detail_mirroir->setQuantiteTotale($total);
 				# enregistrer la nouvelle modif
				$rd_detail_mirroir->save();
			}				 

			$this->getUser()->setFlash('notice', "Les Calculs ont etes enregistres avec succes.");
			// edit?id='
      $this->redirect('detailmirroir/print');
    }
	else
	{
	$this->getUser()->setFlash('error', "veuillez verifier les saises et vous assurer que vous utilisez les nombres et pas les lettres.");
	}
	
  }

}
