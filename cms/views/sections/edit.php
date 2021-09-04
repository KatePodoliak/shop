<?php
	$info = $this->section;
?>
<div class="btn">
        <button id="myBtn">Update</button>
        <button onclick="document.location='<?= Controller::formatUrl('SectionsController')?>'">Back</button>
</div>
<div class="error"> <?=$this->message?> </div>
<div class="box-form modal" id="myModal">
    <form action="<?= Controller::formatUrl('SectionsController', 'update', array('id'=>$info['id']))?>" method="post" class="form modal-content">
	    <h2>Edit section</h2>
	    <span class="close">&times;</span>
	    <input type="text" name="name" placeholder="Name" value="<?= $info['name']?>" required>
	    <input type="submit" value="Edit">
    </form>
</div>
<script type="text/javascript" src=<?=SITE_HOST."cms/assets/js/form.js"?>></script>