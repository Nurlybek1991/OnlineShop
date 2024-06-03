
<div class="container">

    <div class="title">

        <h1>
            <span class="name"><span></span><span></span></span>Panda

            <span class="name"><span></span><span></span></span>Logo

            <span class="name"><span></span><span></span></span>Онлайн

            <span class="name"><span></span><span></span></span>Магазин
            <!--                </h1>-->
        </h1>

        <!--        <h2>Форма заказа: -->
        <?php //print_r(" " .$userShow['name']   ." ". $userShow['surname'])  ?><!--</h2>-->
    </div>

    <div class="d-flex">
        <img height="124" src="https://i.imgur.com/E3uTxXY.png" alt="Panda Logo"/>
        <form id="form" method="POST" action="/order">
            <label>
                <span class="firstname">Имя<span class="required"></span></span>
                <input type="text" name="firstname" id="firstname">
                <?php if (isset($errors['firstname'])): ?>
                    <label style="color: red"><?php echo $errors['firstname']; ?></label>
                <?php endif; ?>
            </label>
            <label>
                <span class="lastname">Фамилия <span class="required"></span></span>
                <input type="text" name="lastname" id="lastname">
                <?php if (isset($errors['lastname'])): ?>
                    <label style="color: red"><?php echo $errors['lastname']; ?></label>
                <?php endif; ?>
            </label>
            <label>
                <span>Страна <span class="required"></span></span>
                <input type="text" name="country" id="country">
                <?php if (isset($errors['country'])): ?>
                    <label style="color: red"><?php echo $errors['country']; ?></label>
                <?php endif; ?>
            </label>
            <label>
                <span>Адрес <span class="required"></span></span>
                <input type="text" name="address" placeholder="House number and street name" required>
                <?php if (isset($errors['address'])): ?>
                    <label style="color: red"><?php echo $errors['address']; ?></label>
                <?php endif; ?>
            </label>
            <!--            <label>-->
            <!--                <span>&nbsp;</span>-->
            <!--                <input type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">-->
            <!--            </label>-->
            <label>
                <span>Город<span class="required"></span></span>
                <input type="text" name="city">
                <?php if (isset($errors['city'])): ?>
                    <label style="color: red"><?php echo $errors['city']; ?></label>
                <?php endif; ?>
            </label>
                        <label>
                            <span>State / County <span class="required"></span></span>
                            <input type="text" name="city">
                        </label>
            <label>
                <span>Индекс <span class="required"></span></span>
                <input type="text" name="postcode">
                <?php if (isset($errors['postcode'])): ?>
                    <label style="color: red"><?php echo $errors['postcode']; ?></label>
                <?php endif; ?>
            </label>
            <label>
                <span>Телефон<span class="required"></span></span>
                <input type="tel" name="phoneOrder">
                <?php if (isset($errors['phoneOrder'])): ?>
                    <label style="color: red"><?php echo $errors['phoneOrder']; ?></label>
                <?php endif; ?>
            </label>
            <label>
                <span>Почта <span class="required">Почта должна быть вашей!</span></span>
                <input type="email" name="email" width="70px">
                <?php if (isset($errors['email'])): ?>
                    <label style="color: red"><?php echo $errors['email']; ?></label>
                <?php endif; ?>

            </label>


                    <div class="Yorder">
                        <table>
                            <tr>
                                <th colspan="2">Ваш заказ</th>
                            </tr>
                            <tr>
                                <td>Общая сумма заказа</td>
                                <td><?php echo $totalPrice  . " тенге"; ?></td>
                            </tr>
                            <tr>
                                <td>20% скидка</td>
                                <td><?php echo $sum = $totalPrice * 0.2 . " тенге"; ?></td>
                            </tr>
                            <tr>
                                <td>Итого с вычетам скидки</td>
                                <td><?php $sum = $totalPrice * 0.2; echo $totalPrice - $sum . " тенге"; ?></td>
                            </tr>
<!--                            <tr>-->
<!--                                <td>Shipping</td>-->
<!--                                <td>Free shipping</td>-->
<!--                            </tr>-->
                                                    </table><br>
<!--                        <div>-->
<!--                            <input type="radio" name="dbt" value="dbt" checked> Direct Bank Transfer-->
<!--                        </div>-->
<!--                        <p>-->
<!--                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.-->
<!--                        </p>-->
<!--                        <div>-->
<!--                            <input type="radio" name="dbt" value="cd"> Cash on Delivery-->

