<?php 
    require_once "../SQL_connect/connect_db.php";
    function search_users(object $conn,string $table_name, bool $action = false) {
      $filterValues = $_GET['search'];
      $sql = "SELECT * FROM `$table_name` WHERE CONCAT(id,name,surname,email) LIKE '%$filterValues%'";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                   <td><a href="userId.php?id=<?php echo $row['id'] ?>"><?= $row['id'] ?></a></td>
                   <td><?= $row['name']?></td>
                   <td><?= $row['surname']?></td>
                   <td><?= $row['phone']?></td>
                   <td><?= $row['email']?></td>
                   <td><?= $row['date']?></td>
                   <?php 
                        if ($action == true): 
                    ?>
                    <td><?= $row['password']?></td>
                    <td>
                        <a href="../Action/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary text-white">Update</a>
                        <a href="../Action/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger text-white">Delete</a>
                    </td>
                  <?php endif ?>
                </tr>
              <?php
          }
      } else {
        echo 'Not Found';
      }
    }
?>