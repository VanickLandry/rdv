<link href="../css/crd_mng_css_print.css" rel="stylesheet" type="text/css" />
<?php include_stylesheets() ?>

<?php if (false) {  ?>
 <link href="file:///D|/achilleromuald/projects/TARLAB/TASKS/TARLAB043_saar-vie_online_credit_manager/src/online_credit_mng/web/css/crd_mng_css_print.css" rel="stylesheet" type="text/css" />
<?php }  ?>
<table class="table table-bordered" width="100%" border="0" cellpadding="4" cellspacing="0" class="crd_mng_text_01_print">
   
 <tr class="">
     <td align="left" valign="top" width="50%">
	<?php echo image_tag('print_logo_saarvie.jpg', 'size=153x80') ?>
	</td>  
     <td align="center" valign="middle" width="50%"><span class="crd_mng_text_02_print">Facture NUMERO :
	 <?php //echo $crdmgr_facture->getCodeFacture();?></span>
    </td>
 </tr>
 
</table>


<table class="table table-bordered"  width="100%" border="1">
       <td width="50%">
<div align="left">	   
De : Royaume des Vitres<?php //echo $crdmgr_facture->getCtrVente()->getCtrAgency()->getNomAgence(); ?></br>
Reference : <?php //echo $crdmgr_facture->getCtrVente()->getCtrAgency()->getCodeAgence(); ?></br>
T&eacute;l&eacute;phone : <?php //echo $crdmgr_facture->getCtrVente()->getCtrAgency()->getTelephone(); ?></br>
Email : info@royaumedesvitres.com<?php //echo $crdmgr_facture->getCtrVente()->getCtrAgency()->getEmail(); ?></br>
WebSite : www.oyaumedesvitres.com<?php //echo $crdmgr_facture->getCtrVente()->getCtrAgency()->getEmail(); ?></br>

</div></td> 
       <td width="50%">
<div align="left">
A : 	<?php //echo $crdmgr_facture->getCtrVente()->getCtrClient()->getNomClient(); ?></br>
Reference : <?php //echo $crdmgr_facture->getCtrVente()->getCtrClient()->getCodeClient(); ?></br>
T&eacute;l&eacute;phone : <?php //echo $crdmgr_facture->getCtrVente()->getCtrClient()->getTelephone(); ?></br>
Email : <?php //echo $crdmgr_facture->getCtrVente()->getCtrClient()->getEmail(); ?></br>
Adresse : <?php //echo $crdmgr_facture->getCtrVente()->getCtrClient()->getEmail(); ?>

</div></td> 
</table>



<?php //$idvente = $crdmgr_facture->getCtrVente(); ?>
<?php 
//$crdmgr_detail_vente = Doctrine_Query::create()
								// ->select('a.id')
								// ->from('CrdmgrDetailVente a')
								// ->orderBy('a.produit_id')
								// ->addWhere('a.vente_id = ?', $idvente)
								// ->execute();

								
	$totalhorstaxe = 0;	
	$tva = 0;									
?> 
	<div align="left">
  <?php // include_stylesheets() ?>
    <?php // include_javascripts() ?>
	
	
	
	    <?php 
	$tab = Doctrine_Query::create()
								// ->select('a.id,sum(a.quantite),a.prix')
								// ->select('sum(a.quantite)')
								->select('a.id as id, sum(a.quantite) as quantite')
								->from('RdDetailMirroir a')
								// ->where('dossier_examen_id =?', $iddudossier)	
								->execute();
	$tva = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'TVA')	
								->execute();
	$accesceoire = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'accessoire')	
								->execute();
								
	$labour = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'Labour')	
								->execute();	
$devise = Doctrine_Query::create()
								// ->select('a.valeur_numeric,a.type_parametre')
								->select('a.type_parametre')
								->from('CrdmgrParameter a')
								->where('type_parametre =?', 'type_devise')	
								->execute();								
								
								
								?>
								
				<?php
  	
	 foreach ($tva as $param)
  {
    	 ?> 
    	 <tr class=""><?php  $tva =$param->getValeurNumeric(); }?></tr>

		 <?php
  	
	 foreach ($labour as $param)
  {
    	 ?> 
    	 <tr class=""><?php  $labour =$param->getValeurNumeric(); }?></tr>
		 <?php
	 foreach ($devise as $prix)
  {
    	 ?> 
    	 <tr class=""><?php  $devise =$prix->getLabelParam(); }?></tr>						
								
						
								
								
								
								
			<?php 
			
			// echo $tva;exit;
			 $result = $tab	->count();
	foreach ($tab as $product): ?>
	 <tr class="">
       <td><?php //echo $product->getQuantite() ?></td>
    </tr>
    <?php endforeach;
	// echo $product->getQuantite();
	$totalquantity= $product->getQuantite();
 	// exit;
	
								
 $totalraishaut = Doctrine_Query::create()
						// ->select('a.*, sum(a.price) as price')
						->select('a.prix_rais_haut,a.quantite, sum(a.prix_rais_haut * a.quantite) as prix_rais_haut')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
