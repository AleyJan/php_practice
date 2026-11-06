<!DOCTYPE html>
<html>

<body>
    <h1>this is 1st php code</h1>

    <?php
    echo "hello world <br>";
    
    echo "php version:" .phpversion(). "<br>";
   

    $name = "Ali Jan";
    $age  = 23;
    $field = "Web Dev";
    $department = "KPITB";
    $date = "06/11/2026";

    $student_details = "Name: $name <br> Age: $age <br> Field: $field <br> Department: $department <br> Date: $date";
    echo "<h2>Student Details</h2> $student_details";
?>
    
</body>
</html>
