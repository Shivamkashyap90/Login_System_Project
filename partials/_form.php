<?php
$showAlert = false;
$showError = false;
$emptyForm = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('partials/_dbconnection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $exitSql = "SELECT * FROM `users` where username = '$username'";
    $result = mysqli_query($conn, $exitSql);
    $exitRowNumber = mysqli_num_rows($result);
    if ($exitRowNumber > 0) {
        $showError = " Username already exits.";
    } else {

        if ((strlen($username) == 0) || (strlen($password) == 0) || (strlen($cpassword) == 0)) {
            $emptyForm = true;
        }
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`, `password`, `timestamp`) VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = " Password do not match , please enter the correct password!";
        }
    }
}
?>

<?php
if ($emptyForm) {
    echo '<div class=" mb-0 alert alert-danger alert-dismissible fade show" role="alert ">
<strong>Sorry!</strong> You need to insert data first then go you for singUp.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<?php
if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account is now created and now you can login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
}
if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong>' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
}
?>

<h5 class="d-flex justify-content-center mt-3 text-uppercase fw-bold text-decoration-underline fst-italic ">-:Singup to our website:-</h5>
<div class="container d-flex justify-content-center mt-3 text-uppercase fw-medium">

    <form action="/loginsystem/singup.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" maxlength="30" placeholder="Enter your username" class="form-control border border-3  fw-light" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" maxlength="30" placeholder="Enter your password" class="form-control border border-3 fw-light" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password:</label>
            <input type="password" placeholder="Enter your confirm password" class="form-control border border-3 fw-light" id="cpassword" name="cpassword">
            <div class="form-text">Make sure to type the correct password.</div>
        </div>
        <button type="submit" class="btn btn-primary fw-medium px-3">SingUp</button>
    </form>
</div>