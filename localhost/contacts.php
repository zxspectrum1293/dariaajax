<?php
// Запись свойств для вывода в <head> страницы
$html_description = 'Пекарня "Хлебушек". Звоните нам по телефону, чтобы сделать заказ на самовывоз.';
$html_keywords = "Пекарня Хлебушек контакты, Пекарня Хлебушек заказать, Пекарня Хлебушек телефон";
$html_title = 'О нас';

// Импортировать <head> страницы из PHP файла
include("blocks/head.php");
?>


<body>
    <table width="690" align="center" class="main_table">
        <!-- Логотип -->
        <tr>
            <td>
                <img src="img/logo.jpg" width="690">
            </td>
        </tr>
        
        <!-- Меню и контент -->
        <tr>
            <td class="left" >

            <table >
                <tr valign="top">
                    <!-- Импорт Меню из PHP файла -->
                    <td>
                        <?php include("blocks/menu.php"); ?>
                    </td>
        
                    <!-- Контент -->
                    <td>
                        <h1 align="center">Контакты</h1>
                        <p>Вы можете сделать предзаказ по телефону: <b>+7-123-456-12-34</b></p>
                        <p>Забрать заказ можно <i>с 8:00 до 19:00</i> по адресу: <b>ул. Хлебная, д. 8</b></p>
                        <p>По деловым вопросам пишите на почту: <b>hlebushek@pochta.ru</b></p>
                        <p align="center">
                            <img src="img/karavai.jpg" width="100%">
                        </p>
                    </td>
                </tr>
            </table>

            </td>
        </tr>

        <!-- Импорт Футера из PHP файла-->
        <tr>
            <td>
                <?php include("blocks/footer.php"); ?>
            </td>
        </tr>

    </table>
</body>
</html>