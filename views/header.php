<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>College Cart: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>College Cart</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <a href="/"><img alt="College Cart" src="/img/logo.png"/></a>
                </div>
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav nav-pills">
                        <li><a href="postAd.php">Sell Item</a></li>
                        <li><a href="store.php">Go to Store</a></li>
                        <li><a href="logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                <?php else: ?>
                    <ul class="nav nav-pills">
                        <li><a href="login.php">Click to Sign In</a></li>
                        <li><a href="store.php">Go to Store</a></li>
                    </ul>
                <?php endif ?>
            </div>

            <div id="middle">
