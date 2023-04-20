<div class="choice choice_inner">
    <div class="container">
        <h3><?= $readers[0]->first_name?> <?= $readers[0]->last_name?></h3>
    </div>
</div>

<div class="books">
    <div class="container">
        <div class="choice_inner">
            <?php
            foreach ($readers[0]->readBook as $book) {
                ?>
                <div class="books_item">
                    <img class="div" src="../../pop-it-mvc/public/assets/img/<?= $book->book->photo?>" alt="img">
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
            ?>
        </div>
    </div>
</div>
<style>
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