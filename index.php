<?php
    include 'connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/formSession.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Home Page</title>
</head>
<body>
<a class="btn btn-success" href="SignIn.php">Log Out</a>
<div class="main">
    <h1 class="text-center m-5"> <?= isset($row['first_name'])  ? 'User ' . $row['first_name'] : '' ?></h1>
</div>
<table class="table table-hover text-center">
    <thead class="table-dark">
        <tr>
        <th scope="col">Your employees</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">E-mail</th>
        <th scope="col">Phone</th>
        <th scope="col">Gender</th>
        <th scope="col">Salary</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
    </table>
    <script>
        ScrollReveal({
            reset: true,
            distance: '60px',
            duration: 2500,
            delay: 400,
            opacity: 0
        })
        ScrollReveal().reveal('.table', { delay: 0, origin : 'top'});
        ScrollReveal().reveal('img', { delay: 0, origin : 'top'});
        ScrollReveal().reveal('.btn', { delay: 0, origin : 'right'});
    </script>
</body>
</html>