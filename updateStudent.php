<?php include('./utilities/header.php'); ?>
<?php include('./utilities/dbcon.php'); ?>

    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM students WHERE id = $id";
            $result = mysqli_query($connection, $sql);
            
            if(!$result){
                die("Query failed: " . mysqli_error($connection));
            }else{
                $row = mysqli_fetch_assoc($result);
                // print_r($row);
            }
        }
    ?>
    <form id="studentFormUpdate" action="updateStudent.php?id_new=<?php echo $id; ?>" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $row['first_name'] ?>" >
        <br>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $row['last_name'] ?>" >
        <br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $row['age'] ?>" >
        <br>
        <input type="submit" class="submit" name="updateStudent" value="Submit">
    </form>

    <?php
        if(isset($_POST['updateStudent'])){
            if(isset($_GET['id_new'])){
                $id = $_GET['id_new'];
            }
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $age = $_POST['age'];

            $sql = "UPDATE students SET first_name = '$firstName', last_name = '$lastName', age = '$age' WHERE id = $id";
            $result = mysqli_query($connection, $sql);

            if (!$result) {
                die("Query failed: " . mysqli_error($connection));
            } else {
                header('location: index.php?success=Student updated successfully');
                exit();
            }
        }
    ?>
<?php include('./utilities/footer.php'); ?>