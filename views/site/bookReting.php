<div class="choice">
    <div class="container">
        <h3>Рейтинг книг</h3>


    </div>
</div>

<div class="books">
    <div class="container">
        <div class="books_inner">


            <div class="books_item">
                <h4>Книги на руках</h4>
                <?php
                foreach ($books as $key=>$book) {
                    ?>
                    <p><?= $book->name ?></p>
                    <?php
                }
                ?>
            </div>



            <div class="books_item">
                <h4>шт</h4>
                <?php
                foreach ($arr as $a) {
                    ?>
                    <p><?= $a?></p>
                    <?php
                }
                ?>
            </div>


        </div>
    </div>
</div>

<style>

    button{
        padding: 3px 30px;
        margin-left: 40px;
        background-color: #808080;
        border: 1px solid darkslategrey;
    }
    .choice{
        margin: 30px 0;
    }
    h3{
        text-align: center;
        text-transform: uppercase;
    }

    /* books */
    .books_inner{
        width: 500px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;

    }
    .books_item {
        margin: 30px 0;
    }
    .books_item p{
        margin: 20px 0;
    }
    .books_content a{
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
        color: #808080;
    }

</style>