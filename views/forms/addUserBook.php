<main>
    <div class="choice">
        <div class="container">
            <h3>Добавление книги читателю</h3>
        </div>
    </div>
    <div class="forms">
        <div class="container">
            <form action="" method="post">
                <div class="form_inner">
                    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                    <div class="form_item">
                        <p>Выбор читателя</p>
                        <select name="library_card_id">
                            <?php
                            foreach ($readers as $reader) {
                                ?>
                                <option value="<?= $reader->id?>"><?= $reader->last_name?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form_item">
                        <p>Выбор книги</p>
                        <select name="book_id">
                            <?php
                            foreach ($books as $book) {
                                if ($book->count > 0):
                                    ?>
                                    <option value="<?= $book->id?>"><?= $book->name?></option>
                                <?php
                                endif;
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form_item">
                        <label for="date_of_issue">Дата выдачи</label>
                        <input id="date_of_issue" name="date_of_issue" type="date">
                        <p class="Error"><?= $message['date_of_issue'][0] ?? ''; ?></p>

                    </div>
                    <div class="form_item">
                        <label for="delivery_date">Дата сдачи</label>
                        <input class="input" id="delivery_date" name="delivery_date" type="date">
                        <p class="Error"><?= $message['delivery_date'][0] ?? ''; ?></p>

                    </div>


                </div>
                <button class="form_submit">Добавить</button>
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
        /*max-width: 400px;*/
        width: 450px;
        position: relative;
    }
    .form_inner{
        display: block;
        margin: 0 auto;
        width: 100%;
        margin-bottom: 20px;

    }
    .form_item{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0 0 30px;
    }
    .form_item_photo{
        margin: 10px 0 0 10px;
    }
    .form_item_photo label {
        margin: 10px 0 0 20px;

    }
    input{
        padding: 5px 30px;
        margin-left:45px ;
    }
    .input{
        padding: 5px 30px;
        margin-left:55px ;
    }
    textarea{
        resize: none;
    }
    .form_submit{
        margin: 0 auto;
        padding: 5px 30px;
        background-color: #808080;
        border: 1px solid #808080;
        position: absolute;
        z-index: 1;
        bottom: -50px;
        left: 150px;
    }
    .Error{
        text-align: center;
        color: red;

    }
</style>