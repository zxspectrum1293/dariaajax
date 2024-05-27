<?php
// Запись свойств для вывода в <head> страницы
$html_description = '';
$html_keywords = "";
$html_title = 'Админ-панель Хлебушка';

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
        <tr width="100%">
            <td class="left">

            <table>
                <tr valign="top">
                    <!-- Импорт Меню из PHP файла -->
                    <td>
                        <?php include("blocks/menu.php"); ?>
                    </td>
        
                    <!-- Контент -->
                    <td>
                        <h1 align="center">Добавление новой категории выпечки</h1>
                        <div class="response"></div>
                        <!-- Форма добавления категории -->
                        <form align="center" id="form1" method="POST">
                        <input type="hidden" name="action" value="1">
                            Название категории <br>
                            <input type="text" name="category_name" id="category_name">
                            <br><br>

                            <input type="submit" value="Создать">
                        </form>
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