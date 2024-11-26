<h1>Deviss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Is active</th>
      <th>Largeur</th>
      <th>Hauteur</th>
      <th>Type</th>
      <th>Prix</th>
      <th>Codetype</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($deviss as $devis): ?>
    <tr>
      <td><a href="<?php echo url_for('devis/show?id='.$devis->getId()) ?>"><?php echo $devis->getId() ?></a></td>
      <td><?php echo $devis->getIsActive() ?></td>
      <td><?php echo $devis->getLargeur() ?></td>
      <td><?php echo $devis->getHauteur() ?></td>
      <td><?php echo $devis->getType() ?></td>
      <td><?php echo $devis->getPrix() ?></td>
      <td><?php echo $devis->getCodetype() ?></td>
      <td><?php echo $devis->getCreatedAt() ?></td>
      <td><?php echo $devis->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('devis/new') ?>">New</a>
