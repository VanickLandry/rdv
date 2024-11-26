<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $devis->getId() ?></td>
    </tr>
    <tr>
      <th>Is active:</th>
      <td><?php echo $devis->getIsActive() ?></td>
    </tr>
    <tr>
      <th>Largeur:</th>
      <td><?php echo $devis->getLargeur() ?></td>
    </tr>
    <tr>
      <th>Hauteur:</th>
      <td><?php echo $devis->getHauteur() ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $devis->getType() ?></td>
    </tr>
    <tr>
      <th>Prix:</th>
      <td><?php echo $devis->getPrix() ?></td>
    </tr>
    <tr>
      <th>Codetype:</th>
      <td><?php echo $devis->getCodetype() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $devis->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $devis->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('devis/edit?id='.$devis->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('devis/index') ?>">List</a>
