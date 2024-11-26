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
<a id='btn_mdlparameter_ariane' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index') ?>" class="rta_lnk_03"  > Parametres </a> &gt; Consulter parametre configuration
<?php end_slot() ?>

<?php slot('slot_module_title') ?>
<?php echo  __('Consulter parametre configuration', null, 'rta_sf_dictionnary')   ?>
<?php end_slot() ?>

<!-- #endregion definir les slots utiles -->




    
    <table width="100%" border="0" cellspacing="4" cellpadding="0" >
          <tr>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04" width="1%">Actif ? : &nbsp;</td>
            <td align="left" valign="bottom"   ><div class="well well-small" > <?php echo myFrontendHelper::getDisplayBooleanHelper($crdmgr_parameter->getIsActive()) ?>         </div></td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04" width="1%">Categorie : &nbsp;</td>
            <td align="left" valign="bottom"  ><div class="well well-small" ><?php echo myFrontendHelper::getDisplayNoUnderscoreHelper($crdmgr_parameter->getTypeParametre()) ?></div></td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04" width="1%">&nbsp;Code : &nbsp;</td>
            <td align="left" valign="bottom"><div class="well well-small" ><?php echo $crdmgr_parameter->getCodeParametre() ?></div></td>
            </tr>
          
          <tr>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04">&nbsp;Label : &nbsp;</td>
            <td align="left" valign="bottom"><div class="well well-small" ><?php echo $crdmgr_parameter->getLabelParam() ?></div></td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04">&nbsp;Prix : &nbsp;</td>
            <td align="left" valign="bottom">
               
              <div class="well well-small" ><?php echo $crdmgr_parameter->getValeurString() ?></div>
                           </td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04">&nbsp;Dimension : &nbsp;</td>
            <td align="left" valign="bottom"><div class="well well-small" ><?php echo $crdmgr_parameter->getValeurNumeric() ?></div></td>
            </tr>
            
            <tr>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04">Description : &nbsp;</td>
            <td align="left" valign="bottom"><div class="well well-small" ><?php echo $crdmgr_parameter->getDescriptionParam() ?></div></td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04">Date creation               : &nbsp;</td>
            <td align="left" valign="bottom"><div class="well well-small" ><?php echo $crdmgr_parameter->getCreatedAt() ?></div></td>
            <td align="right" valign="top" nowrap="nowrap" class="rta_text_04">&nbsp;Date modification               : &nbsp;</td>
            <td align="left" valign="bottom"><div class="well well-small" ><?php echo $crdmgr_parameter->getUpdatedAt() ?></div></td>
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

           <a id='btn_mdlparameter_edit' href="<?php echo url_for('mlparameter/edit?id='.$crdmgr_parameter->getId()) ?>" class="btn">Modifier</a>     
           <a id='btn_mdlparameter_new' href="<?php echo url_for('mlparameter/new') ?>" class="btn">Nouveau</a> 
    <a id='btn_mdlparameter_list' href="<?php echo url_for('mlparameter/index') ?>" class="btn">Lister</a>     
        </div>

 

<?php if (false): ?>
</div>
<?php endif ?>


















