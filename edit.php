<?php
include "db_conn.php";

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email']; // Corrected field name to lowercase
    $gender = $_POST['Gender'];

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE `crud` SET `first_name`=?, `last_name`=?, `Email`=?, `Gender`=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $first_name, $last_name, $email, $gender, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("Location: index.php?msg=Data Updated successfully");
        exit(); // Add this to prevent further execution
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include the correct Bootstrap and Font Awesome links -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>PHP CRUD Application</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        PHP Complete CRUD Application
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit user Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-label">First Name</div>
                        <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row['Email'] ?>">
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label>Gender:</label>

                        <label for="male" class="form-input-label">Male</label>
                        <input type="radio" class="form-check-input" name="Gender" id="male"
                               value="Male" <?php echo ($row['Gender'] == 'Male') ? "checked" : ""; ?>>

                        <label for="female" class="form-input-label">Female</label>
                        <input type="radio" class="form-check-input" name="Gender" id="female" value="Female"
                               <?php echo ($row['Gender'] == 'Female') ? "checked" : ""; ?>>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Include the correct Bootstrap JavaScript link -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
