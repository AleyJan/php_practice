<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>string functions</title>
</head>
<body>
    <h2>Strings: Strings Function</h2>
    <?php   $txt = "hello world"; 
            echo("string length is: ".strlen($txt)."<br>");
            
            echo("the string contains sub-string at ".strpos($txt,"o")." position <br>");

            echo("word count is: ".str_word_count($txt)."<br>");

            // var_dump(str_starts_with("hell",$txt)); returns boolean
            // var_dump(str_ends_with("ld",$txt)); returns boolean
            // var_dump(str_contains($txt, "world")); returns boolean
    
    ?>
    
</body>
</html>