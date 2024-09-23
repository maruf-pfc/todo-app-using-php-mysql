<?php
include('./utilities/dbcon.php');
if(isset($_POST['insertStudent'])){
    // echo "Form submitted";
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];

    echo $firstName . " " . $lastName . " " . $age;

    // Check if any field is empty
    if (empty($firstName) || empty($lastName) || empty($age)) {
        // Corrected redirection without quotes in URL parameters
        header('location: index.php?error=Fill the input fields');
        exit();
    } else {
        $sql = "INSERT INTO students(first_name, last_name, age) VALUES('$firstName', '$lastName', '$age')";
        $result = mysqli_query($connection, $sql);
        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        } else {
            header('location: index.php?success=Student added successfully');
            exit();
        }
    }
}

?>