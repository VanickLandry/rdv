<?php

/**
 * sfGuardUserFormFilter module filter.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardUser
 * @author     achille.tchapi
 * @version    SVN: $Id: sfGuardUserFormFilter.class.php 20100910_213143 achille.tchapi
 */
class sfGuardUserFormFilter extends PluginsfGuardUserFormFilter
{
	public function configure()
	{
		// parent::configure();
		
		$this->widgetSchema['reference'] = new sfWidgetFormFilterInput(array(
		  'template' => '%input%'
		));
		/*
		$this->widgetSchema['reference'] = new sfWidgetFormFilterInput(array(
		      'with_empty' => false
		    ));
		*/

	}
}