<?php
    $list = $this->list;
?>
<div class="table-block">
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Content</th>
                <th>Date</th>
                <th>Action</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php foreach ($list as $key => $value) { ?>
            <tr>
                <td> <?= $value['id'] ?></td>
                <td> <?= $value['name'] ?></td>
                <td> <?= $value['content'] ?></td>
                <td> <?= $value['dateAdd'] ?> </td>
                <td><a href="<?= Controller::formatUrl('NewsController', 'edit',array('id'=>$value['id']))?>">Edit</a></td>
                <td><a href="<?= Controller::formatUrl('NewsController', 'delete',array('id'=>$value['id']))?>" >Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</div>