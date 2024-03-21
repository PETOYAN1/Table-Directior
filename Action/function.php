<?php
    require_once __DIR__.('/../SQL_connect/connect_db.php');

    // Create User
    function insert_user(object $conn,string $table_name) {
            $name = trim($_POST['name']); 
            $surname = trim($_POST['surname']); 
            $phone = trim($_POST['phone']); 
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
            $dob = trim($_POST['dob']); 
            $password = trim($_POST['password']);

            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  

            // Email exists 

            $sql = "SELECT email FROM $table_name WHERE email LIKE '%$email%'";
            $result_email = mysqli_query($conn, $sql);

            // Validation
        
            if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($phone) || empty($dob)) {
                $GLOBALS['empty_field'] = "Something is empty";
            } else if (!preg_match ("/^[a-zA-z]*$/", $name)) {
                $GLOBALS['name'] = "Only alphabets and whitespace are allowed";
            } else if (!preg_match ("/^[a-zA-z]*$/", $surname)) {
                $GLOBALS['surname'] = "Only alphabets and whitespace are allowed";
            }  else if (!is_numeric($phone)) {
                $GLOBALS['phone'] = "Phone can be only number";
            } else if (mb_strlen($phone) > 10) {
                $GLOBALS['phone'] = "Max phone number 10";
            } else if (!preg_match($pattern, $email)) {
                $GLOBALS['email'] = "Email not valid";
            } else if (mysqli_num_rows($result_email) > 0) {
                $GLOBALS['email'] = "Email already exists $email";
            } else {
                $sql = "INSERT INTO `$table_name` (`id`, `name`, `surname`, `phone`, `email`, `date`, `password`)
                VALUES (NULL,'$name', '$surname', '$phone', '$email', '$dob', '$password')";
    
                $result = mysqli_query($conn, $sql);
    
                if($result) {
                    header("Location: ../../Pages/directors.php?msg=New employer created successfully");
                } else {
                    echo 'Failed ' . mysqli_error($conn);
                }
            }
    }

    // Rendering all users
    function get_all_users(object $conn,string $table_name, bool $action = false) {
        $num_per_page = 05;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $start_from = ($page - 1) * 05;
        $sql = "SELECT * FROM $table_name ORDER BY id DESC LIMIT $start_from, $num_per_page;";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            ?>
                 <tr>
                 <?php 
                        if ($action): 
                            ?>
                    <td><a href="../Action/userId.php?id=<?php echo $row['id'] ?>"><? echo $row['id'] ?></a></td>
                    <?php elseif (!$action) :?>
                    <td><? echo $row['id'] ?></td>
                    <?php endif ?>
                    <td><? echo $row['name']?></td>
                    <td><? echo $row['surname']?></td>
                    <td>0<? echo $row['phone']?></td>
                    <td><? echo $row['email']?></td>
                    <td><? echo $row['date']?></td>
                    <?php 
                        if ($action): 
                    ?>
                    <td><? echo $row['password']?></td>
                    <td>
                        <a href="../Action/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary text-white">Update</a>
                        <a href="../Action/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger text-white">Delete</a>
                    </td>
                    <?php endif ?>
                </tr>
              <?php
        }
    }

    // Update data about user
    function update_user(object $conn,string $table_name) {
        $id = $_GET['id'];
        $name = trim($_POST['name']); 
        $surname = trim($_POST['surname']); 
        $phone = trim($_POST['phone']); 
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
        $dob = trim($_POST['dob']); 
        $password = trim($_POST['password']);

        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
        
        // Validation
        
        if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($phone) || empty($dob)) {
            $GLOBALS['empty_field'] = "Something is empty";
        } else if (!preg_match ("/^[a-zA-z]*$/", $name)) {
            $GLOBALS['name'] = "Only alphabets and whitespace are allowed";
        } else if (!preg_match ("/^[a-zA-z]*$/", $surname)) {
            $GLOBALS['surname'] = "Only alphabets and whitespace are allowed";
        }  else if (!is_numeric($phone)) {
            $GLOBALS['phone'] = "Phone can be only number";
        } else if (mb_strlen($phone) > 10) {
            $GLOBALS['phone'] = "Max phone number 10";
        } else if (!preg_match($pattern, $email)) {
            $GLOBALS['email'] = "Email not valid";
        } else {
            $sql = "UPDATE `$table_name` SET `name`='$name',`surname`='$surname',`email`=
            '$email',`phone`='$phone',`date`='$dob',`password`='$password' WHERE id = $id";
    
            $result = mysqli_query($conn, $sql);
    
            if($result) {
                header("Location: ../Pages/directors.php?msg=New record updated successfully");
            } else {
                echo 'Failed ' . mysqli_error($conn);
            }
        }

    }

    // Get User for Update or Delete
    function get_user_id(object $conn, string $table_name, int $id) {
        if(!isset($id)) {
            echo 'false';
            return false;
        } else {
            $sql = "SELECT * FROM `$table_name` WHERE id = $id LIMIT 1";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                return $row;
        }
    }

    // Delete employee or director
    function delete_user(object $conn, string $table_name) {
        if(!isset($_GET['id'])) {
            header("location:" . '../Pages/' . "directors.php");
            exit();
        } else {
            $id = $_GET['id'];
            $sql = "DELETE FROM `$table_name` WHERE id = $id";
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                header('Location: ../../Pages/directors.php?msg=Deleted Successfully');
            } else {
                echo 'Failed' . mysqli_error($conn);
            }
        }
    }
?>