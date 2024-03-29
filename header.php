<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VetCheck</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="stylesheet" href="./css/jquery-ui.css">
        <script src="./js/jquery-1.12.4.js"></script>
        <script src="./js/jquery-ui.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="./index.php">VetCheck</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Patient'): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo "{$_SESSION['firstname']} {$_SESSION['lastname']}"; ?> <span class="dropdown-caret">&#9660</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="userdashboard.php">My Account</a>
                                    <a class="dropdown-item" href="php/signout.php">Sign Out</a>
                                </div>
                            </li>
                        <?php elseif(isset($_SESSION['role']) && $_SESSION['role'] == 'Veterinarian'): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['practicename'] ?> <span class="dropdown-caret">&#9660</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="userdashboard.php">My Account</a>
                                    <a class="dropdown-item" href="php/signout.php">Sign Out</a>
                                </div>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./signup.php">Sign Up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./signin.php">Sign In</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>