<?php
/*
1.1. В таблице содержится такая информация:
- название товара (нужно сделать ссылкой на страницу отзывов о товаре пункт-3);
- маленькое изображение;
- дата добавления (генерировать автоматически при записи в БД);
- имя добавившего товар;
- количество отзывов;
1.2. Необходимо реализовать сортировку по всем возможным полям.
*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Мои товары</title>
    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/template/css/sort.css" rel="stylesheet" type="text/css" media="screen"/>
    <script src="/template/js/sort.js"></script>
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
<div id="wrapper">
    <div id="header-wrapper">
        <div id="header">
            <div id="logo">
                <h1>Перечень товара</h1><br/>
            </div>
        </div>
    </div>
    <div id="page">
        <div id="page-bgtop">
            <table class="table_sort table-td">
                <thead>
                <tr style="background: #ffc912; height: 50px">
                    <td><b>Изображение</b></td>
                    <td><b>Название товара</b></td>
                    <td><b>Цена</b></td>
                    <td><b>Дата добавления</b></td>
                    <td><b>Имя добвившего товар</b></td>
                    <td><b>Кол-во отзывов</b></td>
                </tr>
                </thead>
                <tbody>
                <p style="display: none" ><?= $count = 0?></p>
                <?php foreach ($productList as $p): ?>
                    <tr style="border-bottom: solid #b6b6b6 1px;height: 60px; text-align: center;">
                        <td>
                            <img src="<?php echo $p['img']; ?>" width="100" height="30" alt=""/>
                        </td>
                        <td><b><a href="/review/<?php echo $p['id']; ?>"
                                  target="_blank" style="text-decoration: none; color: black"><?php echo $p['name']; ?></a></b>
                        </td>
                        <td class="" id="date_to_add"><?php echo $p['price']; ?></td>
                        <td class="" id="date_to_add"><?php echo $p['date_to_add']; ?></td>
                        <td class="" id="name_who_add" style="line-height: 2;"><?php echo $p['name_who_add']; ?></td>

                        <td style="line-height: 2;"><?php echo $countReview[$count]; ?></td>
                    </tr>
                    <p style="display: none" ><?= $count++?></p>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="footer"><p>Copyright (c) 2021 by Aleksandr A. Stanov</p></div>
</body>
</html>
