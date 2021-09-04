<?php
    $name = $this->name;
    $login = $this->login;
?>
<div class="btn">
    <button id="myBtn">Add user</button>
</div>
<div class="error"> <?=$this->message?> </div>
<div class="box-form modal" id="myModal">
    <form action="<?= Controller::formatUrl('UsersController', 'add')?>" method="post" class="form modal-content">
        <h2>Add user</h2>
        <span class="close">&times;</span>
        <input type="text" name="name" placeholder="Name" value="<?=$name?>" required>
        <input type="text" name="login" placeholder="Login" value="<?=$login?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Add">
    </form>
</div>
<script type="text/javascript" src=<?=SITE_HOST."cms/assets/js/form.js"?>></script>