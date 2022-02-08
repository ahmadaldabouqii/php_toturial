<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Arrays</title>
    <link rel="stylesheet" href="./style/style.css" />
</head>

<body>
    <?php
        // // Create Array
        // $fruits = array('apple', 'banana', 'orange', 'aa');

        // # Print the whole array
        // echo '<pre>';
        // var_dump($fruits);
        // echo '</pre>';

        // # Get element by index
        // echo $fruits[0] . '<br>';
        // echo $fruits[1] . '<br>';

        // # Set element by index
        // $fruits[0] = 'Peach';
        // echo '<pre>';
        // var_dump($fruits);
        // echo '</pre>';

        // #Check if array has element at index
        // isset($fruits[2]); //true
        // isset($fruits[3]); //false

        // # Append Element (push)
        // $fruits[] = 'Banana';
        // echo '<pre>';
        // var_dump($fruits);
        // echo '</pre>';

        // # Add Element from the end of the array (push)
        // array_push($fruits, 'FOO');
        // echo '<pre>';
        // var_dump($fruits);
        // echo '</pre>';

        // # Print the whole length
        // echo count($fruits) . '<br>';

        // # Remove element from the end of the array
        // echo array_pop($fruits);
        // echo '<pre>';
        // var_dump($fruits);
        // echo '</pre>';

        // # Add element at the beginning of the array
        // array_unshift($fruits, 'bar');
        // echo '<pre>';
        // var_dump($fruits);
        // echo '</pre>';

        // # Remove element from the beginning of the array
        // array_shift($fruits);
        // echo '<pre>';
        // var_dump($fruits);
        // echo '</pre>';

        // # Split the string into an array
        // $string = "Banana,Apple,Peach";
        // echo '<pre>';
        // var_dump(explode(",", $string));
        // echo '</pre>';

        // // Combine array elements into string
        // echo implode("$", $fruits);

        // # Check if element exist in the array
        // echo '<pre>';
        // // -> in_array(): not case-sensetive
        // var_dump(in_array('banana', $fruits));
        // echo '</pre>';

        // // Search element index in the array
        // echo '<pre>';
        // var_dump(array_search('banana', $fruits));
        // echo '</pre>';

        // # merge two arrays
        // $vegetables   = array("potata", "cucumber");
        // $mergedArrays = array_merge($vegetables, $fruits);
        // echo '<pre>';
        // var_dump($mergedArrays);
        // echo '</pre>';
        // // -> using spread operator
        // echo '<pre>';
        // var_dump(array(...$fruits, ...$vegetables));
        // echo '</pre>';

        // # Sorting of array (Reverse order also)

        // echo '<pre>';
        // var_dump($fruits);
        // echo '</pre>';
        // sort($fruits);
        // // rsort($fruits);
        // echo '<pre>';
        // var_dump($fruits);
        // echo '</pre>';

        // =======================================
        // Associativve arrays
        // =======================================

        // Create an associative array
        $person = array(
            'name'    => 'Ahmad',
            'surname' => 'Dabouqi',
            'age'     => 24,
            'hobbies' => array('Football', 'Cooding', 'watch movie')
        );

        // echo '<pre>';
        // print_r($person);
        // echo '</pre>';

        // # Get Element By Key
        // echo $person['name'] . '<br>';

        // // Set element by key
        // $person['address'] = 'Amman';
        // echo '<pre>';
        // print_r($person);
        // echo '</pre>';

        # Null coalescing assignment operator
        // if (!isset($person['address'])) {
        //     $person['address'] = 'Amman';
        // }

        // // $person['address'] = $person['address'] ?? 'unknown';
        // $person['address']??='unknown';
        // echo '<pre>';
        // print_r($person);
        // echo '</pre>';

        // // Check if array has a specific key

        // # Print the whole keys of the array
        // echo '<pre>';
        // var_dump(array_keys($person));
        // echo '</pre>';

        // // Print the values of the array
        // echo '<pre>';
        // var_dump(array_values($person));
        // echo '</pre>';

        // # Sort assiciative arrays by value
        // ksort($person);
        // echo '<pre>';
        // var_dump($person);
        // echo '</pre>';

        // Two Dimensional arrays

        $todos = array(
            array('title' => 'Todo title 1', 'completed' => true),
            array('title' => 'Todo title 2', 'completed' => false)
        );

        echo '<pre>';
        echo $todos[0]['title'];
        echo '</pre>';
    ?>

</body>

</html>