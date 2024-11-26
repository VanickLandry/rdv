  <h1>Porte Deux battants</h1>

 <table width="80%" class="table table-bordered well">
  <thead>
    <tr>
		<th>&nbsp;</th>
        <th>Largeur cadre</th>
		<th>Hauteur cadre</th>
		<th>hauteur dormant:</th>
		<th>Largeur dormant:</th>
		<th>hauteur Z porte:</th>
		<th>Largeur Z porte:</th>
		<th>traverse 140:</th>
		<th>hauteur parclose 30:</th>
		<th>largeur parclose 30:</th>
		<th>hauteur couvre joint:</th>
		<th>Largeur couvre joint:</th>
		<th>hauteur joint bourrage:</th>
		<th>Largeur joint bourrage:</th>
		<th>Hauteur vitre:</th>
				<th>Largeur vitre:</th>
		<th>Total:</th>
		
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
	 
	
	 
      <td>&nbsp;</td>
      <td><?php echo $rd_detail_mirroir->getLargeurMin() ?></td>
      <td><?php echo $rd_detail_mirroir->getHauteurMin() ?></td>
      <td><?php echo $hauteur_dormant ?></td>
      <td><?php echo $largeur_dormant ?></td>
      <td><?php echo $hauteur_zporte ?></td>
      <td><?php echo $largeur_zporte ?></td>
      <td><?php echo $traverse140 ?></td>
      <td><?php echo $hauteur_parclose30 ?> /4</td>
      <td><?php echo $largeur_parclose30 ?> /8</td>
      <td><?php echo $hauteur_couvre_joint ?> /2</td>
      <td><?php echo $largeur_couvre_joint ?></td>
      <td><?php echo  $hjb ?>&nbsp; /4</td>
      <td><?php echo  $ljb ?> /8</td>
      <td>(<?php echo  $hauteur_vitre ?></td>
      <td><?php echo  $largeur_vitre ?>)/2</td>
      <!--<td><?php //echo number_format( $quantite, 0, '.', ' ' ) ?></td>-->
      <td>&nbsp;</td>
	  		
    </tr>
    <?php endforeach; ?>
   
    <tr>
      <td><strong>&nbsp;<em>Tota</em></strong><em>l</em></td>
      <td><?php 
	  $totalhauteur_couvre_joint = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.largeur_min, sum(a.largeur_min) as largeur_min')
						->from('RdDetailMirroir a')
						->groupBy('a.largeur_min')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalhauteur_couvre_joint as $largeur)
  {
   	 //echo $var =$productPhoto->getPrice();
    	  
    echo $totalhauteur_couvre_joint =$largeur->getLargeurMin();  }?></td>
      <td><?php 
	  $totalhauteur_couvre_joint = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.hauteur_min, sum(a.hauteur_min) as hauteur_min')
						->from('RdDetailMirroir a')
						->groupBy('a.hauteur_min')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalhauteur_couvre_joint as $largeur)
  {
    	  
    echo $totalhauteur_couvre_joint =$largeur->getHauteurMin();}?></td>
      <td><?php 
	  $totalhauteurdormant = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.hauteur_dormant, sum(a.hauteur_dormant) as hauteur_dormant')
						->from('RdDetailMirroir a')
						->groupBy('a.hauteur_dormant')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalhauteurdormant as $hauteur_dormant)
  {
    	  
     echo  $totalhauteurdormant =$hauteur_dormant->getHauteurDormant();  }
	  
	?></td>
      <td><?php 
	  $totalhauteur_couvre_jointdormant = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.largeur_dormant, sum(a.largeur_dormant) as largeur_dormant')
						->from('RdDetailMirroir a')
						->groupBy('a.largeur_dormant')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalhauteur_couvre_jointdormant as $largeur_dormant)
  {
   	 //echo $var =$productPhoto->getPrice();
    	  
    echo $totalhauteur_couvre_jointdormant =$largeur_dormant->getLargeurDormant(); 


	} 
