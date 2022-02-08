<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./style/style.css" />
</head>

<body>
    <?php
        // single line comment
        echo "Login/Register" . '<br>';
        # also single-line comment

    ?>

    <?php
        # Variables
        $firstName = "Ahmad";
        $lastName  = "ALdabouqi";
        echo "the first name is " . $firstName . " | last name is " . $lastName . '<br>';

        $num_1 = 2;
        $num_2 = 5;
        echo "avg is: " . $num_1 + $num_2 . '<br> <br>';

        function say($data) {
            printf("ds" . array($data));
        }

        // Print Types of the variables
        echo gettype($num_1) . '<br>';
        echo gettype($firstName) . '<br>';

        # print the whole variable (type | length | variable)
        var_dump($firstName, $lastName);

        // Variable checking functions
        is_int($firstName); //false
        is_string($firstName); //true
        is_int($num_1); // true

        # Check if the variable is defined
        isset($firstName); // true
        isset($myName); //false

        // Constants
        define('PI', 3.14);
        echo '<br>' . PI . '<br>';

        // Using PHP built-in constants
        echo SORT_ASC . '<br>';
        echo PHP_INT_MAX . '<br>';
    ?>
</body>

</html>