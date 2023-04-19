<main>
    <div class="choice">
        <div class="container">
            <h3>Добавление пользователя</h3>
        </div>
    </div>
    <div class="forms">
        <div class="container">
            <form action="" method="post">
                <div class="form_inner">
                    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                    <div class="form_item">
                        <label for="first_name">Имя</label>
                        <input id="first_name" name="first_name" type="text">
                        <p class="Error"><?= $message['first_name'][0] ?? ''; ?></p>
                    </div>
                    <div class="form_item">
                        <label for="last_name">Фамилия</label>
                        <input id="last_name" name="last_name" type="text">
                        <p class="Error"><?= $message['last_name'][0] ?? ''; ?></p>
                    </div>
                    <div class="form_item">
                        <label for="patronymic">Отчество</label>
                        <input id="patronymic" name="patronymic" type="text">
                    </div>
                    <div class="form_item">
                        <label for="address">Адрес</label>
                        <input id="address" name="address" type="text">
                        <p class="Error"><?= $message['address'][0] ?? ''; ?></p>
                    </div>
                    <div class="form_item">
                        <label for="number">Номер</label>
                        <input id="number" name="number" type="number">
                        <p class="Error"><?= $message['number'][0] ?? ''; ?></p>
                    </div>
                    <button class="form_submit">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</main>
<style>
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
    .Error{
        text-align: center;
        color: red;

    }
</style>