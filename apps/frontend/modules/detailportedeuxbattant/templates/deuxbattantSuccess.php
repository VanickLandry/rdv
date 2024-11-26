  	<h1>Detail porte un battant </h1>

<table width="100%" class="container center well table table-bordered ">  <thead>
    <tr>
      <th></th>
      <th>Hauteur dormante porte</th>
      <th>largeur dormante porte</th>
	  <th>Hauteur z porte</th>
      <th>largeur z porte</th>
      <th>Traverse 140</th>
      <th>Hauteur parclose 30</th>
      <th>Largeur parclose 30</th>
      <th>Hauteur Couvre joint</th>
      <th>Largeur Couvre joint</th>
      <th>Largeur  joint bourage</th>
      <th>Hauteur  joint bourage</th>
	  <th>Largeur  vitre </th>
      <th>Hauteur  vitre</th>
	  <!--      <th>Rais bas</th>
      <th>Rais haut</th>
      <th>Dor mant</th>
      <th>Hauteur couvre joint</th>
      <th>Lar geur couvre joint</th>
      <th>Ser nie</th>
      <th>Chi cone</th>
      <th>Traverse</th>
      <th>Lar geur vitre</th>
      <th>Hau teur vitre</th>
    -->
	</tr>
  </thead>
  <tbody>

    <?php foreach ($rd_detail_mirroirs as $rd_detail_mirroir): ?>
	<?php 
	// $s_param_largeur= $rd_detail_mirroir->getFkDetailmirroir()->getLargeur() ;
	// $s_param_hauteur= $rd_detail_mirroir->getFkDetailmirroir()->getHauteur() ;
	$s_param_largeur_min= $rd_detail_mirroir->getLargeurMin() ;
	$s_param_hauteur_min= $rd_detail_mirroir->getHauteurMin() ;
	// $hauteurz_porte=$s_param_hauteur_min-6.3;
	// $largeurz_porte=$s_param_largeur_min-10.2;
	// $dormant=$s_param_hauteur_min * 2;
	// $dormant=$s_param_hauteur_min;
	$hauteur_couvrejoint=$s_param_hauteur_min + 5;
	$largeur_couvrejoint=$s_param_largeur_min +10;
	// $sernie=$s_param_hauteur_min -5.5;
	// $chicone=$s_param_hauteur_min -5.5;
	// $largeur_jointbourrage=$s_param_largeur_min -22;
	// $hauteur_jointbourrage=$s_param_hauteur_min -31;
	// $hauteur_parclose=($s_param_hauteur_min -31);
	// $largeur_parclose=($s_param_largeur_min -22);
	// $hauteur_vitre=($s_param_hauteur_min -31)/2;
	// $largeur_vitre=$s_param_largeur_min -22;
	// $traverse=$s_param_largeur_min-22;
	$quantite=floor(($s_param_largeur*$s_param_hauteur) /($s_param_largeur_min*$s_param_hauteur_min));
	
		?>
    <tr>
      <td><?php echo $rd_detail_mirroir->getId() ?></td>
      <td><?php echo number_format( $s_param_hauteur_min, 1, '.', ' ' ) ?> X 2</td>
      <td><?php echo number_format( $s_param_largeur_min, 1, '.', ' ' ) ?></td>
      <td><?php echo number_format( $hauteurz_porte, 1, '.', ' ' ) ?></td>
      <td><?php echo number_format( $largeurz_porte, 1, '.', ' ' ) ?></td>
      <td><?php echo number_format( $traverse, 1, '.', ' ' ) ?> X 2</td>
      <td><?php echo number_format( $hauteur_parclose, 1, '.', ' ' ) ?> X 2</td>
      <td><?php echo number_format( $largeur_parclose, 1, '.', ' ' ) ?> X 5</td>
      <td><?php echo number_format( $hauteur_couvrejoint, 1, '.', ' ' ) ?> X 2</td>
      <td><?php echo number_format( $largeur_couvrejoint, 1, '.', ' ' ) ?></td>
      <td><?php echo number_format( $hauteur_jointbourrage, 1, '.', ' ' ) ?> X 2</td>
      <td><?php echo number_format( $largeur_jointbourrage, 1, '.', ' ' ) ?> X 4</td>
      <td><?php echo number_format( $hauteur_vitre, 1, '.', ' ' ) ?> X 4</td>
      <td><?php echo number_format( $largeur_vitre, 1, '.', ' ' ) ?> X 4</td>
      <!--<td><?php //echo $hauteurz_porte ?></td>
      <td><?php //echo $largeurz_porte ?></td>
      <td><?php //echo $dormant ?></td>
      <td><?php //echo $hauteur_couvrejoint ?></td>
      <td><?php //echo $largeur_couvrejoint ?></td>
      <td><?php //echo $sernie ?></td>
      <td><?php //echo $chicone ?></td>
      <td><?php //echo $traverse ?></td>
      <td><?php //echo $largeur_vitre ?></td>
      <td><?php //echo $hauteur_vitre ?></td>
	  -->

	  </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a class="btn btn-primary" href="<?php echo url_for('mirroir/new') ?>">Go for calculations</a>
