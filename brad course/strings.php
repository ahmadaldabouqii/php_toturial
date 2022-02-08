<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Strings</title>
    <link rel="stylesheet" href="./style/style.css" />
</head>

<body>
    <?php

        #Create simple string
        $name    = 'Ahmad';
        $string  = 'Hello ' . $name . ' I 24 years old';
        $string2 = "Hello $name I 24 years old";
        echo $string . '<br>';
        echo $string2 . '<br>';

        #String functions
        $string = "     Hello World     ";

        echo "<br> 1 - " . strlen($string) . '<br>';
        echo "2 - " . trim($string) . '<br>';
        echo "3 - " . ltrim($string) . '<br>';
        echo "4 - " . rtrim($string) . '<br>';
        echo "5 - " . str_word_count($string) . '<br>';
        echo "6 - " . strtoupper($string) . '<br>';
        echo "7 - " . strtolower($string) . '<br>';
        echo "8 - " . strrev($string) . '<br>';
        echo "9 - " . ucfirst('hello') . '<br>';
        echo "10 - " . lcfirst('HELLO') . '<br>';
        echo "11 - " . ucwords('hello world') . '<br>';
        echo "12 - " . strpos($string, 'World') . '<br>';
        echo "13 - " . stripos($string, 'world') . '<br>';
        echo "14 - " . substr($string, 8) . '<br>';
        echo "15 - " . str_replace('world', 'PHP', $string) . '<br>';
        echo "16 - " . str_ireplace('World', 'PHP', $string) . '<br>';

        // Multiline text and line breaks
        $longText = "
          Hello my name is Ahmad
          I am 24,
          I love my major
        ";
        echo $longText . PHP_EOL;
        echo nl2br($longText) . PHP_EOL;

        // Multline text and reserve html tag
        $longText = "
          Hello my name is <b>Ahmad</b>
          I am <b>24</b>,
          I love my major
        ";
        echo nl2br($longText) . '<br>';
        echo htmlentities($longText) . '<br>';
        echo nl2br(htmlentities($longText)) . '<br>';
        echo html_entity_decode('&lt;b&gt;Ahmad&lt;/b&gt;');
    ?>

</body>

</html>