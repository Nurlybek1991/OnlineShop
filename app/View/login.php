
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<header>
    <img height="100" src="https://i.imgur.com/E3uTxXY.png" alt="Panda Logo" />


<!--    <h1>-->
<!--        <span class="name"><span>Panda</span><span></span></span>Logo-->
<!--    </h1>-->
    <h2 class="logo">Panda Logo</h2>
    <nav class="navigation">
        <a href="/main">Главная страница</a>
        <a href="#">Инфо</a>
        <a href="#">Сервисы</a>
        <a href="#">Обратная связь</a>
        <button class="login-btn">Логин</button>
    </nav>

</header>

<div class="container">
    <div class="form-box login">
        <h2 class="head">Логин</h2>
        <form id="form" method="POST" action="/login">
            <div class="input-box">
                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                <?php if (isset($errors['login'])): ?>
                    <label style="color: red"><?php echo $errors['login']; ?></label>
                <?php endif; ?>
                <input name = "login" type="email" id="email">
                <label id="e_label">Почта</label>
            </div>
            <div class="input-box">
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
                <?php if (isset($errors['password'])): ?>
                    <label style="color: red"><?php echo $errors['password']; ?></label>
                <?php endif; ?>
                <input name = "password"  type="password" id="pass" >
                <label id="p_label">Пароль</label>
            </div>
<!--            <div class="remember-forget">-->
<!--                <label for=""><input type="checkbox">Сохранить</label><a href="/registrate">забыли пароль?</a>-->
<!--            </div>-->
            <button type="submit" class="btn">Логин
            </button>
            <div class="login-register">
                <p>У вас нет аккаунта?<a href="/registrate">Зарегистироваться?</a></p>
            </div>
        </form>
    </div>

</div>

</body>
</html>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }
    body{
        height: 100vh;
        width:100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url("https://img1.akspic.ru/crops/9/6/4/8/6/168469/168469-ananas-limon-ananas_yabloko-frukty-voda-1920x1080.jpg");
        background-size: cover;
        background-repeat: no-repeat;


    }

    /* header start */
    header{
        width: 100vw;
        /*   height:80px; */
        background-color:lightseagreen;
        padding: 20px 100px;
        position: fixed;
        left: 0;
        top: 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        opacity: 0.9;
        box-shadow: 0px 0px 5px white;
        overflow:hidden;
    }

    .logo{
        font-size: 2em;
        color: aliceblue;
    }

    .navigation a{
        position: relative;
        font-size: 1.2em;
        color: aliceblue;
        text-decoration: none;
        font-weight: 500;
        margin-left: 40px;
    }
    .navigation a::after{
        content: "";
        position: absolute;
        left: 0px;
        bottom: -7px;
        width: 100%;
        height: 3px;
        background-color: aliceblue;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.5s;
    }

    .navigation a:hover::after{
        transform: scaleX(1);
        transform-origin: left;
    }
    .navigation .login-btn{
        text-align: center;
        font-size: 1.5em;
        height: 45px;
        width:140px;
        border:2px solid white;
        background-color:#274C4A;
        margin-left: 20px;
        color:aliceblue;
        border-radius: 20px;

    }

    .login-btn:hover{
        background-color: rgba(241, 241, 241, 0.8);
        color:#274C4A;
    }
    .container:hover{
        opacity:1;

    }

    /*header end */

    /*form container start */
    .container{
        position: relative;
        width: 300px;
        height: 370px;
        background-color: transparent;
        border: 2px solid #274C4A;
        border-radius: 20px;
        backdrop-filter:blur(10px);
        box-shadow: 0px 0px 10px rgb(192, 196, 192);
        display: flex;
        align-items: center;
        justify-content: center;
        tansition:all 1s;

    }

    .container .form-box{
        width: 100%;
        padding: 10%;

    }
    .form-box h2{
        font-size: 2em;
        color: #274C4A;
        text-align: center;
    }
    .form-box .input-box{
        position: relative;
        width: 100%;
        height: 45px;
        border-bottom: 2px solid  #274C4A ;
        margin: 30px 0px;
    }

    .form-box .input-box label{
        position: relative;
        top:20%;
        left: 5px;
        transform: translateY(-50%);
        font-weight: 500;
        color: #274C4A;
    }

    .input-box input{
        width: 100%;
        height: 100%;
        background-color: transparent;
        border: none;
        outline: none;
        color: #274C4A;
        font-size: 1em;
    }
    label{
        transition: 1s;
    }
    .input-box input:focus ~ label{
        top: -5px;
        opacity:0;
    }


    .input-box .icon{
        font-size: 1.2em;
        position: absolute;
        right: 5px;
        line-height:45px;
        color: #274C4A;

    }

    .remember-forget {
        font-size: 0.9em;
        color: #274C4A;
        display: flex;
        justify-content: space-between;
    }

    .remember-forget a{
        font-size: 1em;
        color: #274C4A;
        text-decoration: none;
        font-weight: 500s;
    }

    .remember-forget label input{
        accent-color: black;
        margin-right: 5px;
    }
    .remember-forget a:hover{
        text-decoration: underline;
    }
    .btn {
        width: 100%;
        height: 50px;
        border: none;
        border-radius: 20px;
        margin: 30px 0px;
        font-weight: 600;
        font-size: 1.2em;
        color: #fff;
        background-color: #274c4a98;

    }
    .btn:hover{
        color:#274C4A;
        background-color: rgba(221, 218, 218, 0.709);

    }

    .login-register{
        font-size: 0.9em;
        color: #ffffff;
        text-align: center;
        margin: -17px 0px;
        padding: 5px;
    }
    .login-register p a{
        color: #ffffff;
        text-decoration: none;
        font-size: 1.3em;
    }
    .login-register p a:hover{
        text-decoration: underline;
    }

    /* form container end */
    @media screen and (max-width:843px) {
        header .login-btn{
            display:none;
        }
        .container .head{
            color:#fff;
        }
        .form-box .input-box label{
            color:#fff;
        }

    }


</style>