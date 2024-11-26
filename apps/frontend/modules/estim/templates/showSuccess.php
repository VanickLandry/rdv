<table class="table well">
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $estim->getId() ?></td>
    </tr>
    <tr>
      <th>Is active:</th>
      <td><?php echo $estim->getIsActive() ?></td>
    </tr>
    <tr>
      <th>Largeur:</th>
      <td><?php echo $estim->getLargeur() ?></td>
    </tr>
    <tr>
      <th>Hauteur:</th>
      <td><?php echo $estim->getHauteur() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $estim->getNombreId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $estim->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $estim->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('estim/edit?id='.$estim->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('estim/index') ?>">List</a>
