    <!DOCTYPE html>
    <!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->

    <html  lang="en">
    <!-- <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> -->
    <head>
    
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include_http_metas() ?>
    <?php include_metas() ?>

    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

    
     

     <!-- <title>Online Credit Manager</title>   -->

    <style type="text/css">
    <!--
    .table_no_border
    {
    border-top-style: none;
    border-right-style: none;
    border-bottom-style: none;
    border-left-style: none;
    }
    -->
    </style>
    </head>
    <body class="body">

<?php // Pour les user authentifiés: lister les options de menus 
if ($sf_user->isAuthenticated())
{
?> 
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo url_for('@homepage') ?>">Door & Windows App</a>
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> Mon Compte
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo url_for('@deconnexion') ?>">Deconnexion</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo url_for('@mot_de_passe') ?>">Mot de Passe</a></li>
            </ul>
          </div>
          
             <?php echo myAppHelper::getTopNavBarMenuContent($sf_user) ; ?>

          <?php /* ?>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li> 

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="nav-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
 
               <form action="" class="navbar-search pull-left">
                <input type="text" placeholder="Search" class="search-query span2"/>
              </form> 

            </ul>
          </div><!--/.nav-collapse -->
          <?php */ ?>
        </div>
      </div>
    </div> 
<?php 
} 
?>

        <div id="container" class="content container">
        
            <div id="header">
                <div class="content container">
                        <h1 class="float-left">
						<?php  // echo image_tag('/images/LOGOSIMUCE.gif') ?><br>
</h1>
                    <div >
                         
                         <!-- imagelink accueil -->
                         <div class="post">
                             
                            <div>
                                                       <div class="help" align ="right" > 
                                                            <?php // Pour les user authentifiés: preciser son nom
                                                            if ($sf_user->isAuthenticated())
                                                            {									
                                                               //echo  $sf_user->getSessionGuardUser()->getUserSummary();  //."<br/>". $sf_user->getSessionGuardUser()->getAgencySummary() ;
                                                            } 
                                                            ?>	
															<div align ="left" > 														
															<?php //echo image_tag('/images/LOGOSIMUCE.gif'); ?>
						
															</div>															
                                                        </div>
                            </div> 

                        </div>
                         

                    </div>

                </div>
            </div>

        
    <br /> 

        <div id="content">
        <?php if ($sf_user->hasFlash('notice')): ?>
        <div class="alert alert-success">  <!-- class="flash_notice" -->
        <center>
        <?php echo $sf_user->getMyFlash('notice') ?>
        </center>
        </div>
        <?php endif; ?>
        <?php if ($sf_user->hasFlash('error')): ?>		
        <div class="alert alert-error"> <!-- class="flash_error" -->
        <center>
        <?php echo $sf_user->getMyFlash('error') ?>
        </div>
        </center>
        <?php endif; ?>
        <div class="container">

        <?php echo $sf_content ?>
        </div>
        </div>


    <br clear="all" /> 

    <div>
                <div id="footer">
                <div class="content">

                <span class="symfony right">

                <?php echo image_tag('/images/logo.png') ?><br>
               <strong> (c) copyright 2014-- +(237) 95977465 -- 78173515</strong>

                </a>
                </span>
           
                
                </div>
                </div>
    </div>


    </div>
        

   <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php /*    jquery.js,bootstrap-transition.js,bootstrap-alert.js,bootstrap-modal.js,bootstrap-dropdown.js,bootstrap-scrollspy.js,bootstrap-tab.js,bootstrap-tooltip.js,bootstrap-popover.js,bootstrap-button.js,bootstrap-collapse.js,bootstrap-carousel.js,bootstrap-typeahead.js  */ ?>
    <script src="<?php echo  javascript_path('{0}'); ?>"></script>

    <!-- <script src="../in_config/twitter_bootstrap/jquery.js"></script> -->
    
    <script src="<?php echo  javascript_path('jquery'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-transition'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-alert'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-modal'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-dropdown'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-scrollspy'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-tab'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-tooltip'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-popover'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-button'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-collapse'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-carousel'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-typeahead'); ?>"></script>


<script>
        /*
    $('.carousel').carousel({
    interval: 2000
    })
        */
</script>
  


    </body>
    </html>
