<?php

// apps/frontend/lib/myUser.class.php
// La classe myUser substitue la classe de base de symfony par défaut sfUser avec les comportements spécifiques de l'application
// Par défaut, la classe myUser étend sfBasicSecurityUser, et non sfUser.
// -- dans le code d'une action
// $this->getUser()->addJobToHistory($this->job);
// -- dans le code de myUser.php
// $this->getAttributeHolder()->remove('job_history');
// function getAttribute($name, $default = null, $ns = null)
// $ids = $this->getAttribute('job_history', array());
// $this->setAttribute('job_history', array_slice($ids, 0, 3));
// (bool) hasFlash ($name) Browse code
// $name	The name of the flash variable
// Returns true if a flash variable of the specified name exists.
// -- dans le code d'un Form ou d'un Filter
// $usr = sfContext::getInstance()->getUser();

class myAppUser extends sfGuardSecurityUser // sfBasicSecurityUser
{

	// <div id="description"> obtenir le pseudo de l'user </div>		
	public function getUserNickname()
	{
		// getUsername(), getEmail(), getName(), getUsername()
		return $this->getGuardUser()->getUsername();
	}
	

	// <div id="description"> methode static: obtenir l'objet utilisateur courant pour usage dans les code des la vue: Form, ou Filter </div>		
	// <div id="sample"> $usr = myUser::getCurrentUser(); </div>		
	public static function getCurrentUser()
	{
		return sfContext::getInstance()->getUser();
	}

	// <div id="description"> obtenir l'id de l'utilisateur courant </div>		
	public function getUserId()
	{
		return $this->getGuardUser()->getId();
	}

	public static function getCurrentUserId()
	{
		return myUser::getCurrentUser()->getUserId();
	}	

	
	
	
  // <div id="description"> obtenir l'id de l'institution </div>		
	public function getInstitutionId()
	{
		$s_getinstitutionid_attrib_key=$this->getUserSessionVarKey('myUser::getInstitutionId');

        if ( $this->getAttribute ($s_getinstitutionid_attrib_key, NULL) != NULL)
        {
            return $this->getAttribute ($s_getinstitutionid_attrib_key, NULL);
        }
        
        // preciser aussi l'agence et l'institution d'appartenance du client
		$a_affectations = $this->getGuardUser()->getCrdmgrUserAgency();
		$o_agency = $a_affectations [0]->getCtrAgency();
		//
        $this->setAttribute($s_getinstitutionid_attrib_key, $o_agency->getInstitutionId());
        //
		return $this->getAttribute ($s_getinstitutionid_attrib_key, NULL);
	}
	public function getAgencyId()
	{
		$s_getagencyd_attrib_key=$this->getUserSessionVarKey('myUser::getInstitutionId');        
        // preciser aussi l'agence et l'institution d'appartenance du client
		$a_affectations = $this->getGuardUser()->getCrdmgrUserAgency();
		$o_agency = $a_affectations [0] ->getCtrAgency();
		//
        $this->setAttribute($s_getagencyd_attrib_key, $o_agency);
        //
		return $this->getAttribute ($s_getagencyd_attrib_key, NULL);
	}
	// <div id="description"> obtenir l'id de l'intitution d'assurance par excellence du système: de nom Saar-Vie </div>		
	public function getRootInsuranceInstitutionId()
	{
		// ps: mise en cache au besoin afin de pas saturer la bd
		
		// constante
		$c_root_insurance_attrib_key= $this->getUserSessionVarKey('root_insurance_institution_id');
		$c_root_insurance_name='ucetest';
		// verif du cache
		if (! $this->hasFlash ($c_root_insurance_attrib_key)
				|| $this->getAttribute ($c_root_insurance_attrib_key, NULL) == NULL)
		{
			// recherche pour maj du cache
			$a_institutions = Doctrine::getTable('CrdmgrInstitution')->createQuery('a')
					->addWhere("nom_institution = ?", $c_root_insurance_name)
					->addWhere("is_active = ?", 1)
					->orderBy('a.id asc, a.nom_institution asc')
					->execute();

			// maj du cache si un seul primary existe
			if (count($a_institutions) != 1)
			{
				return NULL;
			}

			$this->setAttribute($c_root_insurance_attrib_key, $a_institutions[0]->getId());
		}

		// fin
		return $this->getAttribute ($c_root_insurance_attrib_key, NULL);
	}

