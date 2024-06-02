<?php
if (empty($products)) {
    echo 'Продуктов нет!';
}
?>

<div class="container">
    <!--    container-->
    <div class="navbar">
        <div class="logo">
            <h1>
                <span class="name"><span></span><span></span></span>Panda

                <span class="name"><span></span><span></span></span>Logo
                <!--                </h1>-->
            </h1>
            <!--                        <a href="index.html"><img src="https://i.imgur.com/E3uTxXY.png" alt="Онлайн магазин   Panda Logo" width="125px"/></a>-->
            <img height="124" src="https://i.imgur.com/E3uTxXY.png" alt="Panda Logo"/>
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="/cart">

                        <?php print_r($user->getName() . " " . $user->getSurname()) ?></a></li>
                <li><a href="/login">ВЫЙТИ</a>
                    <!--                        --><?php //$this->logout(); ?><!--</li>-->
                <li><a href="/registrate">АККАУНТ</a><br>
                    <?php print_r(" " . $user->getEmail()) ?></li>

            </ul>
        </nav>
        <a href="/selected"><br><br><img
                    src="https://pngicon.ru/file/uploads/izbrannoye.png"
                    alt="" width="30px"
                    height="30px"/>
        </a>

        <a href="/cart"><br><br><img
                    src="https://w7.pngwing.com/pngs/772/45/png-transparent-shopping-cart-shopping-centre-icon-shopping-cart-text-retail-monochrome-thumbnail.png"
                    alt="" width="30px"
                    height="30px"/> <?php if (isset($totalQuantity) and isset($sumPrice)): ?><?php echo $totalQuantity . ' шт ' . ' Общая сумма: ' . $sumPrice . ' тенге' ?><?php endif; ?>
            <img src="https://i.ibb.co/6XbqwjD/menu.png" alt="" class="menu-icon" onclick="menutoggle()"/>
        </a>
    </div>

</div>

<div class="small-container">

    <div class="row row-2">
        <h2>Продукты</h2>
        <!--        <select>-->
        <!--            <option value="">Сортировка</option>-->
        <!--            <option value="">По цене</option>-->
        <!--            <option value="">По популярности</option>-->
        <!--            <option value="">В топе</option>-->
        <!--            <option value="">По скидке</option>-->
        <!--        </select>-->

    </div>
</div>
<div class="row">
    <?php /** @var TYPE_NAME $products */
    foreach ($products as $product): ?>
        <div class="col-4">
            <img src="<?php echo $product->getImage() ?>" alt="Card image"/>
            <h3><?php echo $product->getName() ?></h3>
            <label for="product_id"></label>
            <p><?php echo $product->getPrice() . ' тенге' ?></p>

            <form action="/openProduct" method="post">
                <div class="quantity">
                    <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>">
                    <button class="openProduct"> открыть продукт</button>
                </div>
            </form>

            <form id="form" method="POST" action="/main">
                <div class="quantity">
                    <input type="hidden" id="quantity" name="quantity" value="1">
                    <input type="text" id="productId" class="fadeIn second" name="product_id" placeholder="Product_id"
                           hidden="" value="<?php echo $product->getId() ?>">
                    <button class="plus-btn" type="submit" name="button">
                        <img src="plus.svg" alt="+"/>
                    </button>
                </div>
            </form>

            <form id="form" method="POST" action="/removeProduct">
                <div class="quantity">
                    <input type="hidden" id="quantity" name="quantity" value="1">
                    <input type="text" id="productId" class="fadeIn second" name="product_id" placeholder="Product_id"
                           hidden="" value="<?php echo $product->getId() ?>">
                    <button class="minus-btn" type="submit" name="button">
                        <img src="minus.svg" alt="-"/>
                    </button>
                </div>
            </form>

            <!--            <h3>Добавить в избранное</h3>-->

            <form action="/selected" method="POST">
                <div class="quantity">
                    <input type="hidden" name="product_id" id="send" value="<?php echo $product->getId(); ?>">
                    <button class="quantity">
                        <img src="https://cdn-icons-png.flaticon.com/512/54/54381.png" alt="" width="20px">
                        Добавить в избранное
                    </button>
                </div>
            </form>


            <!--            <form action="/removeSelected" method="POST">-->
            <!--                <div class="quantity">-->
            <!--                    <input type="hidden" name="product_id" value="-->
            <?php //echo $product->getId(); ?><!--">-->
            <!--                    <button class="quantity">-->
            <!--                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkEqb7yH6GMN43ZOyS5_LiZvWutK3h5ihP1Q93v7T6qA&s"-->
            <!--                             width="20px" alt="">-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </form>-->

            <!--            <form action="/comment" method="GET">-->
            <!--                <div class="quantity">-->
            <!--                    <input type="hidden" name="product_id" value="-->
            <?php //echo $product->getId(); ?><!--">-->
            <!--                    <button class="quantity">-->
            <!--                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKw-w-EWVZq_6fvkbeO1gj-uSaRMLObguiH91u9SZE-w&s" width="20px">-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </form>-->

        </div>

        <!--                        <div class="card-footer">-->
        <!--                                    <div class="rating">-->
        <!--                                        <span>14400  тенге</span><P>(Скидка 20%)</p>-->
        <!--                                    </div>-->

    <?php endforeach; ?>
