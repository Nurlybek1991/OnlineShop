
<?php
if (empty($products)) {

    echo '<h1 style="color: red">Продуктов нет!</h1>';
}
?>
<div class="container">
    <div class="area-a">
        <?php /** @var TYPE_NAME $products */
        foreach ($products as $product): ?>
        <div> <img src="<?php echo $product->getProduct()->getImage() ?>" width="200px">
            <h3><?php echo $product->getProduct()->getName() ?></h3>
            <p><?php echo $product->getProduct()->getPrice() . ' тенге' ?></p>
        </div>
            <div class="area-c">ПОЛНОЕ ОПИСАНИЕ ТОВАРА</div>
        <?php endforeach; ?>
    </div>
</div>
<style>
    .area-a {
        grid-area: big-img;
    }
    .area-b {
        grid-area: small-img;
    }
    .area-c {
        grid-area: desc;
        border: 1px solid #c0c0c0
    }
    .container {
        display: grid;
        grid-template-columns: 410px 400px;
        grid-template-rows: 100px 100px 100px 100px;
        grid-template-areas:
    "big-img desc"
    "big-img desc"
    "big-img desc"
    "small-img desc";
        justify-content:center;
    }
    .ph2 {
        display: inline-block;
        margin: 0px;
        padding: 0px;
        width: 100px;
        height: 100px;
        border: 1px solid #c0c0c0;
    }


</style>