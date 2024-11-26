<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $rd_detail_mirroir->getId() ?></td>
    </tr>
    <tr>
      <th>Mirroir:</th>
      <td><?php echo $rd_detail_mirroir->getMirroirId() ?></td>
    </tr>
    <tr>
      <th>Largeur min:</th>
      <td><?php echo $rd_detail_mirroir->getLargeurMin() ?></td>
    </tr>
    <tr>
      <th>Hauteur min:</th>
      <td><?php echo $rd_detail_mirroir->getHauteurMin() ?></td>
    </tr>
    <tr>
      <th>Rais bas:</th>
      <td><?php echo $rd_detail_mirroir->getRaisBas() ?></td>
    </tr>
    <tr>
      <th>Rais haut:</th>
      <td><?php echo $rd_detail_mirroir->getRaisHaut() ?></td>
    </tr>
    <tr>
      <th>Dormant:</th>
      <td><?php echo $rd_detail_mirroir->getDormant() ?></td>
    </tr>
    <tr>
      <th>Hauteur couvre joint:</th>
      <td><?php echo $rd_detail_mirroir->getHauteurCouvreJoint() ?></td>
    </tr>
    <tr>
      <th>Largeur couvre joint:</th>
      <td><?php echo $rd_detail_mirroir->getLargeurCouvreJoint() ?></td>
    </tr>
    <tr>
      <th>Sernie:</th>
      <td><?php echo $rd_detail_mirroir->getSernie() ?></td>
    </tr>
    <tr>
      <th>Chicone:</th>
      <td><?php echo $rd_detail_mirroir->getChicone() ?></td>
    </tr>
    <tr>
      <th>Traverse:</th>
      <td><?php echo $rd_detail_mirroir->getTraverse() ?></td>
    </tr>
    <tr>
      <th>Largeur vitre:</th>
      <td><?php echo $rd_detail_mirroir->getLargeurVitre() ?></td>
    </tr>
    <tr>
      <th>Hauteur vitre:</th>
      <td><?php echo $rd_detail_mirroir->getHauteurVitre() ?></td>
    </tr>
    <tr>
      <th>Quantite:</th>
      <td><?php echo $rd_detail_mirroir->getQuantite() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $rd_detail_mirroir->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $rd_detail_mirroir->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('detailmirroir/edit?id='.$rd_detail_mirroir->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('detailmirroir/index') ?>">List</a>
