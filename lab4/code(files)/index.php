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
    // Чтение объявлений из файлов
    $categories = ['Cars', 'Other'];
    foreach ($categories as $category) {
        $folder = "./categories/$category";
        if (is_dir($folder)) {
            $files = scandir($folder);// Получаем список файлов в текущей категории
            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {//Проверяем, что текущий файл не является ссылкой на текущую или родительскую директорию
                    $content = file_get_contents("$folder/$file");
                    $data = explode("\n", $content);
                    echo "<tr>";
                    echo "<td>{$data[0]}</td>";
                    echo "<td>$category</td>";
                    echo "<td>{$data[1]}</td>";
                    echo "<td>{$data[2]}</td>";
                    echo "</tr>";
                }
            }
        }
    }
    ?>
</table>
</body>
</html>

<!-- чтобы было все покрасивше юзаю <br> -->