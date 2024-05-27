<?php
// Запись свойств для вывода в <head> страницы
$html_description = '';
$html_keywords = "";
$html_title = 'Редактирование выбранной выпечки';

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
                        <h1 align="center">Обновление выбранной <br> выпечки</h1>
                        <div class="response"></div>
                        <!-- Форма обновления выпечки -->
                        <form method="post" id="form5" align='center'>
                        <input type="hidden" name="action" value="5">
                            <!-- Получение выбранной выпечки из базы данных -->
                            <?php
                                include("scripts/db.php"); // Импорт подключения к базе данных
                                
                                // Если в GET задано id выпечки и не пустое
                                if (isset($_GET['id']) && $_GET['id'] != ""){
                                    $product_id = $_GET['id'];

                                    $result = mysqli_query($db, "SELECT * FROM products WHERE id = $product_id"); // Запрос к БД
                                    
                                    // Достать выпечку из результата
                                    $product = mysqli_fetch_array($result);

                                    // Вывести форму редактирования Выпечки

                                    // Первая часть формы с выводом категорий выпечки в селект из базы данных
                                    print <<<HERE
                                        Выбор категории <br>
                                        <select name="category_id" id="category_id">
                                    HERE;

                                        // Вывод категорий выпечки из базы данных 
                                        $result = mysqli_query($db, "SELECT * FROM categories"); // Запрос к БД
                
                                        // Пока из результата не прочитаны все категории
                                        while($category = mysqli_fetch_array($result)) {
                                            
                                            // Если id категории редактируемого товара совпадает с выводящимся id,
                                            // Вывести вариант ответа в select и сделать эту категорию активной
                                            if ($product['category_id'] == $category['id']){
                                                echo "<option selected value=". $category['id'] .">";
                                                echo $category['name'] ."</option>"; 
                                            }
                                            // Иначе
                                            else{
                                                // Вывести вариант ответа в select
                                                echo "<option value=". $category['id'] .">";
                                                echo $category['name'] ."</option>"; 
                                            }
                                            
                                        }

                                    // Вторая часть формы с остальными полями ввода
                                    print <<<HERE
                                        </select>
            
                                        <br><br>
                                        Название выпечки <br>
                                        <input type="text" name="product_name" id="product_name" value="$product[name]">
                                        
                                        <br><br>
                                        Адрес картинки из интернета <br>
                                        <input type="text" name="product_img" id="product_img" value="$product[img]">
                                        
                                        <br><br>
                                        Описание с html тегами <br>
                                        <textarea name="product_description" id="product_description" rows="6">$product[description]</textarea>
            
                                        <br><br>
                                        Цена (число) <br>
                                        <input type="number" name="product_price" id="product_price" value="$product[price]">
                                        <br><br>

                                        <!-- Скрытый инпут с id редактируемой выпечки -->
                                        <input type='hidden' name='product_id' value="$product[id]">
                                        
                                        <input type="submit" value="Обновить">
                                        <br><br>
                                        HERE;
                                        
                                }
                                
                                // Иначе в GET не задано id редактируемой выпечки
                                else
                                {
                                    echo "<p align='center'>Ошибка. Выберите выпечку!</p>";
                                    echo "<p align='center'>";
                                    echo "  <a href='page_edit_product.php'> <button type='button'>Вернуться назад</button> </a>";
                                    echo "</p>";
                                }
                            
                            ?>
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