	// <div id="description"> Savoir si l'user est un operateur de l'assureur racine/owner </div>	
	public function hasRootInsurancePermission()
	{
		// verif
		if ($this->getRootInsuranceInstitutionId() != NULL && $this->getInstitutionId() == $this->getRootInsuranceInstitutionId() )
		{
			return true;
		}
		// fin
		return false;
	}

	// <div id="description"> Savoir si l'user est un master operateur de l'assureur racine/owner </div>	
	public function hasMasterOperatorRootInsurancePermission()
	{
		// verifier les permissions
		if ($this->hasRootInsurancePermission() && $this->hasCredential( sfConfig::get('app_credential_master_operator') ))
		{
			return true;
		}
		// fin
		return false;
	}


	// <div id="description"> obtenir le code du statut de publication et verouillage des elements dans le workflow </div>		
	public function getWorkflowLockedPublishedStatusCode()
	{
		// ps: mise en cache au besoin afin de pas saturer la bd
		// constante
		$c_item_attrib_key= $this->getUserSessionVarKey('workflow_status_locked-and-published_code');
		$c_item_name='workflow_status_locked-and-published';

		// verif du cache
		if (! $this->hasFlash ($c_item_attrib_key) 
				|| $this->getAttribute ($c_item_attrib_key, NULL) == NULL )
		{
			// recherche pour maj du cache
			$a_items = Doctrine::getTable('CrdmgrParameter')->createQuery('a')
					->addWhere("a.code_parametre = ?", $c_item_name)
					->addWhere('a.type_parametre = ?', 'workflow_status')
					->addWhere("is_active = ?", 1)
					->orderBy('a.code_parametre asc, a.code_parametre asc')
				  ->execute();
			

			// maj du cache si un seul primary existe
			if (count($a_items) != 1)
			{
				return NULL;
			}
			$this->setAttribute($c_item_attrib_key, $a_items[0]->getCodeParametre());
		}

		// fin
		return $this->getAttribute ($c_item_attrib_key, NULL);
	}

  #REGION LastSelectedClientId
	// <div id="description"> obtenir le dernier client id selectionné depuis la variable de session </div>		
	public function getLastSelectedClientId()
	{
    return $this->getAttribute ( $this->getUserSessionVarKey('LastSelectedClientId'), NULL);
  }
	// <div id="description"> preciser le dernier client id selectionné depuis la variable de session </div>		
	public function setLastSelectedClientId($p_value)
	{
    return $this->setAttribute ( $this->getUserSessionVarKey('LastSelectedClientId'), $p_value);
  }
  #END_REGION LastSelectedClientId

    #REGION LastSelectedCommissionId
	// <div id="description"> obtenir le dernier Commission id selectionné depuis la variable de session </div>		
	public function getLastSelectedCommissionId()
	{
    return $this->getAttribute ($this->getUserSessionVarKey('LastSelectedCommissionId') , NULL);
  }
	// <div id="description"> preciser le dernier Commission id selectionné depuis la variable de session </div>		
	public function setLastSelectedCommissionId($p_value)
	{
    return $this->setAttribute ($this->getUserSessionVarKey('LastSelectedCommissionId') , $p_value);
  }
  #END_REGION LastSelectedCommissionId
  
    #REGION LastSelectedFactureId
	// <div id="description"> obtenir le dernier Commission id selectionné depuis la variable de session </div>		
	public function getLastSelectedFactureId()
	{
    return $this->getAttribute ($this->getUserSessionVarKey('LastSelectedFactureId') , NULL);
  }
	// <div id="description"> preciser le dernier Commission id selectionné depuis la variable de session </div>		
	public function setLastSelectedFactureId($p_value)
	{
    return $this->setAttribute ($this->getUserSessionVarKey('LastSelectedFactureId') , $p_value);
  }
  #END_REGION LastSelectedFactureId 

