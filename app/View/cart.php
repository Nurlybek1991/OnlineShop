
<div class="container">
    <div class="navbar">
        <div class="logo">
            <!--            <a href="index.html"><img src="https://i.imgur.com/E3uTxXY.png" alt="" width="125px" /></a>-->

    <img height="92" src="https://i.imgur.com/E3uTxXY.png" alt="Panda Logo"/>


        </div>
        <nav>
            <ul id="MenuItems">
<!--                <li><a href="index.html">Домой</a></li>-->
                <li><a href="/main">Продукты</a></li>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Контакты</a></li>
<!--                <li><a href="/registrate">Аккаунт</a>--><?php //print_r(" Корзина: " . $userShow->getName() . " "  . $userShow->getSurname())?><!--</li>-->
            </ul>
        </nav>
        <!--        <a href="cart.html"><img src="https://i.ibb.co/PNjjx3y/cart.png" alt="" width="30px" height="30px" /></a>-->
        <!--        <img src="https://i.ibb.co/6XbqwjD/menu.png" alt="" class="menu-icon" onclick="menutoggle()" />-->
    </div>

</div>

<!-- cart items details -->

<div class="small-container cart-page">
    <table>

        <?php /** @var TYPE_NAME $cartProducts */
        foreach ($cartProducts as $cartProduct): ?>
        <form id="form" action="/cart" method="POST" >
            <tr>

                <th>Товар</th>
                <th>Колличество</th>
                <th>Цена</th>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?php echo $cartProduct->getProduct()->getImage() ?>" alt=""/>
                        <div>
                            <p></p>
                            <small><?php echo $cartProduct->getProduct()->getName() ?></small>
                            <br/>
                                <a href="/removeProduct">Удалить</a>
                            <br>
                            <a href="/order">Заказать</a>
                        </div>
                    </div>
                </td>
                <td><input value="<?php echo $cartProduct->getQuantity() ?>"/></td>
                <td><?php echo $cartProduct->getProduct()->getPrice() . ' тенге' ?></td>
            </tr>
        </form>
        <?php endforeach; ?>
    </table>
    <div class="total-price">
        <table>
<!--                        --><?php //foreach ($cartProducts as $cartProduct): ?>
            <tr>
                <td>Итого  <?php
                    if(empty($cartProducts)){
                        echo ': Корзина пустая!';
                    }
                    ?></td>
                <td><?php if(isset($sumTotalCart)): ?><?php echo $sumTotalCart . ' тенге'?><?php endif; ?></td>

            </tr>
            <!--            <tr>-->
            <!--                <td>Налог</td>-->
            <!--                <td>₹15.00</td>-->
            <!--            </tr>-->
            <!--            <tr>-->
            <!--                <td>Итого с налогом</td>-->
            <!--                <td>₹3515.00</td>-->
            <!--            </tr>-->
<!--                        --><?php //endforeach; ?>
        </table>
    </div>
</div>

<!-- Footer -->
<!--<div class="footer">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="footer-col-1">-->
<!--                <h3>Download Our App</h3>-->
<!--                <p>Download App for Android and iso mobile phone.</p>-->
<!--                <div class="app-logo">-->
<!--                    <img src="https://i.ibb.co/KbPTYYQ/play-store.png" alt="" />-->
<!--                    <img src="https://i.ibb.co/hVM4X2p/app-store.png" alt="" />-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="footer-col-2">-->
<!--                <img src="https://i.ibb.co/j3FNGj7/logo-white.png" alt="" />-->
<!--                <p>-->
<!--                    Our Purpose Is To Sustainably Make the Pleasure and Benefits of-->
<!--                    Sports Accessible to the Many.-->
<!--                </p>-->
<!--            </div>-->
<!---->
<!--            <div class="footer-col-3">-->
<!--                <h3>Useful Links</h3>-->
<!--                <ul>-->
<!--                    <li>Coupons</li>-->
<!--                    <li>Blog Post</li>-->
<!--                    <li>Return Policy</li>-->
<!--                    <li>Join Affiliate</li>-->
<!--                </ul>-->
<!--            </div>-->
<!---->
<!--            <div class="footer-col-4">-->
<!--                <h3>Follow us</h3>-->
<!--                <ul>-->
<!--                    <li>Facebook</li>-->
<!--                    <li>Twitter</li>-->
<!--                    <li>Instagram</li>-->
<!--                    <li>YouTube</li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--        <hr />-->
<!--        <p class="copyright">Copyright &copy; 2021 - Red Store</p>-->
<!--    </div>-->
<!--</div>-->

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
        max-width: 1650px;
        margin: auto;
        padding-left: 25px;
        padding-right: 25px;
    }

    .row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
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
        max-width: 1080px;
        margin: auto;
        padding-left: 25px;
        padding-right: 25px;
    }

    .col-4 {
        flex-basis: 25%;
        padding: 10px;
        min-width: 200px;
        margin-bottom: 50px;
        transition: transform 0.5s;
    }

    .col-4 img {
        width: 100%;
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
        font-size: 14px;
    }

    .rating .fas {
        color: #ff523b;
    }

    .rating .far {
        color: #ff523b;
    }

    .col-4:hover {
        transform: translateY(-5px);
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
        display: none;
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
        margin: 100px auto 50px;
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

</style>