<?php
require_once __DIR__ . '/vendor/autoload.php'; // Подключаем автозагрузчик Composer

if ("POST" === $_SERVER["REQUEST_METHOD"]) {
    $email = $_POST["email"];
    $category = $_POST["category"];
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Авторизация и создание клиента для работы с таблицами
    $client = new Google_Client();
    $client->setApplicationName("igorito");
    $client->setAuthConfig(__DIR__. '/credintals.json');
    $client->addScope(Google_Service_Sheets::SPREADSHEETS);
    $client->setAccessType('offline');

    // Создаем объект сервиса
    $service = new Google_Service_Sheets($client);

    // Идентификатор таблицы
    $spreadsheetId = '1TPZe6loQRkA8QCgjYnNKQdbZiZaeyIrb7WMHd42c0fE';

    // Данные для записи
    $values = [
        [$email, $category, $title, $description]
    ];

    // Запись данных в таблицу
    $range = 'igorito';
    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);
    $params = [
        'valueInputOption' => 'RAW'
    ];

    // Записываем данные
    $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
    header("Location: index.php");
    exit;
}
?>

<!-- долго не мог разобраться с приколами гугла, но как говорится всегда найдется индус который знает решение твоей проблемы
https://www.youtube.com/watch?v=zoufwxZjr0c&ab_channel=FineGap -->

<!-- интересный гугл конечно, чтобы работал твой oauth нужно создавать сервисный аккаунт, я посмотрел видео
5 летней давности, о том как это делалось - было легче, а теперь какие-то танцы с бубном -->

<!-- credintals.json добавить в коммиты не могу ругается гитхаб, тк содержится api -->