<?php
    require_once "../SQL_connect/connect_db.php";
    
    // Create User
    function insert_user($conn,$table_name) {
            $name = $_POST['name']; 
            $surname = $_POST['surname']; 
            $phone = $_POST['phone']; 
            $email = $_POST['email']; 
            $dob = $_POST['dob']; 
            $password = $_POST['password'];
        
            if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($phone) || empty($dob)) {
                echo "<script>
                        alert('Something is empty');
                        </script>";
            }else if (mb_strlen($phone) > 9) {
                echo "<script>
                        alert('Max phone number 9');
                        </script>";
            } else {
                $sql = "INSERT INTO `$table_name` (`id`, `name`, `surname`, `phone`, `email`, `date`, `password`)
                VALUES (NULL,'$name', '$surname', '$phone', '$email', '$dob', '$password')";
    
                $result = mysqli_query($conn, $sql);
    
                if($result) {
                    header("Location: ../../Pages/$table_name.php?msg=New user created successfully");
                } else {
                    echo 'Failed ' . mysqli_error($conn);
                }
            }
    }

    // Rendering all users
    function get_all_users($conn,$table_name) {
        $num_per_page = 05;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $start_from = ($page - 1) * 05;
        $sql = "SELECT * FROM `$table_name` ORDER BY `id` DESC LIMIT $start_from, $num_per_page";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            ?>
                 <tr>
                 <td><a href="../Action/userId.php?id=<?php echo $row['id'] ?>"><? echo $row['id'] ?></a></td>
                 <td><? echo $row['name']?></td>
                 <td><? echo $row['surname']?></td>
                 <td><? echo $row['phone']?></td>
                 <td><? echo $row['email']?></td>
                 <td><? echo $row['date']?></td>
                 <td><? echo $row['password']?></td>
                 <td>
                     <a href="../Action/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary text-white">Update</a>
                     <a href="../Action/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger text-white">Delete</a>
                </td>
                
              <?php
        }
    }

    // Update data about user
    function update_user($conn,$table_name) {
        $id = $_GET['id'];
        $name = $_POST['name']; 
        $surname = $_POST['surname']; 
        $phone = $_POST['phone']; 
        $email = $_POST['email']; 
        $dob = $_POST['dob']; 
        $password = $_POST['password'];

        $sql = "UPDATE `$table_name` SET `name`='$name',`surname`='$surname',`email`=
        '$email',`phone`='$phone',`date`='$dob',`password`='$password' WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: ../Pages/$table_name.php?msg=New record updated successfully");
        } else {
            echo 'Failed ' . mysqli_error($conn);
        }
    }

    // Get User for Update or Delete
    function get_user_id($conn,$table_name,$id) {
        $sql = "SELECT * FROM `$table_name` WHERE id = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row;
    }

    // Delete employee or director
    function delete_user($conn,$table_name) {
        $id = $_GET['id'];
        $sql = "DELETE FROM `$table_name` WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('Location: ../../Pages/directors.php?msg=Deleted Successfully');
        } else {
            echo 'Failed' . mysqli_error($conn);
        }
    }
?>