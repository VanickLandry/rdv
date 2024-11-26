<?php 

class ChangeMyPwdForm extends sfForm
{
    public function configure()
    {
		/*
		unset(
			  $this['created_at'], $this['updated_at'],
			  $this['expires_at'], $this['is_activated']
			);
		*/

        $this->setWidgets(array(
            'current_password'   => new sfWidgetFormInputPassword (), // Mot de passe actuel  :: sfWidgetFormInputText
			'new_password'   => new sfWidgetFormInputPassword (), // Nouveau mot de passe
			'new_password_confirmation'   => new sfWidgetFormInputPassword (), // Confirmation nouveau mot de passe
            ));
		
        $this->setValidators(array(
            'current_password' => new sfValidatorString(array('required' => true), array(
								'required'   => 'Le mot de passe actuel est requis',
								// 'min_length' => 'The message "%value%" is too short. It must be of %min_length% characters at least.',
							  )),
            'new_password'   => new sfValidatorString(array('min_length' => 5, 'required' => true), array(
								'required'   => 'Un nouveau mot de passe actuel est requis',
								'min_length' => 'Le nouveau mot de passe est trop court. il doit avoir au moins %min_length% caracteres.',
							  )),
			'new_password_confirmation' => new sfValidatorString(array('required' => true), array(
								'required'   => 'La confirmation du nouveau mot de passe actuel est requise',
							  )),
            ));		
		// confirmer le nouveau mot de passe
		$this->validatorSchema->setPostValidator(new sfValidatorSchemaCompare('new_password_confirmation'
			, sfValidatorSchemaCompare::EQUAL, 'new_password', array(),
		    array('invalid' => 'Le nouveau mot de passe ne correspond pas a la valeur confirmee'))
		);

		// Preciser tous les champs de formulaire attendu pour la validation ie au moment de l'appel : $this->form->isValid() , sinon l'erreur "Unexpected extra fields"
		$this->widgetSchema->setLabels(array(
			  'current_password'    => 'Mot de passe actuel',
			  'new_password'      => 'Nouveau mot de passe',
			  'new_password_confirmation'   => 'Confirmer nouveau mot de passe',
			));
		
		// Preciser au besoin les textes de commentaire à afficher près de chaque champ :
		// $this->widgetSchema->setHelp('current_password', 'Mot de passe actuel.');
		
		/*
		$this->setValidators(array(
				  'current_password'   => new sfValidatorString(array('max_length' => 300))
				)); 
		// $this->setPostValidators(new sfValidatorSchemaCompare('new_password','==', 'new_password_confirmation'));
		*/		


		// TRES IMPORTANT: Preciser le format de nomenclature pour regroupement des champs (html) à considerer comme faisant partie de ce formulaire au moment du bind dans l'action ***** mlChangeMyPasswordActions extends sfActions *****
		$this->widgetSchema->setNameFormat('ChangeMyPwd[%s]');

    }


}