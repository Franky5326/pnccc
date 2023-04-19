<main>
    <div class="choice">
        <div class="container">
            <h3>Все читатели</h3>
            <?php
            if (app()->auth::check()):
                ?>
                <form method="post">
                    <div class="choice_inner">
                        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                        <select name="book_id">
                            <?php
                            foreach ($books as $book) {
                                ?>
                                <option value="<?= $book->id?>"><?= $book->name?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <p>Выбор книги</p>
                        <button>Найти</button>
                    </div>
                </form>
            <?php
            endif;
            ?>
        </div>
    </div>
    <div class="books">
        <div class="container">
            <div class="books_inner">
                <?php
                foreach ($readers as $reader) {
                    ?>
                    <a href="<?= app()->route->getUrl("/profile?id=$reader->id") ?>"><div class="book">
                            <div class="books_content">
                                <p>Имя пользователя: <?= $reader->first_name ?> <?= $reader->last_name ?></p>
                                <p>Номер читательского билета: <?= $reader->id ?></p>
                                <p>Номер телефона: <?= $reader->number ?></p>
                            </div>

                        </div></a>
                    <?php
                }
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
    .book{
        border: 1px solid #808080;
        width: 500px;
        margin: 20px auto;
        padding: 20px 30px;

    }
    .books_content{
        width: 100%;
    }
    img{
        width: 230px;
        margin-left: 100px;
    }
    button{
        padding: 3px 30px;
        margin-left: 40px;
        background-color: #808080;
        border: 1px solid darkslategrey;
    }
</style>