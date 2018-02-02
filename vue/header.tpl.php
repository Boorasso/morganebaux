<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1">
    <link rel="icon" type="image/png" href="vue/img/morgane logo.png" />
    <link rel="stylesheet" type="text/css" href="vue/css/reset.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vue/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vue/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="vue/css/main.css">
    <title>Morgane Baux | <?php echo $page_title; ?></title>
</head>
<body>
<div class="content">
    <header>
        <!-- Add proper home link -->
        <a href="index.php" class="logo">
            <img src="vue/img/morgane logo.svg" alt="Morgane Baux - Scénographe">
            <h1>Morgane Baux <span class="linebreak">Scénographie</span><span>.</span></h1>
            <?php if ($login) : ?>
                <p class="rouge">Espace administration</p>
            <?php endif; ?>
        </a>
        <nav>
            <!-- Add proper links -->
            <div id="topnav">
                <a href="index.php" class="mobile-hide">Home</a>
                <a href="categorie.php?ref=1">Spect<span class="rouge">a</span>cle vivant</a>
                <a href="categorie.php?ref=2">Ciné an<span class="bleugris">i</span>mation/Maquettes</a>
                <a href="categorie.php?ref=3">E<span class="orange">x</span>po/événementiel</a>
                <a href="categorie.php?ref=4">Déc<span class="violet">o</span>ration</a>
                <a href="categorie.php?ref=5">Ima<span class="vert">g</span>es</a>
            </div>
            <div id="bottomnav">
                <a href="actualite.php">Actualité</a>
                <a href="contact.php">Contact/CV</a>
                <p class="mobile-hide">copyright © Morgane Baux</p>
            </div>
        </nav>
    </header><!--
		 --><main>