?></td>
      <td><?php 
	  $totalhauteur_zporte = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.hauteur_zporte, sum(a.hauteur_zporte) as hauteur_zporte')
						->from('RdDetailMirroir a')
						->groupBy('a.hauteur_zporte')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalhauteur_zporte as $hauteur_zporte)
	  
  {
    	  
    echo $totalhauteur_zporte =$hauteur_zporte->getHauteurZporte(); 

	}?>/3</td>
      <td>
	  
	<?php 
	  $totallargeur_zporte = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.largeur_zporte, sum(a.largeur_zporte) as largeur_zporte')
						->from('RdDetailMirroir a')
						->groupBy('a.largeur_zporte')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totallargeur_zporte as $largeur_zporte)
	  
  {
    	  
    echo $totallargeur_zporte =$largeur_zporte->getLargeurZporte(); 

	}?>
	
	
	
	</td>
      <td><?php 

$totaltraverse140 = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.traverse140, sum(a.traverse140) as traverse140')
						->from('RdDetailMirroir a')
						->groupBy('a.traverse140')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totaltraverse140 as $traverse140)
  {
    	  
    echo $totaltraverse140 =$traverse140->getTraverse140()." ";  
	
	//echo " = ".$totaltraverse140 =$largeur->getLargeurCouvreJoint()+$totalhauteur_couvre_joint =$largeur->getHauteurCouvreJoint()."  ";
	} ?></td>
      <td><?php 
	  $totalhauteur_parclose30 = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.hauteur_parclose30, sum(a.hauteur_parclose30) as hauteur_parclose30')
						->from('RdDetailMirroir a')
						->groupBy('a.hauteur_parclose30')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalhauteur_parclose30 as $hauteur_parclose30)
  {
    	  
    $totalhauteur_parclose30 =$hauteur_parclose30->getHauteurParclose30(); 
    echo $totalhauteur_parclose30; 


	}?></td>
      <td><?php 
	  $totallargeur_parclose30 = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.largeur_parclose30, sum(a.largeur_parclose30) as largeur_parclose30')
						->from('RdDetailMirroir a')
						->groupBy('a.largeur_parclose30')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totallargeur_parclose30 as $largeur_parclose30)
  {
    	  
    $totallargeur_parclose30 =$largeur_parclose30->getLargeurParclose30(); 
    echo $totallargeur_parclose30; 


	}?></td>
      <td><?php 
	  $totalhauteur_couvre_joint = Doctrine_Query::create()
						->select('a.hauteur_couvre_joint, sum(a.hauteur_couvre_joint) as hauteur_couvre_joint')
						->from('RdDetailMirroir a')
						->groupBy('a.hauteur_couvre_joint')
 						->execute();
	  foreach ($totalhauteur_couvre_joint as $hauteur_couvre_joint)
  {
    	  
    echo $totalhauteur_couvre_joint =$hauteur_couvre_joint->getHauteurCouvreJoint();  }?></td>
      <td><?php 
	  $totallargeur_couvre_joint = Doctrine_Query::create()
						->select('a.largeur_couvre_joint, sum(a.largeur_couvre_joint) as largeur_couvre_joint')
						->from('RdDetailMirroir a')
						->groupBy('a.largeur_couvre_joint')
 						->execute();
	  foreach ($totallargeur_couvre_joint as $largeur_couvre_joint)
  {
    	  
    echo $totalhauteur_couvre_joint =$largeur_couvre_joint->getLargeurCouvreJoint();  }?></td>
      <td> 
	  
    
    <?php 
	  $totalhauteur_parclose30 = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.hjb, sum(a.hjb) as hjb')
						->from('RdDetailMirroir a')
						->groupBy('a.hjb')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalhauteur_parclose30 as $hjb)
  {
    	  
    $totalhauteur_parclose30 =$hjb->getHjb(); 
    echo $totalhauteur_parclose30; 


	}?></td>
	<td>  <?php 
	  $totalhauteur_parclose30 = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.ljb, sum(a.ljb) as ljb')
						->from('RdDetailMirroir a')
						->groupBy('a.ljb')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalhauteur_parclose30 as $ljb)
  {
    	  
    $totalhauteur_parclose30 =$hjb->getLjb(); 
    echo $totalhauteur_parclose30; 


	}?>&nbsp;</td>
	<td>
    
    <?php 
	  
	  $totalhauteurvitre = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.hauteur_vitre, sum(a.hauteur_vitre) as hauteur_vitre')
						->from('RdDetailMirroir a')
						->groupBy('a.hauteur_vitre')
						// ->where('a.id=1')
 						->execute();
	
	 foreach ($totalhauteurvitre as $hauteurvitre)
  {
    	  
    echo $totalhauteurvitre =$hauteurvitre->getHauteurVitre();  
	
	}
	
	?></td>
	<td><?php 
	  
	  $totallargeurvitre = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.largeur_vitre, sum(a.largeur_vitre) as largeur_vitre')
						->from('RdDetailMirroir a')
						->groupBy('a.largeur_vitre')
						// ->where('a.id=1')
 						->execute();
	
	 foreach ($totallargeurvitre as $largeurvitre)
  {
    	  
    echo $totallargeurvitre =$largeurvitre->getLargeurVitre();  
	
	}
	$totalvitre =($hauteurvitre->getHauteurVitre()*$totallargeur =$largeur->getLargeurVitre())/10000;
	?></td>
    <td>&nbsp;</td>
	 <?php  
	 //region des parametres de mesure
	 $mesure_largeur_dormant = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'largeur_dormant')	
								->execute();
	 foreach ($mesure_largeur_dormant as $parammesure_largeur_dormant) { 
	 // $mesure_largeur_dormant =$parammesure_largeur_dormant->getValeurNumeric();
	 $dimension_mesure_largeur_dormant =$parammesure_largeur_dormant->getValeurNumeric();
	  $prix_mesure_largeur_dormant =$parammesure_largeur_dormant->getValeurString();
	   $total_prix_mesure_largeur_dormant =($prix_mesure_largeur_dormant/$dimension_mesure_largeur_dormant)*$totalhauteur_couvre_jointdormant;
	   $piece_mesure_largeur_dormant =$totalhauteur_couvre_jointdormant/$dimension_mesure_largeur_dormant;
	 }
	 $mesure_hauteur_dormant = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'hauteur_dormant')	
								->execute();
		 foreach ($mesure_hauteur_dormant as $parammesure_hauteur_dormant) {
		 // $mesure_hauteur_dormant =$parammesure_hauteur_dormant->getValeurNumeric();
$dimension_mesure_hauteur_dormant =$parammesure_hauteur_dormant->getValeurNumeric();
	  $prix_mesure_hauteur_dormant =$parammesure_hauteur_dormant->getValeurString();
	   $total_prix_mesure_hauteur_dormant =($prix_mesure_hauteur_dormant/$dimension_mesure_hauteur_dormant)*$totalhauteurdormant;

$piece_mesure_hauteur_dormant =$totalhauteurdormant/$dimension_mesure_hauteur_dormant;
		 }

		 $mesure_hauteur_couvre_joint = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'hauteur_couvre_joint_un')	
								->execute();
		 foreach ($mesure_hauteur_couvre_joint as $parammesure_hauteur_couvre_joint) {
		 // $mesure_hauteur_couvre_joint =$parammesure_hauteur_couvre_joint->getValeurNumeric();
$dimension_mesure_hauteur_couvre_joint =$parammesure_hauteur_couvre_joint->getValeurNumeric();
	  $prix_mesure_hauteur_couvre_joint =$parammesure_hauteur_couvre_joint->getValeurString();
	   $total_prix_mesure_hauteur_couvre_joint =($prix_mesure_hauteur_couvre_joint/$dimension_mesure_hauteur_couvre_joint)*$totalhauteurdormant;

$piece_mesure_hauteur_couvre_joint =$totalhauteurdormant/$dimension_mesure_hauteur_couvre_joint;
		 }
		 
		 $mesure_largeur_couvre_joint = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'largeur_couvre_joint_un')	
								->execute();
		 foreach ($mesure_largeur_couvre_joint as $parammesure_largeur_couvre_joint) {
		 // $mesure_largeur_couvre_joint =$parammesure_largeur_couvre_joint->getValeurNumeric();
$dimension_mesure_largeur_couvre_joint =$parammesure_largeur_couvre_joint->getValeurNumeric();
	  $prix_mesure_largeur_couvre_joint =$parammesure_largeur_couvre_joint->getValeurString();
	   $total_prix_mesure_largeur_couvre_joint =($prix_mesure_largeur_couvre_joint/$dimension_mesure_largeur_couvre_joint)*$totalhauteurdormant;

$piece_mesure_largeur_couvre_joint =$totalhauteurdormant/$dimension_mesure_largeur_couvre_joint;
		 }
		 $mesure_hjb = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'hjb')	
								->execute();
		 foreach ($mesure_hjb as $parammesure_hjb) {
		 // $mesure_hjb =$parammesure_hjb->getValeurNumeric();
$dimension_mesure_hjb =$parammesure_hjb->getValeurNumeric();
	  $prix_mesure_hjb =$parammesure_hjb->getValeurString();
	   $total_prix_mesure_hjb =($prix_mesure_hjb/$dimension_mesure_hjb)*$totalhauteurdormant;

$piece_mesure_hjb =$totalhauteurdormant/$dimension_mesure_hjb;
		 }
		 $mesure_ljb = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'ljb')	
								->execute();
		 foreach ($mesure_ljb as $parammesure_ljb) {
		 // $mesure_ljb =$parammesure_ljb->getValeurNumeric();
$dimension_mesure_ljb =$parammesure_ljb->getValeurNumeric();
	  $prix_mesure_ljb =$parammesure_ljb->getValeurString();
	   $total_prix_mesure_ljb =($prix_mesure_ljb/$dimension_mesure_ljb)*$totalhauteurdormant;

$piece_mesure_ljb =$totalhauteurdormant/$dimension_mesure_ljb;
		 }
	 $mesure_hauteur_zporte = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'hauteur_zporte')	
								->execute();
     foreach ($mesure_hauteur_zporte as $parammesure_hauteur_zporte) { 
	 // $mesure_hauteur_zporte =$parammesure_hauteur_zporte->getValeurNumeric(); 
	 $dimension_mesure_hauteur_zporte =$parammesure_hauteur_zporte->getValeurNumeric();
	  $prix_mesure_hauteur_zporte =$parammesure_hauteur_zporte->getValeurString();
	   $total_prix_mesure_hauteur_zporte =($prix_mesure_hauteur_zporte/$dimension_mesure_hauteur_zporte)*$totalhauteur_zporte;
$piece_mesure_hauteur_zporte =$totalhauteur_zporte/$dimension_mesure_hauteur_zporte;

	 
	 }
