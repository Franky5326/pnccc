<main>
    <div class="choice">
        <div class="container">
            <h3>Просмотр книг</h3>
        </div>
    </div>
    <div class="forms">
        <div class="container">
            <form  method="post">
                <div class="form_inner">
                    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                    <div class="form_item">
                        <label for="username">Читательский билет<input id="username" name="id_read" type="text"></label>
                        <p class="Error"><?= $message['id_read'][0] ?? ''; ?></p>
                    </div>
                    <button class="form_submit">Ввести</button>
                </div>
            </form>
        </div>
    </div>
    <div class="books">
        <div class="container">
            <div class="books_inner">
                <?php
                if ($request->method === 'POST' && isset($readers[0])):{
                    ?>
                    <h3><?= $readers[0]->first_name ?> <?= $readers[0]->last_name ?></h3>

                    <?php
                    if (!isset($readers[0]->readBook[0])):
                        ?>

                        <h3>У читателя нет книг</h3>
                    <?php
                    else:{
                        foreach ($readers[0]->readBook as $book) {
                            ?>

                            <div class="books_item">

                                <img class="div" src="../../PnCC/public/assets/img/<?= $book->book->photo?>" alt="img">
                                <div class="books_content">
                                    <p><?= $book->book->name ?></p>
                                    <p><?= $book->book->author ?></p>
                                    <p><?= $book->book->year ?></p>
                                    <p class="book_text"><?= $book->book->description ?></p>
                                    <p class="book_data">Дата выдачи : <?= $book->date_of_issue ?></p>
                                    <p class="book_data">Дата сдачи : <?= $book->delivery_date ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    endif;
                } elseif ($request->method === 'POST'):
                    ?>
                    <h3>Такого читателя не существует</h3>

                <?php
                endif;
                ?>
            </div>
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
    .div {
        width: 300px;
        height: 500px;
        border: 2px solid black;
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
    /* books */
    .books_item{
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin: 30px 0;
    }
    .book{
        border: 1px solid lightgray;
        width: 500px;
        margin: 20px auto;
        padding: 20px 30px;

    }
    .date{
        text-align: right;
    }
    .books_content{
        width: 50%;
    }
    img{
        width: 230px;
        margin-left: 100px;
    }
    .book_text{
        margin-top: 20px;
    }
    .book_data{
        margin-top: 20px;
    }
    .Error {
        margin-bottom: 15px;
        text-align: center;
        color: red;
    }
</style>