    #REGION LastSelectedProformatId
	// <div id="description"> obtenir le dernier Commission id selectionné depuis la variable de session </div>		
	public function getLastSelectedProformatId()
	{
    return $this->getAttribute ($this->getUserSessionVarKey('LastSelectedProformatId') , NULL);
  }
	// <div id="description"> preciser le dernier Commission id selectionné depuis la variable de session </div>		
	public function setLastSelectedProformatId($p_value)
	{
    return $this->setAttribute ($this->getUserSessionVarKey('LastSelectedProformatId') , $p_value);
  }
  #END_REGION LastSelectedProformatId   
  
  
  public function getLastSelectedCalculId()
	{
    return $this->getAttribute ($this->getUserSessionVarKey('LastSelectedCalculId') , NULL);
  }
	// <div id="description"> preciser le dernier Commission id selectionné depuis la variable de session </div>		
	public function setLastSelectedCalculId($p_value)
	{
    return $this->setAttribute ($this->getUserSessionVarKey('LastSelectedCalculId') , $p_value);
  }
      #REGION LastSelectedInvoiceLineItemId	// <div id="description"> obtenir le dernier Commission id selectionné depuis la variable de session </div>		
	public function getLastSelectedInvoicelineitemId()
	{
    return $this->getAttribute ($this->getUserSessionVarKey('LastSelectedInvoicelineitemId') , NULL);
  }
	// <div id="description"> preciser le dernier Commission id selectionné depuis la variable de session </div>		
	public function setLastSelectedInvoicelineitemId($p_value)
	{
    return $this->setAttribute ($this->getUserSessionVarKey('LastSelectedInvoicelineitemId') , $p_value);
  }
  #END_REGION LastSelectedInvoicelineitemId
 

   #REGION LastSelectedCommercialId
	// <div id="description"> obtenir le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function getLastSelectedCommercialId()
	{
    return $this->getAttribute ('LastSelectedCommercialId', NULL);
  }
	// <div id="description"> preciser le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function setLastSelectedCommercialId($p_value)
	{
    return $this->setAttribute ('LastSelectedCommercialId', $p_value);
  }
  #END_REGION LastSelectedCommercialId
  
   #REGION LastSelectedPaymentId
	// <div id="description"> obtenir le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function getLastSelectedPaymentId()
	{
    return $this->getAttribute ('LastSelectedPaymentId', NULL);
  }
	// <div id="description"> preciser le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function setLastSelectedPaymentId($p_value)
	{
    return $this->setAttribute ('LastSelectedPaymentId', $p_value);
  }
  #END_REGION LastSelectedPaymentId  
  
  
   #REGION LastSelectedFicheProspectId
	// <div id="description"> obtenir le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function getLastSelectedFicheProspectId()
	{
    return $this->getAttribute ('LastSelectedFicheProspectId', NULL);
  }
	// <div id="description"> preciser le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function setLastSelectedFicheProspectId($p_value)
	{
    return $this->setAttribute ('LastSelectedFicheProspectId', $p_value);
  }
  #END_REGION LastSelectedFicheProspectId 

   #REGION LastSelectedRendezVousId
	// <div id="description"> obtenir le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function getLastSelectedRendezVousId()
	{
    return $this->getAttribute ('LastSelectedRendezVousId', NULL);
  }
	// <div id="description"> preciser le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function setLastSelectedRendezVousId($p_value)
	{
    return $this->setAttribute ('LastSelectedRendezVousId', $p_value);
  }
  #END_REGION LastSelectedRendezVousId  

    #REGION LastSelectedAjoutId
	// <div id="description"> obtenir le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function getLastSelectedAjoutId()
	{
    return $this->getAttribute ('LastSelectedAjoutId', NULL);
  }
	// <div id="description"> preciser le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function setLastSelectedAjoutId($p_value)
	{
    return $this->setAttribute ('LastSelectedAjoutId', $p_value);
  }
  #END_REGION LastSelectedAjoutId 
  
 
  #END_REGION LastSelectedRendezVousId  

