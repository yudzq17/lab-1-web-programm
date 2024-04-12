<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IGORITO</title>
</head>
<body>
<h2>Добавить объявление</h2>
<form action="save.php" method="post">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="category">Выберите категорию:</label><br>
    <select id="category" name="category" required>
        <?php
        // Получение массива созданных папок и добавление их в список
        $categoriesPath = "./categories/";
        if (is_dir($categoriesPath)) { // проверка на существование папки в которой лежат остальные директории
            $folders = array_filter(glob($categoriesPath . '*'), 'is_dir');
            foreach ($folders as $folder) {
                $folderName = basename($folder);
                echo "<option value=\"$folderName\">$folderName</option>";
            }
        }
        ?>
    </select><br>
    <label for="title">Заголовок объявления:</label><br>
    <input type="text" id="title" name="title" required><br>
    <label for="description">Текст объявления:</label><br>
    <textarea id="description" name="description" rows="4" required></textarea><br><br>
    <input type="submit" value="Добавить">
</form>

<h2>Список объявлений</h2>
<table border="1">
    <tr>
        <th>Email</th>
        <th>Категория</th>
        <th>Заголовок</th>
        <th>Текст</th>
    </tr>
    <?php
    // Чтение объявлений из Google Sheets
    require_once __DIR__ . '/vendor/autoload.php'; // Подключаем автозагрузчик Composer

    // Авторизация и создание клиента для работы с гугл таблицами
    $client = new Google_Client();
    $client->setAuthConfig('credintals.json');
    $client->addScope(Google_Service_Sheets::SPREADSHEETS_READONLY);
    $service = new Google_Service_Sheets($client);

    // Идентификатор таблицы
    $spreadsheetId = '1TPZe6loQRkA8QCgjYnNKQdbZiZaeyIrb7WMHd42c0fE';

    // Диапазон ячеек с данными объявлений
    $range = 'igorito';

    // Запрос данных из таблицы
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    $values = $response->getValues();

    // Вывод данных в таблицу на сайте
    if (!empty($values)) {
        foreach ($values as $row) {
            echo "<tr>";
            echo "<td>{$row[0]}</td>";
            echo "<td>{$row[1]}</td>";
            echo "<td>{$row[2]}</td>";
            echo "<td>{$row[3]}</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
</body>
</html>

<!-- чтобы было все покрасивше юзаю <br> -->