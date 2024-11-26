<?php

/**
 * Estim form.
 *
 * @package    Rdv
 * @subpackage form
 * @author     Bongas
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EstimForm extends BaseEstimForm
{
  public function configure()
  {
  
  
  
  
  
  
  
  
  
  // $this->validatorSchema['largeur'] = new sfValidatorNumber (array(
				// 'required' => false,
			// ));

  
  
    
  $this->useFields(array(
		'largeur', 
		// 'newPhotos', 
		// 'hauteur', 
		// 'nombre_id', 
	));

	 
 // $this->embedRelations(array(
 $this->embedRelations(array(
 'fk_detail' => array(
 // 'considerNewFormEmptyFields' => array('length', 'width'),
 'multipleNewForms'              => true,
 // 'noNewForm'              => true,
 'newFormsInitialCount'          => 1,
 'newRelationButtonLabel'        => 'Add ++',
 // 'customEmbeddedFormLabelMethod'        => 'testttt',
 'newRelationAddByCloning'        => true,
 'customEmbeddedFormLabelMethod' => 'getLabelTitle',
 'formClassArgs'                 => array(array('ah_add_delete_checkbox'=> 'True')),
 )
 ));
	  $this->widgetSchema->setLabels(array(
				'new_fk_detail'    => ' ',
				'largeur'    => '%&nbsp; ',
				
			));
			
			
  }
   public function listenToFormPostConfigureEvent(sfEvent $event)
        {
          $form = $event->getSubject();

          if($form instanceof sfFormDoctrine && $form->getOption('ah_add_delete_checkbox', true) && !$form->isNew())
          {
            $form->setWidget('delete_object', new sfWidgetFormInputCheckbox(array('label' => 'Delete')));
            $form->setValidator('delete_object', new sfValidatorPass());
          }
        }

  
  
  
  }
 
