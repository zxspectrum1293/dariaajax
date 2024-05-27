<?php
// Запись свойств для вывода в <head> страницы
$html_description = '';
$html_keywords = "";
$html_title = 'Удаление выпечки';

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
                        <h1 align="center">Удаление выпечки</h1>
                        <div class="response"></div>
                        <!-- Форма удаления выпечки -->
                        <form align="center" id="form6" method="POST">
                        <input type="hidden" name="action" value="6">
                            Выбор удаляемой выпечки <br>
                            <select name="product_id" id="product_id">
                                <option value="">Выберите выпечку</option>
                                
                                <!-- Вывод выпечки из базы данных -->
                                <?php
                                    include("scripts/db.php"); // Импорт подключения к базе данных
            
                                    $result = mysqli_query($db, "SELECT * FROM products"); // Запрос к БД
            
                                    // Пока из результата не прочитана вся выпечка
                                    while($product = mysqli_fetch_array($result)) {
                                        // Вывести вариант ответа в select
                                        echo "<option value=". $product['id'] .">";
                                        echo $product['name'] ."</option>"; 
                                    }
                                ?>
                            </select>

                            <br><br>
                            <input type="submit" value="Удалить">
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