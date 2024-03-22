<?php
    session_start();
    if(isset($_GET['logout']) || !$_SESSION['ID']) {
        session_unset();
        session_destroy();
        header('location: ../signin/employee.php');
        exit();
    }
    require_once "../Action/function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Employees Page</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../css/director.css">
</head>
<body>
    <a href="employees.php?logout" class="btn btn-primary position-absolute end-1 logout">LogOut</a>
    <h1><a href="employees.php" class="text-decoration-none h1">Employees Page</a></h1>
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
            <li><a href="employees.php">Home</a></li>
            <li><a href="">Salary</a></li>
            <li><a href="">blogs</a></li>
            <li><a href="">portfolio</a></li>
            <li><a href="">contact</a></li>
          </div>
        </div>
      </div>
    </nav>
  <div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <form method="get">
                            <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <input value="<?= isset($_GET['search']) ? $_GET['search'] : null ?>" type="search" name="search" class="form-control" placeholder="Search&hellip;">
                                <button class="btn btn-info" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Surname</th>
                        <th>Phone <i class="fa fa-sort"></i></th>
                        <th>E-mail</th>
                        <th>Date <i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!isset($_GET['search']) || $_GET['search'] == null) {
                        get_all_users($conn,"employees"); 
                    } else {
                        require_once "../Action/search.php";
                        search_users($conn,"employees");
                    }
                     ?>       
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                        <?php  
                            require_once "../Action/pagination.php"; 
                            pagination_users($conn, 'employees', 'employees.php');
                        ?>
                </ul>
            </div>
        </div>
    </div>  
</div>   
  <script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  console.log("%c ".concat("For Employees"), "color: #0e2431; font-weight: bold; font-size: 40px; text-shadow: 2px 2px #80ecff");
  
  ScrollReveal({
            reset : true,
            distance : '40px',
            duration : 1500,
            delay : 0,
            opacity : 0,
        });

        ScrollReveal().reveal('.table-title .row', {
            delay: 500,
            useDelay: 'onload',
            reset: true,
        });

        ScrollReveal().reveal('.btn', {
            delay: 0,
            interval: 80,
        });
        ScrollReveal().reveal('.nav-container', {
            interval : 80,
            origin : 'left'
        });
        ScrollReveal().reveal('.hint-text', {
            interval : 80
        });
        ScrollReveal().reveal('td', {
            interval : 20,
            origin : 'top'
        });
  </script>
</body>
</html>