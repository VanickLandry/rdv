<?php

/**
 * detailporteunbattant actions.
 *
 * @package    simuce
 * @subpackage detailporteunbattant
 * @author     UCE - Désire Talla Tueguem
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class detailporteunbattantActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
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

    $this->redirect('detailporteunbattant/index');
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
				
				$rd_detail_mirroir->save();
			}				 

			$this->getUser()->setFlash('notice', "Les Calculs ont etes enregistres avec succes.");
			// edit?id='
      $this->redirect('detailporteunbattant/print');
    }
	else
	{
	$this->getUser()->setFlash('error', "veuillez verifier les saises et vous assurer que vous utilisez les nombres et pas les lettres.");
	}
	
  }

}
