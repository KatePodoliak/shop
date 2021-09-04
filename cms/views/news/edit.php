<?php
    $info = $this->article;
?>
<div class="btn">
    <button id="myBtn">Update</button>
    <button onclick="document.location='<?= Controller::formatUrl('NewsController')?>'">Back</button>
</div>
<div class="error"> <?=$this->message?> </div>
<div class="box-form modal" id="myModal">
    <form action="<?= Controller::formatUrl('NewsController', 'update',array('id'=>$info['id']))?>" method="post" class="form modal-content">
        <h2>Update</h2>
        <span class="close">&times;</span>
        <input placeholder="Name" type="text" name="name" value="<?=$info['name']?>" required>
        <textarea name="content" required><?=$info['content']?> </textarea>
        <input name="url" placeholder="URL" type="text" value="<?=$info['url']?>" required>
        <input type="submit" value="Update">
    </form>
</div>
<script type="text/javascript" src=<?=SITE_HOST."cms/assets/js/form.js"?>></script>