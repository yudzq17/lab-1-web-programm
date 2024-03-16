<?php
session_start();

// Проверяем, есть ли данные в сессии
if(isset($_SESSION['userData'])) {
    // Выводим данные в списке
    echo '<ul>';
    foreach ($_SESSION['userData'] as $key => $value) {
        echo "<li>$key: $value</li>";
    }
    echo '</ul>';
}
else echo "No user data found!";
