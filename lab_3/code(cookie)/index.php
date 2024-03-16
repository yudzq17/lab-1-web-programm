<?php
// Начало сессии
session_start();

// Проверяем, была ли отправлена форма
if ("POST"== $_SERVER["REQUEST_METHOD"]) {
    // Получаем данные из формы
    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $age = $_POST["age"];

    // Записываем данные в сессию
    $_SESSION["surname"] = $surname;
    $_SESSION["name"] = $name;
    $_SESSION["age"] = $age;

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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname" required><br><br>

    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="age">Возраст:</label>
    <input type="number" id="age" name="age" required><br><br>

    <input type="submit" value="Отправить">
</form>
</body>
</html>
