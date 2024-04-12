<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $category = $_POST["category"];
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Создаем папку категории, если ее нет
    $category_folder = "./categories/$category";
    if (!is_dir($category_folder)) {
        mkdir($category_folder, 0777, true);
    }

    // Создаем файл объявления
    $file_name = "$category_folder/$title.txt";
    $content = "$email\n$title\n$description";
    file_put_contents($file_name, $content);

    // Перенаправляем обратно на главную страницу
    header("Location: index.php");
    exit;
}
?>
