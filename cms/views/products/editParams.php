<?php
    $id = $this->id;
    $params = $this->info_params;
?>
<div class="table-block">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Value</th>
                <th>Action</th>
            </tr>
        </thead>
            <?php foreach ($params['param'] as $key => $value) { ?>
           <tr>
                <td><?= $value["name"] ?></td>
                <td><?= $value["value"] ?></td>
                <td>
                    <a href="index.php?controller=ProductsController&action=delete_param&id_p=<?= $value['id'] ?>&id=<?= $id ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
    </table>
</div>
<div class="btn">
    <button id="myBtn">Add param</button>
    <button onclick="document.location='<?= Controller::formatUrl('ProductsController')?>'">Back</button>
</div>
<div class="error"> <?=$this->message;?> </div>
<div class="box-form modal" id="myModal">
    <form class="form modal-content" action="<?= Controller::formatUrl('ProductsController', 'add_extra_info',array('id'=>$id))?>" method="post" enctype="multipart/form-data">
        <h2>Add param</h2>
        <span class="close">&times;</span>
        <input placeholder="Name" name="param_name" type="text" value="" required>
        <input placeholder="Value" name="param_value" type="text" value="" required>
        <input type="submit" value="Add">
    </form>
</div>
<script type="text/javascript" src=<?=SITE_HOST."cms/assets/js/form.js"?>></script>