    #REGION LastSelectedDetailAjoutId
	// <div id="description"> obtenir le dernier  id selectionné depuis la variable de session </div>		
	public function getLastSelectedDetailAjoutId()
	{
    return $this->getAttribute ('LastSelectedDetailAjoutId', NULL);
  }
	// <div id="description"> preciser le dernier  id selectionné depuis la variable de session </div>		
	public function setLastSelectedDetailAjoutId($p_value)
	{
    return $this->setAttribute ('LastSelectedDetailAjoutId', $p_value);
  }
  #END_REGION LastSelectedDetailAjoutId 

 

     #REGION LastSelectedVenteId
	// <div id="description"> obtenir le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function getLastSelectedVenteId()
	{
    return $this->getAttribute ('LastSelectedVenteId', NULL);
  }
	// <div id="description"> preciser le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function setLastSelectedVenteId($p_value)
	{
    return $this->setAttribute ('LastSelectedVenteId', $p_value);
  }
  #END_REGION LastSelectedVenteId 

  
      #REGION LastSelectedDetailVenteId
	// <div id="description"> obtenir le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function getLastSelectedDetailVenteId()
	{
    return $this->getAttribute ('LastSelectedDetailVenteId', NULL);
  }
	// <div id="description"> preciser le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function setLastSelectedDetailVenteId($p_value)
	{
    return $this->setAttribute ('LastSelectedDetailVenteId', $p_value);
  }
  #END_REGION LastSelectedAgencyId  
  
        #REGION LastSelectedDetailVenteId
	// <div id="description"> obtenir le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function getLastSelectedAgencyId()
	{
    return $this->getAttribute ('LastSelectedAgencyId', NULL);
  }
	// <div id="description"> preciser le dernier Reassureur id selectionné depuis la variable de session </div>		
	public function setLastSelectedAgencyId($p_value)
	{
    return $this->setAttribute ('LastSelectedAgencyId', $p_value);
  }
  #END_REGION LastSelectedAgencyId  
  
    #REGION IsBindToggleActivated
	// @desc: obtenir le dernier client id selectionné depuis la variable de session
	// @type: Valeur binaire : 0 ou 1
    public function getIsBindToggleActivated()
    {
        return $this->getAttribute ( $this->getUserSessionVarKey('IsBindToggleActivated'), 0); // NULL
    }
    // <div id="description"> preciser le dernier compte rendu id selectionné depuis la variable de session </div>		
    public function setIsBindToggleActivated($p_value)
    {
        return $this->setAttribute ($this->getUserSessionVarKey('IsBindToggleActivated'), $p_value);
    }
    #END_REGION IsBindToggleActivated


    #REGION SessionGuardUser
	// @desc: obtenir les infos user mis en session
    public function getSessionGuardUser()
    {
        $value = $this->getAttribute ( $this->getUserSessionVarKey('SessionGuardUser'), NULL); // NULL
        
        // si refresh de données
        if ($value == NULL)
        {
            $sfguarduser = $this->getGuardUser();
            $value = $sfguarduser;
            // 
            $this->setSessionGuardUser ($value);
        }
         
         // fin
        return $value; 
    }
    // <div id="description"> preciser le dernier compte rendu id selectionné depuis la variable de session </div>		
    public function setSessionGuardUser($p_value)
    {
        return $this->setAttribute ($this->getUserSessionVarKey('SessionGuardUser'), $p_value);
    }
    #END_REGION SessionGuardUser