$mesure_largeur_zporte = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'largeur_zporte')	
								->execute();
     foreach ($mesure_largeur_zporte as $parammesure_largeur_zporte) { 
	 // $mesure_largeur_zporte =$parammesure_largeur_zporte->getValeurNumeric(); 
	 $dimension_mesure_largeur_zporte =$parammesure_largeur_zporte->getValeurNumeric();
	  $prix_mesure_largeur_zporte =$parammesure_largeur_zporte->getValeurString();
	   $total_prix_mesure_largeur_zporte =($prix_mesure_largeur_zporte/$dimension_mesure_largeur_zporte)*$totallargeur_zporte;
$piece_mesure_largeur_zporte =$totallargeur_zporte/$dimension_mesure_largeur_zporte;

	 
	 }
	 $mesure_traverse140 = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'traverse140')	
								->execute();
     foreach ($mesure_traverse140 as $parammesure_traverse140) { 
	 // $mesure_traverse140 =$parammesure_traverse140->getValeurNumeric(); 
	 $dimension_mesure_traverse140 =$parammesure_traverse140->getValeurNumeric();
	  $prix_mesure_traverse140 =$parammesure_traverse140->getValeurString();
	   $total_prix_mesure_traverse140 =($prix_mesure_traverse140/$dimension_mesure_traverse140)*$totaltraverse140;
$piece_mesure_traverse140 =$totaltraverse140/$dimension_mesure_traverse140;

	 
	 }
	 
	 $mesure_hauteur_parclose30 = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'hauteur_parclose30')	
								->execute();
     foreach ($mesure_hauteur_parclose30 as $parammesure_hauteur_parclose30) { 
	 $mesure_hauteur_parclose30 =$parammesure_hauteur_parclose30->getValeurNumeric();
$dimension_mesure_hauteur_parclose30 =$parammesure_hauteur_parclose30->getValeurNumeric();
	  $prix_mesure_hauteur_parclose30 =$parammesure_hauteur_parclose30->getValeurString();
	   $total_prix_mesure_hauteur_parclose30 =($prix_mesure_hauteur_parclose30/$dimension_mesure_hauteur_parclose30)*$totalhauteur_parclose30;
	   	   $piece_mesure_hauteur_parclose30 =$totalhauteur_parclose30/$dimension_mesure_hauteur_parclose30;

	 }
	 $mesure_largeur_parclose30 = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'largeur_parclose30')	
								->execute();
		 foreach ($mesure_largeur_parclose30 as $parammesure_largeur_parclose30) {
		 // $mesure_largeur_parclose30 =$parammesure_largeur_parclose30->getValeurNumeric();
$dimension_mesure_largeur_parclose30 =$parammesure_largeur_parclose30->getValeurNumeric();
	  $prix_mesure_largeur_parclose30 =$parammesure_largeur_parclose30->getValeurString();
	   $total_prix_mesure_largeur_parclose30 =($prix_mesure_largeur_parclose30/$dimension_mesure_largeur_parclose30)*$totalhauteurdormant;

$piece_mesure_largeur_parclose30 =$totalhauteurdormant/$dimension_mesure_largeur_parclose30;
		 }
	$mesure_vitre = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'vitre')	
								->execute();
     foreach ($mesure_vitre as $parammesure_vitre) { 
	 	 $mesure_vitre =$parammesure_vitre->getValeurNumeric();
$dimension_mesure_vitre =$parammesure_vitre->getValeurNumeric();
	  $prix_mesure_vitre =$parammesure_vitre->getValeurString();
	   $total_prix_mesure_vitre =$prix_mesure_vitre*$totalvitre;
	   	   	   $piece_mesure_vitre =$totalvitre/$dimension_mesure_vitre;
		
		 }
	 
	 ?>
    </tr>
	
	 <tr>
      <td><strong><em>Cost</em></strong></td>
      <td>-</td>
      <td>-</td>
      <td><?php echo 	ceil($total_prix_mesure_hauteur_dormant) ;
