<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('detailmirroir/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('detailmirroir/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'detailmirroir/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['largeur_min']->renderLabel() ?></th>
        <td>
          <?php echo $form['largeur_min']->renderError() ?>
          <?php echo $form['largeur_min'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hauteur_min']->renderLabel() ?></th>
        <td>
          <?php echo $form['hauteur_min']->renderError() ?>
          <?php echo $form['hauteur_min'] ?>
        </td>
      </tr>
	  <tr>
        <th><?php echo $form['quantite']->renderLabel() ?></th>
        <td>
          <?php echo $form['quantite']->renderError() ?>
          <?php echo $form['quantite'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
