<?php

/**
 * mlparameter actions.
 *
 * @package    credit_mng
 * @subpackage mlparameter
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mlparameterActions extends sfActions // sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
         
        $this->crdmgr_parameters = Doctrine::getTable('CrdmgrParameter')
          ->createQuery('a')
          ->execute();
         

        // init for view type
       

        // sorting
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) 
        { 
          $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type'))); 
        } 
        // pager 
        if ($request->getParameter('page')) 
        { 
          $this->setPage($request->getParameter('page')); 
        } 
        $this->pager = $this->getPager(); 
        $this->sort = $this->getSort();
  }
    


  public function executeShow(sfWebRequest $request)
  {
        // init for view type
       

        $this->crdmgr_parameter = Doctrine::getTable('CrdmgrParameter')->find(array($request->getParameter('id')));
        $this->forward404Unless($this->crdmgr_parameter);
  }
  
  public function executeNew(sfWebRequest $request)
  {
          $this->form = new CrdmgrParameterForm();

  }

 
  

 

  public function executeCreate(sfWebRequest $request)
  {
        // init for view type
       

        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CrdmgrParameterForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
  }

 

  public function executeEdit(sfWebRequest $request)
  {
        // init for view type

        $this->forward404Unless($crdmgr_parameter = Doctrine::getTable('CrdmgrParameter')->find(array($request->getParameter('id'))), sprintf('Object crdmgr_parameter does not exist (%s).', $request->getParameter('id')));
        $this->form = new CrdmgrParameterForm($crdmgr_parameter);
  }

   
  public function executeUpdate(sfWebRequest $request)
  {
        // init for view type

        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($crdmgr_parameter = Doctrine::getTable('CrdmgrParameter')->find(array($request->getParameter('id'))), sprintf('Object crdmgr_parameter does not exist (%s).', $request->getParameter('id')));
        $this->form = new CrdmgrParameterForm($crdmgr_parameter);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
  }

   

  public function executeDelete(sfWebRequest $request)
  {
        // init for view type
       

        $request->checkCSRFProtection();

        $this->forward404Unless($crdmgr_parameter = Doctrine::getTable('CrdmgrParameter')->find(array($request->getParameter('id'))), sprintf('Object crdmgr_parameter does not exist (%s).', $request->getParameter('id')));

            $this->getUser()->setFlash('error', "Pour marquer comme supprime un element qui n'est plus utilise vous pouvez seulement changer son statut d'activation.");

        $this->redirect('mlparameter/'.($this->view_type == 'ajax' ? 'ajaxview' : '').'index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
        // modifier les saisies
        $a_web_request_parameters = $request->getParameter($form->getName());
				$b_formobject_isnew = false;

        
        $s_param_type = trim ($a_web_request_parameters['type_parametre']);
        $s_param_code = trim ($a_web_request_parameters['code_parametre']);
        // calculer le code du parametre de configuration
        if (substr ($s_param_code, 0, strlen ($s_param_type)) != $s_param_type)
        {			
            $s_param_code = $s_param_type.'_'.$s_param_code;
            $a_web_request_parameters['code_parametre'] = $s_param_code;
        }

        /*
        // restreindre les dévises à XAF et USSD
        if ( 'type_devise' == $s_param_type && !in_array($s_param_code, array('type_devise_XAF', 'type_devise_USD', 'type_devise_EURO', 'type_devise_XOF') ))
        {
            $this->getUser()->setFlash('error', "Seules devises prise en compte: XAF et USD.");
            $this->redirect('mlparameter/'.($this->view_type == 'ajax' ? 'ajaxview' : '').'index');
        }
        */

        // recuperer les saisies
        $form->bind($a_web_request_parameters, $request->getFiles($form->getName()));

        // Positionné les valeurs calculée et non saisie
        // $form->getObject()->setXxxx(yyy); 
        $n_user_id = $this->getUser()->getGuardUser()->getId();

        // si creation nouvelle
        if ($form->getObject()->isNew() )
		     {
			 $b_formobject_isnew = true;
            $form->getObject()->setCreatedBy($n_user_id);
        }
        // si simple maj
        $form->getObject()->setUpdatedBy($n_user_id);

        
        // $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
          $crdmgr_parameter = $form->save();
		  if ($b_formobject_isnew)
			{
				# ajouter l'id obtenu à partir d l autoincrement				
				//$clients->setCodePatient($s_current_item_defaut_businesscode.'.'.$clients->getId());
				# enregistrer la nouvelle modif
				$crdmgr_parameter->save();
			}	

                $this->getUser()->setFlash('notice', "Modification enregistree avec succes.");

          $this->redirect('mlparameter/'.($this->view_type == 'ajax' ? 'ajaxview' : '').'show?id='.$crdmgr_parameter->getId());


        }
  }


 

	#REGION PAGINATION

	public function executeAjaxviewfilter(sfWebRequest $request) 
	{
        // allow ajax request only
        $this->forward404Unless($request->isXmlHttpRequest());

        // preciser le type de vue
        $this->view_type='ajax';
        //
        $this->executeFilter($request);
        // preciser le type de vue
        $this->setTemplate('index');
    }


	public function executeFilter(sfWebRequest $request) 
	{

        // init for view type
       

		$this->setPage(1); 
		if ($request->hasParameter('_reset')) 
		{ 
			$this->setFilters($this->getFilterDefaults()); 
			//$this->forward ( 'mlparameter', 'index' );
			$this->redirect('mlparameter/'.($this->view_type == 'ajax' ? 'ajaxview' : '').'index'); 
		} 

		$this->filters = new CrdmgrParameterFormFilter($this->getFilters());  
		$this->filters->bind($request->getParameter($this->filters->getName()));

		if ($this->filters->isValid()) 
		{ 
			$this->setFilters($this->filters->getValues()); 

			//$this->getUser()->setFlash('notice', "Filtre valide.");

			//$this->forward ( 'mlparameter', 'index' );
			$this->redirect('mlparameter/'.($this->view_type == 'ajax' ? 'ajaxview' : '').'index'); 
		}
		else
		{
            # get errors messages
            $errors = $this->filters->getErrorSchema()->getErrors();
            if (count($errors) > 0)
            $s_error_causes=" ";
            {
                foreach ($errors as $name => $error)  { $s_error_causes .= "<br />".$name. ': ' . $error . ''; }
            }
            // display end user error message
            $this->getUser()->setMyFlash('error', "Bien vouloir corriger les saisies non valides suivantes: $s_error_causes");
		}

		$this->pager = $this->getPager();
		$this->sort = $this->getSort();
		$this->setTemplate('index');
	}



	protected function setPage($page) 
	{ 
		$this->getUser()->setAttribute('mlparameter_index.page', $page); 
	} 

	protected function getPage() 
	{ 
		return $this->getUser()->getAttribute('mlparameter_index.page', 1); 
	} 


	protected function buildQuery() 
	{ 
		$this->filters = new CrdmgrParameterFormFilter($this->getFilters()); 
		$query = $this->filters->buildQuery($this->getFilters()); 
		$this->addSortQuery($query); 

		return $query; 
	}



	protected function addSortQuery($query) 
	{ 
		if (array(null, null) == ($sort = $this->getSort())) 
		{ 
			return; 
		} 
		if (!in_array(strtolower($sort[1]), array('asc', 'desc'))) 
		{ 
			$sort[1] = 'asc'; 
		} 
        // #add support for multi column sorting with '-' as separator :: 20130727_184139
        $sort_params = explode ("-", $sort[0]);
        foreach ($sort_params as $sort_param_id => $sort_param)  { $query->addOrderBy( $sort_param . ' ' . $sort[1]); }
        // #endadd support
        // $query->addOrderBy($sort[0] . ' ' . $sort[1]); 
	}



	protected function getFilters() 
	{ 
		return $this->getUser()->getAttribute('mlparameter_index.filters', $this->getFilterDefaults()); 
	} 

	protected function setFilters(array $filters) 
	{ 
		return $this->getUser()->setAttribute('mlparameter_index.filters', $filters); 
	} 

	protected function getPager() 
	{ 
		// preciser le pas de pagination
		// $pager = new sfDoctrinePager(20); 
		$pager = new sfDoctrinePager(sfConfig::get('app_max_items_on_page')); 
		$pager->setQuery($this->buildQuery()); 
		$pager->setPage($this->getPage()); 
		$pager->init(); 

		return $pager; 
	}



	protected function getSort() 
	{ 
		if (null !== $sort = $this->getUser()->getAttribute('mlparameter_index.sort')) 
		{ 
			return $sort; 
		} 
		$this->setSort($this->getDefaultSort()); 
		return $this->getUser()->getAttribute('mlparameter_index.sort'); 
	}

	protected function setSort(array $sort) 
	{ 
		if (null !== $sort[0] && null === $sort[1]) 
		{ 
			$sort[1] = 'asc'; 
		} 

		$this->getUser()->setAttribute('mlparameter_index.sort', $sort);

	}

	// those methods are moved from configuration 
	protected function getDefaultSort() 
	{ 
		return array(null, null); 
	} 

	public function getFilterDefaults() 
	{ 
		return array(); 
	}

	public function isValidSortColumn($column_name) 
	{ 
		if (in_array(strtolower($column_name), array('valeur_string', 'label_param-id', 'created_at', 'updated_at'))) 
		{ 
			return true;
		} 
		return false;
	}

	#END_REGION PAGINATION

}
