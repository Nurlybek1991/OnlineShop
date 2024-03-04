
<title>HTML CSS And JavaScript - JavaScript Working Shopping Cart</title>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<body>

<header class="header">
    <div class="nav container">
        <a class="logo" href="#">Ecommerce</a>
        <i id="cart-icon" class='bx bx-shopping-bag'></i>

        <!-- CART -->
        <div class="cart">
            <h2 class="cart-title">Your Cart</h2>

            <div class="cart-content">

            </div>
            <!-- total -->
            <div class="total">
                <div class="total-title">Total</div>
                <div class="total-price">$0</div>
            </div>
            <!-- buy button -->
            <button class="btn-buy" type="button">Buy Now</button>
            <!-- cart close -->
            <i id="close-cart" class='bx bx-x'></i>
        </div>

    </div>
</header>

<section class="shop container">
    <h2 class="section-title">Shop Product</h2>

    <div class="shop-content">
        <!-- box 1 -->
        <div class="product-box">
            <img src="https://adistore.by/wp-content/uploads/2022/06/8a31a58d20f4410683d3ac8200d45ec1_9366.png" alt="Aeroready shirt" class="product-img">
            <h2 class="product-title">Aeroready shirt</h2>
            <span class="price">$25</span>
            <i class='bx bx-shopping-bag add-cart'></i>
        </div>

        <!-- box 2 -->
        <div class="product-box">
            <img src="https://i.bulavka.by/lots42/427431.webp" alt="Wireless earbud" class="product-img">
            <h2 class="product-title">Wireless earbud</h2>
            <span class="price">$55</span>
            <i class='bx bx-shopping-bag add-cart'></i>
        </div>

        <!-- box 3 -->
        <div class="product-box">
            <img src="https://adistore.by/wp-content/uploads/2021/11/Shapka_s_pomponom_Adicolor_Collegiate_chernyj_H35510_01_standard-460x460.jpg" alt="Hooded parka" class="product-img">
            <h2 class="product-title">Hooded parka</h2>
            <span class="price">$125</span>
            <i class='bx bx-shopping-bag add-cart'></i>
        </div>

        <!-- box 4 -->
        <div class="product-box">
            <img src="https://adilike.kiev.ua/image/cache/catalog/000000/GT6552-750x750.jpg" alt="Metal bottle" class="product-img">
            <h2 class="product-title">Metal bottle</h2>
            <span class="price">$45</span>
            <i class='bx bx-shopping-bag add-cart'></i>
        </div>

        <!-- box 5 -->
        <div class="product-box">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-iwBEdpFuEk15oB-ggKj48LdazW86ZMlCSw&usqp=CAU" alt="silver metal" class="product-img">
            <h2 class="product-title">silver metal</h2>
            <span class="price">$90</span>
            <i class='bx bx-shopping-bag add-cart'></i>
        </div>

        <!-- box 6 -->
        <div class="product-box">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9rzL2yGud0UE7UBdJ9jQMfPo6UFqf7fJ6MA&usqp=CAU" alt="Back hat" class="product-img">
            <h2 class="product-title">Back hat</h2>
            <span class="price">$225</span>
            <i class='bx bx-shopping-bag add-cart'></i>
        </div>

        <!-- box 7 -->
        <div class="product-box">
            <img src="https://img4.goodfon.ru/wallpaper/nbig/7/a1/seksualnaia-rusaia-devushka-sidit-na-polu-v-chernom-poza-fig.jpg" alt="Backpack" class="product-img">
            <h2 class="product-title">Backpack</h2>
            <span class="price">$425</span>
            <i class='bx bx-shopping-bag add-cart'></i>
        </div>

        <!-- box 8 -->
        <div class="product-box">
            <img src="https://damion.club/uploads/posts/2022-11/1669168398_damion-club-p-odezhda-dlya-sobak-adidas-pinterest-1.jpg" alt="Ultraboost 22" class="product-img">
            <h2 class="product-title">Ultraboost 22</h2>
            <span class="price">$90</span>
            <i class='bx bx-shopping-bag add-cart'></i>
        </div>
    </div>

</section>
</body>

