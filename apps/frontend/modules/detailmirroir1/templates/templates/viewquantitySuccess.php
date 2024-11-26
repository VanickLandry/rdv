<h1>Rd detail mirroirs List</h1>

<table width="20%" class="table table-bordered well span2">
  <thead>
    <tr>
      <th class="span1">Largeur vitre totale</th>
      <th class="span1">hauteur vitre totale</th>
      <th class="span1">Quantity</th>
      <th class="span1">Material</th>
	   <th class="span1">Largeur vitre </th>
      <th class="span1">hauteur vitre </th>
	  <th class="span1">Quantity</th>
      <th class="span1">Material</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($rd_detail_mirroirs as $rd_detail_mirroir): ?>
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
		 <?php foreach ($table as $rd_detail_mirroir): ?>
   

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
	$quantite=floor(($s_param_largeur*$s_param_hauteur) /($hauteur_vitre*$largeur_vitre));
	
	
	?>
	
	
	
	
    <tr>
		 <td class="span1"><?php echo number_format( $rd_detail_mirroir->getFkDetailmirroir()->getLargeur(), 0, '.', ' ' )?></td>
	 <td class="span1"><?php echo number_format( $rd_detail_mirroir->getFkDetailmirroir()->getHauteur(), 0, '.', ' ' )?></td>

      <td class="span1"><?php echo number_format( $rd_detail_mirroir->getQuantite(), 0, '.', ' ' )?></td>

      <td class="span1"><a href="<?php echo url_for('detailmirroir/show?id='.$rd_detail_mirroir->getId()) ?>" class="crd_mng_lnk_02" >glass</a></td>
     
      
	        <td class="span1"><?php echo number_format( $hauteur_vitre, 0, '.', ' ' )?></td>
      <td class="span1"><?php echo number_format( $largeur_vitre, 0, '.', ' ' )?></td>

	  <td class="span1"><?php echo number_format( $quantite, 0, '.', ' ' )?></td>

      <td class="span1"><a href="<?php echo url_for('detailmirroir/show?id='.$rd_detail_mirroir->getId()) ?>" class="crd_mng_lnk_02" >glass</a></td>
     
    </tr>
    <?php endforeach; ?>
  </tbody>

</table>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a class="btn btn-danger"href="<?php echo url_for('detailmirroir/result') ?>">see result</a>&nbsp;&nbsp;
  <a class="btn btn-danger"href="<?php echo url_for('mirroir/new') ?>">back</a>&nbsp;&nbsp;
