<!DOCTYPE html>

<html lang="ru">
    <head>
        <title>Главная страница</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/reset.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <form class="form" id="stackoverform" method="POST" action="">
            <div class="line">
                <label class="label">
                    <span class="title">Производитель</span>
                    <input type="text" name="manufacturer" class="inp" id="manufacturer" required>
                </label>
            </div>
            <div class="line">
                <label class="label">
                    <span class="title">Наименование</span>
                    <input type="text" name="name" class="inp" id="name" required>
                </label>
            </div>
            <div class="line">
                <label class="label">
                    <span class="title">Цена</span>
                    <input type="number" name="price" class="inp" id="price"  placeholder="от 10999" min="10999" required>
                </label>
            </div>
            <div class="line">
                <label class="label">
                    <span class="title">Количество</span>
                    <input type="number" name="quantity" class="inp" id="quantity" min="1" placeholder="от 1" required>
                </label>
            </div>
            <div class="line">
                <input type="submit" class="btn-app" value="Добавить" id="save">
            </div>
        </form>
        <form class="form" id="formtable" method="POST" action="">
            <table class="table" id="myTable">        	
                <thead>
                    <tr>
                        <th onclick="sortTable(0)">Производитель</th>
                        <th onclick="sortTable(1)">Наименование</th>
                        <th onclick="sortTable(2)">Стоимость</th>
                        <th onclick="sortTable(3)">Количество</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    # Путь к файлу
                    $file_name = "form.txt";
                    # Считываем информацию по строкам
                    $data = file($file_name);
                    # Для подсчета суммы стоимости и количества
                    $sumPrice = NULL;
                    $sumQuantity = NULL;
                    # В цикле обходим массив данных
                    foreach ($data as $value):
                        # Разбиваем строку по ::
                        $value = explode(" :: ", $value);

                        echo '<tr onclick="deleteString()" class="tooltip" data-info="' . $value[0] . '  ' . $value[1] . '  ' . $value[2] . '  ' . $value[3] . '">';
                        echo '<td>' . $value[0] . '</td>';
                        echo '<td>' . $value[1] . '</td>';
                        echo '<td>' . $value[2] . '</td>';
                        echo '<td>' . $value[3] . '</td>' . '</a>';
                        echo '</tr>';
                        # Подсчет суммы стоимости и количества
                        $sumPrice += $value[2];
                        $sumQuantity += $value[3];
                        
                    endforeach;
                    
                    echo '<tr>';
                    echo '<th>' . "Итого" . '</th>';
                    echo '<th>' . '</th>';
                    echo '<th>' . $sumPrice . '</th>';
                    echo '<th>' . $sumQuantity . '</th>';
                    echo '</tr>';
                    ?>
                </tbody>
            </table>

        </form>
        <script src="../js/addingString.js"></script>
        <script src="../js/deleteString.js"></script>
        <script defer="defer" src="../js/sortingData.js"></script>
    </body>
</html>