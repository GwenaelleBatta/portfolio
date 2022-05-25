<?php?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
	<meta name="author" content="Batta Gwenaëlle">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="author" content="Batta Gwenaëlle">
	<meta name="description" content="Projet Portfolio">
    <title><?= get_bloginfo('name');?></title>
	<link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
	<link rel="manifest" href="./site.webmanifest">
	<meta name="msapplication-TileColor" content="#9f00a7">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" type="text/css" href="<?= portfolio_mix('css/style.css'); ?>">
	<script type="text/javascript" src="<?= portfolio_mix('/js/script.js'); ?>"></script>
	<?php wp_head(); ?>
</head>
<body aria-labelledby="portfolio">
<header>
    <h1 id="portfolio" class="header__title hidden" aria-level="1"><?= get_bloginfo('name');?></h1>
    <p class="header__placeholder hidden"><?= get_bloginfo('description');?></p>
    <nav aria-labelledby="navigation" class="header__nav">
        <h2 id="navigation" class="nav__title hidden" aria-level="2">Navigation de mon <?= get_bloginfo('name')?></h2>
		<ul class="nav__liste">
			<?php foreach (portfolio_get_menu_items('primary') as $link): ?>
				<li class="<?=$link->getBemClasses('nav__item');?>">
					<a href="<?= $link->url; ?>"
							<?= $link ->title? 'title = "' . $link->title . '"' : '';?>
					   class="nav__link"><?= $link->label; ?></a>
					<?php if ($link-> hasSubItems()):?>
						<ul class="nav__subcontainer">
							<?php foreach ($link->subitems as $sub): ?>
								<li class="<?=$link -> getBemClasses('nav__item')?>">
									<a href="<?= $sub->url; ?>"
											<?= $sub ->title? 'title = "' . $sub->title . '"' : '';?>
									   class="nav__link"><?= $sub->label; ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif;?>
				</li>
			<?php endforeach; ?>
		</ul>
    </nav>
</header>

