<h1>Windows List</h1>

<table width="80%" class="table table-bordered well">
  <thead>
    <tr>
		<th>N°</th>
		<th>Largeur</th>
		<th>Hauteur</th>
		<th>Rais bas:</th>
		<th>Rais haut:</th>
		<th>Dormant:</th>
		<th>Hauteur couvre joint:</th>
		<th>Largeur couvre joint:</th>
		<th>Sernie:</th>
		<th>Chicone:</th>
		<th>Traverse:</th>
		<th>Largeur vitre:</th>
		<th>Hauteur vitre:</th>
		<th>Quantite:</th>

    </tr>
  </thead>
  <tbody>
	  
    <?php foreach ($rd_detail_mirroirs as $rd_detail_mirroir): ?>
		
	<?php 
	$s_param_largeur= $rd_detail_mirroir->getFkDetailmirroir()->getLargeur() ;
	$s_param_hauteur= $rd_detail_mirroir->getFkDetailmirroir()->getHauteur() ;
	$s_param_largeur_min= $rd_detail_mirroir->getLargeurMin() ;
	$s_param_hauteur_min= $rd_detail_mirroir->getHauteurMin() ;
	$rais_bas=$s_param_largeur_min-2.2;
	$rais_haut=$rais_bas;
	// $dormant=$s_param_hauteur_min * 2;
	$dormant=$s_param_hauteur_min;
	$hauteur_couvrejoint=$s_param_hauteur_min + 10;
	$largeur_couvrejoint=$s_param_largeur_min +10;
	$sernie=$s_param_hauteur_min -5.5;
	$chicone=$s_param_hauteur_min -5.5;
	// $largeur_vitre=$s_param_largeur_min -5;
	$largeur_vitre=($s_param_largeur_min -14);
	// $hauteur_vitre=$s_param_hauteur_min -5;
	$hauteur_vitre=$s_param_hauteur_min -15;
	$traverse=$rais_bas /2;
	// $quantite=floor(($s_param_largeur*$s_param_hauteur) /($hauteur_vitre*$largeur_vitre));
	
	
	?>
	
	
	<?php $id= $rd_detail_mirroir->getFkDetailmirroir()->getId();?>
	    <?php endforeach; ?>

<?php
 
$table = Doctrine_Query::create()
								->select('a.id')
								->from('RdDetailMirroir a')
								// ->orderBy('a.produit_id')
								->addWhere('a.mirroir_id = ?', $id)
								->execute();

																
?>
    <tr>
    <?php foreach ($table as $rd_detail_mirroir): ?>

      <td><?php echo $rd_detail_mirroir->getId() ?></td>
      <td><?php echo $rd_detail_mirroir->getLargeurMin() ?></td>
      <td><?php echo $rd_detail_mirroir->getHauteurMin() ?></td>
      <td><?php echo $rais_bas ?></td>
      <td><?php echo $rais_haut ?></td>
      <td><?php echo $dormant ?></td>
      <td><?php echo $hauteur_couvrejoint ?></td>
      <td><?php echo $largeur_couvrejoint ?></td>
      <td><?php echo $sernie ?></td>
      <td><?php echo $chicone ?></td>
      <td><?php echo $traverse ?></td>
      <td><?php echo $largeur_vitre/2 ?> X 2</td>
      <td><?php echo $hauteur_vitre ?></td>
      <td><?php echo number_format( $rd_detail_mirroir->getQuantite(), 0, '.', ' ' ) ?></td>
      
	  		
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<table width="80%" class="table table-bordered well">
  <thead>
    <tr>
<th>Accessoires for each Complete Dimension:</th>
</thead>
  <tbody>
   

<tr>
      
      
	  		
    </tr>

	  <td><?php //echo "tet" ?> <ul>
	  <li> -><i class="icon-ok"></i>4 Equerres port</li> <br/>
	  <li> -><i class="icon-ok"></i>2 pommelles</li> <br/>
	  <li> -><i class="icon-ok"></i>1 Serrure complet</li> <br/>
	  
	  </ul></td>
	    </tbody>

   </table>

  <a class="btn btn-danger" href="<?php echo url_for('mirroir/new') ?>">Back</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-danger" href="<?php echo url_for('detailmirroir/index') ?>">Edit</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-primary" href="<?php echo url_for('detailmirroir/bill') ?>">Go for Billing</a>&nbsp;&nbsp;&nbsp;
