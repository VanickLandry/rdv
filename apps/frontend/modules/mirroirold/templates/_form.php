<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('mirroir/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="well offset4">
   
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
    
      <tr>
        <th><?php echo $form['new_fk_detail']->renderLabel() ?></th>
        <td>
          <?php echo $form['new_fk_detail']->renderError() ?>
          <?php echo $form['new_fk_detail'] ?>
        </td>
      </tr>
    </tbody>
	
	<div class="clear"></div><br/>
	<div class="clear"></div><br/>
	 <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('mirroir/new') ?>" class="btn btn-success" >Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'mirroir/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input class="btn btn-danger" type="submit" value="Result" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>
