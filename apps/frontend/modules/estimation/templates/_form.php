<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('estimation/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('estimation/index') ?>" class="btn btn-info">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'estimation/delete?id='.$form->getObject()->getId(), array('method' => 'delete','class' => 'btn btn-danger', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="calculate" class="btn btn-info"/>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
	  
      <tr>
        <th><?php echo $form['length']->renderLabel() ?></th>
        <td>
          <?php echo $form['length']->renderError() ?>
          <?php echo $form['length'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['width']->renderLabel() ?></th>
        <td>
          <?php echo $form['width']->renderError() ?>
          <?php echo $form['width'] ?>
        </td>
      </tr> 
	  
	  <!--<div class="offset8">
	  <?php //echo $form['percent']->renderLabel() ?>
        
          <?php //echo $form['percent']->renderError() ?>
          <?php //echo $form['percent']->render(array('class' => 'span1 offset5')) ?>
        
      </div>-->
    </tbody>
  </table>
</form>




