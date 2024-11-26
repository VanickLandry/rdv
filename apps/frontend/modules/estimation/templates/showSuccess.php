<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $estimation->getId() ?></td>
    </tr>
    <tr>
      <th>Is active:</th>
      <td><?php echo $estimation->getIsActive() ?></td>
    </tr>
    <tr>
      <th>Length:</th>
      <td><?php echo $estimation->getLength() ?></td>
    </tr>
    <tr>
      <th>Width:</th>
      <td><?php echo $estimation->getWidth() ?></td>
    </tr>
    <tr>
      <th>Price:</th>
      <td><?php echo $estimation->getPrice() ?></td>
    </tr>
    <tr>
      <th>Glassprice:</th>
      <td><?php echo $estimation->getGlasspriceId() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $estimation->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $estimation->getUpdatedBy() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $estimation->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $estimation->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('estimation/edit?id='.$estimation->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('estimation/index') ?>">List</a>
