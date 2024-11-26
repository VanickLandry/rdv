<?php

/** 
 * BulletinAdhesionDetailCollectionForm form.
 *
 * @package    credit_mng
 * @subpackage form
 * @author     achilleromuald@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 20101012_224048 Kris.Wallsmith $
 */
class BulletinAdhesionDetailCollectionForm extends sfForm
{
  public function configure()
  {
    if (!$bulletinAdhesion = $this->getOption('BulletinAdhesion'))
    {
      throw new InvalidArgumentException('You must provide a BulletinAdhesion object.');
    }

		// obtenir la liste de toutes les questions possibles pour une fiche de consentement
		$available_questions = Doctrine::getTable('CrdmgrParameter')
				->createQuery('a')
				->where('a.type_parametre = ?', 'question_medical_b_adhesion')
				->orderBy('a.type_parametre asc, a.label_param asc')
				->execute();

		// obtenir la liste des questions dispo
		$used_question_ids = array( );
		$h_used_question_id_to_detail_keys = array( );
		$c_bulletinAdhesionDetails = $bulletinAdhesion->getBulletinAdhesionDetails() ;
		
		foreach( $c_bulletinAdhesionDetails as $key => $o_answer)
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
				$bulletinAdhesionDetail = new CrdmgrBulletinAdhesionDetail();
				// ini
				$bulletinAdhesionDetail->CtrQuestion = $o_question;
				$bulletinAdhesionDetail->question_id = $o_question->getId();
				$bulletinAdhesionDetail->CtrBulletinAdhesion = $bulletinAdhesion;
			} else  // si question utilisée
			{
				$bulletinAdhesionDetail = $c_bulletinAdhesionDetails [ $h_used_question_id_to_detail_keys [$o_question->getId()] ];
			}

			 
      $form = new CrdmgrBulletinAdhesionDetailForm($bulletinAdhesionDetail , array(
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


