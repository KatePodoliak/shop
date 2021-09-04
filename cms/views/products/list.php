<?php
    $list = $this->list;
?>

<div class="table-block">
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Image</th>
                <th>Code</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php foreach ($list as $key => $value) { ?>
            <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['name'] ?></td>
                <td><?= $value['brand'] ?> </td>
                <td><?= $value['price'] ?></td>
                <td><img src="<?= $value['img']?>" style="height: 20px; width: 50px;"></td>
                <td><?= $value['code'] ?> </td>
                <td><a href="<?= Controller::formatUrl('ProductsController', 'edit', array('id'=>$value['id']))?>">Edit</a></td>
                <td><a href="<?= Controller::formatUrl('ProductsController', 'delete', array('id'=>$value['id']))?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</div>