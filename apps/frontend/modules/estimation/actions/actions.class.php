<?php

/**
 * estimation actions.
 *
 * @package    simuce
 * @subpackage estimation
 * @author     UCE - Désire Talla Tueguem
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class estimationActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->estimation = Doctrine_Core::getTable('Estimation')
      ->createQuery('a')
      ->execute();
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
  public function executeViewquantity(sfWebRequest $request)
  {
    $this->estimation = Doctrine_Core::getTable('Estimation')
      ->createQuery('a')
      ->execute();
  }


  public function executeShow(sfWebRequest $request)
  {
    $this->estimation = Doctrine_Core::getTable('Estimation')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->estimation);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EstimationForm();
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

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EstimationForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
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

  public function executeEdit(sfWebRequest $request)
  {
  $estimation = Doctrine_Core::getTable('Estimation')
      ->createQuery('a')
      ->execute();
    $this->forward404Unless($estimation = Doctrine_Core::getTable('Estimation')->find(array($request->getParameter('id'))), sprintf('Object estimation does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstimationForm($estimation);
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

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($estimation = Doctrine_Core::getTable('Estimation')->find(array($request->getParameter('id'))), sprintf('Object estimation does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstimationForm($estimation);

    $this->processForm($request, $this->form);
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($estimation = Doctrine_Core::getTable('Estimation')->find(array($request->getParameter('id'))), sprintf('Object estimation does not exist (%s).', $request->getParameter('id')));
    $estimation->delete();

    $this->redirect('estimation/index');
  }

   protected function processForm(sfWebRequest $request, sfForm $form)
  {
		// @variables locales
		$s_current_item_defaut_businesscode = "";
		$b_formobject_isnew = false;

		// modifier les saisies
		$a_web_request_parameters = $request->getParameter($form->getName());
		
		$s_param_length = trim ($a_web_request_parameters['length']);
		$s_param_width = trim ($a_web_request_parameters['width']);
		
		// calculer le code du parametre de configuration
		// if (substr ($s_param_code, 0, strlen ($s_param_type)) != $s_param_type)
		// {			
			// $s_param_code = $s_param_type.'_'.$s_param_code;
			// $a_web_request_parameters['code_parametre'] = $s_param_code;
		// }
		
		$prix=$s_param_length +$s_param_width;
 		
		// recuperer les saisies
    $form->bind($a_web_request_parameters, $request->getFiles($form->getName()));
 		// si creation nouvelle
		if ($form->getObject()->isNew() )
		{
			// marquer k c'est un insert
			$b_formobject_isnew = true;

			//
			$form->getObject()->setPrice($prix);
		 

			# calculer le code par defaut de l'element. Format: {prefix}{datetimecode}.{id_institution}.{id_agence}.{id_item}
			 
		}
		// si simple maj
		// $form->getObject()->setUpdatedById($n_user_id);
			$form->getObject()->setPrice($prix);


    //$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $estimation = $form->save();
      // $estimation = "";
			
			// si la modification effectué etait une insertion 
			if ($b_formobject_isnew)
			{
				
				$estimation->save();
			}				 

			$this->getUser()->setFlash('notice', "Les Calculs ont etes enregistres avec succes.");
			// edit?id='
      $this->redirect('estimation/edit?id='.$estimation->getId());
    }
	else
	{
	$this->getUser()->setFlash('error', "veuillez verifier les saises et vous assurer que vous utilisez les nombres et pas les lettres.");
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
        //$this->initializeViewType ();

		$this->setPage(1); 
		if ($request->hasParameter('_reset')) 
		{ 
			$this->setFilters($this->getFilterDefaults()); 
			//$this->forward ( 'estimation', 'index' );
			$this->redirect('estimation/'.($this->view_type == 'ajax' ? 'ajaxview' : '').'index'); 
		} 

		$this->filters = new EstimationFormFilter($this->getFilters());  
		$this->filters->bind($request->getParameter($this->filters->getName()));

		if ($this->filters->isValid()) 
		{ 
			$this->setFilters($this->filters->getValues()); 

			//$this->getUser()->setFlash('notice', "Filtre valide.");

			//$this->forward ( 'estimation', 'index' );
			$this->redirect('estimation/'.($this->view_type == 'ajax' ? 'ajaxview' : '').'index'); 
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
		$this->getUser()->setAttribute('estimation_index.page', $page); 
	} 

	protected function getPage() 
	{ 
		return $this->getUser()->getAttribute('estimation_index.page', 1); 
	} 


	protected function buildQuery() 
	{ 
		$this->filters = new EstimationFormFilter($this->getFilters()); 
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
		return $this->getUser()->getAttribute('estimation_index.filters', $this->getFilterDefaults()); 
	} 

	protected function setFilters(array $filters) 
	{ 
		return $this->getUser()->setAttribute('estimation_index.filters', $filters); 
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
		if (null !== $sort = $this->getUser()->getAttribute('estimation_index.sort')) 
		{ 
			return $sort; 
		} 
		$this->setSort($this->getDefaultSort()); 
		return $this->getUser()->getAttribute('estimation_index.sort'); 
	}

	protected function setSort(array $sort) 
	{ 
		if (null !== $sort[0] && null === $sort[1]) 
		{ 
			$sort[1] = 'asc'; 
		} 

		$this->getUser()->setAttribute('estimation_index.sort', $sort);

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
