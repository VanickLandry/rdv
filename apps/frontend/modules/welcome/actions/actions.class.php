<?php

/**
 * welcome actions.
 *
 * @package    credit_mng
 * @subpackage welcome
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class welcomeActions extends myAppAuthenticationActions // sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    // $this->forward('default', 'module');
		// redirection vers la gestion des clients par defaut
		$this->forward('mlparameter', 'index');
  }
}


  /**
  * Executes index action
  *
  * @param sfRequest $request A request object
 
  public function executeIndex(sfWebRequest $request)
  {
    // $this->forward('default', 'module');
		// redirection vers la gestion des clients par defaut
		$this->forward('mlcustomer', 'index');
  }

  /**
  * Executes index action
  * @desc : activer desactiver la corbeille
  * @param sfRequest $request A request object
   
  public function executeBindtoggle(sfWebRequest $request)
  {
    // bascule on / off pour activer / desactiver le mode corbeille
    if ($this->getUser()->getIsBindToggleActivated() == 0)
    {
      $this->getUser()->setIsBindToggleActivated(1);
      $this->getUser()->setFlash('notice', "Activation ok pour le Mode corbeille, vous ne verrez que les elements qui ont ete supprimes.");
    } else 
    {
      $this->getUser()->setIsBindToggleActivated(0);
      $this->getUser()->setFlash('notice', "Desactivation ok pour le Mode corbeille, vous ne verrez que les elements non supprimes.");
    }

    // $this->forward('default', 'module');
		// redirection vers la gestion des clients par defaut
		$this->forward('mlcustomer', 'index');
  }
  */