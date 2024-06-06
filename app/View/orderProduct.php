<div class="container">
    <h2>Ваш заказ успешно создан</h2>
    <h2 class="card-deck">
        <?php echo $user->getName() . $user->getSurname() ?>
        <?php /** @var TYPE_NAME $orderProducts */
        foreach ($orderProducts as $orderProduct): ?>
            <img src="<?php echo $orderProduct->getProduct()->getImage() ?>" alt="Card image"/>
                    <form action="/orderProduct" method="get">
                        <div class="card text-center">
                            <a href="#">
                                <div class="card-header">

                                </div>
                                <div class="card-body">
                                </div>
                            </a>
                        </div>
                    </form>
        <?php endforeach; ?>
</div>
<style>
    body {
        font-style: normal;display:flex;
        justify-content: center;
        align-items: center;
        margin:50px auto;
    }

    a {
        text-decoration: none;
    }
    .card-deck {
        position: relative;
        /*border: solid orange;*/
        height: 50px;



    }
    .card-deck {
        position: absolute;
        top: 53%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    a:hover {
        text-decoration: none;
    }

    h3 {
        line-height: 2px;
    }

    .card {
        max-width: 23rem;
    }

    .card:hover {
        box-shadow: 1px 2px 10px lightgray;
        transition: 0.2s;
    }

    .card-header {
        font-size: 13px;
        color: greenyellow;
        font-weight: bold;
        background-color: blue;
    }

    .card-footer{
        position: absolute;
        color: black;
        font-weight: bold;
        font-size: 18px;
        background-color: red;
        border-radius:10px;
    }
    .cart{
        font-size: 25px;
        position: marker;
        color: blue;
        font-weight: bold;
        /*background-color: blue;*/
        border-radius:30px;
    }
</style>
