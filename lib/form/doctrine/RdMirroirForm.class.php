<?php

/**
 * RdMirroir form.
 *
 * @package    test
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RdMirroirForm extends BaseRdMirroirForm
{
  public function configure()
  {
  
  $this->useFields(array(
		// 'largeur', 
		// 'newPhotos', 
		// 'hauteur', 
		// 'nombre_id', 
	));

	 
 // $this->embedRelations(array(
 $this->embedRelations(array(
 'fk_detail' => array(
 'considerNewFormEmptyFields' => array('largeur_min', 'hauteur_min'),
 'multipleNewForms'              => true,
 // 'noNewForm'              => true,
 'newFormsInitialCount'          => 1,
 'newRelationButtonLabel'        => 'Add ++',
 // 'customEmbeddedFormLabelMethod'        => 'testttt',
 'newRelationAddByCloning'        => true,
 'formClassArgs'                 => array(array('ah_add_delete_checkbox' => true)),
 )
 ));
	  $this->widgetSchema->setLabels(array(
				'new_fk_detail'    => ' ',
				// 'largeur_min'    => ' ',
				
			));
			
			
  }
   public function listenToFormPostConfigureEvent(sfEvent $event)
        {
          $form = $event->getSubject();

          if($form instanceof sfFormDoctrine && $form->getOption('ah_add_delete_checkbox', false) && !$form->isNew())
          {
            $form->setWidget('delete_object', new sfWidgetFormInputCheckbox(array('label' => 'Just destroy the damn object!')));
            $form->setValidator('delete_object', new sfValidatorPass());
          }
        }

 
}
