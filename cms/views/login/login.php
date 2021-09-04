<?php
    $login = $this->login;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"?>
    <title>Admin</title>
</head>
<div class="box-form box-login">
    <h2>Sign in</h2>
    <form action="<?= Controller::formatUrl('LoginController', 'login')?>" method="post" class="form form-auth">
        <input type="text" id="login" name="login" placeholder="Login" value="<?=$login?>" required>
        <input type="password" id="password" name="pwd" placeholder="Password" required>
        <input type="submit" value="Login">
        <div class="error"><?=$this->message?></div>
    </form>
</div>
