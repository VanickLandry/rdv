<h1>Clients List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Is active</th>
      <th>Nom</th>
      <th>Numtel</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($clients as $client): ?>
    <tr>
      <td><a href="<?php echo url_for('client/show?id='.$client->getId()) ?>"><?php echo $client->getId() ?></a></td>
      <td><?php echo $client->getIsActive() ?></td>
      <td><?php echo $client->getNom() ?></td>
      <td><?php echo $client->getNumtel() ?></td>
      <td><?php echo $client->getCreatedAt() ?></td>
      <td><?php echo $client->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('client/new') ?>">New</a>
