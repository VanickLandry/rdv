<?php use_helper('I18N') ?>

<!-- #region definir les slots utiles -->

<?php slot('slot_fil_ariane') ?>
<a id='btn_mdlparameter_ariane' href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index') ?>" class="rta_lnk_03"  > Parametres </a> &gt; Editer parametre configuration
<?php end_slot() ?>

<?php slot('slot_module_title') ?>
<?php echo  __('Editer parametre configuration', null, 'rta_sf_dictionnary') ?>
<?php end_slot() ?>

<!-- #endregion definir les slots utiles -->

<?php include_partial('form', array('form' => $form, 'view_type' => $view_type)) ?>


<?php if ($view_type == 'ajax'): ?>
<script type="text/javascript">
    // initialize ajax for all links or buttons action
    SetAjaxForAllLinkActionMyModalDialog();
    // initialize ajax for specific form submit buttons
    SetAjaxLinkActionMyModalDialog ( 'btn_mdlparameter_form_ok', 'form_mdlparameter', null, null, false, false );
</script>
<?php endif ?>
