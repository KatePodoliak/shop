<?php
    $info = $this->info;
    $id = $this->id;
?>

    <div class="box-form">
            <form class="form-edit"  action="<?= Controller::formatUrl('ProductsController', 'update_product',array('id'=>$id))?>" method="post" enctype="multipart/form-data">
            <input placeholder="Name" name="name" type="text" value="<?=$info['name']?>" required>
            <input placeholder="Brand" name="brand" type="text" value="<?=$info['brand']?>"required>
            <input placeholder="URL" name="img" type="text" value="<?=$info['img']?>"required>
            <input placeholder="Price" name="price" type="text" value="<?=$info['price']?>" required>
            <input placeholder="Code" name="code" type="text" value="<?=$info['code']?>" required>
            <input type="submit" value="Update">
        </form>
    </div>

