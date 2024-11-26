<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $rd_mirroir->getId() ?></td>
    </tr>
    <tr>
      <th>Is active:</th>
      <td><?php echo $rd_mirroir->getIsActive() ?></td>
    </tr>
    <tr>
      <th>Largeur:</th>
      <td><?php echo $rd_mirroir->getLargeur() ?></td>
    </tr>
    <tr>
      <th>Hauteur:</th>
      <td><?php echo $rd_mirroir->getHauteur() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $rd_mirroir->getNombreId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $rd_mirroir->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $rd_mirroir->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('mirroir/edit?id='.$rd_mirroir->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('mirroir/index') ?>">List</a>
