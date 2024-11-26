<!-- apps/frontend/modules/job/templates/_form.php -->
<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
 

<?php // include_partial('form', array('form' => $form, 'someparam' => $someparam)) ?>
<?php // echo form_tag_for($form, '@password') ?>
<?php
/*
<form action="<?php echo url_for('layouts/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
*/
?>

<!-- #REGION: Formulaire_ChangeMyPwd -->
<form  action="<?php echo url_for('mlChangeMyPassword/send') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
 
   <table id="Formulaire_ChangeMyPwd">
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="Change My Password" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>

    </tbody>
  </table>
</form>
<!-- #END_REGION: Formulaire_ChangeMyPwd -->