<?php /*
<link href="../../welcome/templates/crd_mng_css_main.css" rel="stylesheet" type="text/css" />
*/ ?>

<?php use_stylesheets_for_form($filters) ?>
<?php use_javascripts_for_form($filters) ?>



<h1>Liste parametres de configuration</h1>
<br />


<form class="lien_ajax" action="<?php echo url_for('mlparameter/filter') ?>" method="post">

	<?php echo $filters->renderHiddenFields() ?>	
    
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


  <input type="submit" name="filter" value="GO" class="btn" id='btn_mlparameter_filter_go' />
    <a href="<?php echo url_for('mlparameter/filter?_reset=1') ?>" class="btn" id='lnk_mlparameter_filter_cancel' >Initialiser</a>    
     <a href="<?php echo url_for('mlparameter/new') ?>" class="btn" id='lnk_mlparameter_new'  >Nouveau</a>   
    </div>
    
    
</form>

	<br/>
	

  <?php if (!$pager->getNbResults()): ?>
    <div align="left"> <p>Aucun resultat</p> </div>
  <?php else: ?>
		<div align="right"> <?php echo $pager->getNbResults(); ?> resultat(s) </div>
	<br/>

		<?php if ($pager->haveToPaginate()): ?>
        <table width="1%" border="0" align="center" cellpadding="0" cellspacing="5">
           <div class="pagination pagination-centered">
              <ul>
                <li><a id='mlparameter_previouspage' href="<?php echo url_for('mlparameter/index') ?>?page=<?php echo $pager->getPreviousPage() ?>"> <i class="icon-chevron-left"></i> </a></li>
                <li><a id='mlparameter_previouspage2' href="<?php echo url_for('mlparameter/index') ?>?page=<?php echo $pager->getPreviousPage() ?>">Precedent</a></li>
                <li><a id='mlparameter_previouspage3' href="<?php echo url_for('mlparameter/index') ?>?page=<?php echo $pager->getPreviousPage() ?>">Page <?php echo  $pager->getPage() ?> / <?php echo  $pager->getLastPage()  ?> </a></li>
                <li><a id='mlparameter_nextpage' href="<?php echo url_for('mlparameter/index') ?>?page=<?php echo $pager->getNextPage() ?>">Suivant</a></li> 
                <li><a id='mlparameter_nextpage2' href="<?php echo url_for('mlparameter/index') ?>?page=<?php echo $pager->getNextPage() ?>"> <i class="icon-chevron-right"></i> </a></li>
             </ul>
            </div>	
        </table>
		<?php endif; ?>

		<?php $crdmgr_parameters = $pager->getResults() ?>

		<?php include_partial('mlparameter/list', array('crdmgr_parameters' => $crdmgr_parameters)) ?>

		<?php if ($pager->haveToPaginate()): ?>
        <table width="1%" border="0" align="center" cellpadding="0" cellspacing="5">
          <tr>
 
 <div class="pagination pagination-centered">
              <ul>
                <li><a id='mlparameter_previouspage' href="<?php echo url_for('mlparameter/index') ?>?page=<?php echo $pager->getPreviousPage() ?>"> <i class="icon-chevron-left"></i> </a></li>
                <li><a id='mlparameter_previouspage2' href="<?php echo url_for('mlparameter/index') ?>?page=<?php echo $pager->getPreviousPage() ?>">Precedent</a></li>
                <li><a id='mlparameter_previouspage3' href="<?php echo url_for('mlparameter/index') ?>?page=<?php echo $pager->getPreviousPage() ?>">Page <?php echo  $pager->getPage() ?> / <?php echo  $pager->getLastPage()  ?> </a></li>
                <li><a id='mlparameter_nextpage' href="<?php echo url_for('mlparameter/index') ?>?page=<?php echo $pager->getNextPage() ?>">Suivant</a></li> 
                <li><a id='mlparameter_nextpage2' href="<?php echo url_for('mlparameter/index') ?>?page=<?php echo $pager->getNextPage() ?>"> <i class="icon-chevron-right"></i> </a></li>
             </ul>
            </div>						
						
						
           </tr>
        </table>
		<?php endif; ?>
	<?php endif; ?>

	<br />

