<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_helper('I18N') ?>



<?php slot('slot_jquery') ?>
<?php if (false) : ?> <script type="text/javascript" > <?php endif ?>

    // personnaliser la css class pour listes deroulantes pour date(jour,mois,annee)
    InitializeDateDropdownCssClass();
    // personnaliser les saisies en majuscule
    InitializeToUpperCaseStrokeConversion() ;
    // prevent enter keypress to submit a web form
    InitializePreventEnterKeypressToSubmitForm();
    // initialize ajax for specific form submit buttons
    // SetAjaxLinkActionMyModalDialog ( 'btn_mdlparameter_form_ok', 'form_mdlparameter', null , null, false, false );
    //    SetAjaxLinkActionMyModalDialog ( 'btn_planteur_produit_id', null, null , 'rta_lot_analyse_planteur_produit_id', false, false );   
    //    SetAjaxLinkActionMyModalDialog ( 'btn_lot_id', null, null , 'rta_lot_analyse_lot_id', false, false );     
    //    SetAjaxLinkActionMyModalDialog ( 'btn_laboratoire_id', null, null , 'rta_lot_analyse_laboratoire_id', false, false ); 
    //  
    //  SetAjaxLinkActionMyModalDialog ( 'btn_analyse_verify', 'form_mdlanalyse', null , null, false, true );

<?php if (false) : ?>    </script> <?php endif ?>
<?php end_slot() ?>

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


 

<form id='form_mdlparameter' action="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').''.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
 
	<?php echo $form->renderHiddenFields() ?>

<?php // echo $form ?>

<?php /* ?>

<?php echo $form['{0}']->renderLabel ( '&nbsp;'.$form['{0}']->renderLabelName().':&nbsp;', array('class' => 'rta_text_04')) ?>
<?php echo $form['{0}']->render () ?>
<?php echo $form['{0}']->renderError () ?>

<?php echo $form['{0}']->renderError() ?>
<?php echo $form['{0}']->renderRow() ?>
<?php echo $form['{0}']->renderRow() ?>

<?php */ ?>

    
    <table width="100%" border="0" cellspacing="2" cellpadding="0" >
          <tr>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04"> <?php echo $form['is_active']->renderLabel ( '&nbsp;'.$form['is_active']->renderLabelName().':&nbsp;', array('class' => 'rta_text_04')) ?></td>
            <td align="left" valign="top"  width="1%">
            
                
    <?php echo $form['is_active']->render () ?>
    <?php echo $form['is_active']->renderError () ?>
                        </td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04"><?php echo $form['type_parametre']->renderLabel ( '&nbsp;'.$form['type_parametre']->renderLabelName().':&nbsp;', array('class' => 'rta_text_04')) ?></td>
            <td align="left" valign="top" width="1%">
                
    <?php echo $form['type_parametre']->render () ?>
    <?php echo $form['type_parametre']->renderError () ?>
            
            </td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04"><?php echo $form['code_parametre']->renderLabel ( '&nbsp;'.$form['code_parametre']->renderLabelName().':&nbsp;', array('class' => 'rta_text_04')) ?></td>
            <td align="left" valign="top" width="1%">
            
                
    <?php echo $form['code_parametre']->render(array('class' => 'uppercase')) ?>
    <?php echo $form['code_parametre']->renderError () ?>
            
            </td>
            </tr>
          
          <tr>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04"><?php echo $form['label_param']->renderLabel ( '&nbsp;'.$form['label_param']->renderLabelName().':&nbsp;', array('class' => 'rta_text_04')) ?></td>
            <td align="left" valign="top"  width="1%">
            
                
    <?php echo $form['label_param']->render(array('class' => 'uppercase'))?>
    <?php echo $form['label_param']->renderError () ?>
            
            </td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04"> <?php echo $form['valeur_string']->renderLabel ( '&nbsp;'.$form['valeur_string']->renderLabelName().':&nbsp;', array('class' => 'rta_text_04')) ?></td>
            <td align="left" valign="top" width="1%">
                 
    <?php echo $form['valeur_string']->render(array('class' => 'uppercase')) ?>
    <?php echo $form['valeur_string']->renderError () ?>
              
            </td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04"><?php echo $form['valeur_numeric']->renderLabel ( '&nbsp;'.$form['valeur_numeric']->renderLabelName().':&nbsp;', array('class' => 'rta_text_04')) ?></td>
            <td align="left" valign="top" width="1%">    
    <?php echo $form['valeur_numeric']->render () ?>
    <?php echo $form['valeur_numeric']->renderError () ?></td>
      </tr>
            
            <tr>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04"><?php echo $form['description_param']->renderLabel ( '&nbsp;'.$form['description_param']->renderLabelName().':&nbsp;', array('class' => 'rta_text_04')) ?></td>
            <td align="left" valign="top"  width="1%">
            
                
    <?php echo $form['description_param']->render(array('class' => 'uppercase')) ?>
    <?php echo $form['description_param']->renderError () ?>
            
            </td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04">&nbsp;-              : &nbsp;</td>
            <td align="left" valign="top" width="1%">&nbsp;</td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04">&nbsp;-              : &nbsp;</td>
            <td align="left" valign="top" width="1%">&nbsp;</td>
      </tr>
            
          <tr>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            </tr>
        </table>
    
        
        <!-- actions -->
    <div class="well" align="right"> 
    <input id='btn_mdlparameter_form_ok'  type="submit" value="OK" class="btn" />
    <a id='btn_mdlparameter_chercher' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index') ?>" class="btn">Chercher</a> 
    <?php if ($form->getObject()->isNew() == false): ?>
    <a id='btn_mdlparameter_supprimer' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index') ?>" class="btn">Supprimer</a> 
    <?php endif ?>
    <a id='btn_mdlparameter_index' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').''.($form->getObject()->isNew() ? 'index' : 'show').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" class="btn">Annuler</a>     
    <a id='btn_mdlparameter_lister' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index') ?>" class="btn">Lister</a>     
    </div>





</form>


<?php if (false): ?>
</div>
<?php endif ?>