<h1>Cutting Plan</h1>

  

<table width="20%" class="table table-bordered well span2">
  <thead>
    <tr>
		<th>Hauteur vitre:</th>
				<th>Largeur vitre:</th>
				<th>Quantity:</th>
				<th>Material:</th>

		
		<!--<th>Quantite:</th>-->


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
	// $hauteur_dormant=$s_param_hauteur_min*2;
	$hauteur_dormant=$s_param_hauteur_min;
	// $largeur_dormant=$s_param_largeur_min;
	$largeur_dormant=$s_param_largeur_min;
	$hauteur_zporte=($hauteur_dormant-6.3)*3;
	$largeur_zporte=$largeur_dormant - 6.3;
	$traverse140=($s_param_largeur_min -33)/2;
	$hauteur_parclose30=($s_param_hauteur_min -31)*4;
	$largeur_parclose30=($s_param_largeur_min -33)*8;
	$largeur_vitre=($s_param_largeur_min -22)*2;
	$hauteur_vitre=($s_param_hauteur_min -31)*2;
	$hauteur_couvre_joint=($s_param_hauteur_min+5)*2;
	$largeur_couvre_joint=($s_param_largeur_min+10);
	$hjb=($s_param_hauteur_min-33)*8;
	$ljb=($s_param_largeur_min-31)*4;
	
 $tableupdate= new RdDetailMirroir(); 
 $tableupdate->largeur_min = $s_param_largeur_min; 
 $tableupdate->hauteur_min = $s_param_hauteur_min; 
 $tableupdate->hauteur_dormant = $hauteur_dormant; 
 $tableupdate->mirroir_id = $id; 
	 $tableupdate->largeur_dormant = $largeur_dormant; 
	 $tableupdate->hauteur_zporte = $hauteur_zporte; 
	 $tableupdate->largeur_zporte = $largeur_zporte; 
	 $tableupdate->traverse140 = $traverse140; 
	 $tableupdate->hauteur_couvre_joint = $hauteur_couvre_joint; 
	 $tableupdate->largeur_couvre_joint = $largeur_couvre_joint; 
	 $tableupdate->hauteur_parclose30 = $hauteur_parclose30; 
	 $tableupdate->largeur_parclose30 = $largeur_parclose30; 
	 $tableupdate->traverse = $hauteur_couvre_joint; 
	 $tableupdate->hjb = $hjb; 
	 $tableupdate->ljb = $ljb; 
	 $tableupdate->largeur_vitre = $largeur_vitre; 
	 $tableupdate->hauteur_vitre = $hauteur_vitre; 
	 $tableupdate->largeur_couvre_joint = $largeur_couvre_joint; 
	 // $tableupdate->hauteur_vitre = $hauteur_vitre; 
	 // $tableupdate->quantite = $quantite; 
	 $tableupdate->save(); 
 
$deleted = Doctrine_Query::create()
  ->delete()
  ->from('RdDetailMirroir u')
  ->where('u.id <= ?', $iddetail)
  ->execute();

						
	 ?>
	 
      <td><?php echo  $hauteur_vitre ?> </td>
      <td><?php echo  $largeur_vitre ?> </td>
      <td><?php echo  2 ?> </td>
      <td><?php echo  "glass" ?> </td>
      
	  		
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>



  <a class="btn btn-danger" href="<?php echo url_for('portedeuxbattant/new') ?>">Back</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-danger" href="<?php echo url_for('detailportedeuxbattant/index') ?>">Cutting Plan</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-primary" href="<?php echo url_for('detailportedeuxbattant/print') ?>" target="_blank">Print and give to technicians</a>&nbsp;&nbsp;&nbsp;
