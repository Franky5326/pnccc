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
                    <div class="form_item">
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
                    <p>Выбор читателя</p>
                    <div class="form_item">
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
                        <p>Выбор книги</p>

                    </div>
                    <div class="form_item">
                        <label for="date_of_issue">Дата выдачи</label>
                        <input id="date_of_issue" name="date_of_issue" type="date">

                    </div>
                    <div class="form_item">
                        <label for="delivery_date">Дата сдачи</label>
                        <input id="delivery_date" name="delivery_date" type="date">

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
</style>