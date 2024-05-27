<?php
// Запись свойств для вывода в <head> страницы
$html_description = '';
$html_keywords = "";
$html_title = 'Выбор редактируемой выпечки';

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
                        <h1 align="center">Выберите выпечку для редактирования</h1>
                        
                        <table align="center" cellpadding="9" cellspacing="0" border="1">

                            <!-- Вывод выпечки из базы данных в таблицу -->
                            <?php
                            include("scripts/db.php"); // Импорт подключения к базе данных
                            
                            $result = mysqli_query($db, "SELECT * FROM products"); // Запрос к БД
    
                            // Пока из результата не прочитана вся выпечка
                            while($product = mysqli_fetch_array($result)) {
                                // Вывести название выпечки и ссылку на редактирование выпечки
                                echo "<tr>";
                                echo "  <td>". $product['name'] ."</td>";
                                echo "  <td> <a href='page_edit_choosed_product.php?id=". $product['id'] ."'>Редактировать</a> </td>";
                                echo "<tr>";
                            }
                            ?>

                        </table>
                        <br><br>
                        
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