<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <?php //  include_http_metas() ?>
    <?php //  include_metas() ?>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <?php // include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php //include_stylesheets() ?>
    <?php // include_javascripts() ?>
 		<!-- custom css -->
		<?php echo stylesheet_tag('rta_css_print', array('media' => 'all')) ?>
		<?php echo stylesheet_tag('bootstrap-min', array('media' => 'all')) ?>
		<?php echo stylesheet_tag('bootstrap', array('media' => 'all')) ?>
 		<?php echo stylesheet_tag('bootstrap-responsive', array('media' => 'print')) ?>

	 
<title>Royaume des Vitres
    <?php if (!include_slot('title')): ?>
    .:: | ::.
    <?php endif ?>
</title>



</head>
  <body class="">
		
<table class="container table" border="0">
 <tr>
    <td rowspan="2" width="18"> 
	<?php echo image_tag('/uploads/leftlong.JPG') ?>
 </td>
  
    <td height="18"><div align="left">
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
  $clients =$nom->getNom();
  $description =$nom->getDescription();
  $mobile = $nom->getNumtel();
  $mobile2 =number_format( $nom->getNumtel(), 0, '.', ' ' );
  
    	  
	 
	  
	?>
		  <br/>
     <b><h4>Name of Client : <?php echo  $clients ;?> </h4></b><hr/>
	
     <b><h4> Mobile  : <?php  
	 if($mobile2==0) {
	 echo "" ;}
	 else {
	 echo  $mobile;} 
	 }
	 	  
	 ?></h4></b>
 	 <hr/>
	 
	 <b><h5 class="pull-right"><?php echo  $description ;?></h5> </b>
 
</div></td> <td height="18"><div align="right">
  <?php echo image_tag('/uploads/rigth.JPG') ?>

</div></td>
  </tr>
  <tr>
    <td colspan="2">
    <table>
	
	  <tr>

 				<?php echo $sf_content; ?>
					<footer class="footer">
         			
			
<address><small>Royaume des Vitres Reference - Email : info@royaumedesvitres.com - Website : www.royaumedesvitres.com

</small>
</address>
     </footer>
 			</tr>
			</table>
		

	</td>
  </tr>
 
  
  
  </table>
	<div id="" class="container">
			
			<?php if ($sf_user->hasFlash('notice')): ?>			
				<div class="flash_notice">
					<center>
					<?php echo $sf_user->getFlash('notice') ?>
					</center>
				</div>						
			<?php endif; ?>

			<?php if ($sf_user->hasFlash('error')): ?>				
				<div class="flash_error">
					<center>
					<?php echo $sf_user->getFlash('error') ?>
					</center>
				</div>
			<?php endif; ?>

			

		</div> 		

		
  </body>
</html>
