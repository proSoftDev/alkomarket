<!-- POPUP -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- login popup -->
<div class="popup-bg" id="popup-bg" id="login-popup">

    <div class="all-popup login-popup" id="login">
        <form action="/site/login">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
            <a href="#" class="popup__close">
                <img src="/public/images/cross.svg" alt="cross">
            </a>

            <h1>Авторизация</h1>
            <input type="text" placeholder="Логин" name="LoginForm[username]">
            <input type="password" placeholder="Пароль" name="LoginForm[password]">
            <button type="button" class="login-button">Войти</button>

            <div class="forgot-reg def-btns">
                <a href="#forget">Забыли пароль?</a>
                <a href="#register" >Зарегистрироваться?</a>
            </div>

        </form>
    </div>

</div>
<!-- login popup end -->

<script>
    $('body').on('click', '.login-button', function (e) {
        $.ajax({
            type: 'POST',
            url: '/account/login',
            data: $(this).closest('form').serialize(),
            success: function (response) {
                if(response == 1){
                    window.location.href = "/account";
                }else{
                    swal('Ошибка!', response, 'error');
                }
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });
</script>


<!-- register popup -->
<div class="popup-bg" id="register-popup">

    <div class="all-popup register-popup wow" id="register">

        <a href="#popup-bg" class="popup__close">
            <img src="/public/images/cross.svg" alt="cross">
        </a>

        <form action="/account/register">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
            <h1>Регистрация</h1>
            <input type="text" placeholder="ФИО" name="UserProfile[fio]" class="fio">
            <input type="text" placeholder="+7 (987) 654-32-21" class="phone_us" name="UserProfile[telephone]">
            <input type="email" placeholder="E-mail" name="SignupForm[email]">
            <input type="password" placeholder="Пароль" name="SignupForm[password]">
            <input type="password" placeholder="Подвердите пароль" name="SignupForm[password_verify]">
            <button type="button" class="register-button">Зарегистрироваться</button>

            <div class="have-acc def-btns">
                <a href="#login">У меня есть аккаунт</a>
            </div>

        </form>

    </div>

</div>
<!-- register popup end -->



<script>
    $('body').on('click', '.register-button', function (e) {
        $.ajax({
            type: 'POST',
            url: '/account/register',
            data: $(this).closest('form').serialize(),
            success: function (response) {
                if(response == 1){
                    window.location.href = "/account";
                }else{
                    swal('Ошибка!', response, 'error');
                }
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });

    $(".fio").keyup(function(e) {
        var regex = /^[a-zA-Zа-яА-Яа-яА-Я ]+$/;
        if (regex.test(this.value) !== true)
            this.value = this.value.replace(/[^a-zA-Zа-яА-Яа-яА-Я ]+/, '');
    });
</script>

<!-- card popup -->
<div class="popup-bg" id="basket-popup">

    <div class="card-popup" id="basket">
        <a href="#" class="card-close popup__close"><img src="/public/images/cross.svg" alt=""></a>

        <h1>Товар добавлен в корзину!</h1>
        <a class="card-buy" href="/card">Оформить заказ</a>
        <a class="card-continue" style="cursor: pointer;">Продолжить покупки</a>
    </div>

</div>
<!-- card popup end -->

</div>
<!-- POPUP END -->




<!-- update password popup -->
<div class="popup-bg" id="forget_password" >

    <div class="all-popup login-popup" id="forget">
        <form action="/site/updatePassword">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>"/>
            <a href="#" class="popup__close">
                <img src="/public/images/cross.svg" alt="cross">
            </a>

            <h1>Восстановление пароля </h1>
            <input type="text" placeholder="Ваш e-mail" name="ForgetPasswordForm[email]">
            <button type="button" class="update-password-button">Восстановить</button>

        </form>
    </div>

</div>
<!-- update password popup end -->
<script>
    $('body').on('click', '.update-password-button', function (e) {
        $.ajax({
            type: 'POST',
            url: '/account/update-password',
            data: $(this).closest('form').serialize(),
            success: function (response) {
                if(response == 1){
                    swal('Готова!', 'Вам на почту отправлен новый пароль!', 'success');
                }else{
                    swal('Ошибка!', response, 'error');
                }
            },
            error: function () {
                swal('Упс!', 'Что-то пошло не так.', 'error');
            }
        });
    });
</script>


