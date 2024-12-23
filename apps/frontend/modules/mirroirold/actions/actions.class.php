<?php

/**
 * mirroir actions.
 *
 * @package    simuce
 * @subpackage mirroir
 * @author     UCE - D�sire Talla Tueguem
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mirroirActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->rd_mirroirs = Doctrine_Core::getTable('RdMirroir')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->rd_mirroir = Doctrine_Core::getTable('RdMirroir')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->rd_mirroir);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RdMirroirForm();
  }
  public function executeUnbattant(sfWebRequest $request)
  {
    $this->form = new RdMirroirForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RdMirroirForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($rd_mirroir = Doctrine_Core::getTable('RdMirroir')->find(array($request->getParameter('id'))), sprintf('Object rd_mirroir does not exist (%s).', $request->getParameter('id')));
    $this->form = new RdMirroirForm($rd_mirroir);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($rd_mirroir = Doctrine_Core::getTable('RdMirroir')->find(array($request->getParameter('id'))), sprintf('Object rd_mirroir does not exist (%s).', $request->getParameter('id')));
    $this->form = new RdMirroirForm($rd_mirroir);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($rd_mirroir = Doctrine_Core::getTable('RdMirroir')->find(array($request->getParameter('id'))), sprintf('Object rd_mirroir does not exist (%s).', $request->getParameter('id')));
    $rd_mirroir->delete();

    $this->redirect('mirroir/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $rd_mirroir = $form->save();

      // $this->redirect('mirroir/edit?id='.$rd_mirroir->getId());
      $this->redirect('detailmirroir/result');
    }
  }
}
