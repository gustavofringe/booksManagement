<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Maven+Pro" rel="stylesheet">
    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" href="<?php echo BASE_URL; ?>/public/img/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</head>


<body>
<header>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
        <h1 class="navbar-brand mr-5 title">Gestionnaire de livres</h1>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <?php if ($_REQUEST['url'] != '') : ?>
                <li class="nav-item active">
                    <?php if (isset($_SESSION['admin'])) : ?>
                        <a class="nav-link" href="<?= BASE_URL; ?>/pages/logout">Se deconnecter</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/pages/books">Accueil<span class="sr-only">(current)</span></a>
                </li>

            </ul>
            <?php endif;?>
            <?php if ($_REQUEST['url'] === 'pages/books') : ?>

            <ul class="my-2 my-lg-0 navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link " href="<?php echo BASE_URL; ?>/pages/users">Voir les utilisateurs<span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="<?php echo BASE_URL; ?>/posts/create">Ajouter un livre<span
                                class="sr-only">(current)</span></a>
                </li>
                <li>
                    <form action="" method="post" name="category">
                        <select class="custom-select" name="category" onchange="document.forms.category.submit();">
                            <option selected>Sélectionner une catégorie</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?php echo $cat->getCategoryID();?>"><?php echo $cat->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                </li>
            </ul>
            <?php endif; ?>
        </div>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</header>


<div class="container" id="container">
    <!-- /.header -->
    <?php echo App\Session::flash(); ?>
    <main>
        <?php echo $content; ?>
    </main>
</div>


<footer class="footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center" id="text">@Book management</p>
            </div>
        </div>
    </div>
</footer>


<script src="<?php echo BASE_URL; ?>/public/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/bootstrap.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/stacktable.js"></script>
<script src="<?php echo BASE_URL; ?>/public/js/main.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>
