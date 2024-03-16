<!DOCTYPE html>
<html>
<head>
    <title>Word and Character Count</title>
</head>
<body>
<form method="post">
    <textarea name="text" rows="4" cols="50"></textarea><br>
    <input type="submit" name="submit" value="Count">
</form>

<?php
if(isset($_POST['submit'])&& !empty($_POST['text'])){
        $text = $_POST['text'];
        $word_count = str_word_count($text);
        $char_count = strlen($text);

        echo "Количесвто слов: $word_count<br>";
        echo "Количесвтво букв: $char_count";
    }
else echo "Сначала напишите что-нибудь";
?>
</body>
</html>