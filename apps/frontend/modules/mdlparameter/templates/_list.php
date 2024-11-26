<?php use_helper('I18N') ?>
<?php
if (false)
{
?>
<link href="../../../../../web/css/main.css" rel="stylesheet" type="text/css" /> 
<link href="../../../../../web/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../../../../../web/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" /> 
<link href="../../../../../web/css/rta_css_main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<?php
}
?>

<?php if (false): ?>
<div class="rta_bgrd_01">
<?php endif ?>


<table width="100%" class="table table-bordered table-striped">
       <thead>
       

       <tr>
         <th nowrap="nowrap" <?php echo ($view_type == 'ajax' ? 'colspan="2"' : '') ?>  > <a id='mdlparameter_index_sort_label_param_desc' class="btn" href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index?sort=label_param-id&sort_type=desc') ?>"><i class="icon-arrow-down"></i></a>  Libelle <a id='mdlparameter_index_sort_label_param_asc' class="btn" href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index?sort=label_param-id&sort_type=asc') ?>"><i class="icon-arrow-up"></i></a>   </th>
         <th> Actif?   </th>
         <th>Categorie</th>
         <th nowrap="nowrap" ><a id='mdlparameter_index_sort_valeur_string_desc' class="btn" href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index?sort=valeur_string&sort_type=desc') ?>"><i class="icon-arrow-down"></i></a>  Valeur <a id='mdlparameter_index_sort_valeur_string_asc' class="btn" href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index?sort=valeur_string&sort_type=asc') ?>"><i class="icon-arrow-up"></i></a> </th>
         <th> Valeur Num.</th>
         <th nowrap="nowrap" >  <a id='mdlparameter_index_sort_updated_at_desc' class="btn" href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index?sort=updated_at&sort_type=desc') ?>"><i class="icon-arrow-down"></i></a>  Modifie le <a id='mdlparameter_index_sort_updated_at_asc'  class="btn" href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'index?sort=updated_at&sort_type=asc') ?>"><i class="icon-arrow-up"></i></a> </th>
       </tr> 
       </thead>
       <tbody>

    <?php foreach ($rta_parameters as $i => $rta_parameter): ?>
    
        <!--tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>" > -->

       <tr>
           <?php if ($view_type == 'ajax'): ?>
            <td><input type="radio" id="ajaxitemselection<?php echo $i ?>" value="<?php echo $rta_parameter->getId() ?>|<?php echo $rta_parameter->getItemSummary() ?>" name="ajaxitemselection"  <?php // if ($i==0) { echo 'checked="checked"'; }  ?>  onclick="$('#btnMyModalDialogOK').click()" ></td>    
           <?php endif ?>

         <td> <a href="<?php echo url_for('mdlparameter/'.($view_type == 'ajax' ? 'ajaxview' : '').'show?id='.$rta_parameter->getId()) ?>" id="mdlparameter_show_id<?php echo $i ?>" > <?php echo $rta_parameter->getLabelParam() ?> </a> </td>
         <td><?php echo myFrontendHelper::getDisplayBooleanHelper($rta_parameter->getIsActive()) ?> </td>
         <td><?php echo myFrontendHelper::getDisplayNoUnderscoreHelper($rta_parameter->getTypeParametre()) ?></td>
         <td><?php echo $rta_parameter->getValeurString() ?></td>
         <td><?php echo $rta_parameter->getValeurNumeric() ?></td>
         <td><?php echo myFrontendHelper::getDisplayDateHelper ( $rta_parameter->getUpdatedAt()) ?></td>
       </tr>
       
    <?php endforeach; ?>
               
      </tbody>
     </table>


<?php if (false): ?>
</div>
<?php endif ?>
