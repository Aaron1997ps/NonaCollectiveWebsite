<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,400i,500,600,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>

    <body>
        <div class="m-wrap">
            <header class="m-header">
                <nav class="m-navigation"></nav>
            </header>
            <main class="m-view m-view-main">

                <?php include("modules/landing.php") ?>
                <?php include("modules/elementSlider.php") ?>
                <?php include("modules/updates.php") ?>
                <?php include("modules/discordInvitation.php") ?>
                <?php include("modules/footer.php") ?>

            </main>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/landingParallax.js"></script>
        <script src="assets/js/smoothScrolling.js"></script>
    </body>
</html>