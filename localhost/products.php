<?php
// Запись свойств для вывода в <head> страницы
$html_description = 'Пекарня "Хлебушек". Свежий хлеб, пирожки, выпечка.';
$html_keywords = "Пекарня Хлебушек, выпечка, хлеб, пирожные, пирожки, сладкая выпечка, сытная выпечка";
$html_title = 'Наш ассортимент';

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
                    <td>
                        <!-- Импорт Меню из PHP файла -->
                        <?php include("blocks/menu.php"); ?>


                        <!-- Вывод категорий выпечки из Базы данных -->
                        <p align="center" class="title">Категории</p>

                        <!-- Получение категорий из БД -->
                        <?php
                            include("scripts/db.php"); // Импорт подключения к базе данных

                            $result = mysqli_query($db, "SELECT * FROM categories"); // Запрос к БД
                            ?>

                        <!-- Вывод категорий из полученного массива -->
                        <div id="coolmenu">
                            <?php
                            // Пока из результата не прочитаны все категории
                            while($category = mysqli_fetch_array($result)) {
                                // Вывести ссылку с категорией 
                                echo '<a href="products.php?category=' . $category['id'] . '">' . $category['name'] . '</a>';
                            }
                            
                            ?>
                        </div>
                    </td>
        
                    <!-- Контент -->
                    <td width="100%">
                        <?php
                            // Если в GET не выбрана категория или она пустая, вывести стандартный контент страницы
                            if (!isset($_GET['category']) || $_GET['category'] == ""){
                                print <<<HERE
                                    <h1 align="center">Наш ассортимент</h1>
                                    <p>В нашей пекарне вы можете приобрести свежий хлеб, булочки, кексы, пирожки, а также многое другое.
                                    <br><br>
                                    Наш ассортимент постоянно пополняется.</p>
                                    <p align="center">
                                        <img src="img/hleb.jpeg" width="100%">
                                    </p>
                                HERE;
                                    }
                                    // Иначе если категория из GET существует, вывести товары из нужной категории
                                    else{
                                // Запросить из бд категорию с id, полученным из GET
                                $category_id = $_GET['category'];
                                $result = mysqli_query($db, "SELECT id, name FROM categories WHERE id = $category_id"); 
                                
                                // Если в результате есть строка с найденной категорией вывести выпечку из категории
                                if ($category = mysqli_fetch_array($result)) {
                                    // Запросить из бд
                                    $result = mysqli_query($db, "SELECT id, name, img, description, price FROM products WHERE category_id = $category_id"); 
                                    
                                    // Пока из результата не прочитаны все продукты
                                    while($product = mysqli_fetch_array($result)) {
                                        // Вывести продукт
                                        print <<<HERE
                                        <h2 align="center"> $product[name] </h2>
                                        <p align="center">
                                            <img src="$product[img]" width="100%">
                                        </p>                                  
                                        <p> $product[description] </p>  
                                        <p> <b>Цена:</b> $product[price] р.</p>
                                        HERE;
                                    }
                                }


                                // Иначе вывести сообщение с ошибкой
                                else{
                                    echo "<h1 align='center'>Ошибка. Выберите существующую категорию выпечки!</h1>";
                                }
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