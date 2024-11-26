<?php

/**
 * estim actions.
 *
 * @package    Rdv
 * @subpackage estim
 * @author     Bongas
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class estimActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->estims = Doctrine_Core::getTable('Estim')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->estim = Doctrine_Core::getTable('Estim')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->estim);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EstimForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EstimForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($estim = Doctrine_Core::getTable('Estim')->find(array($request->getParameter('id'))), sprintf('Object estim does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstimForm($estim);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($estim = Doctrine_Core::getTable('Estim')->find(array($request->getParameter('id'))), sprintf('Object estim does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstimForm($estim);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($estim = Doctrine_Core::getTable('Estim')->find(array($request->getParameter('id'))), sprintf('Object estim does not exist (%s).', $request->getParameter('id')));
    $estim->delete();

    $this->redirect('estim/index');
  }
public function executeAddunder(sfWebRequest $request)
  {
    $this->form = new EstimForm();
  }
  public function executePrix(sfWebRequest $request)
  {
    $this->form = new EstimForm();
  }
  public function executeAddagain(sfWebRequest $request)
  {
    $this->form = new EstimForm();
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $estim = $form->save();

      // $this->redirect('estim/edit?id='.$estim->getId());
      $this->redirect('estim/addunder');
    }
  }
}
