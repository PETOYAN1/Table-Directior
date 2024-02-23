<?php
   session_start();
   $director_id = $_SESSION['director_id'];
    if(isset($_GET['logout']) || !$director_id) {
        header("location: ../directors.php?logout");
    }
    include '../../SQL_connect/connect_db.php';
    $sql = "SELECT e.id,s.salary,s.date,p.position,e.name FROM `salary` as s 
    JOIN position as p ON s.position_id = p.id 
    JOIN employees as e ON s.receiver_id = e.id WHERE p.position = 'employer';";
    $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Salary Page</title>
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
    <h1><a href="" class="text-decoration-none h1">Salary Page</a></h1>
  <?php
    if(isset($_GET['msg'])) {
        echo "<div id='message' onclick='hidden_message()' class='alert alert-primary text-center' role='alert'>";
        echo $_GET['msg'];
        echo "</div>";
    }
  ?>
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
            <li><a href="#">portfolio</a></li>
            <li><a href="#">contact</a></li>
          </div>
        </div>
      </div>
    </nav>
  </body>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Salary of employees</b></h2></div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>salary</th>
                        <th>date</th>
                        <th>position</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                    <td><a href="../../Action/userId.php?id=<?php echo $row['id'] ?>"><? echo $row['id'] ?></a></td>
                                    <td><? echo $row['name']?></td>
                                    <td><? echo $row['salary']?></td>
                                    <td><? echo $row['date']?></td>
                                    <td><? echo $row['position']?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>  
</div>   
  <script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  const message = document.getElementById('message');
        function hidden_message() {
            message.remove();
        }
        console.log("%c ".concat(" Salary "), "color: #0e2431; font-weight: bold; font-size: 40px; text-shadow: 2px 2px #80ecff");
  
        ScrollReveal({
            reset : true,
            distance : '40px',
            duration : 1500,
            delay : 0,
            opacity : 0,
        });
        ScrollReveal({
            reset : true,
            distance : '40px',
            duration : 1500,
            delay : 0,
            opacity : 0,
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