
<?php
if (empty($products)) {

    echo '<h1 style="color: red">Продуктов нет!</h1>';
}
?>

<div class="area-a">
    <div class="quantity">
        <h1>
            <span class="name"><span></span><span></span></span>Panda

            <span class="name"><span></span><span></span></span>Logo
            <!--                </h1>-->
        </h1>
        <!--                        <a href="index.html"><img src="https://i.imgur.com/E3uTxXY.png" alt="Онлайн магазин   Panda Logo" width="125px"/></a>-->
        <img height="124" src="https://i.imgur.com/E3uTxXY.png" alt="Panda Logo"/>
    </div>

<div class="container">
    <div class="area-a">
        <?php /** @var TYPE_NAME $products */
        foreach ($products as $product): ?>
        <div> <img src="<?php echo $product->getProduct()->getImage() ?>" width="200px">
            <h3><?php echo $product->getProduct()->getName() ?></h3>
            <p><?php echo $product->getProduct()->getPrice() . ' тенге' ?></p>
        </div>
            <div class="area-c"><?php echo $product->getProduct()->getInfo() ?></div>

            <form action="/removeSelected" method="POST">
                <div class="quantity">
                    <input type="hidden" name="product_id" value="<?php echo $product->getProduct()->getId(); ?>">
                    <button class="quantity">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkEqb7yH6GMN43ZOyS5_LiZvWutK3h5ihP1Q93v7T6qA&s"
                             width="20px" alt="">
                    </button>
                </div>
            </form>

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