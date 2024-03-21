<?php 
    require_once '../../SQL_connect/connect_db.php';
    session_start();
    $director_id = $_SESSION['director_id'];
     if(isset($_GET['logout']) || !$director_id) {
         header("location: ../directors.php?logout");
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/resp_director.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/director.css">
</head>
<body>
    <a href="index.php?logout" class="btn btn-primary position-absolute end-1 logout">LogOut</a>
    <h1><a href="" class="text-decoration-none h1">Company Page</a></h1>
    <nav>
      <div class="navbar">
        <div class="container nav-container">
            <input class="checkbox" type="checkbox" name="box"/>
            <div class="hamburger-lines">
              <span class="line line1"></span>
              <span class="line line2"></span>
              <span class="line line3"></span>
            </div>  
          <div class="menu-items">
            <li><a href="../directors.php">Home</a></li>
            <li><a href="">Salary</a></li>
            <li><a href="all_directors.php">Directors</a></li>
            <li><a href="">Company</a></li>
            <li><a href="#">contact</a></li>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Company</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT c.company,d.department FROM company as c JOIN department as d ON c.department_id = d.id;";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $row['company'] ?></td>
                                <td><?= $row['department'] ?></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
    </table>
        </div>
    </div>  
</div>   
<script>
        ScrollReveal({
            reset : true,
            distance : '40px',
            duration : 1500,
            delay : 0,
            opacity : 0,
        });
        ScrollReveal().reveal('.nav-container', {
            interval : 80,
            origin : 'left'
        });
        ScrollReveal().reveal('.btn', {
            delay: 0,
            interval: 80,
        });
        ScrollReveal().reveal('.hint-text', {
            interval : 80
        });
        ScrollReveal().reveal('td', {
            interval : 20,
            origin : 'right'
        });
    </script>
</body>
</html>