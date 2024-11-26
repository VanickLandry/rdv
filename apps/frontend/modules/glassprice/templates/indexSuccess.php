<h1>Glass prices List</h1>

<table class="table well">
  <thead>
    <tr>
      <th>Label</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($glass_price as $glass_price): ?>
    <tr>
      <td><a href="<?php echo url_for('glassprice/edit?id='.$glass_price->getId()) ?>"><?php echo $glass_price->getLabel() ?></a></td>
      <td><?php echo $glass_price->getPrice() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('glassprice/new') ?>" class="btn btn-info">New</a>
