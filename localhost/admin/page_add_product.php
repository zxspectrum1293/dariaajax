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
                    <td width="100%">
                        <h1 align="center">Добавление новой выпечки</h1>
                        <div class="response"></div>
                        <!-- Форма добавления категории -->
                        <form align="center" id="form4" method="POST">
                        <input type="hidden" name="action" value="4">
                            Выбор категории <br>
                            <select name="category_id" id="category_id">
                                <option value="">Выберите категорию</option>
                                
                                <!-- Вывод категорий из базы данных -->
                                <?php
                                    include("scripts/db.php"); // Импорт подключения к базе данных
            
                                    $result = mysqli_query($db, "SELECT * FROM categories"); // Запрос к БД
            
                                    // Пока из результата не прочитаны все категории
                                    while($category = mysqli_fetch_array($result)) {
                                        // Вывести вариант ответа в select
                                        echo "<option value=". $category['id'] .">";
                                        echo $category['name'] ."</option>"; 
                                    }
                                ?>
                            </select>

                            <br><br>
                            Название выпечки <br>
                            <input type="text" name="product_name" id="product_name">
                            
                            <br><br>
                            Адрес картинки из интернета <br>
                            <input type="text" name="product_img" id="product_img">
                            
                            <br><br>
                            Описание с html тегами <br>
                            <textarea name="product_description" id="product_description" rows="6"></textarea>

                            <br><br>
                            Цена (число) <br>
                            <input type="number" name="product_price" id="product_price">

                            <br><br>
                            <input type="submit" value="Создать">
                            <br><br>
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