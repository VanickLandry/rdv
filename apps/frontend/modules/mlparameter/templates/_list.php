<?php /*
<link href="../../welcome/templates/crd_mng_css_main.css" rel="stylesheet" type="text/css" />
*/ ?>


<table width="100%" align="center" cellpadding="0" cellspacing="0" class="well table table-bordered">
  <thead>
    <tr>
      <th class="crd_mng_td_head_01_01"  nowrap="nowrap" >	Libelle		</th>
      <th class="crd_mng_td_head_01_02">Categorie</th>
      <th class="crd_mng_td_head_01_02" nowrap="nowrap" >Dimension</th>
      <th class="crd_mng_td_head_01_02">Prix</th>
     
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($crdmgr_parameters as $i => $crdmgr_parameter): ?>
    <tr class="<?php //echo fmod($i, 2) ? 'even' : 'odd' ?>" >
      <td class="">
				<a href="<?php echo url_for('mlparameter/show?id='.$crdmgr_parameter->getId()) ?>" class="crd_mng_lnk_01"> <?php echo $crdmgr_parameter->getLabelParam() ?> 
				</a> </td>
       <td class="">  <?php echo myFrontendHelper::getDisplayNoUnderscoreHelper($crdmgr_parameter->getTypeParametre()) ?>   </td>
      <td class=""><?php if ($crdmgr_parameter->getValeurNumeric()!=0.00) { echo number_format( $crdmgr_parameter->getValeurNumeric(), 0, '.', ' ' );} else{ echo "RAS";}  ?></td>
          <td class=""><?php if ($crdmgr_parameter->getValeurString()!=0.00) { echo number_format( $crdmgr_parameter->getValeurString(), 0, '.', ' ' );} else{ echo "RAS";}   ?></td>

	</tr>
    <?php endforeach; ?>
  </tbody>
</table>

