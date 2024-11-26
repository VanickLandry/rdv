<?php /*
<link href="../../welcome/templates/crd_mng_css_main.css" rel="stylesheet" type="text/css" />
*/ ?>
<?php
 
$estimation = Doctrine_Query::create()
								->select('a.id')
								->from('GlassPrice a')
								// ->orderBy('a.produit_id')
								// ->addWhere('a.mirroir_id = ?', $id)
 								->execute();

 
  																
?>


<table width="100%" align="center" cellpadding="0" cellspacing="0" class="well table table-bordered">
  <thead>
    <tr>
      <th class="crd_mng_td_head_01_01"  nowrap="nowrap" >	Type		</th>
      <th class="crd_mng_td_head_01_02">Unit Price</th>
      <th class="crd_mng_td_head_01_02">Total Price</th>
     
     
      
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach ($estimation as $glassprice): 

						
	 ?>
	 
      <td><?php echo $glassprice->getLabel() ?></td>
      <td><?php echo $glassprice->getPrice() ?></td>
      <td>total<?php //echo $glassprice->getPrice() ?></td>
     
    
	  		
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

