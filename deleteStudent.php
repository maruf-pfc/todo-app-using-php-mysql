<?php include('./utilities/dbcon.php'); ?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location: index.php?success=Student deleted successfully');
        exit();
    }
?>