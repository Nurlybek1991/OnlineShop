

<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous">
</head>
<body id="home" class="container-fluid">

<header class="container-fluid">


    <nav class="navbar navbar-expand-sm  fixed-top">
<!--        <a class="navbar-brand logo"><img  src="https://silvercrest-blender.netlify.app/img/shopsmart%20white.png"></a>-->
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar" aria-label="Toggle  navigation" aria-controls="navbar" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><a class="nav-link"  href="/cart">КОРЗИНА</a></li>
                <li><a class="nav-link" href="/registrate">РЕГИСТРАЦИЯ</a> </li>
                <li><a class="nav-link" href="/main">НАЗАД</a></li>

            </ul>
        </div>
    </nav>
</header>


<div class="row">


    <div class="col-lg-6">
        <div class="product-description">
            <div class="col-lg-6">
                <h1 class="fade-in"><?php echo $products->getName() ?></h1>
                <img src="<?php echo $products->getImage();?>">
            </div>
            <ul class="fade-in">
                <li><?php echo $products->getInfo() ?></li>
            </ul>

            <span><?php echo $products->getName() ?></span>

        </div>
        <div class="product-price">
            <span><?php echo $products->getPrice() . ' тенге' ?></span>
            <a href="/cart" class="cart-btn">ЗАКАЗАТЬ</a>
        </div>
<!--        <div class="comments">-->
<!--            <div class="contribute">-->
<!--                <label for="add-comment">Добавить комментарий</label><small> Нажмите Enter</small>-->
<!--                <input type="text" id="add-comment" v-model="newComment" @keyup.enter="submit">-->
<!--            </div>-->
<!--        </div>-->
<!--        <form action="/addComment" method="POST">-->
<!--            <div class="quantity">-->
<!--                <label for="add-comment">Добавить комментарий</label><small> Нажмите Enter</small>-->
<!--                <input type="text" id="add-comment" v-model="newComment" @keyup.enter="submit">-->
<!--                <input type="hidden" name="product_id" value="--><?php //echo $products->getId(); ?><!--">-->
<!--                <br><br>-->
<!--                <button class="openProduct">Cохранить комментарий </button>-->
<!--            </div>-->
<!--        </form>-->
        <h3 class="container-fluid">Добавить комментарий</h3>
        <form action="/addComment" method="POST" id = "addComment">
            <div class="quantity">
                <input type="hidden" name="product_id" value="<?php echo $products->getId(); ?>">
                <label>
                    <textarea name="addComment" placeholder="Сообщение" rows="5"></textarea>
                </label>
            </div>
            <button type="submit" class="container-fluid">Сохранить</button>
        </form>
    </div>
    <h3 class="container-fluid">Комментарии</h3>
<?php if(!empty($comments)):?>
    <?php foreach ($comments as $com):?>

    <?php echo $com->getComment();?>
    <?php endforeach; ?>
<?php else: ?>
    <div class="supaview">Пока здесь пусто..</div>
<?php endif; ?>
</div>

<!--<div id="video" class=" iframe container-fluid">-->
<!--    <div  class="row">-->
<!--        <h3 style="color: firebrick;">How It Works</h3>-->
<!---->
<!--        <iframe class="col-lg-4" src="https://www.youtube.com/embed/XqGnVPRT7bQ"-->
<!--                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media;-->
<!--          gyroscope; picture-in-picture" allowfullscreen></iframe><br>-->
<!--        <iframe class="col-lg-4"   src="https://www.youtube.com/embed/P8FMET_4wys"-->
<!--                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media;-->
<!--          gyroscope; picture-in-picture" allowfullscreen></iframe><br>-->
<!--        <iframe class="col-lg-4"  src="https://www.youtube.com/embed/g-KZ9OIiqp0"-->
<!--                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media;-->
<!--           gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--    </div>-->
<!--</div>-->

