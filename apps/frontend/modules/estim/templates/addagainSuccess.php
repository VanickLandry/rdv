z<h1>New Estim</h1>

<?php include_partial('form', array('form' => $form)) ?>
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
<?php
$estim = Doctrine_Query::create()
								->select('a.id')
								->from('Estim a')
								->orderBy('a.largeur asc')
 								->execute();
?>
	      <?php foreach ($estim as $dim): ?>
 		   	  <?php $percent=$dim->getLargeur();  ?>
			  
		           <?php endforeach; ?>
 
	      <?php foreach ($dimension as $dim): ?>
		   <?php $area=$dim->getWidth()*$dim->getLength() /10000;
		   
		    $length=$dim->getLength();
		   $width=$dim->getWidth();
		   ?>
		   	  <?php //$percent=$dim->getPercent() 
			  
			  
			 
			  
			  ?>

		           <?php endforeach; ?>

          &nbsp;<a href="<?php echo url_for('glassprice/new') ?>" class="btn btn-info">Add a New Glass Type</a>
           &nbsp;<a href="<?php echo url_for('estim/new') ?>" class="btn btn-info">Add under</a> 
            &nbsp;<?php echo link_to('Clear', 'estim/new', array('method' => 'delete','class' => 'btn btn-danger', 'confirm' => 'Are you sure?')) ?>

		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <table class="table well table-bordered">
  <thead>
   
  </thead>
  <tbody>
  	 <tr>
      <td><?php echo "Type" ?>&nbsp;</td>

    <?php foreach ($estimation as $estim): ?> 
      <th><?php echo $estim->getLabel() ?>&nbsp;&nbsp;</th>
          <?php endforeach; ?>

    </tr>
     <tr>
      <td>Price/m<sup>2</sup>&nbsp;</td>

    <?php foreach ($estimation as $glassprice): ?> 
      <th><?php
$price=$glassprice->getPrice();
 echo number_format( $price, 0, '.', ' ' )?>&nbsp;&nbsp;</th>
          <?php endforeach; ?>

    </tr>
	
	



	
	<?php foreach ($dimension as $estim): ?> 
    <tr>
      <td><?php echo $l=$estim->getLength() ?>&nbsp;X&nbsp;<?php echo $w=$estim->getWidth() ?>&nbsp;&nbsp;</td>
      <?php foreach ($estimation as $estime): ?> 
      <th><?php 
	  $price=$estime->getPrice();
	  $gp_id=$estime->getId();
      $area=$estim->getWidth()*$estim->getLength() /10000;
	  $totalprice=$area*$price;
	  $addedpercentage=$totalprice*$percent/100;
	  $amount=$totalprice+$addedpercentage;
	   echo $amount ;
	
 // $tableupdate= new Estimation();; 
 // $tableupdate->price = $amount; 
 // $tableupdate->width = $w; 
 // $tableupdate->length = $l; 
 // $tableupdate->glassprice_id = $gp_id; 
 // $tableupdate->save(); 
 
 $devis = Doctrine_Query::create()
								 ->select('a.price,sum(a.price) as price')
								// ->select('a.price')
								->from('Estimation a')
 								->Where('a.glassprice_id = ?',$gp_id)
  								->execute();

	    // $deleted = Doctrine_Query::create()
  // ->delete()
  // ->from('Estimation u')
   // ->execute();
   foreach ($devis as $estim):
 	  // echo "-----";
 	  $pay=$estim->getPrice();
 	  $payment=number_format( $pay, 0, '.', ' ' );
 	  echo "&nbsp;&nbsp;";
 	  echo "<span class=\"label label-important\">$payment</span>";
  	  endforeach;
	  ?>&nbsp;&nbsp;</th>
          <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
	
							
	 
	
	 
  </tbody>
</table>
