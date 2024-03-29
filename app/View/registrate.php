<html>

<head>

    <meta charset="utf-8">

    <title>Пример страницы с кодировкой UTF-8</title>

</head>

<body id="signup">

<main class="container">

    <div class="back"></div>
    <div class="brand">
        <div class="logo">
            <abbr>
            <img height="" src="https://i.imgur.com/E3uTxXY.png" alt="Panda Logo" />
            <h1>
                <span class="name"><span>Онлайн</span><span></span></span>магазин
            </h1>


            <h1>
                <span class="name"><span>Panda</span><span></span></span>Logo
            </h1>
        </div>
        </abbr>
        <span class="copyright">
        <a href="https://unsplash.com/@filipz" target="_blank" title="Photographer"></a>

        <a href="https://unsplash.com/photos/QsWG0kjPQRY" target="_blank" title="Background Photo"></a></span>
    </div>

    <div class="formWrapper">
        <meta charset=»UTF-8″>
        <div class="form">
            <h2>Форма регистрации</h2>
            <form id="form" method="POST" action="/registrate">
                <div class="inputWrapper">
                    <input type="text" name="name" id="name" required />
                    <?php if (isset($errors['name'])): ?>
                        <label style="color: red"><?php echo $errors['name']; ?></label>
                    <?php endif; ?>
                    <label for="first">Имя</label>

                </div>
                <div class="inputWrapper">
                    <input type="text" name="surname" id="surname" required />
                    <label for="last">Фамилия</label>
                    <?php if (isset($errors['surname'])): ?>
                        <label style="color: red"><?php echo $errors['surname']; ?></label>
                    <?php endif; ?>

                </div>
                <div class="inputWrapper">
                    <input type="email" name="email" id="email" required />
                    <label for="email">Введите почту</label>
                    <?php if (isset($errors['email'])): ?>
                        <label style="color: red"><?php echo $errors['email']; ?></label>
                    <?php endif; ?>
                </div>
                <div class="inputWrapper">
                    <input type="tel" name="phone" id="phone" required />
                    <label for="phone">Номер телефона</label>
                    <?php if (isset($errors['phone'])): ?>
                        <label style="color: red"><?php echo $errors['phone']; ?></label>
                    <?php endif; ?>
                </div>
                <div class="inputWrapper">
                    <input type="password" name="password" id="password" required />
                    <label for="password">Пароль</label>
                    <?php if (isset($errors['password'])): ?>
                        <label style="color: red"><?php echo $errors['password']; ?></label>
                    <?php endif; ?>
                </div>
                <div class="inputWrapper">
                    <input type="password" name="c_password" id="c_password" required />
                    <label for="c_password">Повторить пароль</label>
                    <?php if (isset($errors['c_password'])): ?>
                        <label style="color: red"><?php echo $errors['c_password']; ?></label>
                    <?php endif; ?>
                </div>
            </form>
            <input form="form" type="submit" name="register" id="register" value="Регистрация" />
            <span id="login">Уже зарегистрированы? <a href="/login" title="Login">Логин</a></span>
        </div>
    </div>
</main>
</body>

<style>



    :root {
        --font: "Lato", sans-serif;
        --max-width: 1400px;
        --radius: 12px;
        --btn-radius: 4px;
        --i-padding: 1rem;
        --o-padding: 2rem;
    }

    * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0;
    }

    body {
        margin: 0 var(--o-padding);
        font-family: var(--font);
        color: black;
        background: -webkit-gradient(
                linear,
                left bottom,
                left top,
                from(#c5c5c5),
                to(#f5f5f5)
        );
        background: -o-linear-gradient(bottom, #c5c5c5, #f5f5f5);
        background: linear-gradient(0deg, #c5c5c5, #f5f5f5);
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        max-width: var(--max-width);
        width: 100%;
        min-height: 600px;
        height: 100%;
        margin: auto;
        overflow: hidden;
        /*position: relative;*/
        border-radius: var(--radius);
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-shadow: 0 10px 1rem #0004;
        box-shadow: 0 10px 1rem #0004;
    }

    .back {
        position: absolute;
        left: 0;
        top: 0;
        background: url("https://bogatyr.club/uploads/posts/2023-03/thumbs/1677638130_bogatyr-club-p-sochnii-apelsin-foni-oboi-13.jpg") center / cover no-repeat;
        height: 100%;
        width: 100%;
        z-index: -1;
    }

    .brand {
        width: 40%;
        padding: var(--i-padding);
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        justify-content: end;
        position: relative;
    }

    .brand .logo {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        gap: 5px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        pointer-events: none;
        position: absolute;
        left: 49%;
        top: 5rem;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
    }
    .brand .logo h1 {
        color: #392f32;
        text-transform: uppercase;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        font-size: 34px;
        font-weight: 400;
        letter-spacing: -1px;
    }
    .brand .logo .name {
        padding-left: 2px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        font-size: 20px;
        letter-spacing: 12px;
        font-weight: 400;
    }

    .brand .copyright {
        font-size: 13px;
        font-weight: 300;
        text-align: center;
        color: #fffa;
    }
    .brand .copyright a {
        -webkit-transition: color 0.2s ease;
        -o-transition: color 0.2s ease;
        transition: color 0.2s ease;
        color: #fffa;
    }
    .brand .copyright a:hover {
        color: #fff;
    }

    .formWrapper {
        width: 60%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        padding: var(--o-padding);
        background: #fff1;
        border-left: solid 1px #0001;
        -webkit-backdrop-filter: blur(8px);
        backdrop-filter: blur(8px);
    }

    .formWrapper .form {
        width: 100%;
        max-width: 504px;
        margin: auto;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        gap: var(--o-padding);
    }

    .formWrapper .form h2 {
        text-transform: uppercase;
        text-align: center;
        font-weight: 400;
        padding-bottom: 10px;
        border-bottom: solid 1px #0001;
    }

    form {
        display: -ms-grid;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: calc(var(--i-padding) + 6px);
        justify-items: center;
    }

    .inputWrapper {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        position: relative;
    }
    .inputWrapper input {
        border: none;
        font-size: 16px;
        outline: 0;
        border-radius: var(--btn-radius);
        background: #fff2;
        border: solid 1px #0001;
        padding: var(--i-padding);
        min-width: 40%;
        cursor: text;
    }

    .inputWrapper label {
        cursor: text;
        padding: 4px 6px;
        color: #0006;
        position: absolute;
        left: calc(1rem - 4px);
        top: 10px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-transform-origin: left;
        -ms-transform-origin: left;
        transform-origin: left;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        -webkit-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    .inputWrapper input:focus + label,
    .inputWrapper input:valid + label {
        color: #fff;
        text-shadow: 0 1px 4px #0009;
        top: -14px;
        left: 11px;
        -webkit-transform: scale(0.8);
        -ms-transform: scale(0.8);
        transform: scale(0.8);
    }

    #register {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        min-height: initial;
        height: 47px;
        width: 100%;
        max-width: 230px;
        background: #0007;
        padding: var(--i-padding);
        color: #fff;
        border: unset;
        border-radius: var(--btn-radius);
        cursor: pointer;
        -webkit-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }
    #register:hover {
        background: #000;
    }

    #login {
        font-size: 14px;
        font-weight: 300;
        color: #fff9;
        margin: 0 auto;
        margin-top: -20px;
    }
    #login a {
        text-decoration: none;
        color: #fff;
    }

    @media (max-width: 860px) {
        .container {
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
        .container .brand,
        .container .formWrapper {
            width: 100%;
        }
        .container .brand {
            min-height: 160px;
        }
        .container .brand .copyright {
            display: none;
        }
    }


</style>

