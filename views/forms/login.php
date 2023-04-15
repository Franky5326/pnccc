<main>
    <div class="choice">
        <div class="container">
            <h3>Авторизация</h3>
            <p class="Error"><?= $message ?? ''; ?></p>
        </div>
    </div>
    <h3><?= app()->auth->user()->name ?? ''; ?></h3>
    <?php
    if (!app()->auth::check()):
    ?>
    <div class="forms">
        <div class="container">
            <form method="post">
                <div class="form_inner">

                    <div class="form_item">
                        <label for="login">Логин</label>
                        <input id="login" name="login" type="text">

                    </div>
                    <div class="form_item">
                        <label for="password">Пароль</label>
                        <input id="password" name="password" type="text">

                    </div>

                    <button class="form_submit">Войти</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php endif;?>
<style>
    .Error{
        text-align: center;
        color: red;
        margin: 10px 0;
    }
    .choice{
        margin: 30px 0;
    }
    h3{
        text-align: center;
        text-transform: uppercase;
    }
    .choice_inner{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px 0;
    }
    select{
        margin-right: 40px;
    }
    form{
        margin: 0 auto;
        max-width: 300px;
    }
    .form_inner{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        width: 200px;
        margin-bottom: 100px;

    }
    .form_item{
        margin: 10px 0 0 30px;
    }
    .form_item_photo{
        margin: 10px 0 0 10px;
    }
    .form_item_photo label {
        margin: 10px 0 0 20px;

    }
    input{
        padding: 5px 30px;
    }
    .form_item_date{
        padding: 5px 60px;
    }
    textarea{
        resize: none;
    }
    .form_submit{
        margin: 20px auto;
        margin-right: 5px;
        padding: 5px 30px;
        background-color: #808080;
        border: 1px solid #808080;
    }
</style>