<style>
    /* Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');



    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        scroll-padding-top: 2rem;
        scroll-behavior: smooth;
    }

    :root {
        --main-color: #fd4646;
        --text-color: #171427;
        --bg-color: #fff;
    }

    body {
        font-family: 'Poppins', sans-serif;
        color: var(--text-color);
        font-weight: 400;
    }

    ul,
    li {
        list-style: none;
    }

    a {
        text-decoration: none;
    }

    img {
        width: 100%;
    }

    /* ==========  ==================== */

    .container {
        max-width: 1068px;
        margin: auto;
        width: 100%;
    }

    section {
        padding: 4rem 0 3rem;
    }

    /* ========== HEADER ==================== */
    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: var(--bg-color);
        box-shadow: 0 1px 4px hsl(0 4% 15% / 10%);
        z-index: 100;
    }

    .nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 0;
    }

    .logo {
        font-size: 1.1rem;
        color: var(--text-color);
    }

    #cart-icon {
        font-size: 1.8rem;
        cursor: pointer;
    }

    /* ========== CART ==================== */
    .cart {
        position: fixed;
        top: 0;
        right: -100%;
        width: 360px;
        min-height: 100vh;
        padding: 20px;
        background-color: var(--bg-color);
        box-shadow: -2px 0 4px hsl(0 4% 15% / 10%);
        transition: right 0.3s;
    }

    .cart.active {
        right: 0;
    }

    .cart-title {
        font-size: 1.5rem;
        font-weight: 600;
        text-align: center;
        margin-top: 2rem;
    }

    .cart-box {
        display: grid;
        grid-template-columns: 32% 50% 18%;
        gap: 1rem;
        align-items: center;
        margin-top: 1rem;
    }

    .cart-img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        padding: 10px;
    }

    .detail-box {
        display: grid;
        row-gap: 0.5rem;
    }

    .cart-product-title {
        font-size: 1rem;
        text-transform: uppercase;
    }

    .cart-price {
        font-weight: 500;
    }

    .cart-quantity {
        border: 1px solid var(--text-color);
        outline-color: var(--main-color);
        width: 2.4rem;
        font-size: 1rem;
        text-align: center;
    }

    .cart-remove {
        font-size: 1.5rem;
        color: var(--main-color);
        cursor: pointer;
    }

    .total {
        display: flex;
        justify-content: flex-end;
        margin-top: 1.5rem;
        border-top: 1px solid var(--text-color);
    }

    .total-title {
        font-size: 1rem;
        font-weight: 600;
    }

    .total-price {
        margin-left: 0.5rem;
    }

    .btn-buy {
        display: flex;
        margin: 1.5rem auto 0 auto;
        padding: 12px 20px;
        font-size: 1rem;
        font-weight: 500;
        border: none;
        background-color: var(--main-color);
        color: var(--bg-color);
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-buy:hover {
        background-color: var(--text-color);
    }

    #close-cart {
        position: absolute;
        top: 1rem;
        right: 0.8rem;
        color: var(--text-color);
        font-size: 2rem;
        cursor: pointer;
    }


    .shop {
        margin-top: 2rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    /* ========== SHOP CONTENT ==================== */
    .shop-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, auto));
        gap: 1.5rem;
    }

    .product-box {
        position: relative;
    }

    .product-box:hover {
        padding: 10px;
        border: 1px solid var(--text-color);
        transition: padding 0.4s;
    }

    .product-img {
        width: 100%;
        height: 300px;
        margin-bottom: 0.5rem;
        object-fit: cover;
    }

    .product-title {
        font-size: 1.1rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .price {
        font-weight: 500;
    }

    .add-cart {
        position: absolute;
        bottom: 0;
        right: 0;
        background-color: var(--text-color);
        color: var(--bg-color);
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .add-cart:hover {
        background-color: rgba(23, 20, 39, 0.8);
    }

    /* ========== Breakpoints ==================== */
    @media (max-width: 1080px) {
        .nav {
            padding: 15px;
        }

        section {
            padding: 3rem 0 2rem;
        }

        .container {
            margin: 0 auto;
            width: 90%;
        }

        .shop {
            margin-top: 2rem !important;
        }
    }

    @media (max-width: 400px) {
        .nav {
            padding: 11px;
        }

        .logo {
            font-size: 1rem;
        }

        .cart {
            width: 320px;
        }
    }

    @media (max-width: 360px) {
        .shop {
            margin-top: 1rem !important;
        }

        .cart {
            width: 280px;
        }
    }
</style>