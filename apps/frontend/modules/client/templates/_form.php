<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('client/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
           <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'client/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save changes and continue" class="btn btn-primary"/>
 
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nom']->renderLabel() ?></th>
        <td>
          <?php echo $form['nom']->renderError() ?>
          <?php echo $form['nom']->render(array("required"=>true)) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['numtel']->renderLabel() ?></th>
        <td>
          <?php echo $form['numtel']->renderError() ?>
          <?php echo $form['numtel'] ->render(array("required"=>true))?>
        </td>
      </tr>
	  
      <tr>
        <th><?php echo $form['percent']->renderLabel() ?></th>
        <td>
          <?php echo $form['percent']->renderError() ?>
          <?php echo $form['percent']->render(array("required"=>true)) ?>
        </td>
      </tr>
	  
      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description']->render(array("required"=>true)) ?>
        </td>
      </tr>
	  
	  
	  
    </tbody>
  </table>
</form>
