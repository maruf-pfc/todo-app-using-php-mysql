<?php include('./utilities/header.php'); ?>
<?php include('./utilities/dbcon.php'); ?>

<div class="container">
    <div class="top">
        <h2>All Students</h2>
        <!-- <a href="add.php" class="btn">Add Student</a> -->
        <button id="addStudentBtn">Add Student</button>

        <div id="modal" class="modal">
            <div class="modal-content">
                <div class="top">
                    <h3>Add a new student</h3>
                    <span class="close" id="closeBtn">&times;</span>
                </div>
                <hr>
                <form id="studentForm" method="post" action="insertStudent.php">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" >
                    <br>
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" >
                    <br>
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" >
                    <br>
                    <input type="submit" class="submit" name="insertStudent" value="Submit">
                </form>
            </div>
        </div>
    </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM students";
                $result = mysqli_query($connection, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><a href="updateStudent.php?id=<?php echo $row['id']; ?>">
                                    <img src="./images/update.png" alt="update" height="30" width="30">
                                </a></td>
                                <td><a href="deleteStudent.php?id=<?php echo $row['id']; ?>">
                                    <img src="./images/delete.png" alt="delete" height="30" width="30">
                                </a></td>

                            </tr>
                        <?php
                    }
                }else{
                    echo "<tr><td colspan='4'>No data found</td></tr>";
                }
            ?>
        </tbody>
    </table>
    <?php
        if (isset($_GET['error'])) {
            // Print the error message in red
            echo "<p class='error' id='message'>".$_GET['error']."</p>";
        } elseif (isset($_GET['success'])) {
            // Print the success message in green
            echo "<p class='success' id='message'>".$_GET['success']."</p>";
        }
    ?>
</div>
<?php include('./utilities/footer.php'); ?>