<?php
	$name = $this->name;
?>
<div class="btn">
    <button id="myBtn">Add section</button>
</div>
<div class="error"> <?=$this->message?> </div>
<div class="box-form modal" id="myModal">
    <form action="<?= Controller::formatUrl('SectionsController', 'add')?>" method="post" class="form modal-content">
	    <h2>Add section</h2>
	    <span class="close">&times;</span>
	    <input type="text" name="name" placeholder="Name" value="<?=$name?>">
	    <input type="submit" value="Add">
	</form>
</div>
<script type="text/javascript" src=<?=SITE_HOST."cms/assets/js/form.js"?>></script>