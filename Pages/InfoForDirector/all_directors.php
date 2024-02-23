<?php 
    session_start();
    $path = '../../signin/director.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Directors</title>
    <link rel="stylesheet" href="../../css/director.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
<body>
<a href="all_directors.php?logout" class="btn btn-primary position-absolute end-1 logout">LogOut</a>
    <h1><a href="" class="text-decoration-none h1">Directors</a></h1>
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
                <li><a href="../InfoForDirector">Salary</a></li>
                <li><a href="">Directors</a></li>
                <li><a href="#">portfolio</a></li>
                <li><a href="#">contact</a></li>
            </div>
            </div>
        </div>
        </nav>
        <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b>All Directors</b></h2></div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="tr">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $path = '../../Action/function.php';
                        $pagination = '../../Action/pagination.php';
                        require_once $path;
                        get_all_users($conn, 'directors');
                    ?>
                </tbody>
            </table>
            <div class="clearfix">
            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
            <ul class="pagination">
                <?php 
                    require_once $pagination; 
                    pagination_users($conn, 'directors', 'all_directors.php');
                ?>
            </ul>
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