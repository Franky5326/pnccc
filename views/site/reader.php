<main>
    <div class="choice">
        <div class="container">
            <h3>Все читатели</h3>
            <?php
            if (app()->auth::check()):
                ?>
                <div class="choice_inner">

                    <select name="readers">
                        <?php
                        foreach ($books as $book) {
                            ?>
                            <option value="<?= $book->name?>"><?= $book->name?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <p>Выбор книги</p>
                </div>
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
                <a href="<?= app()->route->getUrl('/profile') ?>"><div class="book">
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
    .date{
        text-align: right;
    }
    .books_content{
        width: 100%;
    }
    img{
        width: 230px;
        margin-left: 100px;
    }
</style>