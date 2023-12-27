<?php
    require_once "function.php";
    function pagination_users($conn,$table_name) {
      $num_per_page = 05;
      if(isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $start_from = ($page - 1) * 05;
        $sql = "SELECT * FROM `$table_name` ORDER BY `ID` DESC LIMIT $start_from, $num_per_page";
        $result = mysqli_query($conn, $sql);
  
          $sql = $sql = "SELECT * FROM `directors`";
          $rs_result = mysqli_query($conn, $sql);
          $total_records = mysqli_num_rows($rs_result);
          $total_pages = ceil($total_records/$num_per_page);
          for($i = 1; $i <= $total_pages; $i++) {
              echo "<a class='btn text-center text-info' href='$table_name.php?page=".$i."'>$i</a>";
          }
    }
?>