<!--<div id="features"  class="container-fluid">-->
<!--    <div style="padding: 0 20px 0 20px;" class="row">-->
<!--        <div class=" col-lg-8 features">-->
<!--            <h3 style="color: firebrick;">Product Details</h3>-->
<!--            <p class="fade-in">-->
<!--                <b>Multi-Functional</b> - The new vision blender comes with speed and preset program,-->
<!--                different speed allows you process food of various hardness.you can personally make delicious smoothie,-->
<!--                your homemade baby food,hot soup,even pulverize nuts into butter.-->
<!--            </p><br>-->
<!--            <p class="fade-in">-->
<!--                <b>High grinding speed</b> - The food can be completely mashed in seconds and its cell wall rupture-->
<!--                rate is as high or more, which can maximizes the extraction of nutrients and vitamins from foods.-->
<!--            </p><br>-->
<!--            <p class="fade-in">-->
<!--                <b>Easy To Use & Clean</b> - The clear control panel make it easy for you to choose the mode you need.-->
<!--                Tritan jars and blades are removable for easy cleaning, with a drop of dish soap and warm water,-->
<!--                the blender could clean itself in a minute-->
<!--            </p><br>-->
<!--        </div>-->
<!--        <section class="photo-container col-lg-4">-->
<!--            <img  src="https://silvercrest-blender.netlify.app/img/blender%20juice%20splash.jpg">-->
<!--        </section>-->
<!--    </div>-->
<!--</div>-->

<!--<footer style="padding: 30px 0;" class="footer container-fluid">-->
<!---->
<!--    <form id="form">-->
<!--        <input type="email" class="email" id="email" placeholder="Enter your Email To Recieve offers and discounts"></br>-->
<!--        <input type="Submit" class="button" id="submit" onclick="show()" name="Submit">-->
<!--    </form>-->
<!---->
<!--    <div>-->
<!--        <a href="https://facebook.com/shopsmart.ngg/" class="fa fa-facebook"></a>-->
<!--        <a href="https://twitter.com/shop_smart_ng/" class="fa fa-twitter"></a>-->
<!--        <a href="https://www.instagram.com/shop_smart_ng/" class="fa fa-instagram"></a>-->
<!--    </div>-->
<!---->
<!--    <div class="footer-address">-->
<!--        <p>Lekki, Lagos Nigeria <br>-->
<!--            <a href="tel:+2348086036016">+2348086036016</a><br>-->
<!--            <a href="mailto:herroyalpianist@gmail.com">herroyalpianist@gmail.com</a>-->
<!--        </p>-->
<!--    </div>-->
<!---->
<!---->
<!--    <div class="copyright">-->
<!--        <p> Copyright  &copy;<script>document.write(new Date().getFullYear());</script>.-->
<!--            Designed by <a href="morenike.netlify.app">-Morenike-</a>.-->
<!--            All rights reserved</p>-->
<!--    </div>-->
<!---->
<!--</footer>-->

<!--====== Javascripts & Jquery ======-->
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

<script>
    function show(){
        alert ("Thank you for submitting. Your message has been recieved and a reply would be sent shortly.");
    }

    const faders = document.querySelectorAll(".fade-in");
    const sliders = document.querySelectorAll(".slide-in");

    const appearOptions = {
        threshold: 0,
        rootMargin: "0px 0px -100px 0px"
    };

    const appearOnScroll = new IntersectionObserver(function(entries,appearOnScroll){
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                return
            } else {
                entry.target.classList.add("appear");
                appearOnScroll.unobserve(entry.target);
            }
        })

    },appearOptions);

    faders.forEach(fader => {
        appearOnScroll.observe(fader);
    })

    sliders.forEach(slider => {
        appearOnScroll.observe(slider);
        // console.log(slider)
    })




    const slides = document.querySelectorAll(".slides");
    const dots = document.querySelectorAll(".dot");
    // setting the index for the slides
    let slideIndex = 0;

    const showSlides = () => {
        slides.forEach(slide => {
            slide.style.display = "none";
        })
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        dots.forEach(dot => {
            dot.className = dot.className.replace("active", "");
        })

        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 3000);
    }
    showSlides()
</script>

