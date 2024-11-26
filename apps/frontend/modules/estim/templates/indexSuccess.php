<h1>Estims List</h1>

<table class="table well">
  <thead>
    <tr>
      <th>Id</th>
      <th>Is active</th>
      <th>Largeur</th>
      <th>Hauteur</th>
      <th>Nombre</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($estims as $estim): ?>
    <tr>
      <td><a href="<?php echo url_for('estim/show?id='.$estim->getId()) ?>"><?php echo $estim->getId() ?></a></td>
      <td><?php echo $estim->getIsActive() ?></td>
      <td><?php echo $estim->getLargeur() ?></td>
      <td><?php echo $estim->getHauteur() ?></td>
      <td><?php echo $estim->getNombreId() ?></td>
      <td><?php echo $estim->getCreatedAt() ?></td>
      <td><?php echo $estim->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('estim/new') ?>">New</a>
