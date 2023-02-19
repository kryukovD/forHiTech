<? include $_SERVER["DOCUMENT_ROOT"] . "/test/include/header.php"; ?>
<section class="section-form">
    <div class="  cst-container">
        <div class="section-form__wrap">
        <h2 class="section-form__title">Авторизация</h2>
        <form action="/test/index.php" method="get">
            <div class="form__input-wrap">
                <input class="form__input" type="text" name="name" placeholder="Ваше имя">
            </div>
            <div class="form__input-wrap form__wrap-btn">
                <input class="form__btn" type="submit" value="Отправить">
            </div>
        </form>
    </div>
    </div>
</section>


<? include $_SERVER["DOCUMENT_ROOT"] . "/test/include/footer.php"; ?>