?>&nbsp;</td>
      <td>	<?php  echo ceil($total_prix_mesure_largeur_dormant) ;?>
&nbsp;</td>
      <td><?php echo 	   ceil($total_prix_mesure_hauteur_zporte);
?>&nbsp;</td>
      <td><?php echo 	   ceil($total_prix_mesure_largeur_zporte);
?></td>
      <td><?php echo 	   ceil($total_prix_mesure_traverse140);
?></td>
      <td><?php echo 	   ceil($total_prix_mesure_hauteur_parclose30);
 ?>&nbsp;</td>
      <td><?php echo 	   ceil($total_prix_mesure_largeur_parclose30);
 ?>&nbsp;</td>
      <td><?php echo ceil($total_prix_mesure_hauteur_couvre_joint);?>&nbsp;</td>
      <td><?php echo ceil($total_prix_mesure_largeur_couvre_joint);?></td>
      <td><?php echo ceil($total_prix_mesure_hjb);?></td>
      <td><?php echo ceil($total_prix_mesure_ljb);?></td>
    <td colspan="2"><?php echo ceil($total_prix_mesure_vitre);?></td>  
    <td><?php 
	echo 
	  ceil(($total_prix_mesure_hauteur_dormant) +
($total_prix_mesure_largeur_dormant) +
($total_prix_mesure_hauteur_zporte)+
($total_prix_mesure_largeur_zporte)+
($total_prix_mesure_traverse140)+
($total_prix_mesure_hauteur_parclose30)+
($total_prix_mesure_largeur_parclose30)+
($total_prix_mesure_hauteur_couvre_joint)+
($total_prix_mesure_largeur_couvre_joint)+
($total_prix_mesure_hjb)+
($total_prix_mesure_ljb)+
($total_prix_mesure_vitre)); 
	 
	 
	 ?></td>
       </tr>
     <tr>
	   <td>&nbsp;<strong><em>Pieces</em></strong></td>
	   <td>-</td>
	   <td>-</td>
	   <td><?php //echo number_format( $piece_mesure_hauteur_dormant, 2, '.', ' ' ); 
	   $int_hauteur_dormant= $piece_mesure_hauteur_dormant ;
 	  $decimal_hauteur_dormant=floor($piece_mesure_hauteur_dormant);
	  $nbar=($int_hauteur_dormant-$decimal_hauteur_dormant)*$dimension_mesure_hauteur_dormant;
	 echo number_format( floor($piece_mesure_hauteur_dormant),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
?>&nbsp;&nbsp;&nbsp;</td>
	   <td><?php //echo number_format( $piece_mesure_largeur_dormant, 2, '.', ' ' );
	    $int_largeur_dormant= $piece_mesure_largeur_dormant ;
 	  $decimal_largeur_dormant=floor($piece_mesure_largeur_dormant);
	  $nbar=($int_largeur_dormant-$decimal_largeur_dormant)*$dimension_mesure_largeur_dormant;
	 echo number_format( floor($piece_mesure_largeur_dormant),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
?>&nbsp;</td>
	   <td><?php //echo number_format( $piece_mesure_hauteur_zporte, 2, '.', ' ' );
	    $int_hauteur_zporte= $piece_mesure_hauteur_zporte ;
 	  $decimal_hauteur_zporte=floor($piece_mesure_hauteur_zporte);
	  $nbar=($int_hauteur_zporte-$decimal_hauteur_zporte)*$dimension_mesure_hauteur_zporte;
	 echo number_format( floor($piece_mesure_hauteur_zporte),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
?>&nbsp;&nbsp;</td>
	   <td><?php //echo number_format( $piece_mesure_largeur_zporte, 2, '.', ' ' );
	    $int_largeur_zporte= $piece_mesure_largeur_zporte ;
 	  $decimal_largeur_zporte=floor($piece_mesure_largeur_zporte);
	  $nbar=($int_largeur_zporte-$decimal_largeur_zporte)*$dimension_mesure_largeur_zporte;
	 echo number_format( floor($piece_mesure_largeur_zporte),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
?></td>
	   <td><?php //echo number_format( $piece_mesure_traverse140, 2, '.', ' ' );
	   $int_traverse140= $piece_mesure_traverse140 ;
 	  $decimal_traverse140=floor($piece_mesure_traverse140);
	  $nbar=($int_traverse140-$decimal_traverse140)*$dimension_mesure_traverse140;
	 echo number_format( floor($piece_mesure_traverse140),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
 ?></td>
	   <td><?php //echo number_format( $piece_mesure_hauteur_parclose30, 2, '.', ' ' );
	    $int_hauteur_parclose30= $piece_mesure_hauteur_parclose30 ;
 	  $decimal_hauteur_parclose30=floor($piece_mesure_hauteur_parclose30);
	  $nbar=($int_hauteur_parclose30-$decimal_hauteur_parclose30)*$dimension_mesure_hauteur_parclose30;
	 echo number_format( floor($piece_mesure_hauteur_parclose30),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
?>&nbsp;&nbsp;</td>
	   <td><?php //echo number_format( $piece_mesure_largeur_parclose30, 2, '.', ' ' );
	   $int_largeur_parclose30= $piece_mesure_largeur_parclose30 ;
 	  $decimal_largeur_parclose30=floor($piece_mesure_largeur_parclose30);
	  $nbar=($int_largeur_parclose30-$decimal_largeur_parclose30)*$dimension_mesure_largeur_parclose30;
	 echo number_format( floor($piece_mesure_largeur_parclose30),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
 ?>&nbsp;&nbsp;</td>
	   <td><?php //echo number_format( $piece_mesure_hauteur_couvre_joint, 2, '.', ' ' );
	    $int_hauteur_couvre_joint= $piece_mesure_hauteur_couvre_joint ;
 	  $decimal_hauteur_couvre_joint=floor($piece_mesure_hauteur_couvre_joint);
	  $nbar=($int_hauteur_couvre_joint-$decimal_hauteur_couvre_joint)*$dimension_mesure_hauteur_couvre_joint;
	 echo number_format( floor($piece_mesure_hauteur_couvre_joint),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
?></td>
	   <td><?php //echo number_format( $piece_mesure_largeur_couvre_joint, 2, '.', ' ' );
	   $int_largeur_couvre_joint= $piece_mesure_largeur_couvre_joint ;
 	  $decimal_largeur_couvre_joint=floor($piece_mesure_largeur_couvre_joint);
	  $nbar=($int_largeur_couvre_joint-$decimal_largeur_couvre_joint)*$dimension_mesure_largeur_couvre_joint;
	 echo number_format( floor($piece_mesure_largeur_couvre_joint),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
 ?></td>
       <td><?php //echo number_format( $piece_mesure_hjb, 2, '.', ' ' );
	    $int_hjb= $piece_mesure_hjb ;
 	  $decimal_hjb=floor($piece_mesure_hjb);
	  $nbar=($int_hjb-$decimal_hjb)*$dimension_mesure_hjb;
	 echo number_format( floor($piece_mesure_hjb),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
?></td>
       	   <td><?php //echo number_format( $piece_mesure_ljb, 2, '.', ' ' );
		    $int_ljb= $piece_mesure_ljb ;
 	  $decimal_ljb=floor($piece_mesure_ljb);
	  $nbar=($int_ljb-$decimal_ljb)*$dimension_mesure_ljb;
	 echo number_format( floor($piece_mesure_ljb),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
	 
?>&nbsp;</td>

    <td colspan="2">-</td>  
    
    <td>&nbsp;</td>
    </tr>
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
	  <li><i class="icon-ok"></i>&nbsp;&nbsp;6 Equerres port</li> <br/>
	  <li><i class="icon-ok"></i>&nbsp;&nbsp;2 Verroux</li> <br/>
	  <li><i class="icon-ok"></i>&nbsp;&nbsp;1 Serrure complet</li> <br/>
	  
	  </ul></td>
	    </tbody>

</table>

  <a class="btn btn-danger" href="<?php echo url_for('portedeuxbattant/new') ?>">Back</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-danger" href="<?php echo url_for('detailportedeuxbattant/index') ?>">Cutting Plan</a>&nbsp;&nbsp;&nbsp;
  <a class="btn btn-primary" href="<?php echo url_for('detailportedeuxbattant/print') ?>" target="_blank">Print and give to technicians</a>&nbsp;&nbsp;&nbsp;
