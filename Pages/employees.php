<?php
    session_start();
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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <h1><a href="employees.php" class="text-decoration-none text-info">Employees Page</a></h1>
  <?php
    if(isset($_GET['msg'])) {
        echo "<div class='alert alert-primary' role='alert'>";
        echo $_GET['msg'];
        echo "</div>";
    }
  ?>
<div class="container">
    <a class="btn btn-success" href="../Action/create.php">Create</a>
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Customer <b>Details</b></h2></div>
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
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Surname</th>
                        <th>Phone <i class="fa fa-sort"></i></th>
                        <th>E-mail</th>
                        <th>Date <i class="fa fa-sort"></i></th>
                        <th>Password</th>
                        <th>Actions</th>
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
                    <li class="page-item disabled"><a href="employees.php?page=1"><i class="fa fa-angle-double-left"></i></a></li>
                        <?php  
                            require_once "../Action/pagination.php"; 
                            pagination_users($conn,'employees');
                        ?>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>  
</div>   
  <script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>
</body>
</html>