<!DOCTYPE html>
<html lang="en">
<head>
    <title>FITIN - Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A place to find local fitness groups">
    <meta name="keywords" content="fitness workout bootcamp social yoga meditation groups">
    <link rel="shortcut icon" href="/images/logo.svg">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/styles.css" media="screen">
    <link rel="stylesheet" href="css/admin.css" media="screen">
    <link rel="stylesheet" href="css/stylesprint.css" media="print">
</head>
<body>
    <div id="side-nav" class="hide">
        <div class="header">
            <img src="images/logo.svg" alt="">
        </div>
        <div class="user">
            <img src="images/users/jemain-clement.jpg" alt="">
            <h2>Jemain Clement</h2>
            <p class="dim">jemain.clement@fitin.com</p>
        </div>
        <div class="dashboard">
            <h2>Navigation</h2>
            <ul>
                <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
                    Home</a></li>
                <li><a href="groups.html"><i class="fa fa-users" aria-hidden="true"></i>
                    Groups</a></li>
            </ul>
        </div>
        <div class="dashboard">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="admin_groups.html"><i class="fa fa-users" aria-hidden="true"></i>
                    Groups</a></li>
                <li><a href="admin_activities.html"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                    Activities</a></li>
                <li><a href="admin_users.html"><i class="fa fa-user-plus" aria-hidden="true"></i>
                    Users</a></li>
            </ul>
        </div>
    </div>
    <nav id="nav" class="center-links">
        <div class="container">
            <a href="javascript:void(0);" class="icon" onclick="navButton()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </nav>

    <?=$output?>


    <!-- =======================================================================
    | JAVASCRIPT
    ======================================================================= -->
    <script src="https://kit.fontawesome.com/f4a104139c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/admin.js"></script>
    <!-- <script src="js/map.js"></script> -->
</body>
</html>