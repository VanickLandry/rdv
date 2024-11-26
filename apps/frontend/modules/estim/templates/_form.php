<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('estim/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="well offset4">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
           <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'estim/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
		  <hr/>
          <input type="submit" value="Calculate" class="btn btn-success" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['largeur']->renderLabel() ?></th>
        <td>
          <?php echo $form['largeur']->renderError() ?>
          <?php echo $form['largeur']->render(array('class' => 'span1 offset3',)) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['new_fk_detail']->renderLabel() ?></th>
        <td>
          <?php echo $form['new_fk_detail']->renderError() ?>
          <?php echo $form['new_fk_detail'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
