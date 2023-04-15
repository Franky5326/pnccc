<div class="choice">
    <div class="container">
        <h3><?= $reader[8]->first_name?> <?= $reader[8]->last_name?></h3>
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
                <p>Добавить книгу читателю</p>
            </div>
        <?php
        endif;
        ?>
    </div>
</div>

<div class="books">
    <div class="container">
        <div class="books_inner">
            <div class="books_item">
                <div class="div"></div>
                <div class="books_content">
                    <p>Гордость и предубеждение</p>
                    <p>Джейн Остин</p>
                    <p>1813 год</p>
                    <p class="book_text">В небогатом семействе Беннет – пять дочерей, мать мечтает лишь о том, как бы выдать их замуж. Рядом поселяется состоятельный молодой джентльмен по имени мистер Бингли вместе с холостым и обеспеченным другом мистером Дарси. Бингли знакомится со старшей дочерью Джейн и между ними возникает взаимная симпатия. В свою очередь Элизабет удалось покорить сердце Дарси. Но энергичной красавице он кажется надменным и самодовольным, да и слишком большой казалась разница в их общественном положении. Лишь постепенно Элизабет преодолевает своё предубеждение, а мистер Дарси забывает о гордости, и их соединяет настоящая любовь.</p>
                    <p class="book_data">Дата сдачи : 10.04.2023</p>
                </div>
            </div>
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
        border: 1px solid #808080;
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
</style>