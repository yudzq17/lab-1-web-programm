<?php
// Начало сессии
session_start();

// Проверяем, есть ли данные в сессии
if (isset($_SESSION["surname"]) && isset($_SESSION["name"]) && isset($_SESSION["age"])) {
    // Выводим данные на экран
    echo "Фамилия: " . $_SESSION["surname"] . "<br>";
    echo "Имя: " . $_SESSION["name"] . "<br>";
    echo "Возраст: " . $_SESSION["age"] . "<br>";
} else {
    echo "Данные не найдены в сессии.";
}
?>