$totalraisbas = Doctrine_Query::create()
						->select('a.prix_rais_bas,a.quantite,sum(a.prix_rais_bas * a.quantite) as prix_rais_bas')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
						
	$totaldormant = Doctrine_Query::create()
						->select('a.prix_dormant,a.quantite,sum(a.prix_dormant * a.quantite) as prix_dormant')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
$totalcouvrejoint = Doctrine_Query::create()
						->select('a.prix_couvre_joint,a.quantite,sum(a.prix_couvre_joint * a.quantite) as prix_couvre_joint')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
$totalsernie = Doctrine_Query::create()
						->select('a.prix_sernie,a.quantite,sum(a.prix_sernie * a.quantite) as prix_sernie')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
$totalchicone = Doctrine_Query::create()
						->select('a.prix_chicone,a.quantite,sum(a.prix_chicone * a.quantite) as prix_chicone')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
$totaltraverse = Doctrine_Query::create()
						->select('a.prix_traverse,a.quantite,sum(a.prix_traverse * a.quantite) as prix_traverse')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
						
$totalvitre = Doctrine_Query::create()
						->select('a.prix_vitre,a.quantite,sum(a.prix_vitre * a.quantite) as prix_vitre')
						->from('RdDetailMirroir a')
						// ->where('a.id=1')
 						->execute();
$totalaccesceoire = Doctrine_Query::create()
						->select('a.valeur_string,a.valeur_numeric,sum(a.valeur_string * a.valeur_numeric) as valeur_numeric')
						->from('CrdmgrParameter a')
						// ->where('a.id=1')
 						->execute();

  // $result = $totalraishaut->count();
  foreach ($totalraishaut as $raishaut)
  {
   	 //echo $var =$productPhoto->getPrice();?>
    	  
    	 <tr class=""><?php   $totalraishaut =$raishaut->getPrixRaisHaut();  }?></tr>
   <?php
  	
	 foreach ($totalraisbas as $raisbas)
  {
    	 ?> 
    	 <tr class=""><?php  $totalraisbas =$raisbas->getPrixRaisBas(); }?></tr>
 
				   <?php
  	
	 foreach ($totaldormant as $dormant)
  {
    	 ?> 
    	 <tr class=""><?php  $totaldormant =$dormant->getPrixDormant(); }?></tr>
 			
						
			   <?php
  	
	 foreach ($totalcouvrejoint as $couvrejoint)
  {
    	 ?> 
    	 <tr class=""><?php  $totalcouvrejoint =$couvrejoint->getPrixCouvreJoint(); }?></tr>					
						
						
						
						
			<?php
  	
	 foreach ($totalsernie as $sernie)
  {
    	 ?> 
    	 <tr class=""><?php  $totalsernie =$sernie->getPrixSernie(); }?></tr>					
						
						
									
						
			<?php
  	
	 foreach ($totalchicone as $chicone)
  {
    	 ?> 
    	 <tr class=""><?php  $totalchicone =$chicone->getPrixChicone(); }?></tr>					
									
						
					<?php
  	
	 foreach ($totaltraverse as $traverse)
  {
    	 ?> 
    	 <tr class=""><?php  $totaltraverse =$traverse->getPrixTraverse(); }?></tr>	
		 
		 <?php
  	
	 foreach ($totalvitre as $vitre)
  {
    	 ?> 
    	 <tr class=""><?php  $totalvitre =$vitre->getPrixVitre(); }?></tr>

		 <?php
  	
	 foreach ($totalaccesceoire as $prixtotal)
  {
    	 ?> 
    	 <tr class=""><?php  $totalaccesceoire =$prixtotal->getValeurNumeric(); }?></tr>					
							
