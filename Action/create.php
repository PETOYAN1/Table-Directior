<?php
     session_start();
     $director_id = $_SESSION['director_id'];
     if(isset($_GET['logout']) || !$director_id) {
         session_destroy();
         header('location: ../../signin/director.php');
         exit();
     }
    require_once "function.php";  
    if(isset($_POST['submit'])) {
            insert_user($conn,"employees");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Create Employee</title>
    <link rel="stylesheet" href="../css/create.css">
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="text-Dark">Add New Employee</h1>
            <p class="<?= isset($empty_field) ? 'text-danger' : 'text-muted' ?>" ><?= isset($empty_field) ? $empty_field : 'Complete the form below to add a new employee'?></p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">name</label>
                        <input value="<?= isset($_POST['name']) ? $_POST['name'] : null;  ?>" type="text" class="form-control" name="name">
                        <span class="text-danger"><?= isset($name) ? $name : null ?></span>
                    </div>
                </div>
                    <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">surname</label>
                        <input value="<?= isset($_POST['surname']) ? $_POST['surname'] : null;  ?>" type="text" class="form-control" name="surname">
                        <span class="text-danger"><?= isset($surname) ? $surname : null ?></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">phone</label>
                        <input value="<?= isset($_POST['phone']) ? $_POST['phone'] : 0;  ?>" type="number" class="form-control" name="phone">
                        <span class="text-danger"><?= isset($phone) ? $phone : null ?></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">E-mail</label>
                        <input value="<?= isset($_POST['email']) ? $_POST['email'] : null;  ?>" type="email" class="form-control" name="email">
                        <span class="text-danger"><?= isset($email) ? $email : null ?></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Date of Birth</label>
                        <input value="<?= isset($_POST['dob']) ? $_POST['dob'] : null;  ?>" type="date" class="form-control" name="dob">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Password</label>
                        <input value="<?= isset($_POST['password']) ? $_POST['password'] : null;  ?>" type="password" class="form-control" name="password" placeholder="...">
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-success" type="submit" name="submit">Create</button>
                    <a class="btn btn-danger" href="../Pages/directors.php">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>