<!--<div class="container">-->
<!--    <h2>Заказы</h2>-->
<!--    <h2 class="card-deck">-->
<!--        <a href="/main" > <h3 class="cart"> назад в каталог </h3> </a>-->
<!--        --><?php //echo 'имя заказчика ' . $users['name']; echo "<br>";?>
<!--        --><?php //echo 'тел. ' . $orders->getTelephone(); echo "<br>";?>
<!--<!--        -->--><?php ////echo "г. {$orders->getCity()} ул. {$orders->getStreet()} дом {$orders->getHouse()}";echo "<br>";?>
<!--<!--        -->--><?php ////echo 'коментарий к заказу: ' . $orders->getComments() ?>
<!--<!--        -->--><?php ////foreach ($products as $product): ?>
<!--<!--            -->--><?php ////foreach ($orderItems as $orderItem): ?>
<!--<!--                -->--><?php ////if ($orderItem->getProductId() === $product->getId()): ?>
<!--                    <form action="/order-items" method="get">-->
<!--                        <div class="card text-center">-->
<!--                            <a href="#">-->
<!--                                <div class="card-header">-->
<!--                                    .-->
<!--                                </div>-->
<!--                                <div class="card-body">-->
<!--<!--                                    <a href="#"><h3 class="card-title">-->--><?php ////echo $product->getName() . 'id ' . $orderItem->getProductId() ?><!--<!--</h3></a>-->-->
<!--<!--                                    <a href="#"><h3 class="card-title">-->--><?php ////echo 'заказ №' . $orderItem->getOrderId() ?><!--<!--</h3></a>-->-->
<!--<!--                                    <a href="#"><h3 class="card-title">-->--><?php ////echo 'количество ' . $orderItem->getQuantity() . ' шт.' ?><!--<!--</h3></a>-->-->
<!--<!--                                    <a href="#"><h4 class="card-title">-->--><?php ////echo $orderItem->getPrice() . ' р.'?><!--<!--</h4></a>-->-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </form>-->
<!--<!--                -->--><?php ////endif; ?>
<!--<!--            -->--><?php ////endforeach; ?>
<!--<!--        -->--><?php ////endforeach; ?>
<!--<!--        -->--><?php ////echo 'Итого к оплате ' . $sumTotalCart . ' р.'; ?>
<!--</div>-->
<!--<style>-->
<!--    body {-->
<!--        font-style: normal;display:flex;-->
<!--        justify-content: center;-->
<!--        align-items: center;-->
<!--        margin:50px auto;-->
<!--    }-->
<!---->
<!--    a {-->
<!--        text-decoration: none;-->
<!--    }-->
<!--    .card-deck {-->
<!--        position: relative;-->
<!--        /*border: solid orange;*/-->
<!--        height: 50px;-->
<!---->
<!---->
<!---->
<!--    }-->
<!--    .card-deck {-->
<!--        position: absolute;-->
<!--        top: 53%;-->
<!--        left: 50%;-->
<!--        transform: translate(-50%, -50%);-->
<!--    }-->
<!---->
<!--    a:hover {-->
<!--        text-decoration: none;-->
<!--    }-->
<!---->
<!--    h3 {-->
<!--        line-height: 2px;-->
<!--    }-->
<!---->
<!--    .card {-->
<!--        max-width: 23rem;-->
<!--    }-->
<!---->
<!--    .card:hover {-->
<!--        box-shadow: 1px 2px 10px lightgray;-->
<!--        transition: 0.2s;-->
<!--    }-->
<!---->
<!--    .card-header {-->
<!--        font-size: 13px;-->
<!--        color: greenyellow;-->
<!--        font-weight: bold;-->
<!--        background-color: blue;-->
<!--    }-->
<!---->
<!--    .card-footer{-->
<!--        position: absolute;-->
<!--        color: black;-->
<!--        font-weight: bold;-->
<!--        font-size: 18px;-->
<!--        background-color: red;-->
<!--        border-radius:10px;-->
<!--    }-->
<!--    .cart{-->
<!--        font-size: 25px;-->
<!--        position: marker;-->
<!--        color: blue;-->
<!--        font-weight: bold;-->
<!--        /*background-color: blue;*/-->
<!--        border-radius:30px;-->
<!--    }-->
<!--</style>-->
