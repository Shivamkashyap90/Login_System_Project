<?php
$login = false;
$showError = false;
$emptyForm = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('partials/_dbconnection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];


    if ((strlen($username) == 0) || (strlen($password) == 0)) {
        $emptyForm = true;
    }
    // $sql = "SELECT * FROM users where username = '$username' AND password = '$password' ";
    $sql = "SELECT * FROM users where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                //jab hamlog logged in ho jaynge tab niche wala kam karenge.
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: welcome.php");
            } else {
                $showError = " Invalid credential!";
            }
        }
    } else {
        $showError = " Invalid credential!";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login-page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/_navbar.php'; ?>

    <?php
    if ($emptyForm) {
        echo '<div class=" mb-0 alert alert-danger alert-dismissible fade show" role="alert ">
         <strong>Sorry!</strong> You need to insert data first then go you for singUp.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You are logged in .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
    } else if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong>' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
    }
    ?>

    <h5 class="d-flex justify-content-center mt-3 text-uppercase fw-bold text-decoration-underline fst-italic ">-:Login to our website:-</h5>
    <div class="container d-flex justify-content-center mt-3 text-uppercase fw-medium">

        <form action="/loginsystem/login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" placeholder="Enter your username" class="form-control border border-3  fw-light" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" placeholder="Enter your password" class="form-control border border-3 fw-light" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary fw-medium px-3">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>