<?php
$num1= $_GET['num1'];
$num2= $_GET['num2'];

function sum($a, $b){
    return $a + $b;
}
 ?>
<p>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum 2 numbers!</title>
</head>

<body>
    <p><?php echo ($num1 . ' + ' . $num2 . ' = ' . sum($num1, $num2)); ?></p>
    <p><a href="form2.html"> Do another sum</a></p>
</body>

</html>