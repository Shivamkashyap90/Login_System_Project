<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}

echo '<nav class="navbar navbar-expand-lg bg-primary mx-auto  ">
    <div class="container-fluid w-25 ">
        <a class="navbar-brand text-info bg-dark fw-bold rounded-pill p-2" href="/loginsystem">iSecure</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-medium fs-5">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/loginsystem/welcome.php">Home</a>
                </li>';
if (!$loggedin) {
    echo '<li class="nav-item">
                    <a class="nav-link" href="/loginsystem/login.php">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/loginsystem/singup.php">Singup</a>
                </li>';
}
if ($loggedin) {
    echo '<li class="nav-item">
                    <a class="nav-link" href="/loginsystem/logout.php">Logout</a>
                </li>';
}
echo '
        </div>
    </div>
</nav>';
