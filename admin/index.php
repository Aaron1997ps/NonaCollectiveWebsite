<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,400i,500,600,700,700i,800,800i" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/admin/admin.css">
    <title></title>
</head>

<body>
<div id="m-overlay">

</div>
<div class="m-admin">
    <div class="m-aside">
        <img class="m-logo" src="../assets/img/icons/landing-crystal-logo.svg">
        <div class="m-nav">
            <div class="m-module" target="modules">
                <img class="m-icon" src="../assets/img/icons/modules.svg">
                <div class="m-title">Modules</div>
            </div>
            <div class="m-module">
                <img class="m-icon" src="../assets/img/icons/modules.svg">
                <div class="m-title">Blog</div>
            </div>
            <div class="m-module">
                <img class="m-icon" src="../assets/img/icons/modules.svg">
                <div class="m-title">Files</div>
            </div>
        </div>
    </div>
    <?php require "views/Modules.php"?>
    <?php require "views/Elements.php"?>
    <?php require "views/Article.php"?>
    <?php require "views/Articles.php"?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<!-- ELEMENTS! STAY AT TOP! -->
<script src="../assets/js/admin/views/V_MODULES.js"></script>
<script src="../assets/js/admin/views/V_ELEMENTS.js"></script>
<script src="../assets/js/admin/views/V_ARTICLES.js"></script>
<script src="../assets/js/admin/views/V_ARTICLE.js"></script>
<!-- END ELEMENTS! STAY AT TOP! -->

<script src="../assets/js/admin/admin.js"></script>
<script src="../assets/js/api/api.js"></script>

</body>
</html>