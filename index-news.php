<?php
    include "connect.php";
    include "include/header.php";

    $model = new NewsModel($mysqli);
    $listNews = $model->getArticles();
?>

<div class="first-block">News</div>
<div class="articles">
    <?php foreach ($listNews as $key => $value) { ?>
    <article class="article">
        <header>
            <a href="<?=$value['url']?>" target="_blank"><?= $value['name'] ?></a>
        </header>
        <section class="main">
            <p><?= $value['content']?></p>
            <p class="date"><?= $value['dateAdd'] ?></p>
        </section>
    </article>
    <?php } ?>
</div>
<?php
    include "include/footer.php";
?>
