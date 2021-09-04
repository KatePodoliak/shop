<?php
    $name = $this->name;
    $brand = $this->brand;
    $img = $this->img;
    $price = $this->price;
    $code = $this->code;
    $sections = $this->sections;
    $idSection = $this->idSection;
?>

    <div class="btn">
        <button id="myBtn">Add product</button>
    </div>
    <div class="box-form modal" id="myModal">
        <form class="form modal-content" action="<?= Controller::formatUrl('ProductsController', 'add')?>" method="post" enctype="multipart/form-data">
            <h2>Add product</h2>
            <span class="close">&times;</span>
            <input placeholder="Name" name="name" type="text" value="<?=$name?>" required>
            <input placeholder="Brand" name="brand" type="text" value="<?=$brand?>"required>
            <input placeholder="URL" name="img" type="text" value="<?=$img?>" required>
            <input placeholder="Price" name="price" type="text" value="<?=$price?>" required>
            <input placeholder="Code" name="code" type="text" value="<?=$code?>" required>
            <select name="select">
                <?php foreach ($sections as $key => $value) { ?>
                    <option value="<?= $value['id'] ?>"<?=( $idSection == $value['id'] ? " selected" : "" );?>><?= $value['name'] ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Add">
        </form>
    </div>
    <div class="error"> <?=$this->message;?> </div>
    <script type="text/javascript" src=<?=SITE_HOST."cms/assets/js/form.js"?>></script>