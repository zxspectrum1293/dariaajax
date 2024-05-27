<!DOCTYPE html>
<html>
<head>
    <!-- Кодировка страницы -->
    <meta charset="UTF-8">
    
    <!-- Вывод описания страницы из PHP -->
    <meta name="description" content="<?php echo $html_description; ?>"/>
    
    <!-- Вывод ключевых слов из PHP -->
    <meta name="keywords" content="<?php echo $html_keywords; ?>">
    
    <!-- Вывод названия страницы из PHP -->
    <title>
        <?php echo $html_title; ?>
    </title>

    <!-- подключение CSS -->
    <link rel="stylesheet" href="style.css">

    <script src = "js/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){ 
    //Добавление категории через Ajax
    $('#form1').submit(function(e) {
        e.preventDefault();
        valid = true; 
        $('.response').hide();
        if ($('#category_name').val() == '') {
            alert ("Введите название категории");
            valid = false;
        }
      if (valid) {     
        $.ajax({
                    type: "POST",
                    url: "scripts/ajax_addc.php", // страница обработчика
                    data: $(this).serialize(),
                    success: function(response)  {
                               response = JSON.parse(response);
                               $('.response').show();
							   $('.response').html("<h2>Добавлена информация</h2>");
                               $.each(response,function(index,value){
                                    
                                    $('.response').append(value);
                                    $('.response').append("<br>");        
                                });
							   //$('.total').html(data[1]);  
                }

        }); 
    }   
	 
    });

    //Редактирование категории через Ajax
    $('#form2').submit(function(e) {
        e.preventDefault();
        valid = true; 
        $('.response').hide();
        if ($('#category_name').val() == '') {
            alert ("Введите название категории");
            valid = false;
        }
      if (valid) {     
        $.ajax({
                    type: "POST",
                    url: "scripts/ajax_addc.php", // страница обработчика
                    data: $(this).serialize(),
                    success: function(response)  {
                               response = JSON.parse(response);
                               $('.response').show();
							   $('.response').html("<h2>Информация обновлена</h2>");
                               $.each(response,function(index,value){
                                    
                                        $('.response').append(value);
                                        $('.response').append("<br>");        
                                    });
							   //$('.total').html(data[1]);  
                }

        }); 
    }   
	 
    });


    //Удаление категории через Ajax
    $('#form3').submit(function(e) {
        e.preventDefault();
        valid = true; 
        $('.response').hide();
        if ($('#category_id').val() == '') {
            alert ("Выберите название категории");
            valid = false;
        }
      if (valid) {     
        $.ajax({
                    type: "POST",
                    url: "scripts/ajax_addc.php", // страница обработчика
                    data: $(this).serialize(),
                    success: function(response)  {
                               response = JSON.parse(response);
                               $('.response').show();
							   $('.response').html("<h2>Категория удалена</h2>");
                               $.each(response,function(index,value){
                                    
                                    $('.response').append(value);
                                    $('.response').append("<br>");        
                                });
							   //$('.total').html(data[1]);  
                }

        }); 
    }   
	 
    });


    //Добавление товара через Ajax
    $('#form4').submit(function(e) {
        e.preventDefault();
        valid = true; 
        $('.response').hide();
        if ($('#category_id').val() == '') {
            alert ("Выберите название категории");
            valid = false;
        }
        if ($('#product_name').val() == '') {
            alert ("Введите название выпечки");
            valid = false;
        }
        if ($('#product_img').val() == '') {
            alert ("Введите изображение");
            valid = false;
        }
        if ($('#product_description').val() == '') {
            alert ("Введите описание");
            valid = false;
        }
        if ($('#product_price').val() == '') {
            alert ("Введите цену");
            valid = false;
        }
      if (valid) {     
        $.ajax({
                    type: "POST",
                    url: "scripts/ajax_addc.php", // страница обработчика
                    data: $(this).serialize(),
                    success: function(response)  {
                               response = JSON.parse(response);
                               $('.response').show();
							   $('.response').html("<h2>Добавлена информация</h2>");
                               $.each(response,function(index,value){
                                    
                                    $('.response').append(value);
                                    $('.response').append("<br>");        
                                });
							   //$('.total').html(data[1]);  
                }

        }); 
    }   
	 
    });

    //Изменение товара через Ajax
    $('#form5').submit(function(e) {
        e.preventDefault();
        valid = true; 
        $('.response').hide();
        if ($('#category_id').val() == '') {
            alert ("Выберите название категории");
            valid = false;
        }
        if ($('#product_name').val() == '') {
            alert ("Введите название выпечки");
            valid = false;
        }
        if ($('#product_img').val() == '') {
            alert ("Введите изображение");
            valid = false;
        }
        if ($('#product_description').val() == '') {
            alert ("Введите описание");
            valid = false;
        }
        if ($('#product_price').val() == '') {
            alert ("Введите цену");
            valid = false;
        }
      if (valid) {     
        $.ajax({
                    type: "POST",
                    url: "scripts/ajax_addc.php", // страница обработчика
                    data: $(this).serialize(),
                    success: function(response)  {
                               response = JSON.parse(response);
                               $('.response').show();
							   $('.response').html("<h2>Информация обновлена</h2>");
                               $.each(response,function(index,value){
                                    
                                    $('.response').append(value);
                                    $('.response').append("<br>");        
                                });
							   //$('.total').html(data[1]);  
                }

        }); 
    }   
	 
    });

     //Удаление товара через Ajax
     $('#form6').submit(function(e) {
        e.preventDefault();
        valid = true; 
        $('.response').hide();
        if ($('#product_id').val() == '') {
            alert ("Выберите название выпечки");
            valid = false;
        }
      if (valid) {     
        $.ajax({
                    type: "POST",
                    url: "scripts/ajax_addc.php", // страница обработчика
                    data: $(this).serialize(),
                    success: function(response)  {
                               response = JSON.parse(response);
                               $('.response').show();
							   $('.response').html("<h2>Выпечка удалена</h2>");
                               $.each(response,function(index,value){
                                    
                                    $('.response').append(value);
                                    $('.response').append("<br>");        
                                });
							   //$('.total').html(data[1]);  
                }

        }); 
    }   
	 
    });

});
</script>
</head>
