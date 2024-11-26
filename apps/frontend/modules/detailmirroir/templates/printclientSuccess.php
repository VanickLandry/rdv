<link href="../css/crd_mng_css_print.css" rel="stylesheet" type="text/css" />
<?php //include_stylesheets() ?>

 
 
<table width="100%" class="table table-bordered well">
  <thead>
    <tr>
         <th>L</th>
		<th>H</th>
		<th>RB:</th>
		<th>RH:</th>
		<th>Dor</th>
		<th>HCJ:</th>
		<th>LCJ:</th>
		<th>SerR:</th>
		<th>Chic:</th>
		<th>Trav:</th>
		<th>Lar vitre:</th>
		<th>Haut vitre:</th><th>Total:</th>
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

 $table2 = Doctrine_Query::create()
								->select('a.id')
								->from('RdDetailMirroir a')
								->addWhere('a.mirroir_id = ?', $id)
								->orderBy('a.id desc') 					
								->execute();

 
 foreach ($table2 as $rd_detail_mirroir):  	
   $nber =  ($rd_detail_mirroir ->getId());
endforeach;
  																
?>
    
    <tr>
      <?php foreach ($table as $rd_detail_mirroir): 
	$s_param_largeur= $rd_detail_mirroir->getFkDetailmirroir()->getLargeur() ;
	$s_param_hauteur= $rd_detail_mirroir->getFkDetailmirroir()->getHauteur() ;
	$s_param_largeur_min= $rd_detail_mirroir->getLargeurMin() ;
	$s_param_hauteur_min= $rd_detail_mirroir->getHauteurMin() ;
	$rais_bas=$s_param_largeur_min-2.2;
	$rais_haut=$rais_bas-0;
	$dormant=$s_param_hauteur_min-0;
	$hauteur_couvrejoint=$s_param_hauteur_min + 10;
	$largeur_couvrejoint=$s_param_largeur_min +10;
	$sernie=$s_param_hauteur_min -5.5;
	$chicone=$s_param_hauteur_min -5.5;
	$largeur_vitre=($s_param_largeur_min -14)/2;
	$hauteur_vitre=$s_param_hauteur_min -15;
	$traverse=$rais_bas /2;
	
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
	 
	
	 
      <!--<td><?php //echo $rd_detail_mirroir->getId() - $nber + 1 ?>&nbsp;</td>-->
      <td><?php echo $rd_detail_mirroir->getLargeurMin() ?></td>
      <td><?php echo $rd_detail_mirroir->getHauteurMin() ?></td>
      <td><?php echo $rais_bas ?> x 1</td>
      <td><?php echo $rais_haut ?> x 1</td>
      <td><?php echo $dormant ?> x 2</td>
      <td><?php echo $hauteur_couvrejoint ?> x 2</td>
      <td><?php echo $largeur_couvrejoint ?> x 2</td>
      <td><?php echo $sernie ?> x 2</td>
      <td><?php echo $chicone ?> x 2</td>
      <td><?php echo $traverse ?> x 4</td>
      <td><?php echo $largeur_vitre ?> x 2</td>
      <td><?php echo $hauteur_vitre ?></td>
      <td colspan="2">-</td>
      <!--<td><?php //echo number_format( $quantite, 0, '.', ' ' ) ?></td>-->
      
	  		
    </tr>
    <?php endforeach; ?>
   
    <tr>
      <td><strong>&nbsp;<em>Total</em></strong><em></td>
      <td><?php 
	  $totallargeur = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.largeur_min, sum(a.largeur_min) as largeur_min')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totallargeur as $largeur)
  {
   	 //echo $var =$productPhoto->getPrice();
    	  
    echo $totallargeur =$largeur->getLargeurMin();  
	$totaldeslargeur=$totallargeur;
	
	}?></td>
      <td><?php 
	  $totallargeur = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.hauteur_min, sum(a.hauteur_min) as hauteur_min')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totallargeur as $largeur)
  {
    	  
    echo $totallargeur =$largeur->getHauteurMin();
   $totaldeshauteurs =$totallargeur;
	
	$grandtotal=($totaldeshauteurs+$totallargeur)*4/100;
	
	}?></td>
      <td><?php 
	  $totalraisbas = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.rais_bas, sum(a.rais_bas) as rais_bas')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalraisbas as $raisbas)
  {
    	  
     echo  $totalraisbas =$raisbas->getRaisBas();  }
	  
	?></td>
      <td><?php 
	  $totalraishaut = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.rais_haut, sum(a.rais_haut) as rais_haut')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalraishaut as $raishaut)
  {
   	 //echo $var =$productPhoto->getPrice();
    	  
    echo $totalraishaut =$raishaut->getRaisHaut(); 


	} 
