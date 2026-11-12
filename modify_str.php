<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Strings</title>
</head>
<body>
    <h2>Modify strings functions</h2>
    <?php 
        $txt = "hello world";
        $txt2 = "    hello   ";
        
        echo strtolower($txt)."<br>";
        echo strtoupper($txt)."<br>";
        echo str_replace("world","ali",$txt)."<br>";
        echo strrev($txt)."<br>";
        echo trim($txt2);

        // "split string into array/indexes"
        $y = explode(" ", $txt);

        //Use print_r() to display the result
        print_r($y);

        // concatenating strings
        $x = "Hello";
        $y = "World";
        $z = "$x $y";
        echo $z;
    
    ?>
</body>
</html>