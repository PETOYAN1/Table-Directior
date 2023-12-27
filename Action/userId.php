<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>User ID Page</title>
</head>
<body>
    <?
        require_once "../Action/function.php"; 
        $id = $_GET['id'];
        $sql = "SELECT * FROM `directors` WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
        }
    ?>  
    <a class="back btn btn-dark m-3" href="../Pages/directors.php">Back</a>
    <div class="container d-flex justify-content-center align-items-center flex-column gap-5">
        <h1 class="text-center">Info about User ID <? echo $row['id'] ?></h1>
        <div>
            <p>Name: <? echo  $row['name']?></p>
            <p>Lastname: <? echo  $row['surname']?></p>
            <p>Email: <? echo  $row['email']?></p>
            <p>Gender: <? echo  $row['phone']?></p>
        </div>
    </div>
</body>
</html>