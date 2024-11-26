<!-- apps/frontend/modules/job/templates/newSuccess.php -->
<?php use_stylesheet('job.css') ?>
 
<h1>Changer mot de passe personnel (<?php echo $sf_user->getName() // ->getGuardUser()->getId() ?>) </h1>
 
<?php include_partial('form', array('form' => $form)) ?>

