<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dates</title>
    <link rel="stylesheet" href="./style/style.css" />
</head>

<body>

    <?php

        // Print Current Date
        echo 'Current Date: ' . date('Y-m-d H:i:s') . '<br>';

        # Print yesterday
        echo 'Yesterday Date: ' . date('Y-m-d H:i:s', time() - 60 * 60 * 24);

        // Different Format

    ?>

</body>

</html>