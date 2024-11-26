<?php use_helper('I18N') ?>
<?php
if (false)
{
?>
<link href="../../../../../web/css/main.css" rel="stylesheet" type="text/css" /> 
<link href="../../../../../web/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../../../../../web/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" /> 
<link href="../../../../../web/css/rta_css_main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<?php
}
?>

<?php if (false): ?>
<div class="rta_bgrd_01">
<?php endif ?>



<!-- #region definir les slots utiles -->

<?php slot('slot_fil_ariane') ?>
<a id='btn_mdlparameter_ariane' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index') ?>" class="rta_lnk_03"  > Parametres </a> &gt; Lister parametres configuration
<?php end_slot() ?>

<?php slot('slot_module_title') ?>
<?php echo  __('Lister parametres configuration', null, 'rta_sf_dictionnary')  ?>
<?php end_slot() ?>

<!-- #endregion definir les slots utiles -->


<?php use_stylesheets_for_form($filters) ?>
<?php use_javascripts_for_form($filters) ?>




<form id='form_mdlparameter_index_filters' action="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'filter') ?>" method="post">

	<?php echo $filters->renderHiddenFields() ?>	
    
	<?php // echo $filters ?>

<?php /* ?>
<?php echo $filters['{0}']->renderLabel ( '&nbsp;'.$filters['{0}']->renderLabelName().':&nbsp;', array('class' => 'rta_text_04')) ?>
<?php echo $filters['{0}']->render () ?>
<?php echo $filters['{0}']->renderError () ?>

<?php echo $filters['{0}']->renderError() ?>
<?php echo $filters['{0}']->renderRow() ?>
<?php */ ?>

    
    <div class="well" align="right">

<table width="100%" border="0" cellspacing="2" cellpadding="0" >
            
            
            <tr>
            <td colspan="6" align="left" valign="top" nowrap="nowrap" class="rta_text_04 ">   
            <span class="badge">Rechercher des parametres    
				<?php if ($pager->getNbResults()): ?>
					| .:: <?php echo $pager->getNbResults(); ?> resultat(s) ::.
           		 <?php endif; ?>
            
                   </span>            </td>
            </tr>
            
            <tr>
            <td colspan="6" align="left" valign="top" nowrap="nowrap" class="rta_text_04 ">&nbsp;</td>
            </tr>
            
            <tr>

            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04"><?php echo $filters['type_parametre']->renderLabel ( '&nbsp;'.$filters['type_parametre']->renderLabelName().':&nbsp;', array('class' => 'rta_text_04')) ?></td>
            <td align="left" valign="top" width="1%">
            
            
<?php echo $filters['type_parametre']->render () ?>
<?php echo $filters['type_parametre']->renderError () ?>
            
            </td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04"><?php echo $filters['valeur_string']->renderLabel ( '&nbsp;'.$filters['valeur_string']->renderLabelName().':&nbsp;', array('class' => 'rta_text_04')) ?></td>
            <td align="left" valign="top" width="1%">
            
            
<?php echo $filters['valeur_string']->render () ?>
<?php echo $filters['valeur_string']->renderError () ?>
            
            </td>
            </tr>
        </table>


  <input type="submit" name="filter" value="GO" class="btn" id='btn_mdlparameter_filter_go' />
    <a href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'filter?_reset=1') ?>" class="btn" id='lnk_mdlparameter_filter_cancel' >Initialiser</a>    
     <a href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'new') ?>" class="btn" id='lnk_mdlparameter_new'  >Nouveau</a>   
    </div>
    
    
    
</form>

	<br/>
	


  <?php if (!$pager->getNbResults()): ?>
  
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Notice !</h4>
        Aucun resultat
        </div> 
        
  <?php else: ?>
		
		
        
        <div class="well">
         
     
     	<?php $rta_parameters = $pager->getResults() ?>

		<?php include_partial('mdlparameter/list', array('rta_parameters' => $rta_parameters, 'view_type' => $view_type)) ?>	
     
     
	     <?php if ($pager->haveToPaginate()): ?>
        
						
     
    	 <div class="pagination pagination-centered">
              <ul>
                <li><a id='mdlparameter_previouspage' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index') ?>?page=<?php echo $pager->getPreviousPage() ?>"> <i class="icon-chevron-left"></i> </a></li>
                <li><a id='mdlparameter_previouspage2' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index') ?>?page=<?php echo $pager->getPreviousPage() ?>">Precedent</a></li>
                <li><a id='mdlparameter_previouspage3' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index') ?>?page=<?php echo $pager->getPreviousPage() ?>">Page <?php echo  $pager->getPage() ?> / <?php echo  $pager->getLastPage()  ?> </a></li>
                <li><a id='mdlparameter_nextpage' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index') ?>?page=<?php echo $pager->getNextPage() ?>">Suivant</a></li> 
                <li><a id='mdlparameter_nextpage2' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index') ?>?page=<?php echo $pager->getNextPage() ?>"> <i class="icon-chevron-right"></i> </a></li>
             </ul>
            </div>
            
            
        <?php endif; ?>
            
    </div>
        
        
			
        
        
	<?php endif; ?>



<?php if (false): ?>
</div>
<?php endif ?>



<?php if ($view_type == 'ajax'): ?>
<script type="text/javascript">
    // initialize ajax for all links or buttons action
    SetAjaxForAllLinkActionMyModalDialog();
    // initialize ajax for specific form submit buttons
    SetAjaxLinkActionMyModalDialog ( 'btn_mdlparameter_filter_go', 'form_mdlparameter_index_filters', null, null, false, false );
</script>
<?php endif ?>


