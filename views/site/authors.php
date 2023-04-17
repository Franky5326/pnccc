<main>
    <div class="choice">
        <div class="container">
            <h3>Автор</h3>
        </div>
    </div>

    <div class="books">
        <div class="container">
            <div class="books_inner">
                <div class="books_item">
                    <div class="div"></div>
                    <div class="books_content">
                        <p><?= $author[0]->first_name ?> <?= $author[0]->last_name?></p>
                        <p>Дата рождения: <?=$author[0]->date_of_birth ?></p>
                        <p>Дата смерти: <?=$author[0]->date_of_dirth ?></p>
                        <p class="book_text"><?=$author[0]->biography ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
    .div {
        width: 300px;
        height: 500px;
        border: 2px solid black;
    }

    .choice {
        margin: 30px 0;
    }

    h3 {
        text-align: center;
        text-transform: uppercase;
    }

    select {
        margin-right: 40px;
    }

    /* books */
    .books_item {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin: 30px 0;
    }


    .books_content {
        width: 50%;
    }

    img {
        width: 230px;
        margin-left: 100px;
    }

    .book_text {
        margin-top: 20px;
    }
</style>