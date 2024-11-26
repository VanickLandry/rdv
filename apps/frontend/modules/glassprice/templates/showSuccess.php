<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $glass_price->getId() ?></td>
    </tr>
    <tr>
      <th>Is active:</th>
      <td><?php echo $glass_price->getIsActive() ?></td>
    </tr>
    <tr>
      <th>Label:</th>
      <td><?php echo $glass_price->getLabel() ?></td>
    </tr>
    <tr>
      <th>Price:</th>
      <td><?php echo $glass_price->getPrice() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $glass_price->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $glass_price->getUpdatedBy() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $glass_price->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $glass_price->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('glassprice/edit?id='.$glass_price->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('glassprice/index') ?>">List</a>
