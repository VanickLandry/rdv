  <h1>Cutting Plan</h1>

<table width="20%" class="table table-bordered well span2">
  <thead>
    <tr>
		<th>Largeur vitre:</th>
		<th>Hauteur vitre:</th>
				<th>Quantity&nbsp;</th>

		<th>Material:</th>

    </tr>
  </thead>
  <tbody>
	  
    <?php foreach ($rd_detail_mirroirs as $rd_detail_mirroir): ?>
		
	
	
	
	<?php 
	$id= $rd_detail_mirroir->getFkDetailmirroir()->getId();
	$iddetail= $rd_detail_mirroir ->getId();
	
	
	?>
	    <?php endforeach; 
		// echo $id;
		// echo $iddetail;
		// exit;
		?>

<?php
 
$table = Doctrine_Query::create()
								->select('a.id')
								->from('RdDetailMirroir a')
								// ->orderBy('a.produit_id')
								->addWhere('a.mirroir_id = ?', $id)
 								->execute();

 
  																
?>
    
    <tr>
    <?php foreach ($table as $rd_detail_mirroir): 
	$s_param_largeur= $rd_detail_mirroir->getFkDetailmirroir()->getLargeur() ;
	$s_param_hauteur= $rd_detail_mirroir->getFkDetailmirroir()->getHauteur() ;
	$s_param_largeur_min= $rd_detail_mirroir->getLargeurMin() ;
	$s_param_hauteur_min= $rd_detail_mirroir->getHauteurMin() ;
	$rais_bas=$s_param_largeur_min-2.2;
	$rais_haut=$rais_bas;
	$dormant=$s_param_hauteur_min;
	$hauteur_couvrejoint=($s_param_hauteur_min + 10)*2;
	$largeur_couvrejoint=($s_param_largeur_min +10)*2;
	$sernie=($s_param_hauteur_min -5.5)*2;
	$chicone=($s_param_hauteur_min -5.5)*2;
	$largeur_vitre=($s_param_largeur_min -14)/2;
	$hauteur_vitre=$s_param_hauteur_min -15;
	$traverse=($rais_bas /2)*4;
	
 $tableupdate= new RdDetailMirroir(); 
 $tableupdate->largeur_min = $s_param_largeur_min; 
 $tableupdate->hauteur_min = $s_param_hauteur_min; 
 $tableupdate->rais_bas = $rais_bas; 
 $tableupdate->mirroir_id = $id; 
	 $tableupdate->rais_haut = $rais_haut; 
	 $tableupdate->dormant = $dormant; 
	 $tableupdate->hauteur_couvre_joint = $hauteur_couvrejoint; 
	 $tableupdate->largeur_couvre_joint = $largeur_couvrejoint; 
	 $tableupdate->sernie = $sernie; 
	 $tableupdate->chicone = $chicone; 
	 $tableupdate->traverse = $traverse; 
	 $tableupdate->largeur_vitre = $largeur_vitre; 
	 $tableupdate->hauteur_vitre = $hauteur_vitre; 
	 // $tableupdate->quantite = $quantite; 
	 $tableupdate->save(); 
 
$deleted = Doctrine_Query::create()
  ->delete()
  ->from('RdDetailMirroir u')
  ->where('u.id <= ?', $iddetail)
  ->execute();

						
	 ?>
	 
      <td><?php echo $largeur_vitre ?></td>
     
      <td><?php echo $hauteur_vitre ?></td>
      <td><?php echo 2; ?></td>
       <td><?php echo "glass"; ?></td>
	  		
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<table width="80%" class="table table-bordered well">
  <tbody>
    
  
	    </tbody>

</table>

  <a class="btn btn-danger" href="<?php echo url_for('mirroir/new') ?>">Back</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-danger" href="<?php echo url_for('detailmirroir/index')  ?>" target="_blank">Cutting plan for glass</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-danger" href="<?php echo url_for('detailmirroir/raishaut')  ?>" target="_blank">CP rais </a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-danger" href="<?php echo url_for('detailmirroir/couvrejoint')  ?>" target="_blank">CP couvre joint</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-danger" href="<?php echo url_for('detailmirroir/dormant')  ?>" target="_blank">CP dormant</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-danger" href="<?php echo url_for('detailmirroir/serrure')  ?>" target="_blank">CP serrure</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-danger" href="<?php echo url_for('detailmirroir/chicone')  ?>" target="_blank">CP chicane</a>&nbsp;&nbsp;&nbsp;  <a class="btn btn-danger" href="<?php echo url_for('detailmirroir/traverse')  ?>" target="_blank">CP Traverse</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-primary" href="<?php echo url_for('detailmirroir/print') ?>" target="_blank">Print and give to technicians</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-primary" href="<?php echo url_for('detailmirroir/printclient') ?>" target="_blank">Print to client</a>&nbsp;&nbsp;&nbsp;