?></td>
      <td><?php 
	  $totaldormant = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.dormant, sum(a.dormant) as dormant')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totaldormant as $dormant)
	  
  {
    	  
    echo $totaldormant =2*$dormant->getDormant(); 

	}?></td>
      <td><?php 
	  $totalhauteurcouvrejoint = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.hauteur_couvre_joint, sum(a.hauteur_couvre_joint) as hauteur_couvre_joint')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	  
	  foreach ($totalhauteurcouvrejoint as $hauteur_couvre_joint)
  {
    	  
    $totalhauteurcouvrejoint=$largeur_couvre_joint =2*$hauteur_couvre_joint->getHauteurCouvreJoint()."  "; 
    echo $totalhauteurcouvrejoint; 

	}
		
	?></td>
      <td><?php 
	  $totallargeurcouvrejoint = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.largeur_couvre_joint, sum(a.largeur_couvre_joint) as largeur_couvre_joint')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	 foreach ($totallargeurcouvrejoint as $largeur_couvre_joint)
  {
    	  
    $totallargeurcouvrejoint=$totallargeurcouvrejoint =2*$largeur_couvre_joint->getLargeurCouvreJoint()." ";  
    echo $totallargeurcouvrejoint;  
	
	// echo "T = ".$totallargeurcouvrejoint =$largeur_couvre_joint->getLargeurCouvreJoint()+$largeur_couvre_joint =$largeur_couvre_joint->getHauteurCouvreJoint()."  ";
	}