</div>

<!--    <div class="page-btn">-->
<!--        <span>1</span>-->
<!--        <span>2</span>-->
<!--                    <span>3</span>-->
<!--                    <span>4</span>-->
<!--        <span>&#8594;</span>-->
</div>
</div>
<!--         Footer-->
<!--        <div class="footer">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="footer-col-1">-->
<!--                        <h3>Download Our App</h3>-->
<!--                        <p>Download App for Android and iso mobile phone.</p>-->
<!--                        <div class="app-logo">-->
<!--                            <img src="https://i.ibb.co/KbPTYYQ/play-store.png" alt="" />-->
<!--                            <img src="https://i.ibb.co/hVM4X2p/app-store.png" alt="" />-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="footer-col-2">-->
<!--                        <img src="https://i.ibb.co/j3FNGj7/logo-white.png" alt="" />-->
<!--                        <p>-->
<!--                            Our Purpose Is To Sustainably Make the Pleasure and Benefits of-->
<!--                            Sports Accessible to the Many.-->
<!--                        </p>-->
<!--                    </div>-->
<!---->
<div class="footer-col-3">
    <h3>Пользовательская доска</h3>
    <ul>
        <li>Купоны</li>
        <li>Посты</li>
        <li>Политика магазина</li>
        <li>Игры</li>
    </ul>
</div>

<div class="footer-col-4">
    <h3>Обратная связь</h3>
    <ul>
        <li>Facebook</li>
        <li>Vk.com</li>
        <li>Instagram</li>
        <li>YouTube</li>
    </ul>
</div>
</div>
<hr/>
<p class="copyright">Copyright &copy; 2024 - Panda Logo</p>
</div>
</div>

<!-- js for toggle menu-->
<script>
    var MenuItems = document.getElementById('MenuItems');
    MenuItems.style.maxHeight = '0px';

    function menutoggle() {
        if (MenuItems.style.maxHeight == '0px') {
            MenuItems.style.maxHeight = '200px';
        } else {
            MenuItems.style.maxHeight = '0px';
        }
    }
