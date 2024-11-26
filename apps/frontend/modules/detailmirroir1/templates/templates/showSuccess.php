<?php include_stylesheets() ?>
<table width="80%" class="table table-bordered well">
  <tbody>
    
	<?php
	    $s_param_l = $rd_detail_mirroir->getFkDetailmirroir()->getLargeur();
	    $s_param_h = $rd_detail_mirroir->getFkDetailmirroir()->getHauteur();
	    $s_param_largeur = $rd_detail_mirroir->getLargeurMin();
		$s_param_hauteur = $rd_detail_mirroir->getHauteurMin();
		$rais_bas=$s_param_largeur-2.2;
		$rais_haut=$rais_bas;
		// $dormant=$s_param_hauteur * 2;
		$dormant=$s_param_hauteur;
		$hauteur_couvrejoint=$s_param_hauteur + 10;
		$largeur_couvrejoint=$s_param_largeur +10;
		$sernie=$s_param_hauteur -5.5;
		$chicone=$s_param_hauteur -5.5;
		// $largeur_vitre=$s_param_largeur -5;
		$largeur_vitre=($s_param_largeur -14)/2;
		// $hauteur_vitre=$s_param_hauteur -5;
		$hauteur_vitre=$s_param_hauteur -15;
		$traverse=$rais_bas /2;
		// $quantite=floor(($s_param_l*$s_param_h) /($largeur_vitre*$hauteur_vitre));
		// $quantite=;

		?>
    <tr>
      <th>Largeur min:</th>
      <td><?php echo  $s_param_largeur?></td>
    </tr>
    <tr>
      <th>Hauteur min:</th>
      <td><?php echo $s_param_hauteur  ?></td>
    </tr>
    <tr>
      <th>Rais bas:</th>
      <td><?php echo $rais_bas ?></td>
    </tr>
    <tr>
      <th>Rais haut:</th>
      <td><?php echo $rais_haut ?></td>
    </tr>
    <tr>
      <th>Dormant:</th>
      <td><?php echo $dormant ?></td>
    </tr>
    <tr>
      <th>Hauteur couvre joint:</th>
      <td><?php echo $hauteur_couvrejoint ?></td>
    </tr>
    <tr>
      <th>Largeur couvre joint:</th>
      <td><?php echo $largeur_couvrejoint ?></td>
    </tr>
    <tr>
      <th>Sernie:</th>
      <td><?php echo $sernie ?></td>
    </tr>
    <tr>
      <th>Chicone:</th>
      <td><?php echo $chicone ?></td>
    </tr>
    <tr>
      <th>Traverse:</th>
      <td><?php echo $traverse ?></td>
    </tr>
    <tr>
      <th>Largeur vitre:</th>
      <td><?php echo $largeur_vitre ?></td>
    </tr>
    <tr>
      <th>Hauteur vitre:</th>
      <td><?php echo $hauteur_vitre ?></td>
    </tr>
    <tr>
      <th>Quantite:</th>
      <td><?php echo  number_format( $rd_detail_mirroir->getQuantite(), 0, '.', ' ' )?></td>
    </tr>
    
	
	<tr>
      <th>Accessoires:</th>
      <td>
	  <ul>
	  <li> -><i class="icon-ok"></i>4 Equerres port</li> <br/>
	  <li> -><i class="icon-ok"></i>2 pommelles</li> <br/>
	  <li> -><i class="icon-ok"></i>1 Serrure complet</li> <br/>
	  
	  </ul>
	  
	  </td>
    </tr>
	
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('detailmirroir/edit?id='.$rd_detail_mirroir->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('detailmirroir/index') ?>">List</a>