?></td>
      <td><?php 
	  $totalsernie = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.sernie, sum(a.sernie) as sernie')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalsernie as $sernie)
  {
    	  
    $totalsernie =2*$sernie->getSernie(); 
    echo $totalsernie; 


	}?></td>
      <td><?php 
	  $totalchicone = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.chicone, sum(a.chicone) as chicone')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totalchicone as $chicone)
  {
    	  
    echo $totalchicone =2*$chicone->getChicone();  }?></td>
      <td><?php 
	  $totaltraverse = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.traverse, sum(a.traverse) as traverse')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totaltraverse as $traverse)
  {
    	  
    echo $totaltraverse =4*$traverse->getTraverse();  }?></td>
      <td colspan="2"><?php 
	  $totallargeurvitre = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.largeur_vitre, sum(a.largeur_vitre) as largeur_vitre')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	  $totalhauteurvitre = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.hauteur_vitre, a.id, sum(a.hauteur_vitre) as hauteur_vitre')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
	$id = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.id,  count(a.id) as id')
						->from('RdDetailMirroir a')
						->groupBy('a.id')
						// ->where('a.id=1')
 						->execute();
	  foreach ($totallargeurvitre as $largeurvitre)
  {
    	  
    echo "L = ".$totallargeurvitre =$largeurvitre->getLargeurVitre()."  ";  }
	
	
	foreach ($id as $ids)
  {
    	  
 	 $idss =$ids->getId();
 	// echo "eeeee".$idss =$ids->getId();
 	}
	
	
	 foreach ($totalhauteurvitre as $hauteurvitre)
  {
    	  
    echo "W = ".$totalhauteurvitre =$hauteurvitre->getHauteurVitre()."  ";  
 	$totalvitre =($hauteurvitre->getLargeurVitre()*$totallargeur =$largeur->getHauteurVitre())/10000/$idss;
	echo "T = ".$totalvitre;
	}
	
	?></td>
	<td colspan="2">
	 <?php  echo $totalchicone+$totaldormant+$totaltraverse+$totalsernie+$totalraishaut+$totalraisbas+$totallargeurcouvrejoint+$totalhauteurcouvrejoint+$totalhauteurvitre+$totallargeurvitre;
	
	?>
	
	 </td>
	 <?php  
	 //region des parametres de mesure
	 $mesure_raishaut = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'rais_haut')	
								->execute();
	 foreach ($mesure_raishaut as $parammesure_raishaut) { 
	 // $mesure_raishaut =$parammesure_raishaut->getValeurNumeric();
	 $dimension_mesure_raishaut =$parammesure_raishaut->getValeurNumeric();
	  $prix_mesure_raishaut =$parammesure_raishaut->getValeurString();
	   $total_prix_mesure_raishaut =($prix_mesure_raishaut/$dimension_mesure_raishaut)*$totalraishaut;
	   $piece_mesure_raishaut =$totalraishaut/$dimension_mesure_raishaut;
	 }
	 $mesure_raisbas = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'rais_bas')	
								->execute();
		 foreach ($mesure_raisbas as $parammesure_raisbas) {
		 // $mesure_raisbas =$parammesure_raisbas->getValeurNumeric();
$dimension_mesure_raisbas =$parammesure_raisbas->getValeurNumeric();
	  $prix_mesure_raisbas =$parammesure_raisbas->getValeurString();
	   $total_prix_mesure_raisbas =($prix_mesure_raisbas/$dimension_mesure_raisbas)*$totalraisbas;

$piece_mesure_raisbas =$totalraisbas/$dimension_mesure_raisbas;
		 }

	 $mesure_dormant = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'dormant')	
								->execute();
     foreach ($mesure_dormant as $parammesure_dormant) { 
	 // $mesure_dormant =$parammesure_dormant->getValeurNumeric(); 
	 $dimension_mesure_dormant =$parammesure_dormant->getValeurNumeric();
	  $prix_mesure_dormant =$parammesure_dormant->getValeurString();
	   $total_prix_mesure_dormant =($prix_mesure_dormant/$dimension_mesure_dormant)*$totaldormant;
$piece_mesure_dormant =$totaldormant/$dimension_mesure_dormant;

	 
	 }

	  
	  $mesure_hauteur_couvre_joint = Doctrine_Query::create()
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'hauteur_couvre_joint')	
								->execute();
     foreach ($mesure_hauteur_couvre_joint as $parammesure_hauteur_couvre_joint) {
	 $mesure_hauteur_couvre_joint =$parammesure_hauteur_couvre_joint->getValeurNumeric();
$dimension_mesure_hauteur_couvre_joint =$parammesure_hauteur_couvre_joint->getValeurNumeric();
	  $prix_mesure_hauteur_couvre_joint =$parammesure_hauteur_couvre_joint->getValeurString();
	   $total_prix_mesure_hauteur_couvre_joint =($prix_mesure_hauteur_couvre_joint/$dimension_mesure_hauteur_couvre_joint)*$totalhauteurcouvrejoint;
	   	   $piece_mesure_hauteur_couvre_joint =$totalhauteurcouvrejoint/$dimension_mesure_hauteur_couvre_joint;



	 }
 $mesure_largeur_couvre_joint = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'largeur_couvre_joint')	
								->execute();
     foreach ($mesure_largeur_couvre_joint as $parammesure_largeur_couvre_joint) {
	 $mesure_largeur_couvre_joint =$parammesure_largeur_couvre_joint->getValeurNumeric();
$dimension_mesure_largeur_couvre_joint =$parammesure_largeur_couvre_joint->getValeurNumeric();
	  $prix_mesure_hauteur_couvre_joint =$parammesure_largeur_couvre_joint->getValeurString();
	   $total_prix_mesure_largeur_couvre_joint =($prix_mesure_hauteur_couvre_joint/$dimension_mesure_largeur_couvre_joint)*$totallargeurcouvrejoint;
	   	   $piece_mesure_largeur_couvre_joint =$totallargeurcouvrejoint/$dimension_mesure_largeur_couvre_joint;



	 }

	 $mesure_sernie = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'sernie')	
								->execute();
     foreach ($mesure_sernie as $parammesure_sernie) { 
	 $mesure_sernie =$parammesure_sernie->getValeurNumeric();
$dimension_mesure_sernie =$parammesure_sernie->getValeurNumeric();
	  $prix_mesure_sernie =$parammesure_sernie->getValeurString();
	   $total_prix_mesure_sernie =($prix_mesure_sernie/$dimension_mesure_sernie)*$totalsernie;
	   	   $piece_mesure_sernie =$totalsernie/$dimension_mesure_sernie;

	 }
	 $mesure_chicone = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'chicone')	
								->execute();
     foreach ($mesure_chicone as $parammesure_chicone) {
	 $mesure_chicone =$parammesure_chicone->getValeurNumeric();
$dimension_mesure_chicone =$parammesure_chicone->getValeurNumeric();
	  $prix_mesure_chicone =$parammesure_chicone->getValeurString();
	   $total_prix_mesure_chicone =($prix_mesure_chicone/$dimension_mesure_chicone)*$totalchicone;
	   	   	   $piece_mesure_chicone =$totalchicone/$dimension_mesure_chicone;
	 }
	 $mesure_traverse = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'traverse')	
								->execute();
     foreach ($mesure_traverse as $parammesure_traverse) { 	
	 $mesure_traverse =$parammesure_traverse->getValeurNumeric();
$dimension_mesure_traverse =$parammesure_traverse->getValeurNumeric();
	  $prix_mesure_traverse =$parammesure_traverse->getValeurString();
	   $total_prix_mesure_traverse =($prix_mesure_traverse/$dimension_mesure_traverse)*$totaltraverse;
	   	   	   $piece_mesure_traverse =$totaltraverse/$dimension_mesure_traverse;

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
	   $total_prix_mesure_vitre =$prix_mesure_vitre*$totalvitre*2;
	   	   	   $piece_mesure_vitre =$totalvitre/$dimension_mesure_vitre;
		
		 }
	 
	 ?>
    </tr>
	
	 <tr>
	   <td><strong><em>Cost</em></strong></td>
      <td>-</td>
      <td>-</td>
      <td><?php echo 	ceil($total_prix_mesure_raisbas) ;
