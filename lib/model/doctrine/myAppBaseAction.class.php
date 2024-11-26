<?php

class myAppBaseAction extends sfActions
{
	// <div id="description"> 
	//		Faire un forward/redirection si l'user ne verifit pas les contraintes metier necessaire
	//		Utile pour integrer les contraintes du style : ne peut modifier un client que l'utilisateur l'ayant crée
	// </div>
	// <div id="sample1"> 
	//	$this->redirectUnlessUserActionCredentialValidation ($request, $redirectpath, $expected_credential, $owned_credential );  </div>
	// <div id="sample2"> 
	//	 $this->redirectUnlessUserActionCredentialValidation ($request, $redirectpath, NULL, $owned_credential, 'accès interdit', array('credenttial1', $expected_credential) ) </div>
  
	public function redirectUnlessUserActionCredentialValidation(sfWebRequest $request, $redirect_path, $expected_credential, $owned_credential, $friendly_error_message=NULL, $expected_credentials_array=NULL)
  {
		// test de la permission de reference specifique et redirection au besoin
		// if (!in_array($owned_credential, array($expected_credential, $expected_credential)))
		
		// echo "owned_credential=$owned_credential";
		// echo "expected_credential=$expected_credential";
		// exit ();
		
		if (!in_array($owned_credential, array($expected_credential)))
		{
			// message d'erreur
			if ($friendly_error_message != NULL)
			{
				$this->getUser()->setFlash('error', $friendly_error_message);
			}
			// redirection
			$this->redirect($redirect_path);
			//
			// sample: $this->redirect('mlcustomer/show?id='.$crdmgr_customer->getId());
			// sample: $this->redirect('mlcustomer/index');
		}
	}
		
		
	// <div id="description"> obtenir l'id de l'utilisateur courant </div>		
	public function getUserId()
	{
		return $this->getUser()->getGuardUser()->getId();
	}
	
  // <div id="description"> obtenir l'id de l'institution </div>		
	public function getInstitutionId()
	{
		return $this->getUser()->getInstitutionId();
	}

	// <div id="description"> Savoir si l'user est un operateur de l'assureur racine/owner </div>	
	public function hasUserHasRootInsurancePermission()
	{
		return $this->getUser()->hasRootInsurancePermission();
	}

	// <div id="description"> Savoir si l'user est un master operateur de l'assureur racine/owner </div>	
	public function hasUserHasMasterOperatorRootInsurancePermission()
	{
		return $this->getUser()->hasMasterOperatorRootInsurancePermission();
	}

	// <div id="description">  obtenir le code du statut de publication et verouillage des elements dans le workflow </div>	
	public function getWorkflowLockedPublishedStatusCode()
	{
		return $this->getUser()->getWorkflowLockedPublishedStatusCode();
	}
}
