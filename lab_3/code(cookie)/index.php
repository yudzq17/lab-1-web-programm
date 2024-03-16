<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = $_POST["name"];
    $age = $_POST["age"];
    $salary = $_POST["salary"];
    $sp = $_POST["sp"];

    // Создаем массив с данными
    $userData = array(
        'name' => $name,
        'age' => $age,
        'salary' => $salary,
        'sp' => $sp
    );

    // Сохраняем массив в сессию
    $_SESSION['userData'] = $userData;

    // Перенаправляем пользователя на другую страницу
    header("Location: display.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
<form method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>

    <label for="age">Age:</label><br>
    <input type="text" id="age" name="age"><br>

    <label for="salary">Salary:</label><br>
    <input type="text" id="salary" name="salary"><br>

    <label for="sp">Sp:</label><br>
    <input type="text" id="sp" name="sp"><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>