<!--                        <div>-->
<!--                            <input type="radio" name="dbt" value="cd"> Paypal <span>-->
<!--                  <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="" width="50">-->
<!--                  </span>-->

            <?php
            /** @var TYPE_NAME $orderProducts */
            foreach ($orderProducts as $orderProduct): ?>
            <div>
                <p class="prod-description inline"><?php echo $orderProduct->getProduct()->getName(); ?>
                <div class="cart-info">
                   <img src="<?php echo $orderProduct->getProduct()->getImage() ?>" alt="" width="70px" />
                    <div class="qty inline"><span class="smalltxt">x</span> <?php echo $orderProduct->getQuantity() . " шт "; ?>
                    </div>
                    <div class="qty inline"><span
                                class="smalltxt right-div"><?php echo $orderProduct->getProduct()->getPrice() * $orderProduct->getQuantity() . " тенге"; ?></span>
                    </div>
                    </p>
                </div>


<!--                </tr>-->

                <?php endforeach; ?>

<!--                <div><h4>Сумма заказа:</h4><div class="qty inline"><span class="smalltxt"></span> --><?php //echo $totalPrice  . " тенге"; ?><!--</div>-->
            </div>
            <button form="form" href="/main" type="submit">Place Order</button>
    </div><!-- Yorder -->
</div>
</form>
</div>

<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');

    body {
        background: url('http://all4desktop.com/data_images/original/4236532-background-images.jpg');
        font-family: 'Roboto Condensed', sans-serif;
        color: #262626;
        margin: 5% 0;
    }

    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 1140px;
        }
    }

    .d-flex {
        display: flex;
        flex-direction: row;
        background: #f6f6f6;
        border-radius: 0 0 5px 5px;
        padding: 25px;
    }

    form {
        flex: 4;
    }

    .Yorder {
        flex: 2;
    }

    .title {
        background: -webkit-gradient(linear, left top, right bottom, color-stop(0, #5195A8), color-stop(100, #70EAFF));
        background: -moz-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
        background: -ms-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
        background: -o-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
        background: linear-gradient(to bottom right, #5195A8 0%, #70EAFF 100%);
        border-radius: 5px 5px 0 0;
        padding: 20px;
        color: #f6f6f6;
    }

    h2 {
        margin: 0;
        padding-left: 15px;
    }

    .required {
        color: red;
    }

    label, table {
        display: block;
        margin: 15px;
    }

    label > span {
        float: left;
        width: 25%;
        margin-top: 12px;
        padding-right: 10px;
    }

    input[type="text"], input[type="tel"], input[type="email"], select {
        width: 70%;
        height: 30px;
        padding: 5px 10px;
        margin-bottom: 10px;
        border: 1px solid #dadada;
        color: #888;
    }
    .small-container {
        max-width: 1080px;
        margin: auto;
        padding-left: 25px;
        padding-right: 25px;
    }

    select {
        width: 72%;
        height: 45px;
        padding: 5px 10px;
        margin-bottom: 10px;
    }

    .right-div {
        float: right;
        background-color: #e0e0e0;
        padding: 20px;
    }

    .Yorder {
        margin-top: 15px;
        height: 600px;
        padding: 20px;
        border: 1px solid #dadada;
    }

    table {
        margin: 0;
        padding: 0;
    }

    th {
        border-bottom: 1px solid #dadada;
        padding: 10px 0;
    }

    tr > td:nth-child(1) {
        text-align: left;
        color: #2d2d2a;
    }

    tr > td:nth-child(2) {
        text-align: right;
        color: #52ad9c;
    }

    td {
        border-bottom: 1px solid #dadada;
        padding: 25px 25px 25px 0;
    }

    p {
        display: block;
        color: #888;
        margin: 0;
        padding-left: 25px;
    }

    .Yorder > div {
        padding: 15px 0;
    }

    .inline
    {
        display: -moz-inline-block;
    }

    .cart-info {
        display: flex;
        flex-wrap: wrap-reverse;
    }

    .smalltxt {
        font-size: 15px;
        vertical-align: middle;
    }
    .qty {
        font-weight: 900;
        font-size: 13px;
        color: #000;
        padding-left: 4px;
    }

        .prod-description {
        text-transform: uppercase;
        color: #000;
    }


        button {
        width: 100%;
        margin-top: 10px;
        padding: 10px;
        border: none;
        border-radius: 30px;
        background: #52ad9c;
        color: #fff;
        font-size: 15px;
        font-weight: bold;
    }

    button:hover {
        cursor: pointer;
        background: #428a7d;
    }
</style>
