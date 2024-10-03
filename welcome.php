<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
    exit;
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>welcome-<?php echo $_SESSION['username'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/_navbar.php'; ?>
    <div class="container my-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">welcome <?php echo $_SESSION['username'] ?></h4>
            <p>Hello my dear friends,you are logged in as <strong><?php echo $_SESSION['username'] ?></strong>. you are successfully landed on the welcome page.Thanku for login have a good day.</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to logged out from this link <a href="/loginsystem/logout.php">using this link</a>.</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>