<?php
    $name = $this->name;
    $content = $this->content;
    $url = $this->url;
?>
<div class="btn">
    <button id="myBtn">Add news</button>
</div>
<div class="error"> <?=$this->message?> </div>
<div class="box-form modal" id="myModal">
    <form action="<?= Controller::formatUrl('NewsController', 'add')?>" method="post" class="form modal-content">
        <h2>Add news</h2>
        <span class="close">&times;</span>
        <input placeholder="Name" type="text" name="name" value="<?=$name?>" >
        <textarea name="content" required><?=$content?></textarea>
        <input name="url" placeholder="URL" type="text" value="<?=$url?>" required>
        <input type="submit" value="Add">
    </form>
</div>
<script type="text/javascript" src=<?=SITE_HOST."cms/assets/js/form.js"?>></script>