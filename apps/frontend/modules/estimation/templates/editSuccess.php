<h1>Edit Estimation</h1>

<?php include_partial('form', array('form' => $form)) ?>
<?php //include_partial('estim/form', array('form' => $form)) ?>
<?php
$estimation = Doctrine_Query::create()
								->select('a.id')
								->from('GlassPrice a')
								// ->orderBy('a.produit_id')
								// ->addWhere('a.mirroir_id = ?', $id)
 								->execute();
?>
<?php
$dimension = Doctrine_Query::create()
								->select('a.id')
								->from('Estimation a')
								// ->orderBy('a.produit_id')
								// ->addWhere('a.mirroir_id = ?', $id)
 								->execute();
?>
	      <?php foreach ($dimension as $dim): ?>
		   <?php $area=$dim->getWidth()*$dim->getLength() /10000?>
		   	  <?php $percent=$dim->getPercent() ?>

		           <?php endforeach; ?>

          &nbsp;<a href="<?php echo url_for('glassprice/new') ?>" class="btn btn-info">Add a New Glass Type</a>

		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <table class="table well table-bordered">
  <thead>
   
  </thead>
  <tbody>
  	 <tr>
      <td><?php echo "" ?>&nbsp;</td>

    <?php foreach ($estimation as $estim): ?> 
      <th><?php echo $estim->getLabel() ?>&nbsp;&nbsp;</th>
          <?php endforeach; ?>

    </tr>
     <tr>
      <td><?php echo "" ?>&nbsp;</td>

    <?php foreach ($estimation as $glassprice): ?> 
      <th><?php
$price=$glassprice->getPrice();
 echo number_format( $price, 0, '.', ' ' )?>&nbsp;&nbsp;</th>
          <?php endforeach; ?>

    </tr>
	
	



	
	<?php foreach ($dimension as $estim): ?> 
    <tr>
      <td><?php echo $estim->getLength() ?>&nbsp;X&nbsp;<?php echo $estim->getWidth() ?>&nbsp;&nbsp;</td>
      <?php foreach ($estimation as $estime): ?> 
      <th><?php 
	  $price=$estime->getPrice();
      $area=$estim->getWidth()*$estim->getLength() /10000;
	  $totalprice=$area*$price;
	  $addedpercentage=$totalprice*$percent/100;
	  $amount=$totalprice+$addedpercentage;
	  echo $amount ;
	  
	  
	  
	  
	  ?>&nbsp;&nbsp;</th>
          <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
	
	
	
  </tbody>
</table>