</script>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {

        font-family: "Poppins", sans-serif;
    }

    .navbar {
        display: flex;
        align-items: center;
        padding: 20px;
    }

    span {
        text-decoration: line-through;
    }

    nav {
        flex: 1;
        text-align: right;
    }

    nav ul {
        display: inline-block;
        list-style-type: none;
    }

    nav ul li {
        display: inline-block;
        margin-right: 20px;
    }

    a {
        text-decoration: none;
        color: #555;
    }

    p {
        color: #555;
    }

    .container {
        max-width: 1920px;
        margin: auto;
        padding-left: 25px;
        padding-right: 25px;
    }

    .row {
        display: flex;
        align-items: center;
        flex-wrap: wrap-reverse;
        justify-content: space-around;
    }

    .col-2 {
        flex-basis: 50%;
        min-width: 300px;
    }

    .col-2 img {
        max-width: 100%;
        padding: 50px 0;
    }

    .col-2 h1 {
        font-size: 50px;
        line-height: 60px;
        margin: 25px 0;
    }

    .btn {
        display: inline-block;
        background: #ff523b;
        color: #ffffff;
        padding: 8px 30px;
        margin: 30px 0;
        border-radius: 30px;
        transition: background 0.5s;
    }

    .btn:hover {
        background: #563434;
    }

    .header {
        background: radial-gradient(#fff, #ffd6d6);
    }

    .header .row {
        margin-top: 70px;
    }

    .categories {
        margin: 70px 0;
    }

    .col-3 {
        flex-basis: 30%;
        min-width: 250px;
        margin-bottom: 30px;
    }

    .col-3 img {
        width: 100%;
    }

    .small-container {
        max-width: 400px;
        margin: auto;
        padding-left: 25px;
        padding-right: 25px;
    }

    .col-4 {
        flex-basis: 15%;
        padding: 10px;
        min-width: 200px;
        margin-bottom: 50px;
        transition: transform 0.5s;
    }

    .col-4 img {
        width: 50%;
    }

    .title {
        text-align: center;
        margin: 0 auto 80px;
        position: relative;
        line-height: 60px;
        color: #555;
    }

    .title::after {
        content: "";
        background: #ff523b;
        width: 80px;
        height: 5px;
        border-radius: 5px;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translate(-50%);
    }

    h4 {
        color: #555;
        font-weight: normal;
    }

    .col-4 p {
        font-size: 20px;
    }

    .rating .fas {
        color: #ff523b;
    }

    .rating .far {
        color: #ff523b;
    }

    .col-4:hover {
        transform: translateY(-30px);
    }

    /* Offer */

    .offer {
        background: radial-gradient(#fff, #ffd6d6);
        margin-top: 80px;
        padding: 30px 0;
    }

    .col-2 .offer-img {
        padding: 50px;
    }

    small {
        color: #555;
    }

    /* testimonial */

    .testimonial {
        padding-top: 100px;
    }

    .testimonial .col-3 {
        text-align: center;
        padding: 40px 20px;
        box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: transform 0.5s;
    }

    .testimonial .col-3 img {
        width: 100px;
        margin-top: 20px;
        border-radius: 50%;
    }

    .testimonial .col-3:hover {
        transform: translateY(-10px);
    }

    .fa-quote-left {
        font-size: 34px;
        color: #ff523b;
    }

    .col-3 p {
        font-size: 14px;
        margin: 12px 0;
        color: #777777;
    }

    .testimonial .col-3 h3 {
        font-weight: 600;
        color: #555;
        font-size: 16px;
    }

    .brands {
        margin: 100px auto;
    }

    .col-5 {
        width: 160px;
    }

    .col-5 img {
        width: 100%;
        cursor: pointer;
        filter: grayscale(100%);
    }

    .col-5 img:hover {
        width: 100%;
        cursor: pointer;
        filter: grayscale(0);
    }

    /* footer */

    .footer {
        background: #000;
        color: #8a8a8a;
        font-size: 14px;
        padding: 60px 0 20px;
    }

    .footer p {
        color: #8a8a8a;
    }

    .footer h3 {
        color: #ffffff;
        margin-bottom: 20px;
    }

    .footer-col-1,
    .footer-col-2,
    .footer-col-3,
    .footer-col-4 {
        min-width: 250px;
        margin-bottom: 20px;
    }

    .footer-col-1 {
        flex-basis: 30%;
    }

    .footer-col-2 {
        flex: 1;
        text-align: center;
    }

    .footer-col-2 img {
        width: 180px;
        margin-bottom: 20px;
    }

    .footer-col-3,
    .footer-col-4 {
        flex-basis: 12%;
        text-align: center;
    }

    ul {
        list-style-type: none;
    }

    .app-logo {
        margin-top: 20px;
    }

    .app-logo img {
        width: 140px;
    }

    .footer hr {
        border: none;
        background: #b5b5b5;
        height: 1px;
        margin: 20px 0;
    }

    .copyright {
        text-align: center;
    }

    .menu-icon {
        width: 28px;
        margin-left: 20px;
        display: inline-flex;
    }

    /* media query for menu */

    @media only screen and (max-width: 800px) {
        nav ul {
            position: absolute;
            top: 70px;
            left: 0;
            background: #333;
            width: 100%;
            overflow: hidden;
            transition: max-height 0.5s;
        }

        nav ul li {
            display: block;
            margin-right: 50px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        nav ul li a {
            color: #fff;
        }

        .menu-icon {
            display: block;
            cursor: pointer;
        }
    }

    /* all products page */

    .row-2 {
        justify-content: space-between;
        margin: -20px auto 50px;
    }

    select {
        border: 1px solid #ff523b;
        padding: 5px;
    }

    select:focus {
        outline: none;
    }

    .page-btn {
        margin: 0 auto 80px;
    }

    .page-btn span {
        display: inline-block;
        border: 1px solid #ff523b;
        margin-left: 10px;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
    }

    .page-btn span:hover {
        background: #ff523b;
        color: #ffffff;
    }

    /* single product details */

    .single-product {
        margin-top: 80px;
    }

    .single-product .col-2 img {
        padding: 0;
    }

    .single-product .col-2 {
        padding: 20px;
    }

    .single-product h4 {
        margin: 20px 0;
        font-size: 22px;
        font-weight: bold;
    }

    .single-product select {
        display: block;
        padding: 10px;
        margin-top: 20px;
    }

    .single-product input {
        width: 50px;
        height: 40px;
        padding-left: 10px;
        font-size: 20px;
        margin-right: 10px;
        border: 1px solid #ff523b;
    }

    input:focus {
        outline: none;
    }

    .single-product .fas {
        color: #ff523b;
        margin-left: 10px;
    }

    .small-img-row {
        display: flex;
        justify-content: space-between;
    }

    .small-img-col {
        flex-basis: 24%;
        cursor: pointer;
    }

    /* cart items */

    .cart-page {
        margin: 90px auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    .cart-info {
        display: flex;
        flex-wrap: wrap;
    }

    th {
        text-align: left;
        padding: 5px;
        color: #ffffff;
        background: #ff523b;
        font-weight: normal;
    }

    td {
        padding: 10px 5px;
    }

    td input {
        width: 40px;
        height: 30px;
        padding: 5px;
    }

    td a {
        color: #ff523b;
        font-size: 12px;
    }

    td img {
        width: 80px;
        height: 80px;
        margin-right: 10px;
    }

    .total-price {
        display: flex;
        justify-content: flex-end;
    }

    .total-price table {
        border-top: 3px solid #ff523b;
        width: 100%;
        max-width: 400px;
    }

    td:last-child {
        text-align: right;
    }

    th:last-child {
        text-align: right;
    }

    /* account page */
    .account-page {
        padding: 50px 0;
        background: radial-gradient(#fff, #ffd6d6);
    }

    .form-container {
        background: #ffffff;
        width: 300px;
        height: 400px;
        position: relative;
        text-align: center;
        padding: 20px 0;
        margin: auto;
        box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .form-container span {
        font-weight: bold;
        padding: 0 10px;
        color: #555555;
        cursor: pointer;
        width: 100px;
        display: inline-block;
    }

    .form-btn {
        display: inline-block;
    }

    .form-container form {
        max-width: 300px;
        padding: 0 20px;
        position: absolute;
        top: 130px;
        transition: transform 1s;
    }

    form input {
        width: 100%;
        height: 30px;
        margin: 10px 0;
        padding: 0 10px;
        border: 1px solid #ccc;
    }

    form .btn {
        width: 100%;
        border: none;
        cursor: pointer;
        margin: 10px 0;
    }

    form .btn:focus {
        outline: none;
    }

    #LoginForm {
        left: -300px;
    }

    #RegForm {
        left: 0;
    }

    form a {
        font-size: 12px;
    }

    #Indicator {
        width: 100px;
        border: none;
        background: #ff523b;
        height: 3px;
        margin-top: 8px;
        transform: translateX(100px);
        transition: transform 1s;
    }

    /* media query for less than 600 screen size */

    @media only screen and (max-width: 600px) {
        .row {
            text-align: center;
        }

        .col-2,
        .col-3,
        .col-4 {
            flex-basis: 100%;
        }

        .single-product .row {
            text-align: left;
        }

        .single-product .col-2 {
            padding: 20px 0;
        }

        .single-product h1 {
            font-size: 26px;
            line-height: 32px;
        }

        .cart-info p {
            display: none;
        }
    }

    .quantity {
        padding-top: 2px;
        margin-right: 103px;
    }

    .quantity input {
        -webkit-appearance: none;
        border: none;
        text-align: center;
        width: 32px;
        font-size: 16px;
        color: #43484D;
        font-weight: 300;
    }

    button[class*=btn] {
        width: 30px;
        height: 30px;
        background-color: #E1E8EE;
        border-radius: 6px;
        border: none;
        cursor: pointer;
    }

    .minus-btn img {
        margin-bottom: 3px;
    }

    .plus-btn img {
        margin-top: 2px;
    }

    button:focus,
    input:focus {
        outline: 0;
    }

    .add-fav {
        display: inline-block;
        padding: 5px;
        cursor: pointer;
        border: 1px solid #ccc;
        background: -webkit-linear-gradient(top, #fff, #ddd) #ddd;
        position: relative;
        transition: all .5s ease;
        border-radius: 3px;
        box-shadow: inset 0 -1px 1px #eee;

        &:hover {
            background: -webkit-linear-gradient(top, #fff, #ccc) #ddd;
        }

        .icon-heart {
            font-size: 24px;
            color: #666;
            position: relative;
            transition: all .5s ease-in-out;
        }

        .icon-plus-sign {
            font-size: 10px;
            color: #333;
            background: #fff;
            border-radius: 100%;
            position: absolute;
            bottom: 2px;
            right: 2px;
            height: 11px;
            width: 11px;
            line-height: 11px;
            text-align: center;
            transition: all 1s ease-in-out;
        }
    }

    }
    input[type="checkbox"] {
        position: absolute;
        opacity: 0;

        &:checked + .icon-heart {
            color: orange;

            .icon-plus-sign {
                display: none;
            }
        }
    }


    .styled {
        border: 0;
        line-height: 2.5;
        padding: 0 20px;
        font-size: 1rem;
        text-align: center;
        color: #fff;
        text-shadow: 1px 1px 1px #000;
        border-radius: 10px;
        background-color: rgb(220 0 0 / 100%);
        background-image: linear-gradient(
                to top left,
                rgb(0 0 0 / 20%),
                rgb(0 0 0 / 20%) 30%,
                rgb(0 0 0 / 0%)
        );
        box-shadow: inset 2px 2px 3px rgb(255 255 255 / 60%),
        inset -2px -2px 3px rgb(0 0 0 / 60%);
    }

    .styled:hover {
        background-color: rgb(255 0 0 / 100%);
    }

    .styled:active {
        box-shadow: inset -2px -2px 3px rgb(255 255 255 / 60%),
        inset 2px 2px 3px rgb(0 0 0 / 60%);
    }


</style>
