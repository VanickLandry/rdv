<?php

/**
 * devis actions.
 *
 * @package    Rdv
 * @subpackage devis
 * @author     Bongas
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class devisActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->deviss = Doctrine_Core::getTable('Devis')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->devis = Doctrine_Core::getTable('Devis')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->devis);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DevisForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DevisForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($devis = Doctrine_Core::getTable('Devis')->find(array($request->getParameter('id'))), sprintf('Object devis does not exist (%s).', $request->getParameter('id')));
    $this->form = new DevisForm($devis);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($devis = Doctrine_Core::getTable('Devis')->find(array($request->getParameter('id'))), sprintf('Object devis does not exist (%s).', $request->getParameter('id')));
    $this->form = new DevisForm($devis);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($devis = Doctrine_Core::getTable('Devis')->find(array($request->getParameter('id'))), sprintf('Object devis does not exist (%s).', $request->getParameter('id')));
    $devis->delete();

    $this->redirect('devis/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $devis = $form->save();

      $this->redirect('devis/edit?id='.$devis->getId());
    }
  }
}
