<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <style type="text/css">
hr
{
	border: 1px solid ;
	
}
.underline
{
	text-decoration:underline;
	width:950px;
}
.border
{
border:1px solid black !important;
}
table.border
{
border:1px solid black !important;
}
table
{
border:1px solid black !important;
}
tr,td,th
{
/*font-size:10px;*/
border:1px solid black !important;
width:10%;
}


table{
/*font-size:10px;*/
border:1px solid black !important;
width:80%;
}

    </style>
</head>
  <body>
<table class="well table table-bordered" margin="900" width="900" border="0">
       <td width="">
 <h1>Work sheet N°_________</h1>
<?php //	echo $rd_detail_mirroir->getCtrVente()->getCtrAgency()->getAdresse(); ?></br>
<?php //echo $rd_detail_mirroir->getCtrVente()->getCtrAgency()->getEmail(); ?></br>
<?php //echo $rd_detail_mirroir->getCtrVente()->getCtrAgency()->getEmail(); ?></br>

<!--N° ID:M-021100035221N --> <?php //echo $rd_detail_mirroir->getDateFacturation(); ?>
 </td> 
    
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

			<div class="container">
				<?php echo $sf_content ?>
			</div>
			

		</div>
		
		
		
		
		
		
		<!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
       			
			
<address><small>Royaume des Vitres Reference - Email : info@royaumedesvitres.com - Website : www.royaumedesvitres.com

</small>
</address>
      </div>
    </footer>
		
  </body>
</html>