<table class="table table-bordered" border="1" width="80%">
              <thead>
                <tr class="">
                  <th>Elements&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                   <th>Quantite&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                   <th>Prix &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                 </tr>
              </thead>
			  
			  
 			  
              <tbody>
                <tr class="">
                  <td >Rais haut </td>
                   <td><?php echo number_format( $totalquantity, 0, '.', ' ' ) ;?></td>
                   <td><?php echo number_format( $totalraishaut, 0, '.', ' ' ) ;?></td>
                 </tr>
                <tr class="">
                  <td>Rais bas </td>
                   <td><?php echo number_format( $totalquantity, 0, '.', ' ' ) ;?></td>
                   <td><?php echo number_format( $totalraisbas, 0, '.', ' ' ) ;?></td>
                 </tr>
                <tr class="">
                  <td>Dormant</td>
                   <td><?php echo number_format( $totalquantity, 0, '.', ' ' ) ;?></td>
                   <td><?php echo number_format( $totaldormant, 0, '.', ' ' ) ;?></td>
                  </tr>
                <tr class="">
                  <td>CJ</td>
                   <td><?php echo number_format( $totalquantity, 0, '.', ' ' ) ;?></td>
                   <td><?php echo number_format( $totalcouvrejoint, 0, '.', ' ' ) ;?></td>
                 </tr>
				
				<tr class="">
                  <td>Sernie</td>
                   <td><?php echo number_format( $totalquantity, 0, '.', ' ' ) ;?></td>
                   <td><?php echo number_format( $totalsernie, 0, '.', ' ' ) ;?></td>
                </tr>
			<tr class="">
                  <td>Chicone</td>
                   <td><?php echo number_format( $totalquantity, 0, '.', ' ' ) ;?></td>
                   <td><?php echo number_format( $totalchicone, 0, '.', ' ' ) ;?></td>
                </tr>
				
				<tr class="">
                  <td>Traverse</td>
                   <td><?php echo number_format( $totalquantity, 0, '.', ' ' ) ;?></td>
                   <td><?php echo number_format( $totaltraverse, 0, '.', ' ' ) ;?></td>
                 </tr>
				
				<tr class="">
                  <td> Vitre</td>
                   <td><?php echo number_format( $totalquantity, 0, '.', ' ' ) ;?></td>
                   <td><?php echo number_format( $totalvitre, 0, '.', ' ' ) ;?></td>
                 </tr>
				
				
				
				  
				   <tr class="">
                   <td > <strong>Accesceoires</strong></td>
                   <td><strong>&nbsp;&nbsp;
				   <?php //echo $accesceoire; ?>
				 <?php	 foreach ($accesceoire as $tool)  {    	 ?> 
    	       <?php  $accesceoire =$tool->getValeurString();echo number_format( $accesceoire, 0, '.', ' ' ) ?>,&nbsp;<?php  echo $accesceoire =$tool->getLabelParam(); ?><?php }?>
				                      <td><strong><?php $finalresult =$totalquantity*$totalaccesceoire; echo number_format( $finalresult, 0, '.', ' ' ) ;?>&nbsp;&nbsp;<?php  echo $devise ;?>
				   </strong></td>
                  </tr>
				  
				  <tr class="">
                   <td colspan="2"> <strong>Labour</strong></td>
                   <td><strong>&nbsp;&nbsp;<?php echo number_format( $labour, 0, '.', ' ' ) ; ?>&nbsp;&nbsp;<?php  echo $devise ;?></strong></td>
                  </tr>
				  
				   <tr class="">
                   <td colspan="2"> <strong>Total HT</strong></td>
				   <?php $totalht=$finalresult+$totalvitre+$labour+$totaltraverse+$totalchicone+$totalsernie+$totalcouvrejoint+$totaldormant+$totalraisbas+$totalraishaut ?>
                   <td><strong>&nbsp;&nbsp;<?php echo number_format( $totalht, 0, '.', ' ' ) ;?>&nbsp;&nbsp;<?php  echo $devise ;?></strong></td>
                  </tr>
                   <td colspan="2"><strong> TVA</strong></td>
                    <td><strong>&nbsp;&nbsp;<?php echo $tva//number_format( $totalvitre, 0, '.', ' ' ) ;?>%</strong></td>
				 <tr class="">
                   <td colspan="2"> <strong>Total TTC<strong/></td>
				   <?php  $totalttc=($totalht*$tva/100)+$totalht;?>
                   <td><strong>&nbsp;&nbsp;<?php echo number_format( $totalttc, 0, '.', ' ' ) ;?>&nbsp;&nbsp;<?php  echo $devise ;?></strong></td>
                 </tr>
              </tbody>
            </table>
 		 

</div>
 
<div align="center" class="container">
  <table class="table table-bordered" width="100%" >
    <tr class="">
      <td width="50%"><strong>Fait le &nbsp;<?php  $today = date("j F  Y ");echo $today;?></strong></td>
      <td width="50%"><div align="center"><strong><a href="<?php echo url_for('billing/new') ?>" class="crd_mng_lnk_02" >Nom et Signature </strong></a></div></td>
    </tr>
  </table>
</div>


