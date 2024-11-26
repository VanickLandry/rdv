<?php

/**
 * RdMirroir form.
 *
 * @package    test
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RdMirroirUnbattantForm extends BaseRdMirroirForm
{
  public function configure()
  {
  
  $this->useFields(array(
		'largeur', 
		// 'newPhotos', 
		'hauteur', 
	));
  $subForm = new sfForm();
  $max=3;
      for ($i = 1; $i < $max; $i++)
      {
        $rd_detail_mirroir = new RdDetailMirroir();
        $rd_detail_mirroir->mirroir_id = $this->getObject();
        $formunbattant = new RdDetailMirroirForm($rd_detail_mirroir);
		
		

        $subForm->embedForm($i, $formunbattant);
      }
      // $this->embedMergeForm('newPhotos', $subForm);
      $this->embedForm('calculation', $subForm);
	  $this->widgetSchema->setLabels(array(
				'other_details'    => 'Labour',
				
			));
  }
}
