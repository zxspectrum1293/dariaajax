<?php
// Запись свойств для вывода в <head> страницы
$html_description = 'Пекарня "Хлебушек". Хлеб здесь делают на живой закваске, вручную, благодаря чему он получается ещё вкусней. Попробуйте наши булочки, пирожные и пирожки.';
$html_keywords = "Пекарня Хлебушек, выпечка, хлеб, пирожные, пирожки, сладкая выпечка, сытная выпечка";
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
            <td class="left">

            <table>
                <tr valign="top">
                    <!-- Импорт Меню из PHP файла -->
                    <td>
                        <?php include("blocks/menu.php"); ?>
                    </td>
        
                    <!-- Контент -->
                    <td>
                        <h1 align="center">О нас</h1>
                        <p>Пекарня "Хлебушек" была открыта в 2023 году.</p>
                        <p>Каждый день мы печем хлеб, пирожки, делаем пирожные для наших дорогих покупателей.</p>
                        <p>Наш адрес: <b>ул. Хлебная, д. 8</b></p>
                        <p align="center">
                            <img src="img/img.jfif" width="100%">
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