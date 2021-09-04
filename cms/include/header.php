<?php
include '../connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href=<?=SITE_HOST."cms/assets/css/style.css"?>>
    <title>Admin</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="user-name"><a href=<?= Controller::formatUrl('HomeController')?>>Admin</a></div>
            <ul>
                <li><a href=<?= Controller::formatUrl('HomeController')?>><span>Home</span></a></li>
                <li><a href=<?= Controller::formatUrl('SectionsController')?>><span>Sections</span></a></li>
                <li><a href=<?= Controller::formatUrl('ProductsController')?>><span>Products</span></a></li>
                <li><a href=<?= Controller::formatUrl('NewsController')?>><span>News</span></a></li>
                <li><a href=<?= Controller::formatUrl('UsersController')?>><span>Users</span></a></li>
                <li><a href=<?= Controller::formatUrl('LoginController','logout')?>><span>Exit</span></a></li>
            </ul>
        </div>
        <main class="main">