<style>
    html{
        background-color: white;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        max-width: 100vw;
        width: 100vw;
        overflow-x: hidden;
    }
    *{
        box-sizing: border-box;
        margin: 0;
        border:0;
    }
    img{
        width: 100%;
    }
    body {
        font-family: 'Poppins', sans-serif;
        font-size: 2rem; /* 18px */
        font-weight: 400;
        line-height: 1.4;
        color: #202020;
        background-color: #ffffff;
    }

    h1,
    h2,
    h3{
        font-family: 'Raleway', sans-serif;
        font-weight: 700;
        text-align: center;
        padding: 10px;
    }

    h1 {
        font-size: 3.5rem;
    }

    h2 {
        font-size: 3rem;
    }
    h3{
        font-size: 2rem;
    }
    p{
        font-size: 18px;
        padding: 10px;
    }


    .row{
        padding: 30px;
    }
    .logo{
        width: 200px;
        padding: 20px;
        float: left;
        background-color: transparent;
    }
    .navbar{
        background-color: #202020;
    }


    .nav-link{
        text-decoration: none;
        font-size: 18px;
        color: #ffffff;
        font-weight: 300;
        padding: 15px;
    }

    .nav-link:hover{
        color: firebrick;
    }

    .slider-container {
        width: 100%;
        height: auto;
        padding-top: 20px;
    }
    .slider-container img{
        width: 100%;
    }
    .fade-in {
        opacity: 0;
        transform: translateY(50px);
        transition: all 1s ease-out ;
    }
    .fade-in.appear {
        opacity: 1;
        transform: translateY(0);
    }



    .features{
        color: #111111;
        font-size: 18px;
        padding: 10px;
    }

    .container-fluid{
        padding: 50px 0 0 20px;
    }

    /* Product Description */
    .product-description {
        border-bottom: 1px solid #E1E8EE;
        margin-bottom: 20px;
        display: block;
    }
    .product-description span {
        font-size: 12px;
        color: firebrick;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
    }
    .product-description h1 {
        font-weight: 300;
        font-size: 50px;
        color: rgb(51, 51, 51);
        letter-spacing: 1px;
    }
    .product-description li {
        font-size: 16px;
        font-weight: 300;
        color: #86939E;
        line-height: 24px;
    }
    .product-description h3{
        color: #a7a7a7;
    }

    /* Product Price */
    .product-price {
        display: flex;
        align-items: center;
    }

    .product-price span {
        font-size: 26px;
        font-weight: 300;
        color: #43474D;
        margin-right: 20px;
    }

    .cart-btn {
        display: inline-block;
        background-color: #434343;
        border-radius: 6px;
        font-size: 16px;
        color: #FFFFFF;
        text-decoration: none;
        padding: 12px 30px;
        transition: all .5s;
    }
    .cart-btn:hover {
        background-color: firebrick;
    }



    .photo-container img:hover{
        transform: scale(1.1);
    }

    .iframe{
        background-color: #0f0f0f;
        padding: 40px 0 40px 0;
    }
    iframe{
        height: 350px;
    }

    .footer{
        background-color: #202020;
        height: 350px;
        color: #717171;
        display: block;
        text-align: center;
        letter-spacing: 2px;
        word-spacing: 1px;
    }


    .footer-address a, p{
        text-decoration: none;
        color: #717171;
        cursor: pointer;
        font-size: 15px;
    }
    #form{
        margin: 10px;
        color: white;
        border: none;
    }
    #form input {
        background: #353535;
        width: 30%;
        padding: 20px;
        border-top:20px;
        margin:7px;
    }
    .button{
        text-align: center;
        background-color: firebrick;
        color: #ffffff;
        font-size: 1rem;
        padding: 10px;
        position: center;
        animation-fill-mode: all;
        align-self: center;
    }

    .button:hover{
        background-color:floralwhite;
        color: firebrick;
    }
    .fa {
        padding: 7px;
        font-size: 15px;
        background: #717171;
        color: firebrick;
        width: 35px;
        height: 35px;
        text-decoration: none;
        text-align: center;
        border-radius: 10px;
        cursor: pointer;
    }

    .fa:hover {
        transform: scale(1.3);
    }

    .copyright {
        border: none;
        background-color: #0f0f0f;
        color: #434343;
        font-weight: 300;
        font-size: 12px;
    }

    .copyright a{
        text-decoration: none;
        color: #f1f1f1;
    }
</style>