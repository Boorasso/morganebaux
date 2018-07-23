<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1">
    <link rel="icon" type="image/png" href="vue/img/morgane logo.png" />
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vue/css/reset.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="vue/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vue/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="vue/css/main.css">
    <title>Morgane Baux | <?php echo $page_title; ?></title>
    <script src="vendor/ckeditor/ckeditor.js"></script>
</head>
<body>
    <header class="main-header">
        <!-- Add proper home link -->
        <a href="index.php" class="main-header__logo logo">
            <img class="logo__image" src="vue/img/morgane logo.svg" alt="Morgane Baux - Scénographe">
            <h1 class="site-heading">Morgane Baux <span class="site-heading__sub">Scénographie</span><span class="site-heading__point">.</span></h1>
            <?php if ($login) : ?>
                <p class="rouge">Espace administration</p>
            <?php endif; ?>
        </a>
        <nav class="main-nav">
            <!-- Add proper links -->
            <div id="topnav">
                <a href="index.php" class="main-nav__link mobile-hide">Home</a>
                <a href="categorie.php?ref=1" class="main-nav__link">Spect<span class="rouge">a</span>cle vivant</a>
                <a href="categorie.php?ref=2" class="main-nav__link">Ciné an<span class="bleugris">i</span>mation/Maquettes</a>
                <a href="categorie.php?ref=3" class="main-nav__link">E<span class="orange">x</span>po/événementiel</a>
                <a href="categorie.php?ref=4" class="main-nav__link">Déc<span class="violet">o</span>ration</a>
                <a href="categorie.php?ref=5" class="main-nav__link">Ima<span class="vert">g</span>es</a>
            </div>
            <div id="bottomnav">
                <a href="actualite.php" class="main-nav__link">Actualité</a>
                <a href="contact.php" class="main-nav__link">Contact/CV</a>
                <p class="main-nav__copyright mobile-hide">copyright © Morgane Baux</p>
            </div>
        </nav>
    </header><!--
		 --><main>
