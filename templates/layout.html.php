<!DOCTYPE html>
<html lang="en">
<head>
    <title>FITIN - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A place to find local fitness groups">
    <meta name="keywords" content="fitness workout bootcamp social yoga meditation groups">
    <link rel="shortcut icon" href="/images/logo.svg">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/styles.css" media="screen">
    <link rel="stylesheet" href="css/stylesprint.css" media="print">
</head>
<body>


    <nav class="center-links">
        <div class="container">
            <img src="images/logo.svg" alt="logo" width="50px" height="50px">
            <a href="javascript:void(0);" class="icon" onclick="navButton()">
                <i class="fa fa-bars"></i>
            </a>
            <ul id="nav-list">
                <?php if ($loggedIn): ?>
                    <li><a href="index.php?logout">Logout</a></li>
                    <li><a href="#"><i class="fas fa-user"></i> <?=$user['firstname'] . ' ' . $user['lastname'] ?></a></li>
                <?php else: ?>
                    <li><a href="index.php?login">Login</a></li>
                    <li><a href="index.php?user/register">Signup</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="nav-links">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?groups">Groups</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?contact">Contact</a>
                </li>
                <?php if ($loggedIn && $user['permissions'] > 1): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?admin">Admin</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>


    <!-- =======================================================================
    | MAIN - PAGE CONTENT
    ======================================================================= -->
    <main>


        <!-- ===================================================================
        | HERO
        =================================================================== -->
        <section id="hero" class="hero hero-dark hero-bottom-border hero-top-border dark">
            <div class="container">
                <div class="hero-text">
                    <h1>Find Your Motivation</h1>
                    <p>Fit into a group to push your limits.</p>
                </div>
            </div>
        </section>
            
        <?=$output?>
        <!-- End of unique content -->
    </main>
        <!-- =======================================================================
    | FOOTER
    ======================================================================= -->
    <footer>
        <div class="container">
            <div>
                <div class="social-media">
                    <ul>
                        <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href="https://twitter.com/"><i class="fab fa-twitter-square"></i></a></li>
                        <li><a href="https://www.youtube.com/"><i class="fab fa-youtube-square"></i></a></li>
                        <li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="https://www.github.com/"><i class="fab fa-github-square"></i></a></li>
                    </ul>
                </div>
                <div class="link-list">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            
            <p>Fitin.com &#169;
            <script>
                var d = new Date();
                document.writeln(d.getFullYear());
            </script>
            <a href="mailto:omar.gastelum2@laverne.edu">Omar Gastelum</a></p>
        </div>
    </footer>

    
    <!-- =======================================================================
    | JAVASCRIPT
    ======================================================================= -->
    <script src="https://kit.fontawesome.com/f4a104139c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <!-- <script src="js/map.js"></script> -->
</body>
</html>
