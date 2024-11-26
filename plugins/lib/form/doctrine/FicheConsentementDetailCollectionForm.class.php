<?php

/**
 * FicheConsentementDetailCollectionForm form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FicheConsentementDetailCollectionForm extends sfForm
{
  public function configure()
  {
    if (!$ficheConsentement = $this->getOption('FicheConsentement'))
    {
      throw new InvalidArgumentException('You must provide a FicheConsentement object.');
    }

		// obtenir la liste de toutes les questions possibles pour une fiche de consentement
		$available_questions = Doctrine::getTable('CrdmgrParameter')
				->createQuery('a')
				->where('a.type_parametre = ?', 'question_medical_f_consentement')
				->orderBy('a.type_parametre asc, a.label_param asc')
				->execute();

		// obtenir la liste des questions dispo
		$used_question_ids = array( );
		$h_used_question_id_to_detail_keys = array( );
		$c_ficheConsentementDetails = $ficheConsentement->getFicheConsentementDetails() ;
		
		foreach( $c_ficheConsentementDetails as $key => $o_answer)
		{
			array_push($used_question_ids, $o_answer->getQuestionId());
			$h_used_question_id_to_detail_keys [$o_answer->getQuestionId()] = $key;
		}

		// positionner les contrôles de rendu des questions attendues preconfigurées
		$i = 1;
		foreach( $available_questions as $key => $o_question)
		{
			// si question non encore utilisé
			if ( in_array($o_question->getId(), $used_question_ids) != true )
			{
				$ficheConsentementDetail = new CrdmgrFicheConsentementDetail();
				// ini
				$ficheConsentementDetail->CtrQuestion = $o_question;
				$ficheConsentementDetail->question_id = $o_question->getId();
				$ficheConsentementDetail->CtrFicheConsentement = $ficheConsentement;
			} else  // si question utilisée
			{
				$ficheConsentementDetail = $c_ficheConsentementDetails [ $h_used_question_id_to_detail_keys [$o_question->getId()] ];
			}
			 
      $form = new CrdmgrFicheConsentementDetailForm($ficheConsentementDetail , array(
					'question_text' => "$i. ".$o_question->getValeurString(),
					)
				);
      $this->embedForm($i, $form );
			$i ++;
		}
  }
}


// -- draft --
// for ($i = 0; $i < $this->getOption('size', 2); $i++)


