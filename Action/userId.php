<?php 
    session_start();
    if(!$_SESSION['director_id']) {
        header('location: ../signin/director.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>User ID Page</title>
</head>
<body>
    <?php
        require_once "../Action/function.php"; 
        $id = $_GET['id'];
        if(!isset($id)) {
            header('location: ../Pages/directors.php?msg=Employee Not Found');
            exit();
        }
         $row = get_user_id($conn, 'employees', $id);
         if(!isset($row['id'])) {
            header('location: ../Pages/directors.php?msg=Employee Does not exists');
            exit();
         }
        
    ?>  
    <a class="back btn btn-dark m-3" href="../Pages/directors.php">Back</a>
    <div class="container d-flex justify-content-center align-items-center flex-column gap-5">
        <h1 class="text-center">Info about Employer ID <?= $row['id'] ?></h1>
        <div>
            <p>Name: <?= $row['name']?></p>
            <p>Surname: <?= $row['surname']?></p>
            <p>Email: <?= $row['email']?></p>
            <p>Phone: <?= $row['phone']?></p>
            <p>Date of Birthday: <?= $row['date']?></p>
            <p>Password: <?= $row['password']?></p>
        </div>
    </div>
</body>
</html>