<h1>Windows List</h1>

<table width="80%" class="table table-bordered well">
  <thead>
    <tr>
      <th>id</th>
      <th>Largeur</th>
      <th>Hauteur</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rd_mirroirs as $rd_mirroir): ?>
    <tr>
      <td><a href="<?php echo url_for('mirroir/edit?id='.$rd_mirroir->getId()) ?>" class=""><?php echo $rd_mirroir->getId() ?></a></td>
      <td><?php echo $rd_mirroir->getLargeur() ?></td>
      <td><?php echo $rd_mirroir->getHauteur() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('mirroir/new') ?>">New</a>
