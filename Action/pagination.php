<?php
    require_once "function.php";
    function pagination_users(object $conn,string $table_name, string $page_name = 'directors.php') {
      $num_per_page = 05;
        // $start_from = ($page - 1) * 05;
        $sql = "SELECT * FROM `$table_name`";
          $rs_result = mysqli_query($conn, $sql);
          $total_records = mysqli_num_rows($rs_result);
          $total_pages = ceil($total_records/$num_per_page);
          for($i = 1; $i <= $total_pages; $i++) {
              echo "<a class='btn text-center text-info info' href='$page_name?page=".$i."'>$i</a>";
          }
    }
?>