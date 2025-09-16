<?php

declare(strict_types=1);

require_once __DIR__ . '/HelloWorld.php';

$greeter = new HelloWorld();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello World Class</title>
</head>
<body>
    <h1><?php echo $greeter->greet(); ?></h1>
</body>
</html>
