<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Numbers</title>
    <link rel="stylesheet" href="./style/style.css" />

</head>

<body>
    <?php
        // Declaring numbers
        $a = 5;
        $b = 4;
        $c = 1.2;

        # arithmetic operation
        echo $a + $b * $c . '<br>';

        // Number checking functions
        is_float(1.25); //true
        is_int(1); // true
        is_numeric("3.2"); //true
        is_numeric("3r.3"); //false

        # Conversion
        $strNumber   = '12.34';
        $numberFloat = floatval($strNumber);
        $numberInt   = (int) $strNumber;
        # var_dump($numberInt);
        var_dump($numberFloat);

        // Number functions
        echo '<br>' . "abs(-15) " . abs(-15) . '<br>';
        echo "pow(2, 3) " . pow(2, 3) . '<br>';
        echo "sqrt(16) " . sqrt(16) . '<br>';
        echo "max(2, 3) " . max(2, 9, 3) . '<br>';
        echo "min(2, 3) " . min(2, 3) . '<br>';
        echo "round (2.4) " . round(2.4) . '<br>';
        echo "round (2.6) " . round(2.6) . '<br>';
        echo "floor(2.6) " . floor(2.6) . '<br>';
        echo "ceil(2.4) " . ceil(2.4) . '<br>';

        # Formating Numbers
        $number = 1234567891.12345;
        echo number_format($number, 2, '.', ',');

    ?>
</body>

</html>