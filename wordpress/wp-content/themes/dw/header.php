<?php?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<header>
    <h1 class="header__title"><?= get_bloginfo('name');?></h1>
    <p class="header__placeholder"><?= get_bloginfo('description');?></p>
    <nav class="header__nav">
        <h2 class="nav__title">Navigation de mon <?= get_bloginfo('name')?></h2>
        <p class="nav__placeholder">Voici mon contenu</p>
    </nav>
</header>