?>&nbsp;</td>
      <td>	<?php  echo ceil($total_prix_mesure_raishaut) ;?>
&nbsp;</td>
      <td><?php echo 	   ceil($total_prix_mesure_dormant);
?>&nbsp;</td>
      <td><?php echo 	   ceil($total_prix_mesure_hauteur_couvre_joint);
?>&nbsp;</td>
      <td><?php echo 	   ceil($total_prix_mesure_largeur_couvre_joint);
?>&nbsp;</td>
      <td><?php echo 	   ceil($total_prix_mesure_sernie);
 ?>&nbsp;</td>
      <td><?php echo ceil($total_prix_mesure_chicone);?>&nbsp;</td>
      <td><?php echo ceil($total_prix_mesure_traverse);?>&nbsp;</td>
      <td colspan="2"><?php echo ceil($total_prix_mesure_vitre);?></td>
      <td colspan="2"><span class=" "><?php
	    ($t=ceil($total_prix_mesure_raisbas)+ceil($total_prix_mesure_raishaut)+ceil($total_prix_mesure_dormant)
	  +ceil($total_prix_mesure_hauteur_couvre_joint)+ceil($total_prix_mesure_largeur_couvre_joint)+
	  ceil($total_prix_mesure_sernie)+ceil($total_prix_mesure_chicone)+ceil($total_prix_mesure_traverse));
         $percenttotal=0.2*$t+$t;
	  ?></span></td>
    </tr>
     <tr>
       <td>&nbsp;<strong><em>Pieces  (in bars)</em></strong></td>
	   <td>-</td>
	   <td>-</td>
	   <td><?php 
    
	  $int_raisbas= $piece_mesure_raisbas ;
 	  $decimal_raisbas=floor($piece_mesure_raisbas);
	  $nbar=($int_raisbas-$decimal_raisbas)*$dimension_mesure_raisbas;
	 echo number_format( floor($piece_mesure_raisbas),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
       //echo "&nbsp;".(number_format(($int_raisbas-$decimal_raisbas),0, 'bar', ' '));
	   
	   
	   ?>&nbsp;</td>
	   <td><?php
	 
	    $int_raishaut= $piece_mesure_raishaut ;
 	  $decimal_raishaut=floor($piece_mesure_raishaut);
	  $nbar=($int_raisbas-$decimal_raisbas)*$dimension_mesure_raishaut;
	 echo number_format( floor($piece_mesure_raisbas),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
	   
	   ?>&nbsp;</td>
	   <td><?php //echo number_format( floor( $piece_mesure_dormant),0, 'bar', ' ' )."&nbsp;Bar";
	   
	   	   $int_mesure_dormant=$piece_mesure_dormant ; 
	     $decimal_mesure_dormant=floor($piece_mesure_dormant);
	  $nbar=($int_mesure_dormant-$decimal_mesure_dormant)*$dimension_mesure_dormant;
		 
	    echo number_format( floor($piece_mesure_dormant),0, 'bar', ' ' )."&nbsp;Bar".$nbar;

	   
	   
	   ?>&nbsp;&nbsp;</td>
	   <td><?php //echo number_format( floor( $piece_mesure_hauteur_couvre_joint),0, 'bar', ' ' )."&nbsp;Bar";
	    $int_hauteur_couvre_joint= $piece_mesure_hauteur_couvre_joint ;
 	  $decimal_hauteur_couvre_joint=floor($piece_mesure_hauteur_couvre_joint);
	  $nbar=($int_hauteur_couvre_joint-$decimal_hauteur_couvre_joint)*$dimension_mesure_hauteur_couvre_joint;
	 echo number_format( floor($piece_mesure_hauteur_couvre_joint),0, 'bar', ' ' )."&nbsp;Bar".$nbar;

	   
	   
	   ?>&nbsp;&nbsp;</td>
	   <td><?php //echo number_format( floor( $piece_mesure_largeur_couvre_joint),0, 'bar', ' ' )."&nbsp;Bar";
	   
	   
	    $int_largeur_couvre_joint= $piece_mesure_largeur_couvre_joint ;
 	  $decimal_largeur_couvre_joint=floor($piece_mesure_largeur_couvre_joint);
	  $nbar=($int_largeur_couvre_joint-$decimal_largeur_couvre_joint)*$dimension_mesure_largeur_couvre_joint;
	 echo number_format( floor($piece_mesure_largeur_couvre_joint),0, 'bar', ' ' )."&nbsp;Bar".$nbar;

	   
	   
	   ?>&nbsp;&nbsp;</td>
	  
	   <td><?php //echo number_format( floor( $piece_mesure_sernie),0, 'bar', ' ' )."&nbsp;Bar";
	   
	    $int_sernie= $piece_mesure_sernie ;
 	  $decimal_sernie=floor($piece_mesure_sernie);
	  $nbar=($int_sernie-$decimal_sernie)*$dimension_mesure_sernie;
	 echo number_format( floor($piece_mesure_sernie),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
?>&nbsp;</td>
	   <td><?php //echo number_format( floor( $piece_mesure_chicone),0, 'bar', ' ' )."&nbsp;Bar";
	   
	    $int_chicone= $piece_mesure_chicone ;
 	  $decimal_chicone=floor($piece_mesure_chicone);
	  $nbar=($int_chicone-$decimal_chicone)*$dimension_mesure_chicone;
	 echo number_format( floor($piece_mesure_chicone),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
?>&nbsp;&nbsp;</td>
	   <td><?php //echo number_format( floor( $piece_mesure_traverse),0, 'bar', ' ' )."&nbsp;Bar";
	    $int_traverse= $piece_mesure_traverse ;
 	  $decimal_traverse=floor($piece_mesure_traverse);
	  $nbar=($int_traverse-$decimal_traverse)*$dimension_mesure_traverse;
	 echo number_format( floor($piece_mesure_traverse),0, 'bar', ' ' )."&nbsp;Bar".$nbar;
	 
?></td>

<?php 
	  
	  
	    $clientid = Doctrine_Query::create()
 						->select('a.id')
						->from('Client a')
						->orderby('a.id asc')
  						->execute();
	  foreach ($clientid as $id)
  {
  
  $myid =$id->getId() ;
  
    	  
	 }
	  
	  $clients = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.id')
						->from('Client a')
						->Where('a.id = ?', $myid)
 						->execute();
	  foreach ($clients as $nom)
  {
  $perc =$nom->getPercent();

  }
    	  
	 
	  
	?>
	   <td colspan="2">-</td>
	   
       <td colspan="2">	   <h3>
<span class="label label" style="font-size:18px;background:rgb(255,242,0);color:rgb(0,0,0)">
	   <?php 
	   $finaltotal=($percenttotal*$perc/100)+$percenttotal;
	   echo $finaltotal?>
	  
	   </span> </h3>
	   </td>
    </tr>
  </tbody>
</table>

<table width="80%" class="table table-bordered well">
  <thead>
    <tr>
<th ><p class="offset5">Accessories: </p></th>
</thead>
  <tbody>
   

<tr>
      
      
	  		
    </tr>

 <?php 	include_partial('footer', array('grandtotal' => $grandtotal)) ?>

	    </tbody>

</table>
	<div class="container "> 		
		<div class="span7"><b>Managment Signature</b></div> 		
		<div class="pull-right "><b>Client Signature</b></div> 		
   	<br>		
 		
 		
		</div> 	
