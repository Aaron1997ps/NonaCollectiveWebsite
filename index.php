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


                <div class="m-module m-element-slider">
                    <div class="m-module-content">
                        <img class="m-arrow m-left" src="assets/img/icons/amaranth-arrow-left.svg">
                        <img class="m-arrow m-right" src="assets/img/icons/amaranth-arrow-right.svg">
                        <div class="m-elements-container">
                            <img class="m-element m-01" src="assets/img/player/earth.png">
                            <img class="m-element m-02" src="assets/img/player/fire.png">
                            <img class="m-element m-03" src="assets/img/player/ice.png">
                            <img class="m-element m-04" src="assets/img/player/neutral.png">
                            <img class="m-element m-05" src="assets/img/player/metal.png">
                            <img class="m-element m-06" src="assets/img/player/water.png">
                            <img class="m-element m-07" src="assets/img/player/shadow.png">
                            <img class="m-element m-08" src="assets/img/player/nature.png">
                            <img class="m-element m-09" src="assets/img/player/light.png">
                        </div>
                    </div>
                </div>

                <?php include("modules/updates.php") ?>
                <?php include("modules/discordInvitation.php") ?>
                <?php include("modules/footer.php") ?>

            </main>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/elementSlider.js"></script>
        <script src="assets/js/landingParallax.js"></script>
        <script src="assets/js/smoothScrolling.js"></script>
    </body>
</html>