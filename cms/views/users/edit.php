<?php 
    $info = $this->user;
?>
<div class="btn">
    <button id="myBtn">Update</button>
    <button onclick="document.location='<?= Controller::formatUrl('UsersController')?>'">Back</button>
</div>
<div class="error"> <?=$this->message?> </div>
<div class="box-form modal" id="myModal">
    <form action="<?= Controller::formatUrl('UsersController', 'update', array('id'=>$info['id']))?>" method="post" class="form modal-content">
        <h2>Edit user</h2>
        <span class="close">&times;</span>
        <input type="text" name="name" placeholder="Name" value="<?= $info['name'] ?>" required>
        <input type="text" name="login" placeholder="Login" value="<?= $info['login'] ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Edit">
    </form>
</div>
<script type="text/javascript" src=<?=SITE_HOST."cms/assets/js/form.js"?>></script>