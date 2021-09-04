<?php
    include "connect.php";
    include "include/header.php";

    $model = new ProductModel($mysqli);
    $sections = $model->getSections();
    $getSection = getVariable("section", '');
    $getId =  getVariable("id", '');
    $curSection = null;
    $curProduct = null;
    $products = null;
    $product = null;

    $model = new ProductModel($mysqli);
    $arrSections = $model->getSections();
    $sections = array();
    for ($i=0;$i<count($arrSections);$i++)
        $sections[$arrSections[$i]['id']]= $arrSections[$i]['name'];

    if (!empty($getSection)) {
        $curSection = $getSection;
        $products = getProducts($model, $curSection);
    }

    if (!empty($getId)) {
        $curProduct = $getId;
        $tmp = getProduct($model, $curProduct);
        $product = $tmp['params'];
    }

    function getProducts($model, $curSection) {
        return $model->getProducts($curSection);
    }

    function getProduct($model, $curProduct) {
        return array("params" => $model->getProduct($curProduct));
    }
?>

<div class="first-block">Products</div>
<div id="shop">
    <?php
            if (is_null($product)) {
                foreach ($sections as $key => $value) { ?>
                    <a href="index-store.php?section=<?= $key ?>"><?=$value?></a>
                    <?php
                    if ($curSection == $key) {
                        foreach ($products as $k => $v) { ?>
                            <div class="product">
                                <div class="img">
                                    <img src="<?= $v['img'] ?>" alt="img">
                                    <div class="price"><?= $v['price'] ?> UAN</div>
                                </div>
                                <div class="description">
                                    <div class="item-name"><?= $v['name'] .' '.$v['brand'] ?></div>

                                    <div class="articles">Code: <?= $v['code'] ?></div>
                                    <div class="details">
                                        <a href="index-store.php?id=<?= $v['id'] ?>" class="buy-item more">More</a>
                                    </div>

                                </div>
                            </div>
                            <?php
                        }
                    }
                }
            } 
            else {
            ?>
            <a href="index-store.php?section=<?= $product['idSection'] ?>" class="buy-item back">Back</a>
            <div class="product">
                <div class="item-name"><?= $product['name'] .' '.$product['brand'] ?></div>
                <div class="img">
                    <img src="<?= $product['img'] ?>" alt="img">
                    <div class="price"><?= $product['price'] ?> UAN</div>
                </div>
                <div class="description">
                    <div>Code: <?= $product['code']?></div>
                    <?php foreach ($product['param'] as $key => $value) { ?>
                        <div><?= $value['name'] . ": " . $value['value'] ?></div>
                    <?php } ?>
                    <div class="details">
                        <input type="button" class="buy-item more" value="Buy">
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
</div>

<?php
    include "include/footer.php";
?>