    /*
    +----------------------------------------------------------------------+
    |	@create 20120610_202654 by atchapi, achilleromuald@yahoo.fr
    |	@modified 20120610_202655 by atchapi, achilleromuald@yahoo.fr: creation
    |	@descr gestion des messages flash
    |	@sample_call: $s_string = this.setFlash($str); 
    +----------------------------------------------------------------------+
    */
    public function setMyFlash($msg_type, $msg_content)
    {
        #
        if ($msg_type == 'notice')
        {
            $this->setFlash ('error', NULL);
        } else
        {
            $this->setFlash ('notice', NULL);
        }
        # 
        return $this->setFlash ($msg_type, $msg_content) ;
    }
    #
    public function getMyFlash($msg_type)
    {
        # 
        $msg_content = $this->getFlash ($msg_type) ;
        // reinitialisation
        $this->setMyFlash ($msg_type, NULL) ;
        //
        return $msg_content;
    }


    /*
    +----------------------------------------------------------------------+
    |	@create 20111006_040823 by atchapi, achilleromuald@yahoo.fr
    |	@modified 20111006_040825 by atchapi, achilleromuald@yahoo.fr: creation
    |	@descr Vider toutes les variables mise en session
    |	@call: $this->getUser()->resetCurrentUserSession();
    |	@sample: $this->getUser()->resetCurrentUserSession();
    +----------------------------------------------------------------------+
    */
    public function resetCurrentUserSession ()
    {
          foreach( $this->getCurrentUserSessionVarKey() as $key => $session_var_key)
          {
              $this->setAttribute ($session_var_key, NULL);
          }
    }


    /*
    +----------------------------------------------------------------------+
    |	@create 20120623_235705 by atchapi, achilleromuald@yahoo.fr
    |	@modified 20111006_040825 by atchapi, achilleromuald@yahoo.fr: creation
    |	@descr Vider toutes les variables mise en session
    |	@call: $this->getUser()->resetCurrentUserSession();
    |	@sample: $this->getUser()->resetCurrentUserSession();
    +----------------------------------------------------------------------+
    */
    public function getCurrentUserSessionVarKey ()
    {
       return  array(
                'IsBindToggleActivated' => "IsBindToggleActivated",
                'SessionGuardUser' => "SessionGuardUser",
                'root_insurance_institution_id' => "root_insurance_institution_id",
                'myUser::getInstitutionId' => 'myUser::getInstitutionId',
                'LastSelectedClientId' => 'LastSelectedClientId',
                'LastSelectedCommercialId' => 'LastSelectedCommercialId',				
                'root_insurance_institution_id' => 'root_insurance_institution_id',
                'workflow_status_locked-and-published_code' => 'workflow_status_locked-and-published_code',
                'LastSelectedInvoicelineitemId' => 'LastSelectedInvoicelineitemId',
                'LastSelectedPaymentId' => 'LastSelectedPaymentId',
                'LastSelectedAjoutId' => 'LastSelectedAjoutId',
                'LastSelectedVenteId' => 'LastSelectedVenteId',
                'LastSelectedDetailAjoutId' => 'LastSelectedDetailAjoutId',
                'LastSelectedDetailVenteId' => 'LastSelectedDetailVenteId',
                'LastSelectedFactureId' => 'LastSelectedFactureId',
                'LastSelectedProformatId' => 'LastSelectedProformatId',
                'LastSelectedAgencyId' => 'LastSelectedAgencyId',
				
                'LastSelectedRendezVousId' => 'LastSelectedRendezVousId',
                'LastSelectedFicheProspectId' => 'LastSelectedFicheProspectId',
				
          ) 
       ;
    }

    /*
    +----------------------------------------------------------------------+
    |	@create 20111006_040823 by atchapi, achilleromuald@yahoo.fr
    |	@modified 20111006_040825 by atchapi, achilleromuald@yahoo.fr: creation
    |	@descr Vider toutes les variables mise en session
    |	@call: $this->getUser()->getUserSessionVarKey($p_key);
    |	@sample: $this->getUser()->getUserSessionVarKey($p_key);
    +----------------------------------------------------------------------+
    */
    public function getUserSessionVarKey ($p_key)
    {
        $htbl = $this->getCurrentUserSessionVarKey ();      
        if (array_key_exists ($p_key, $htbl ) )
        {
          return $htbl[$p_key];
        }
        # error
        throw new Exception ('invalid session var key');
    }




}
