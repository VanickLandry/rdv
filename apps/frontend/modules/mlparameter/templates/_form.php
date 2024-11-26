<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>



<form action="<?php echo url_for('mlparameter/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table width="100%" >
    
	
	
    <tbody>
      <?php echo $form ?>

    </tbody>
	
	
	<tfoot>

      <tr>
        <td colspan="2" >
	      <br />

		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="crd_mng_td_01_02 crd_mng_td_01_03">
			  
			  <a class="btn" href="<?php echo url_for('mlparameter/index') ?>" class="crd_mng_lnk_01">Retour a la liste</a>
		  

		
		  <input type="submit" class="btn" value="Enregistrer" />
			  
			  </td>
            </tr>
          </table>
        </td>
      </tr>
    </tfoot>
	
  </table>

</form>


