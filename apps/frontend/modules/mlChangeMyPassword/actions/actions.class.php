<?php

/**
 * mlChangeMyPassword actions.
 *
 * @package    credit_mng
 * @subpackage mlChangeMyPassword
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mlChangeMyPasswordActions extends sfActions
{

	/*****************************************************************************************************************
	#REGION  METHODES EXECUTE POUR LES ACTIONS ************************************
	*****************************************************************************************************************/

	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function executeIndex(sfWebRequest $request)
	{
		//$this->forward('default', 'module');
		// if ($this->getRequest()->getMethod() != sfRequest::POST)

		// 
		$this->form = new ChangeMyPwdForm();
	}


 
	public function executeSend(sfWebRequest $request)
	{
		// initialiser l'objet formulaire
		$this->form = new ChangeMyPwdForm();	
		// BIND les données html avec form : REM: on precise "ChangeMyPwd" à getParameter car cela a été mentionné dans la classe "ChangeMyPwdForm extends sfForm" à la ligne  *********** $this->widgetSchema->setNameFormat('ChangeMyPwd[%s]')  ***********
		$this->form->bind($request->getParameter('ChangeMyPwd'));	

		// Handle the form submission		
		if ($request->isMethod('post'))
		{	 

			// valider les saisies
			if ($this->form->isValid() && $this->validateSend() )
			{
				// sauver les infos en base
				$this->saveSend ();
			}
			
			//
			return;
		}

	}
 

	/*****************************************************************************************************************
	#END_REGION  METHODES EXECUTE POUR LES ACTIONS ************************************
	*****************************************************************************************************************/



	/*****************************************************************************************************************
	#REGION  METHODES PREQUIS POUR L'ACTION SEND ************************************
	*****************************************************************************************************************/

	// validation customizer des infos avant sauvegarde en base
	public function validateSend()
	{
		// initialiser l'objet formulaire
		// $this->form = new ChangeMyPwdForm();	
		// BIND les données html avec form
		// $this->form->bind($this->getRequestParameter('ChangeMyPwd'));	

		// valider new_password et new_password_confirmation
		$current_password = $this->form->getValue('current_password');
		$new_password = $this->form->getValue('new_password');
		$new_password_confirmation = $this->form->getValue('new_password_confirmation');

		
		// The new_password field is required
		if (!$new_password)
		{
 			// $this->getUser()->setFlash('error', 'Le nouveau mot de passe ne doit pas etre vide');
			$this->form->getErrorSchema()->addError(new sfValidatorError(new sfValidatorSchema(), 'Le nouveau mot de passe ne doit pas etre vide'), 'new_password'); 
			return false;
		}

		// The new_password field must be a text entry between 5 and 100 characters
		if ( strlen ($new_password) < 5)
		{
			// $this->getUser()->setFlash('error', 'Nouveau mot de passe trop court  (5 caracteres minimum)');
			$this->form->getErrorSchema()->addError(new sfValidatorError(new sfValidatorSchema(), 'Nouveau mot de passe trop court  (5 caracteres minimum)'), 'new_password');
			return false;
		}
		if ( strlen ($new_password) > 100)
		{
			// $this->getUser()->setFlash('error', 'Nouveau mot de passe trop long. (100 caracteres maximum)');
			$this->form->getErrorSchema()->addError(new sfValidatorError(new sfValidatorSchema(), 'Nouveau mot de passe trop long. (100 caracteres maximum)'), 'new_password');
			return false;
		}
	  
		// verifier l'egalité
		if ($new_password != $new_password_confirmation  )
		{
			// $this->getUser()->setFlash('error', 'Le nouveau mot de passe et sa confirmation ne correspondent pas');
			$this->form->getErrorSchema()->addError(new sfValidatorError(new sfValidatorSchema(), 'Le nouveau mot de passe et sa confirmation ne correspondent pas'), 'new_password_confirmation');
			return false;
		}
			

		// valider l'ancien mot de passe : verifier qu'il correspond au mot de passe existant
		if ($this->getUser()->getGuardUser()->checkPasswordByGuard ($current_password) != true )
		{
			$this->form->getErrorSchema()->addError(new sfValidatorError(new sfValidatorSchema(), "Le mot de passe courant ne correspond pas a l'existant"), 'current_password');
			return false;
		}

		// si le nouveau mot de passe est identique à l'ancien alors operation faite d'office
		if ($this->getUser()->getGuardUser()->checkPasswordByGuard ($new_password) == true )
		{
			$this->getUser()->setFlash('notice', "Le mot de passe a ete modifie avec succes");
			return false;
		}


		// FIN
		return true;
	}



	// sauver le nouveau mot de passe en base
	public function saveSend()
	{

		// recuperer les saisies utilisateur
		$current_password = $this->form->getValue('current_password');
		$new_password = $this->form->getValue('new_password');


		// au cas où l'infos en memoire ne correspondrait pas au compte saisie
		if ($this->getUser()->getGuardUser()->checkPasswordByGuard ($current_password) != true )
		{
			$this->getUser()->setFlash('error', "Utilisateur non coherent");
			throw new Exception(sprintf('Utilisateur non coherent.', $this->getUser()->getName())); 

			return false;
		}

		// precier l'infos à mettre en base
		$this->getUser()->getGuardUser()->setPassword($new_password);

		// sauver l'info en base
		$this->getUser()->getGuardUser()->save();
	
		// message de retour
		$this->getUser()->setFlash('notice', "Le mot de passe a ete modifie avec succes");

		// fin
		//return parent::doSave($con);
	}

	/*****************************************************************************************************************
	#REGION  METHODES PREQUIS POUR L'ACTION SEND ************************************
	*****************************************************************************************************************/


	// Traitement des erreurs
	public function handleErrorSend()
	{
		$this->forward('mlChangeMyPassword', 'index');
	}

}


	/*


	// $this->redirect('mlChangeMyPassword', 'index');
	// $this->form->doSave ();

	// $user = new sfGuardUser();
	// $user->setPassword($current_password);
	// if ($this->getUser()->getGuardUser()->getPassword() !=  $user->getPassword () )

	public function doSave ... Helper($con = null)
	{
		$user = new sfGuardUser();
		$user->setUsername($this->getValue('username'));
		$user->setPassword($this->getValue('password'));
		$user->setEmailAddress($this->getValue('email'));
		// They must confirm their account first
		$user->setIsActive(false);
		$user->save();
		$this->userId = $user->getId();

		return parent::doSave($con);


		// sfContext::getInstance()->getUser()->getGuardUser()->getId();
	}
	*/