<?php

    include("db.php"); 
    $action = $_POST['action'];
	
	
	
switch ($action) {
    case 1: 
		$category_name = $_REQUEST['category_name'];

		// Добавление данных в бд
		$insertResult = mysqli_query($db, "INSERT INTO categories(name) VALUES ('$category_name')"); 
		// Успешное добавление
		if ($insertResult){
			$result = array();
			$result['name'] = $_REQUEST['category_name'];
			echo json_encode($result);
			file_put_contents('info.json', json_encode($result));
		}
		else
			echo json_encode("Error"); 	
		break;

	
	case 2: 
			 // Извлечь данные из формы
			 $category_id = $_REQUEST['category_id'];
			 $category_name = $_REQUEST['category_name'];
			 $result = mysqli_query($db, "SELECT id, name FROM categories WHERE id = $category_id"); 
			 $category = mysqli_fetch_array($result);
		 
			 // Обновить данные категории
			 $updateResult = mysqli_query($db, "UPDATE categories SET name = '$category_name' WHERE id = $category_id LIMIT 1"); // запрос в бд
		 
			 // Успешное обновление
			 if ($updateResult){
					$result = array();
					$result['info'] = "Старые данные";
					$result['name_old'] = $category['name'];
					$result['info_'] = "Новые данные";
					$result['name_new'] = $category_name;
					echo json_encode($result);
					file_put_contents('info.json', json_encode($result));
				}
				else
					echo json_encode("Error"); 	
				break;



	case 3: 
		$category_id = $_REQUEST['category_id'];
	    $result = mysqli_query($db, "SELECT id, name FROM categories WHERE id = $category_id"); 
        $category = mysqli_fetch_array($result);                           
			 // Удаление одной категории из бд
			 $deleteResult = mysqli_query($db, "DELETE FROM categories WHERE id = $category_id LIMIT 1");

			 // Успешное удаление
			 if ($deleteResult){
				$result = array();
				$result['name'] = $category['name'];
				echo json_encode($result);
				file_put_contents('info.json', json_encode($result));
			}
			else
				echo json_encode("Error"); 	
			break;
    
	case 4: 
				$category_id = $_REQUEST['category_id'];
			
				$result = mysqli_query($db, "SELECT id, name FROM categories WHERE id = $category_id"); 
				$category = mysqli_fetch_array($result);
				$product_name = $_REQUEST['product_name'];
				$product_img = $_REQUEST['product_img'];
				$product_description = $_REQUEST['product_description'];
				$product_price = $_REQUEST['product_price'];
			
				// Добавление данных в бд
				$insertResult = mysqli_query($db, "INSERT INTO products(category_id, name, img, description, price) VALUES ('$category_id', '$product_name', '$product_img', '$product_description', '$product_price')");
			
				// Успешное добавление
				if ($insertResult){
							$result = array();
							$result['category_name'] = $category['name'];
							$result['name'] = $_REQUEST['product_name'];
							$result['img'] = $_REQUEST['product_img'];
							$result['description'] = $_REQUEST['product_description'];
							$result['price'] = $_REQUEST['product_price'];
							echo json_encode($result);
							file_put_contents('info.json',json_encode($result));
						}
						else
							echo json_encode("Error"); 	
						break;

	case 5: 
		$product_id = $_REQUEST['product_id'];
		$category_id = $_REQUEST['category_id'];
	
	    $result = mysqli_query($db, "SELECT id, name FROM categories WHERE id = $category_id"); 
        $category = mysqli_fetch_array($result);

		$result = mysqli_query($db, "SELECT products.name as product_name, categories.name as category_name, `img`, `description`, `price` FROM products,categories WHERE 
		category_id = categories.id and
		products.id = $product_id"); // Запрос к БД
                                    
		// Достать выпечку из результата
		$product = mysqli_fetch_array($result);

		$product_name = $_REQUEST['product_name'];
		$product_img = $_REQUEST['product_img'];
		$product_description = $_REQUEST['product_description'];
		$product_price = $_REQUEST['product_price'];

    // Обновление данных выпечки в бд
    $updateResult = mysqli_query($db, "UPDATE products SET category_id = '$category_id', name = '$product_name', img = '$product_img', description = '$product_description', price = '$product_price' WHERE id = $product_id LIMIT 1");

    // Успешное обновление
    if ($updateResult){
					$result = array();
					$result['info_old'] = 'Старые данные';
					$result['category_name'] = $product['category_name'];
					$result['product_name'] = $product['product_name'];
					$result['img'] = $product['img'];
					$result['description'] = $product['description'];
					$result['price'] = $product['price'];
					$result['info_new'] = 'Новые данные';
					$result['category_name'] = $category['name'];
					$result['product_name'] = $_REQUEST['product_name'];
					$result['product_img'] = $_REQUEST['product_img'];
					$result['product_description'] = $_REQUEST['product_description'];
					$result['price'] = $_REQUEST['product_price'];
					echo json_encode($result);
					file_put_contents('info.json', json_encode($result));
				}
				else
					echo json_encode("Error"); 	
				break;
	
	case 6: 
		$product_id = $_REQUEST['product_id'];
		$result = mysqli_query($db, "SELECT id, name, img, description, price FROM products WHERE id = $product_id"); 
		$product = mysqli_fetch_array($result);                           
		// Удаление одного товара выпечки из бд
		$deleteResult = mysqli_query($db, "DELETE FROM products WHERE id = $product_id LIMIT 1");
	
		// Успешное удаление
		if ($deleteResult){
						$result = array();
						$result['name'] = $product['name'];
						echo json_encode($result);
						file_put_contents('info.json', json_encode($result));
					}
					else
						echo json_encode("Error"); 	
					break;
}

?>