<?php
/*
3. Страница отзывов о товаре состоит из вывода агрегированных отзывов и возможностью добавления нового.
3.1. Добавление нового отзыва состоит из таких полей:
- имя добавившего;
- оценка(выбор от 1 до 10),
- комментарий,
- дата добавления (генерировать автоматически при записи в БД),
3.2. Вывод агрегированных отзывов должен выглядеть так:
- название товара;
- большая картинка товара;
- средняя оценка (должна вычисляться на основании всех оценок этого товара)
- таблица всех отзывов(имя оставившего отзыв, оценка, комментарий, дата)
*/

$product = 0?>
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Мои товары</title>
    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" media="screen"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="/template/js/valid.js"></script>
    <script src="/template/js/validinputview.js"></script>
</head>
<body>
<div id="menu-wrapper">
    <div id="menu">
        <ul>
            <li class="current_page_item"><a href="/products/">ГЛАВНАЯ</a></li>
            <li class="current_page_item"><a href="/add/">ДОБАВИТЬ ТОВАР</a></li>
        </ul>
    </div>
</div>
<h1 style="text-align: center">Все отзывы</h1>
<div id="wrapper">
    <div class="container">
        <div hidden>
            <?php foreach ($reviewItem as $r): ?>
                <? $product = $r['product_id'] ?>
            <?php endforeach; ?>
        </div>
        <form class="well form-horizontal" action="/reviewAdd/<?php echo $prodId; ?>" method="post">
            <fieldset>
                <legend>
                    <center><h2><b>Создание нового отзыва</b></h2></center>
                </legend>
                <br>
                <div class="form-group">
                    <label class="col-md-4 control-label">Ведите Ваше имя</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" id="name_user" name="name" placeholder="Ведите Ваше имя" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Введите Вашу оценку</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-thumbs-up"></i></span>
                            <input type="number" name="appraisal" placeholder="Введите Вашу оценку"
                                   onchange="handleChange(this);" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Введите Ваш отзыв</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-text-size"></i></span>
                            <input type="text" id="comment" name="comment" maxlength="255" placeholder="Введите Ваш отзыв"
                                   class="form-control">
                        </div>
                    </div>
                </div>
                <div class="alert alert-success" role="alert" id="success_message">Success <i
                            class="glyphicon glyphicon-thumbs-up"></i> Success!.
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4"><br>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <button type="submit" class="btn btn-warning">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspОТПРАВИТЬ
                            <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div id="page">
        <div id="page-bgtop">
            <?php foreach ($reviewItem as $r): ?>
                <div class="post">
                    <h1 class="title"><?php echo 'Средняя оценка: ' . $ap; ?></h1>
                    <p class="meta" style="font-size: 18px">
                        Создатель:<?php echo ' ' . $r['name_who_add_review']; ?><br/>
                        <span style="font-size: 12px"> <?php echo $r['date_to_add']; ?></span>
                    <div class="entry">
                        <p><img src="<?php echo $img?>>" width="600" height="200" alt=""/></p>
                        <p style="font-size: 18px"><?php echo $r['comment']; ?></p>
                    </div>
                </div><br/><br/>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div id="footer">
    <p>Copyright (c) 2021 by Aleksandr A. Stanov</p>
</div>
</body>
</html>
