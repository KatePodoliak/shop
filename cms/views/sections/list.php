<?php
    $list = $this->list;
?>
<div class="table-block">
    <table>
        <thead
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead
        <?php foreach ($list as $key => $value) { ?>
            <tr>
                <td> <?= $value['id'] ?></td>
                <td> <?= $value['name'] ?></td>
                <td><a href="<?= Controller::formatUrl('SectionsController', 'edit',array('id'=>$value['id']))?>">Edit</a></td>
                <td><a href="<?= Controller::formatUrl('SectionsController', 'delete',array('id'=>$value['id']))?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</div>