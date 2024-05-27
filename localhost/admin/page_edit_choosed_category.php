<?php
// Запись свойств для вывода в <head> страницы
$html_description = '';
$html_keywords = "";
$html_title = 'Редактирование выбранной категории';

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
                        <h1 align="center">Редактирование выбранной категории</h1>
                        <div class="response"></div>
                        <!-- Получение выбранной категории из базы данных -->
                        <?php
                            include("scripts/db.php"); // Импорт подключения к базе данных
                            
                            // Если в GET задано id категории и не пустое
                            if (isset($_GET['id']) && $_GET['id'] != ""){
                                $category_id = $_GET['id'];

                                $result = mysqli_query($db, "SELECT * FROM categories WHERE id = $category_id"); // Запрос к БД
                                
                                // Достать категорию из результата
                                $category = mysqli_fetch_array($result);

                                // Вывести форму редактирования категории
                                print <<<HERE
                                <form id="form2" align='center'>
                                   <input type="hidden" name="action" value="2">
                                    Название категории <br>
                                    <input type='text' name='category_name' id='category_name' value='$category[name]'>
                                    <br><br>
        
                                    <!-- Скрытый инпут с id редактируемой категории -->
                                    <input type='hidden' name='category_id' value='$category[id]'>

                                    <input type='submit' value='Редактировать'>
                                </form>
                                HERE;
                                
                            }
                            else{
                                echo "<p align='center'>Ошибка. Выберите категорию!</p>";
                                echo "<p align='center'>";
                                echo "  <a href='page_edit_category.php'> <button>Вернуться назад</button> </a>";
                                echo "</p>";
                            }

                            
                        ?>

                        

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