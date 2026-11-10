<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php form</title>
</head>
<body>
    <form action="welcome.php" method="post">

        <fieldset>
            <legend>User Info</legend>

        <label for="name">Name: </label>
        <input type="text" name="name" placeholder="enter name..."><br><br>

        <label for="email">Email: </label>
        <input type="email" name="email" placeholder="enter email..."><br><br>

        <label for="password">Password: </label>
        <input type="password" name="password" placeholder="enter password..."><br><br>

        <label for="dob">DOB: </label>
        <input type="date" name="dob" ><br><br>

        
        <input type="submit" name="submit"><br>

        </fieldset>

    </form>
    
</body>
</html>